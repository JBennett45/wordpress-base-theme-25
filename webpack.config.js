const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
  entry: {
    main: './assets/src/js/scripts.js', // Entry point for JS
    style: './assets/src/scss/styles.scss', // Entry point for SCSS
  },
  output: {
    filename: 'js/[name].min.js', // Output JS files to js/ folder
    path: path.resolve(__dirname, 'assets'),
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env'],
          },
        },
      },
      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader, // Extract CSS into separate files
          'css-loader',
          'sass-loader',
        ],
      },
    ],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: 'css/[name].min.css', // Output CSS files to css/ folder
    }),
  ],
  devServer: {
    static: {
      directory: path.join(__dirname, 'assets'),
    },
    compress: true,
    port: 9000,
    hot: true,
    open: true,
    watchFiles: ['src/**/*'],
  },
  mode: 'development', // Use 'production' for production builds
};