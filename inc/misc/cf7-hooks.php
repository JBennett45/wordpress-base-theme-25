<?php 
// store full circle info //
function jb_cf_mailchimp_store_cst( $contact_form ) {
  // Check instance //
  if( $contact_form->id() != 53 )
  return; 
  // Setup Data //
  $submission = WPCF7_Submission::get_instance();
  if ( $submission ) {
    $posted_data = $submission->get_posted_data();
  } 
  // Setup name //
  $split_name = jbcst_split_name_field($posted_data['full-name']);
  // Setup api //
  $api_key = 'YOUR_API_KEY_HERE';
  $email = $posted_data['email-ftt-newsletter']; // the user we are going to subscribe
  $status = 'subscribed'; // we are going to talk about it in just a little bit
  $merge_fields = array( 'FNAME' => $split_name[0], 'LNAME' => $split_name[1] ); // FNAME, LNAME or something else
  $list_id = 'YOUR_AUD_LIST_ID_HERE'; // List / Audience ID
  // start our Mailchimp connection
  $connection = curl_init();
  curl_setopt( 
    $connection, 
    CURLOPT_URL, 
    'https://' . substr( $api_key, strpos( $api_key, '-' ) + 1 ) . '.api.mailchimp.com/3.0/lists/' . $list_id . '/members/' . md5( strtolower( $email ) )
  );
  curl_setopt( $connection, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json', 'Authorization: Basic '. base64_encode( 'user:'.$api_key ) ) );
  curl_setopt( $connection, CURLOPT_RETURNTRANSFER, true );
  curl_setopt( $connection, CURLOPT_CUSTOMREQUEST, 'PUT' );
  curl_setopt( $connection, CURLOPT_POST, true );
  curl_setopt( $connection, CURLOPT_SSL_VERIFYPEER, false );
  curl_setopt( 
    $connection, 
    CURLOPT_POSTFIELDS, 
    json_encode( array(
      'apikey'        => $api_key,
      'email_address' => $email,
      'status'        => $status,
      'merge_fields'  => $merge_fields,
      'tags' => array( 'Website Newsletter' )
    ) )
  );
  $result = curl_exec( $connection );
  $result = json_decode( $result );
  // Log output //
  $status_file = 'wp-content/uploads/integrations/mailchimp.txt';
  $output .= "Name: " . $posted_data['full-name'];
  $output .= " - Status: " . $result->status . "\n";
  // Log output //
  file_put_contents($status_file, $output, FILE_APPEND);
}
add_filter( 'wpcf7_before_send_mail', 'jb_cf_mailchimp_store_cst' ); 
?>