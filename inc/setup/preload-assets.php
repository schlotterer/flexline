<?php
/**
 * Featured-image preload hooks.
 *
 * @package flexline
 */

namespace FlexLine;

// Featured images are intentionally left to WordPress's responsive image
// loading heuristics. A universal full-size preload can duplicate the image
// request or preload an image that is not rendered above the fold.
