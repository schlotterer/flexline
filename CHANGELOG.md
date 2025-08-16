# CHANGELOG

## Summer 2025

### New Features

- Optional Sticky Header with Smart Scroll Behavior  
  A new header mode using Headroom.js logic allows the header to hide on scroll down and reappear on scroll up. This can be toggled on or off depending on layout and user preference.

- Full-Featured Horizontal Slider  
  The previous horizontal scroller has been upgraded to a mixed-content slider supporting:
  - Dynamic content types
  - Optional navigation controls
  - Looping, pause/play, and responsive touch/swipe handling

- Template-Driven Starter Patterns  
  Starter patterns are now dynamically aligned to the Post Template selector, enabling more flexible content bootstrapping.

- Notification Bar-Ready Header Templates  
  Introduced new header layouts with built-in support for optional notification bars.

- Theme Documentation in Admin  
  The Theme Settings panel now includes comprehensive inline documentation:
  - Tables outlining block features, block styles, and utility classes
  - Copy-paste ready code snippets for embedding demo/documentation patterns in pages

- Demo/Documentation Patterns with Embedded Videos  
  A new set of 10 long-form demo patterns are available. These patterns act as immersive documentation, showcasing every block, template, and starter pattern available in the theme. Each includes embedded videos demonstrating usage and customization workflows.

- Button `nowrap` Handling  
  Buttons can now preserve layout integrity with `white-space: nowrap`, avoiding unintended text wrapping in tight spaces.

---

### Improvements

- Admin Performance Tuning  
  Cleaned up custom React-based controls in the block editor for faster loading and less overhead.

- Improved Pattern Categorization  
  Better organization of patterns in the inserter for quicker discovery and insertion.

---

### Bug Fixes

- Double Style Class Injection  
  Fixed an issue where certain blocks were getting style classes applied more than once.

- Pattern Detail Cleanup  
  Dozens of small adjustments to spacing, grouping, and alignment across patterns for better consistency.

- Looped Scroller Pixel Leak  
  Corrected floating point alignment issues in infinite scroll scenarios.

- Scroller Back Button / Pause/Play Fixes  
  Repaired slider controls to behave predictably across all devices and interaction modes.

---

### Maintenance

- WordPress 6.8 Compatibility Testing  
  Verified compatibility with the latest WordPress core release.

- Dependabot Dev Dependency Updates  
  All development-time dependencies updated to their latest compatible versions.