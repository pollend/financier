var path = require('path')
var ExtractTextPlugin = require('extract-text-webpack-plugin')

exports.assetsPath = function (_path) {
  return path.posix.join(_path)
}

