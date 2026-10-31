<?php
/**
 * Confirms the project-local PHPUnit harness is wired correctly.
 *
 * @package flexline
 */

declare(strict_types=1);

namespace FlexLine\Tests\Unit;

use PHPUnit\Framework\TestCase;

final class BootstrapTest extends TestCase {

	public function test_phpunit_bootstrap_defines_wordpress_guard(): void {
		self::assertTrue( defined( 'ABSPATH' ) );
		self::assertStringEndsWith( '/', ABSPATH );
	}
}
