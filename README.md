# WordPress Base Theme 2025 (Classic Theme) 
Starter WordPress classic theme based on ACF but supports without, built in support for on page filtering via axios.js support &amp; webpack setup for browser sync and SASS. 

Note: this isn't a block theme, this is using the classic WordPress setup with a style.css not json & blocks/gutenburg.

# Installing Dependencies 
I run WordPress through MAMP and had difficulties setting up a proxy for webpacks hot reload so I use Laravel Mix with BrowserSync. The only issue I have noticed is a dependency problem with BS on newer version of NPM. Two ways of combat this: 

1: Delete the browser sync dependencies (both of them) from the package, run npm install then run npm run dev and allow is to legacy install on its own.

2. Do the above nit install of running npm run dev before browser sync is install, run: 
npm install browser-sync browser-sync-webpack-plugin@^2.3.0 --save-dev --legacy-peer-deps

When all depencies are installed and play nice together, you have 'dev' for development and 'build' for production and compression. 

The SRC directory is where uncompressed files are kept and the the assets folder is where they are compressed to on build.