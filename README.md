
# Flexline
An FSE theme based on Frost but extended for more advanced development and some custom features.

## Description
Provide a more detailed introduction to your project. Explain the functionality added, such as custom fields for Gutenberg blocks, lightbox implementation, and any unique features or considerations like accessibility and responsiveness.

## Features
### Development Structure
- Adds LaravelMix and a build process to allow for easy custom feature additions (builds src files). 
- Uses LaravelMix for an easily customizable output of files.
- Breaks the functions file out into smaller pieces in the inc folder and namespaces the project.
- While generally a single site shouldn't require changes, if you want to make small changes without getting into the build process there is a customize.js and customize.css in the assets folder for small basic CSS and JS or jQuery.
### Popup Media
- Custom Gutenberg block fields for enabling popups and specifying media URLs
- Custom-built lightbox functionality for images and videos
- Fully responsive and accessible lightbox design
- Support for autoplay of embedded videos upon user interaction
### Style Variations
- Expanding on the Frost style variations to think about more than colors to create a larger shift in design than just colors
### Patterns and Templates
- Patterns and templates have been extended from Frost as well.

## Installation

### Prerequisites

- WordPress 5.x or later
- PHP 7.4 or later

### Installing

1. **Download the Theme/Plugin**: Download the ZIP file from the repository or the release section.
   
2. **Upload to WordPress**:
   - For a theme, go to `Appearance > Themes > Add New > Upload Theme`. Choose the ZIP file you downloaded.
   
3. **Activate**:
   - Activate the theme through the 'Themes' screen in WordPress.
   - Activate the plugin through the 'Plugins' screen in WordPress.

## Usage

Explain how users can leverage the new lightbox functionality within their Gutenberg blocks. Include any necessary steps or considerations for adding the custom fields to images and buttons, and how they influence the lightbox behavior.

## Building From Source

If you're cloning the repository and want to make custom changes or contributions, follow these build instructions.

### Prerequisites

- Node.js (LTS version)
- npm

### Steps

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/schlotterer/flexline.git
   cd flexline
   ```

2. **Install Dependencies**:
   ```bash
   npm install
   ```

3. **Build for Development**:
   - This will compile your assets without minifying them, making debugging easier.
   ```bash
   npm run dev
   ```

4. **Watch for Changes**:
   - Useful during development to automatically rebuild assets when files are changed.
   ```bash
   npm run watch
   ```

5. **Build for Production**:
   - This will minify your assets and prepare them for production use.
   ```bash
   npm run prod
   ```
