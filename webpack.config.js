const path = require('path');

module.exports = {
    entry: {
        categories: './views/categories/categories.js',
        wordsAndPhrases: './views/words/wordsAndPhrases.js',
        flashcardsTest: './views/test/flashcards-test.js',
        flashcards: './views/excercises/flashcards/flashcards.js',
        hangman: './views/excercises/hangman/hangman.js',
        insertWord: './views/words/add/add-word.js',
        map: './views/favorites/map/map.js',
        mobilemenu: './views/mainview/dashboard/menubar/menubar.js',
        weather: './views/favorites/weather/weather.js'
    },
    output: {
        path: path.resolve(__dirname, 'public/dist/js'),
        filename: '[name].bundle.js'
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
        contentBase: path.resolve(__dirname, 'public'),
        publicPath: '/dist/js/'
      }
}
