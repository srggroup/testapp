const path = require('path');
const webpack = require('webpack');

const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
	context: path.resolve('src'),
	entry: {
		'js/scripts': './js/scripts.js',
		'css/styles': './sass/styles.scss'
	},
	output: {
		path: path.resolve('public'),
	},
	module: {
		rules: [
			{
				test: /\.(svg|ico|jp(e)?g|png|gif|webp|eot|otf|ttf|woff(2)?|cur|ani)(\?.*)?$/,
				loader: 'file-loader',
				options: {
					outputPath: 'assets',
					publicPath: '/assets'
				}
			},
			{
				test: /\.jsx?$/,
				exclude: /node_modules/,
				enforce: 'pre', // preload eslint loader (must be used as a preloader aka before all other loaders.)
				loader: 'eslint-loader'
			},
			{
				test: /\.jsx?$/,
				exclude: /node_modules/,
				use: [
					// prettier-ignore
					{ loader: 'babel-loader' }
				]
			},
			{
				test: /\.s(c|a)ss$/,
				use: [
					{ loader: MiniCssExtractPlugin.loader	},
					{ loader: 'css-loader' },
					{ loader: 'postcss-loader' },
					{ loader: 'sass-loader' }
				]
			}
		]
	},
	plugins: [
		new MiniCssExtractPlugin()
	]
};
