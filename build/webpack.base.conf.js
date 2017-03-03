var path = require('path')
var utils = require('./utils')
var ExtractTextPlugin = require('extract-text-webpack-plugin');

function resolve (dir) {
  return path.join(__dirname, '..', dir)
}

module.exports = {
  entry: {
    app: './src/main.js',
    style: './src/style/style.scss'
  },
  output: {
    path: path.resolve(__dirname, '../'),
    filename: '[name].js',
    publicPath: "/"
  },
  resolve: {
    extensions: ['.js', '.json','.scss'],
    alias: {
      'vue$': 'vue/dist/vue.esm.js',
      '@': resolve('src'),
    }
  },
  module: {
	  rules: [
		  {
			  test: /\.(js)$/,
			  loader: 'eslint-loader',
			  enforce: "pre",
			  include: [resolve('src'), resolve('test')],
			  options: {
				  formatter: require('eslint-friendly-formatter')
			  }
		  },
		  {
			  test: /\.js$/,
			  loader: 'babel-loader',
			  include: [resolve('src'), resolve('test')]
		  },
		  {
			  test: /\.(png|jpe?g|gif|svg)(\?.*)?$/,
			  loader: 'url-loader',
			  query: {
				  limit: 10000,
				  name: utils.assetsPath('img/[name].[hash:7].[ext]')
			  }
		  },
		  {
			  test: /\.(woff2?|eot|ttf|otf)(\?.*)?$/,
			  loader: 'url-loader',
			  query: {
				  limit: 10000,
				  name: utils.assetsPath('fonts/[name].[hash:7].[ext]')
			  }
		  },
		  {
			  test: /\.scss$/,
			  loaders: ExtractTextPlugin.extract({ fallbackLoader: 'style-loader', loader: 'css-loader!resolve-url-loader!sass-loader?sourceMap=true' })

		  }
	  ]
  }
}
