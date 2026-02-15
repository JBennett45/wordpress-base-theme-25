<?php 
// [1] Theme Options - Create options tab for network // 
function custom_dev_admin_panel_cst() {
	add_menu_page( 'Development', 'Development', 'manage_options', 'developer-page', 'dev_options_cb', 'dashicons-laptop' ); // for single install //
  // add_menu_page( 'Development', 'Development', 'manage_network_options', 'developer-page', 'dev_options_cb', 'dashicons-laptop' ); // for multisite install //
}
add_action( 'admin_menu', 'custom_dev_admin_panel_cst' ); // for single install //
// add_action( 'network_admin_menu', 'custom_dev_admin_panel_cst' ); // for multisite install //
// [2] Theme Options - Fields frontend callback for custom network panel //
function dev_options_cb() {
  // Value vars //
  $devMasterUsr = get_site_option( 'dev_mode_admin_usr_cst' );
	$devModeValue = get_site_option( 'dev_mode_selection_setting_cst' );
  // Fallbacks //
  if(!$devMasterUsr) {
    $retrieveUsr = get_user_by('ID', 1);
    if($retrieveUsr) {
      update_site_option( 'dev_mode_admin_usr_cst', sanitize_text_field( $retrieveUsr->user_login ) );
      $devMasterUsr = get_site_option( 'dev_mode_admin_usr_cst' );
    } 
    else {
      update_site_option( 'dev_mode_admin_usr_cst', sanitize_text_field( '' ) );
      $devMasterUsr = get_site_option( 'dev_mode_admin_usr_cst' );
    }
  }
  if(!$devModeValue) {
    update_site_option( 'dev_mode_selection_setting_cst', sanitize_text_field( 'Development' ) );
    $devModeValue = get_site_option( 'dev_mode_selection_setting_cst' );
  }
	?>
		<div class="wrap">
			<h1>Development Phase Settings</h1>
			<form method="post" action="<?php echo add_query_arg( 'action', 'custom_dev_action', 'edit.php' ) ?>">
        <?php // security creation // ?>
				<?php wp_nonce_field( 'cst-dev-validate' ); ?>
        <?php // fields table // ?>
				<table class="form-table">
          <tr>
						<th scope="row"><label for="dev_mode_admin_usr_cst">Master Username</label></th>
						<td>
              <input id="custom-build-master-usr-cst" name="dev_mode_admin_usr_cst" value="<?php echo $devMasterUsr; ?>" placeholder="Add a username..." required>
              <p class="description">Important - state the username that will always have access to the backend, regardless of which mode is active.</p>
            </td>
          </tr>
					<tr>
						<th scope="row"><label for="dev_mode_selection_setting_cst">Development Phase</label></th>
						<td>
              <?php 
                echo '<select id="dev-mode-'. $devModeValue .'" name="dev_mode_selection_setting_cst" value="' . $devModeValue . '"/>';
                  echo '<option value="' . $devModeValue . '" selected>' . $devModeValue . '</option>';
                  if($devModeValue != 'Development') { 
                    echo '<option value="Development">Development</option>';
                  }
                  if($devModeValue != 'Staging') { 
                    echo '<option value="Staging">Staging</option>';
                  }
                  if($devModeValue != 'Production') { 
                    echo '<option value="Production">Production</option>';
                  }
                echo '</select>';
              ?>
              <p class="description">If the site is in development mode, only the username above will be able to access wp-admin.</p>
						</td>
					</tr>
				</table>
				<?php submit_button(); ?>
			</form>
		</div>
	<?php
}
// [3] Theme Options - Saving validation  //
function custom_dev_settings_validation_cst(){
  // check security //
	check_admin_referer( 'cst-dev-validate' ); 
  // Sanitize each field //
  update_site_option( 'dev_mode_admin_usr_cst',  sanitize_text_field( $_POST[ 'dev_mode_admin_usr_cst' ] ));
	update_site_option( 'dev_mode_selection_setting_cst',  sanitize_text_field( $_POST[ 'dev_mode_selection_setting_cst' ] ));
  // stay on current tab //
	wp_safe_redirect(
		add_query_arg(
			array(
				'page' => 'developer-page',
				'updated' => true
			),
			network_admin_url( 'admin.php' )
		)
	);
	exit;
}
add_action( 'admin_action_custom_dev_action', 'custom_dev_settings_validation_cst' ); // for single install //
// add_action( 'network_admin_edit_custom_dev_action', 'custom_dev_settings_validation_cst' ); // for multisite install //
// [4] User - Force logout if development mode has been activated and current user isn't master username //
function development_mode_user_check_cst() {  
  // vars //
  global $current_user;
  $masterUsr = strtolower( get_site_option( 'dev_mode_admin_usr_cst' )); // username that's allowed access regardless //
  $devStatus = strtolower( get_site_option('dev_mode_selection_setting_cst' )); // process status //
  $username = strtolower( $current_user->user_login ); // active username //
  // run check, make sure ajax isn't active //
  if(!wp_doing_ajax() && $devStatus === 'development' && $username != $masterUsr) {
    wp_logout();
  }
}
add_action('admin_init', 'development_mode_user_check_cst');  
// [5] User - Login page - prevent any other username than the Master wp-admin access and show message //
function my_validate_login_form( $user, $username, $password ) {
  // vars //
  $masterUsr = strtolower( get_site_option( 'dev_mode_admin_usr_cst' )); // username that's allowed access regardless //
  $devStatus = strtolower( get_site_option('dev_mode_selection_setting_cst' )); // process status //
  $usernameRequest = strtolower( $username ); // active username //
  // Make show authentication is only happening on valid sign in attempts //
  if ( ! isset( $username ) || '' == $username || ! isset( $password ) || '' == $password ) {
    return $user;
  }
  // Check username against accepted account //
  elseif ($usernameRequest === $masterUsr) {
    return $user;
  }
  // Check development status //
  elseif($devStatus === 'development') {
    remove_action( 'authenticate', 'wp_authenticate_username_password', 20 );
    remove_action( 'authenticate', 'wp_authenticate_email_password', 20 );
    $user = new WP_Error( 'denied', '<strong>Development Mode Active!</strong><br/>The backend isn\'t accessible whilst during this type of development. Please try again later or get in touch with the website administrator.');
    return $user;
  }
  else {
    return $user;
  }
}
add_filter( 'authenticate', 'my_validate_login_form', 10, 3 );
?>