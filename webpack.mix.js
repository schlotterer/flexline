const mix = require('laravel-mix');
const autoprefixer = require('autoprefixer');

// Individual JavaScript files
const jsFiles = [
	'src/js/blocks/block-extensions.js',
	'src/js/modal.js',
	'src/js/global.js',
	'src/js/slidein.js',
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

// Optionally, set the public path if needed (useful for setting the correct absolute path for fonts and images referenced in CSS)
mix.setPublicPath('assets/built');
