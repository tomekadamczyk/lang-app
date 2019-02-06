const path = require('path');

module.exports = {
    entry: './assets/src/index.js',
    output: {
        path: path.resolve(__dirname, './assets/public/js'),
        filename: 'app.bundle.js'
    },
    module: {
        rules: [{
            test: /\.js$/,
            exclude: /node_modules/,
            use: {
                loader: 'babel-loader',
                options: {
                    presets: ['@babel/preset-env'],
                    plugins: ['@babel/transform-runtime']
                }
            }
        }]
    },
    devServer: {
        contentBase: path.resolve(__dirname, './assets'),
        publicPath: '/public/js/'
      }
}
