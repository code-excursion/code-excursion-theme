const path = require( 'path' );
const TerserPlugin = require( 'terser-webpack-plugin' );

const externals = {
	react: 'React',
	'react-dom': 'ReactDOM',
	jquery: 'jQuery',
	lodash: 'lodash',
};

const isProduction = process.env.NODE_ENV === 'production';

const baseConfig = {
	mode: isProduction ? 'production' : 'development',

	devtool: isProduction ? undefined : 'inline-source-map',

	stats: 'errors-only',

	// https://webpack.js.org/configuration/optimization/#optimization-runtimechunk
	optimization: {
		runtimeChunk: {
			name: 'runtime',
		},
		minimizer: [
			new TerserPlugin( {
				cache: true,
				parallel: true,
				extractComments: false,
				terserOptions: {
					output: {
						comments: false,
					},
				},
			} ),
		],
	},

	// https://webpack.js.org/configuration/entry-context/#context
	context: path.resolve( __dirname, 'assets/js/src' ),

	// https://webpack.js.org/configuration/externals/
	externals,
};

module.exports = [
	{
		...baseConfig,

		// https://webpack.js.org/configuration/entry-context/#entry
		entry: {
			customizer: './customizer.js',
			navigation: './navigation.js',
			'skip-link-focus-fix': './skip-link-focus-fix.js',
		},

		// https://webpack.js.org/configuration/output/
		output: {
			path: path.resolve( __dirname, 'assets/js' ),
			filename: '[name].js',
		},

		// https://github.com/babel/babel-loader#usage
		module: {
			rules: [
				{
					test: /\.js$/,
					exclude: /node_modules/,
					use: 'babel-loader',
				},
			],
		},
	},
];
