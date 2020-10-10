const path = require('path');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');

module.exports = {
    entry: path.resolve(__dirname) + '/assets/index.js',
    
    output: {
        filename: "app.js",
        path: path.resolve(__dirname) + "/public/js"
    },

    optimization: {
        minimizer: [new UglifyJsPlugin()]
    },

    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /(node_modules)/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env']
                    }
                }
            },

            {
            test: /\.s[ac]ss$/i,
            use: [
                'style-loader',
                'css-loader',
                'sass-loader',
            ],
            },

            {
            test: /\.(png|jpg|gif)$/i,
            use: [
                {
                loader: 'url-loader',
                },
            ],
            }
        ],
      }
}