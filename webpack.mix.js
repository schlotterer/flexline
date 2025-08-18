const mix = require('laravel-mix');
const autoprefixer = require('autoprefixer');

// Individual JavaScript files
const jsFiles = [
	'src/js/blocks/block-extensions.js',
	'src/js/modal.js',
	'src/js/global.js',
	'src/js/slidein.js',
	'src/js/headroom.js',
	'src/js/load-early.js',
	'src/js/template-pattern-inserter.js',
];

// Individual SASS files
const sassFiles = ['src/scss/app.scss', 'src/scss/modal.scss'];

// Compile each JavaScript file to its own output
jsFiles.forEach((file) => {
	mix.js(file, 'js').react(); // If you're using React. Remove this line if not.
});

// Compile each SASS file to its own output with autoprefixer
sassFiles.forEach((file) => {
	mix.sass(file, 'css').options({
		postCss: [
			autoprefixer({
				overrideBrowserslist: [
					'> 1%',
					'last 2 versions',
					'Firefox ESR',
					'Safari >= 10',
				],
				grid: true,
			}),
		],
	});
});

// Copy images from a source directory to an output directory
mix.copy('src/images', 'assets/built/images');

// Set the public path if needed
mix.setPublicPath('assets/built');

// **Add Externalization Configuration**
mix.webpackConfig({
	externals: {
		react: 'React',
		'react-dom': 'ReactDOM',
		'@wordpress/blocks': ['wp', 'blocks'],
		'@wordpress/i18n': ['wp', 'i18n'],
		'@wordpress/element': ['wp', 'element'],
		'@wordpress/components': ['wp', 'components'],
		'@wordpress/block-editor': ['wp', 'blockEditor'],
		'@wordpress/data': ['wp', 'data'],
		'@wordpress/hooks': ['wp', 'hooks'],
		'@wordpress/plugins': ['wp', 'plugins'],
		'@wordpress/edit-post': ['wp', 'editPost'],
		'@wordpress/compose': ['wp', 'compose'],
		'@wordpress/api-fetch': ['wp', 'apiFetch'],
		// Add other @wordpress/* packages as needed
	},
});
