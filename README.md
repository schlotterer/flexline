## Building from Source

If you intend to clone the repository for custom development or contributions, please:
[Review the Contribution Guidelines](CONTRIBUTION_GUIDELINES.md)
[Review the Coding Standards](CODING_STANDARDS.md)
[Review the Code of Conduct](CODE_OF_CONDUCT.md)

Then you can follow these instructions:

### Prerequisites

- Node.js (LTS version recommended)
- npm (Node Package Manager)
- nvm (Node Version Manager) – recommended for managing multiple Node.js versions

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

3. **Install Dependencies**:
   ```bash
   npm install
   ```

4. **Development Build**:
   - Compiles assets without minification for easier debugging.
   ```bash
   npm run dev
   ```

5. **Watch Mode**:
   - Automatically rebuilds assets when files change, useful during active development.
   ```bash
   npm run watch
   ```

6. **Production Build**:
   - Minifies assets for production use.
   ```bash
   npm run prod
   ```
