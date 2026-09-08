<?php
/**
 * PHPUnit bootstrap for isolated FlexLine unit tests.
 *
 * Keep this bootstrap independent from a full WordPress test installation.
 * Tests that need WordPress should provide narrow shims or use a separate
 * integration bootstrap so pure model tests stay fast and local.
 *
 * @package flexline
 */

declare(strict_types=1);

define( 'ABSPATH', dirname( __DIR__ ) . '/' );

require dirname( __DIR__ ) . '/vendor/autoload.php';
