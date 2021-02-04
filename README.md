# Theme Name
WordPress theme for https://example.org.

## Theme Development

There are several commands to assist you with local development of the theme.

To install the needed packages, go into the theme folder and run `npm install`.

After that, use `npm run <command>` to run a command. The following commands are available:

* `npm run build:js`: Runs all the JavaScript files in `assets/js/src` through Babel and UglifyJS. The resulting JS files are saved in `assets/js`.
* `npm run build:css`: Runs all CSS files in `assets/css/src` through PostCSS and its various transforms. The resulting CSS files are saved in `assets/css`.
* `npm run build`: Runs both of the above commands. Ideal before committing.
* `npm run watch:js`: Looks for any changes to the JS files and runs the build command if necessary.
* `npm run watch:css`: Looks for any changes to the CSS files and runs the build command if necessary.
* `npm run watch`: Runs both of the above commands. Ideal during development when you want to see your changes as quickly as possible in the browser.

Browser support for CSS and JavaScript can be adjusted through `.browserslistrc`.
