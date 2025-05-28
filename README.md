# WordPress Base Theme 2025 (Classic Theme) 
Starter WordPress classic theme based on ACF but supports without, built in support for on page filtering via axios.js support &amp; webpack setup for browser sync and SASS. 

This theme has been built to be a base for any custom project, I've tried to cover all essential theme elements ready for anyone to elaborate and build on for their own projects. I've created a lot of support for ACF but its all conditional so if you aren't using ACF, the theme will still run without issue.

**Note:** this isn't a block/gutenburg theme, this is using the classic WordPress setup with a style.css not json & blocks/gutenburg.

# Installing Dependencies 
I run WordPress through MAMP and had difficulties setting up a proxy for webpacks hot reload so I use Laravel Mix with BrowserSync. The only issue I have noticed is a dependency problem with BS on newer version of NPM. Two ways of combat this: 

**1.** Delete the browser sync dependencies (both of them) from the package, run npm install then run npm run dev and allow is to legacy install on its own.

**2.** Do the above nit install of running npm run dev before browser sync is install, run: 
npm install browser-sync browser-sync-webpack-plugin@^2.3.0 --save-dev --legacy-peer-deps

When all depencies are installed and play nice together, you have 'dev' for development and 'build' for production and compression. 

The SRC directory is where uncompressed files are kept and the the assets folder is where they are compressed to on build.

# Errors 
I've numbered each error to help you narrow down an issue should one arrise, because this is a starter theme, really the only issues will be down to plugin clashes or a dependency not being active. As mentioned above I recommend developing with debug on to catch any core errors. 

**Error #1.** An ACF helper has been used without the plugin being installed or active, either remove the helper function or install/activate ACF.

# Menus 
To instigate a menu instance, for ease you can use the helper function _jbfunction_check_menu_exists_ - this accepts three arguments, Menu Name, Classname and Chevrons boolean. The menu name should match you WordPress appearence menu name, the other two are optional, the chevron boolean will show for qualifying dropdown items up to three tiers deep as you can see in the demo of the header. CSS for controlling this is managed in a different file to the style files so you don't need to edit the functional CSS unless you need to. 