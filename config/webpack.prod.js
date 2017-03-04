var webpack = require('webpack');
var webpackMerge = require('webpack-merge');
var ExtractTextPlugin = require('extract-text-webpack-plugin');
var commonConfig = require('./webpack.common.js');
var helpers = require('./helper');
var path = require("path");

const ENV = process.env.NODE_ENV = process.env.ENV = 'production';

module.exports = webpackMerge(commonConfig, {
	devtool: 'source-map',

	output: {
		path: path.resolve(__dirname, "../js/"),
		publicPath: '',
		filename: '[name].js',
		chunkFilename: '[id].[hash].chunk.js'
	},

	// htmlLoader: {
	//     minimize: false // workaround for ng2
	// },

	plugins: [
		new webpack.NoErrorsPlugin(),
		// new webpack.optimize.DedupePlugin(),
		//  new webpack.optimize.UglifyJsPlugin({ // https://github.com/angular/angular/issues/10618
		//  }),
		new webpack.DefinePlugin({
			'process.env': {
				'ENV': JSON.stringify(ENV)
			}
		})
	]
});