const mix = require('laravel-mix');


// Individual JavaScript files
const jsFiles = [
    'src/js/block-extensions.js',
    'src/js/lightbox.js',
    'src/js/global.js',
    'src/js/slide-in-menu.js',
    'src/js/header-phone-link.js',
];

// Individual SASS files
const sassFiles = [
    'src/scss/app.scss',
    'src/scss/lightbox.scss'
];

// Compile each JavaScript file to its own output
jsFiles.forEach(file => {
    mix.js(file, 'js')
       .react(); // If you're using React. Remove this line if not.
});

// Compile each SASS file to its own output
sassFiles.forEach(file => {
    mix.sass(file, 'css');
});

// Copy images from a source directory to an output directory
mix.copy('src/images', 'assets/built/images');

// Optionally, set the public path if needed (useful for setting the correct absolute path for fonts and images referenced in CSS)
mix.setPublicPath('assets/built');
