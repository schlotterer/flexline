const mix = require('laravel-mix');

// Individual JavaScript files
const jsFiles = [
    'src/js/block-extensions.js',
    'src/js/lightbox.js',
    'src/js/global.js'
];

// Individual SASS files
const sassFiles = [
    'src/scss/app.scss',
    'src/scss/lightbox.scss'
];

// Compile each JavaScript file to its own output
jsFiles.forEach(file => {
    mix.js(file, 'assets/built/js')
       .react(); // If you're using React. Remove this line if not.
});

// Compile each SASS file to its own output
sassFiles.forEach(file => {
    mix.sass(file, 'assets/built/css');
});

// Optionally, set the public path if needed (useful for setting the correct absolute path for fonts and images referenced in CSS)
// mix.setPublicPath('path/to/theme/or/plugin');
