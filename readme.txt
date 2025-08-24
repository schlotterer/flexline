=== FlexLine ===
Contributors: wpengine, bgardner
Requires at least: 6.3
Tested up to: 6.3
Requires PHP: 7.0
Stable tag: 2.0.0
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

== Description ==

With its clean, minimal design and powerful feature set, FlexLine enables agencies to build stylish and sophisticated WordPress websites. FlexLine is a masterpiece of design and functionality. It features a range of valuable patterns, including hero and portfolio sections, prominent call-to-action buttons, and customer testimonials. Whether you’re building a website for your business, personal brand, or creative project, FlexLine is perfect for anyone looking to launch quickly and efficiently.


== Installation Notes ==

For additional helper features, install the optional **FlexLine Utilities Plugin**. It can be downloaded from https://github.com/wpengine/flexline/releases/latest/download/flexline-utilities.zip and provides shortcodes like `[flexline_year]` for the current year or `[flexline_loginout]` to output login and logout links.

== Horizontal Scroller Fade Transition ==

The horizontal scroller supports a **Fade** transition that cross-fades items instead of sliding.

* Set a custom container height.
* Choose how media is displayed: Normal (no extra class), Cover (`horizontal-fader-media-cover`) or Contain (`horizontal-fader-media-contain`).
* Enable autoplay with optional pause-on-hover or hidden pause button.

=== Columns example ===

```
<!-- wp:columns {"className":"is-style-horizontal-scroll horizontal-scroller-transition-fade","enableHorizontalScroller":true,"transitionType":"fade","fadeHeight":"300px","fadeMediaDisplay":"cover","scrollAuto":true} -->
    <!-- wp:column --><!-- /wp:column -->
    <!-- wp:column --><!-- /wp:column -->
<!-- /wp:columns -->
```

=== Post Template example ===

```
<!-- wp:post-template {"className":"is-style-horizontal-scroll horizontal-scroller-transition-fade","enableHorizontalScroller":true,"transitionType":"fade","fadeHeight":"300px","fadeMediaDisplay":"cover","scrollAuto":true} /-->
```

`horizontal-scroller-transition-fade` is required for the fade effect. The default `fadeMediaDisplay` of `"normal"` adds no class. Setting `fadeMediaDisplay` to `"cover"` adds the `horizontal-fader-media-cover` class and `"contain"` adds `horizontal-fader-media-contain`.

== Bundled Assets and Licenses ==

* Google Fonts (Cabin, Calistoga, Crimson Text, Jost, Lato, Quattrocento, Quicksand, REM, Raleway, Source Sans 3, Sulphur Point, Varela) - SIL Open Font License 1.1 (see assets/fonts/*/OFL.txt)
* headroom.js - MIT License (assets/js/headroom.LICENSE.txt)
* tablesort.js - MIT License (assets/js/tablesort.LICENSE.txt)
* baguetteBox.js - MIT License (assets/baguetteBox/LICENSE)
* Events Manager settings - GPLv2 or later (assets/events-manager/events-manager.zip)
* Material Design icons - Apache License 2.0 (assets/built/images/LICENSE)

== Changelog ==

= 1.0.6 - 2023-10-16 =

[Release Notes](https://github.com/wpengine/flexline/releases/tag/v1.0.6)

= 1.0.5 - 2023-07-28 =

[Release Notes](https://github.com/wpengine/flexline/releases/tag/v1.0.5)

= 1.0.4 - 2023-06-16 =

[Release Notes](https://github.com/wpengine/flexline/releases/tag/v1.0.4)

= 1.0.3 - 2023-05-19 =

[Release Notes](https://github.com/wpengine/flexline/releases/tag/v1.0.3)

= 1.0.2 - 2023-05-01 =

[Release Notes](https://github.com/wpengine/flexline/releases/tag/v1.0.2)

= 1.0.1 - 2023-04-25 =

[Release Notes](https://github.com/wpengine/flexline/releases/tag/v1.0.1)

= 1.0.0 - 2023-03-31 =

[Release Notes](https://github.com/wpengine/flexline/releases/tag/v1.0.0)

= 0.9.10 - 2022-12-09 =

[Release Notes](https://github.com/wpengine/flexline/releases/tag/v0.9.10)

= 0.9.9 - 2022-10-25 =

[Release Notes](https://github.com/wpengine/flexline/releases/tag/v0.9.9)

= 0.9.8 - 2022-07-08 =

[Release Notes](https://github.com/wpengine/flexline/releases/tag/v0.9.8)

= 0.9.7 - 2022-05-31 =

[Release Notes](https://github.com/wpengine/flexline/releases/tag/v0.9.7)

= 0.9.6 - 2022-05-13 =

[Release Notes](https://github.com/wpengine/flexline/releases/tag/v0.9.6)

= 0.9.5 - 2022-04-25 =

[Release Notes](https://github.com/wpengine/flexline/releases/tag/v0.9.5)

= 0.9.4 - 2022-04-18 =

[Release Notes](https://github.com/wpengine/flexline/releases/tag/v0.9.4)

= 0.9.3 - 2022-04-11 =

[Release Notes](https://github.com/wpengine/flexline/releases/tag/v0.9.3)

= 0.9.2 - 2022-04-04 =

[Release Notes](https://github.com/wpengine/flexline/releases/tag/v0.9.2)

= 0.9.1 - 2022-03-21 =

[Release Notes](https://github.com/wpengine/flexline/releases/tag/v0.9.1)

= 0.9.0 - 2022-03-14 =

[Release Notes](https://github.com/wpengine/flexline/releases/tag/v0.9.0)

= 0.8.9 - 2022-03-07 =

[Release Notes](https://github.com/wpengine/flexline/releases/tag/v0.8.9)

= 0.8.8 - 2022-02-28 =

[Release Notes](https://github.com/wpengine/flexline/releases/tag/v0.8.8)

= 0.8.7 - 2022-02-21 =

[Release Notes](https://github.com/wpengine/flexline/releases/tag/v0.8.7)

= 0.8.6 - 2022-02-14 =

[Release Notes](https://github.com/wpengine/flexline/releases/tag/v0.8.6)

= 0.8.5 - 2022-02-07 =

[Release Notes](https://github.com/wpengine/flexline/releases/tag/v0.8.5)

= 0.8.4 - 2022-01-31 =

[Release Notes](https://github.com/wpengine/flexline/releases/tag/2022.01.31)

= 0.8.3 - 2022-01-24 =

[Release Notes](https://github.com/wpengine/flexline/releases/tag/2022.01.24)

= 0.8.2 - 2022-01-17 =

[Release Notes](https://github.com/wpengine/flexline/releases/tag/2022.01.17)

= 0.8.1 - 2022-01-10 =

[Release Notes](https://github.com/wpengine/flexline/releases/tag/2022.01.10)

= 0.8.0 - 2022-01-03 =

Initial public release.

== Copyright ==

FlexLine WordPress Theme, (C) 2022-2023 WP Engine.
FlexLine is distributed under the terms of the GNU GPL.

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
