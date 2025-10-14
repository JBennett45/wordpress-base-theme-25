# WordPress Base Theme 2025 (Classic Theme) 
Starter WordPress classic theme based on ACF but supports without, built in support for on page filtering via axios.js support &amp; webpack setup for browser sync and SASS. 

This theme has been built to be a base for any custom project, I've tried to cover all essential theme elements ready for anyone to elaborate and build on for their own projects. I've created a lot of support for ACF but its all conditional so if you aren't using ACF, the theme will still run without issue.

**Demo:** You can access a demo of begin state of the theme [here](http://basetheme.jbdev.co.uk). _wp-admin is password protected but only for this demo, this won't be the case on your install unless you add it to .htaccess_

**Note:** this isn't a block/gutenburg theme, this is using the classic WordPress setup with a style.css not json & blocks/gutenburg.

# Installing Dependencies 
I run WordPress through MAMP and had difficulties setting up a proxy for webpacks hot reload so I use Laravel Mix with BrowserSync. The one issue is a dependency problem with BS on newer version of NPM. Two ways of combat this: 

**1.** Delete the browser sync dependencies (both of them) from the package, run npm install then run npm run dev and allow is to legacy install on its own.

**2.** Do the above install without BS then run: 
npm install browser-sync browser-sync-webpack-plugin@^2.3.0 --save-dev --legacy-peer-deps

When all depencies are installed and play nice together, you have 'dev' for development and 'build' for production and compression. 

The SRC directory is where uncompressed files are kept and the the assets folder is where they're compressed to on build.

# Installation
The only thing I've setup after a standard WordPress install is a front page and blog listing page (and allocated them in the reading settings) & also created a header and footer menu to showcase the dropdown support. At the moment pages simply bring in starter content to allow you to either use WP query or ACF fields.

In the example, permalinks are set to 'post name'.

# Elements 
They're built in elements of standard UX that crop up with custom builds. These can be found in the elements folder in both JS and SCSS. The JS shouldn't need changing unless you want to add features, the SCSS files have comments marked "Styles below" to steer you in the right direction of where to add your custom styling and which lines you should leave alone due to it controlling the output of the element (things like show/hide).

**1 - Tabbed Content .** Simple pill based tabs thats control visibility states of content wrappers via a div attribute called 'data-tabid', as long as the tabid of the control and output match, the content will show and hide based on UI. You can see an example on the demo news page where you can switch between paginated and axios news outputs.

**1 - Load more posts (on page) .** Load more posts or post types with an on page request using the load more button and output wrapper.

# Helper Functions 
_jbcst_wp_return_wpmenu_ - a WordPress helper function that accepts three arguments, Menu Name, Classname and Chevrons boolean. The menu name should match you WordPress appearence menu name, the other two are optional, the chevron boolean will show for qualifying dropdown items up to three tiers deep as you can see in the demo of the header. CSS for controlling this is managed in a different file to the style files so you don't need to edit the functional CSS unless you need to. 

_jbcst_acf_return_text_field_ - an ACF helper function that accepts two arguments, Field name & tag (optional). If a tag is entered the field will be wrapped in it, if not the field will be returned without a tag. If ACF is not installed or active, an error will show.

# Errors 
I've numbered each error to help you narrow down an issue should one arrise, because this is a starter theme, really the only issues will be down to plugin clashes or a dependency not being active. As mentioned above I recommend developing with debug on to catch any core errors. 

**Error #1** An ACF helper has been used without the plugin being installed or active, either remove the helper function or install/activate ACF.
