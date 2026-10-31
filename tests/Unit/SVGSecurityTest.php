<?php
declare(strict_types=1);

namespace {
	if ( ! function_exists( '__' ) ) {
		function __( $text, $domain = 'default' ) {
			unset( $domain );
			return $text;
		}
	}
}

namespace FlexLine\Tests\Unit {

	use FlexLine\SVG_Security;
	use PHPUnit\Framework\TestCase;

	require_once dirname( __DIR__, 2 ) . '/inc/functions/class-svg-security.php';

	final class SVGSecurityTest extends TestCase {

		public function test_sanitize_path_removes_active_svg_content(): void {
			$svg = <<<'SVG'
<svg xmlns="http://www.w3.org/2000/svg" width="120" height="80" viewBox="0 0 120 80">
	<script>alert('bad')</script>
	<rect width="120" height="80" fill="#fee2e2" onclick="alert('bad')" />
</svg>
SVG;

			$clean = $this->sanitize_string( $svg );

			self::assertStringContainsString( '<svg', $clean );
			self::assertStringNotContainsString( '<script', $clean );
			self::assertStringNotContainsString( 'onclick', $clean );
		}

		public function test_sanitize_path_removes_external_references_and_unsafe_css_urls(): void {
			$svg = <<<'SVG'
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="120" height="80" viewBox="0 0 120 80">
	<style>.payload{fill:url("javascript:alert('bad')");}</style>
	<defs><linearGradient id="brandGradient"><stop offset="0" stop-color="#fff"/></linearGradient></defs>
	<rect width="120" height="80" fill="url(#brandGradient)" />
	<image href="https://example.invalid/tracker.png" x="0" y="0" width="10" height="10" />
	<use xlink:href="#brandGradient" />
</svg>
SVG;

			$clean = $this->sanitize_string( $svg );

			self::assertStringNotContainsString( 'javascript:', $clean );
			self::assertStringNotContainsString( 'https://example.invalid', $clean );
			self::assertStringContainsString( 'url(#brandGradient)', $clean );
			self::assertStringContainsString( 'xlink:href="#brandGradient"', $clean );
		}

		private function sanitize_string( string $svg ): string {
			$path = tempnam( sys_get_temp_dir(), 'flexline-svg-' );
			self::assertIsString( $path );

			try {
				file_put_contents( $path, $svg );
				$clean = SVG_Security::sanitize_path( $path );

				self::assertIsString( $clean );

				return $clean;
			} finally {
				if ( file_exists( $path ) ) {
					unlink( $path );
				}
			}
		}
	}
}
