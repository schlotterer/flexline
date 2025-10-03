## Building from Source

If you intend to clone the repository for custom development or contributions, please:
- [Review the Contribution Guidelines](CONTRIBUTION_GUIDELINES.md)
- [Review the Coding Standards](CODING_STANDARDS.md)
- [Review the Code of Conduct](CODE_OF_CONDUCT.md)

Then you can follow these instructions:

### Prerequisites

- Node.js (LTS version recommended)
- npm (Node Package Manager)
- nvm (Node Version Manager) – recommended for managing multiple Node.js versions
- **Composer** – required for managing PHP dependencies

### Build Instructions

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/schlotterer/flexline.git
   cd flexline
   ```

2. **Switch to the Recommended Node.js Version**:
   - Ensure you are using the correct version of Node.js as specified in the `.nvmrc` file.
   ```bash
   nvm use
   ```
   - If the required version is not installed, nvm will prompt you to install it.

3. **Install Node.js Dependencies**:
   ```bash
   npm install
   ```

4. **Install PHP Dependencies**:
   - Ensure Composer is installed on your system.
   ```bash
   composer install
   ```

5. **Development Build**:
   - Compiles assets without minification for easier debugging.
   ```bash
   npm run dev
   ```

6. **Watch Mode**:
   - Automatically rebuilds assets when files change, useful during active development.
   ```bash
   npm run watch
   ```

7. **Production Build**:
   - Minifies assets for production use.
   ```bash
   npm run prod
   ```

### Linting and Pre-commit Hooks

To maintain code quality and ensure consistency across contributions, our project utilizes linting tools for PHP, JavaScript, and SCSS, and enforces these standards through pre-commit hooks managed by Husky.

#### Pre-commit Hooks

Pre-commit hooks are set up to run automatically on every commit to ensure that changes adhere to our coding standards. When you attempt to commit changes, the following linting processes are triggered:

- **PHP files** are automatically fixed and checked with PHP_CodeSniffer.
- **JavaScript files** are linted and automatically fixed with ESLint.
- **SCSS files** are linted and automatically fixed with Stylelint.

If there are any linting errors that cannot be automatically fixed, the commit will be aborted, and you will need to manually resolve these issues.

#### Manually Running Linters

If you wish to manually lint your files prior to committing, you can use the following commands:

- **Lint PHP files**:
  ```bash
  npm run lint-php
  ```

- **Automatically fix PHP files**:
  ```bash
  npm run fix-php
  ```

- **Lint JavaScript files**:
  ```bash
  npm run lint-js
  ```

- **Lint SCSS files**:
  ```bash
  npm run lint-style
  ```

These commands provide a way to proactively check and fix your code, helping you avoid surprises during the commit process.

## Block Utility Functions

Reusable React helpers for block controls live in `src/js/blocks/utils.js`.

- `getVisibilityControls( props )` – renders ToggleControls to hide blocks on desktop, tablet, or mobile.
- `getContentShiftControls( props )` – outputs the Content Shift/Slide panel for applying negative margins and transforms.

