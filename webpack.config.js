const path = require('path');

module.exports = {
  entry: './src/avatar-menu-block/index.js',
  output: {
    path: path.resolve(__dirname, 'build'),
    filename: 'block.js',
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        use: 'babel-loader',
        exclude: /node_modules/,
      },
      {
        test: /\.s?css$/,
        use: ['style-loader', 'css-loader', 'sass-loader'],
      },
    ],
  },
  externals: {
    '@wordpress/blocks': ['wp', 'blocks'],
    '@wordpress/i18n': ['wp', 'i18n'],
    '@wordpress/element': ['wp', 'element'],
    '@wordpress/components': ['wp', 'components'],
    '@wordpress/block-editor': ['wp', 'blockEditor'],
    '@wordpress/data': ['wp', 'data'],
  }
};
