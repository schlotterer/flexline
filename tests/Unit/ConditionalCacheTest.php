<?php

declare(strict_types=1);

namespace FlexLine\Tests\Unit;

use PHPUnit\Framework\TestCase;

final class ConditionalCacheTest extends TestCase {
	public function test_deployment_cache_lifecycle(): void {
		foreach ( array( 'present', 'absent' ) as $mode ) {
			$output = array();
			$status = 0;
			exec( escapeshellarg( PHP_BINARY ) . ' ' . escapeshellarg( dirname( __DIR__ ) . '/conditional-cache-contract.php' ) . ' ' . escapeshellarg( $mode ) . ' 2>&1', $output, $status );
			$this->assertSame( 0, $status, implode( "\n", $output ) );
		}
	}
}
