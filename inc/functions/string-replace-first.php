<?php
/**
 * Replaces the first occurrence of a string in a string.
 *
 * Enable or disable certain functionality to harden WordPress.
 *
 * @package flexline
 */

namespace FlexLine\flexline;

function str_replace_first($search, $replace, $subject) {
    $pos = strpos($subject, $search);
    if ($pos !== false) {
        return substr_replace($subject, $replace, $pos, strlen($search));
    }
    return $subject;
}