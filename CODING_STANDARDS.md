# Coding Standards for Flexline Theme

## Introduction
This document provides the coding standards for the Flexline WordPress theme. Our goal is to maintain high-quality code and improve the development process by adhering to these standards. Following these guidelines will ensure consistency across the project and make the code easier to manage and collaborate on.

## General Principles
- **Readability**: Code should be written for people to read first and machines second.
- **Consistency**: The same style should be applied throughout the codebase.
- **Adherence**: Follow WordPress' official coding standards wherever applicable.

## WordPress Coding Standards
Flexline Theme strives to adhere to the WordPress Coding Standards. These include:

### PHP
- **Indentation**: Use tabs for indentation, not spaces.
- **Brace Style**: Opening braces for control structures should be on the same line, and closing braces should be on their own line.
- **Naming Conventions**:
  - Use lowercase letters and underscores for variable names and function names (`$my_variable`).
  - Class names should use capitalized words without underscores (`MyClass`).
- **Function Calls**: No spaces next to parentheses, e.g., `function_call()`.
- **Function Definitions**: Opening brace should be on the same line as the function definition, e.g., `function my_function() {`.
- **Yoda Conditions**: Use Yoda conditions to prevent accidental assignment, e.g., `if ( true === $the_force )`.
- **SQL Statements**: Use `$wpdb->prepare` when writing SQL queries.

### HTML
- **Indentation**: Use tabs for indentation.
- **Quotes**: Use double quotes for HTML attributes.
- **Self-closing Tags**: Include a space before self-closing tags, e.g., `<br />`.

### CSS
- **Naming**: Use hyphens between words in class names.
- **Selectors**: Place opening braces on the same line as the selector.
- **Properties**: One space after the colon of a property, e.g., `color: red;`.
- **Indentation**: Indent all block contents.

### JavaScript
- **Semicolons**: Always use semicolons to terminate statements.
- **Braces**: Opening braces should be on the same line as their relevant statement.
- **Variables**: Use `camelCase` for variable names.
- **Equality**: Use `===` and `!==` over `==` and `!=`.

## Documentation
- **Inline Comments**: Use inline comments sparingly to explain "why" an approach is taken, not "what" the code is doing.
- **DocBlocks**: Functions should have DocBlocks that describe their purpose, parameters, and return values.

## Tools and Automation
- **Linting**: Use tools like `phpcs` with the WordPress coding standards ruleset to automatically check for compliance.
- **Pre-commit Hooks**: Consider setting up pre-commit hooks that run linters to catch issues before they are committed.

## Version Control
- **Commit Messages**: Write clear, concise commit messages that describe the changes made and the reason for them.
- **Branches**: Use descriptive branch names that reflect the feature or fix being developed.

## Conclusion
Adhering to these coding standards will help maintain the quality and consistency of the Flexline theme. Contributors are encouraged to review these guidelines regularly and integrate best practices into their development workflow.

[Review the Contribution Guidelines](CONTRIBUTION_GUIDELINES.md)