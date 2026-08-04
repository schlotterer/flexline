<?php
/**
 * Versioned FlexLine settings migrations.
 *
 * @package flexline
 */

namespace FlexLine;

defined( 'ABSPATH' ) || exit;

/**
 * Remove the retired alternate-login settings from every site in a network.
 *
 * Authentication now belongs to the host/security stack. The migration is
 * intentionally network-safe and leaves all other Utilities settings intact.
 *
 * @return void
 */
function flexline_run_platform_migrations(): void {
	$version = '2.2.0-login-removal';

	if ( is_multisite() ) {
		if ( get_site_option( 'flexline_platform_migration_version', '' ) === $version ) {
			return;
		}

		$site_ids = get_sites(
			array(
				'fields' => 'ids',
				'number' => 0,
			)
		);
		foreach ( $site_ids as $site_id ) {
			switch_to_blog( (int) $site_id );
			flexline_remove_retired_login_settings();
			restore_current_blog();
		}
		update_site_option( 'flexline_platform_migration_version', $version );
		return;
	}

	if ( get_option( 'flexline_platform_migration_version', '' ) !== $version ) {
		flexline_remove_retired_login_settings();
		update_option( 'flexline_platform_migration_version', $version, false );
	}
}

/**
 * Remove only settings owned by the retired alternate-login feature.
 *
 * @return void
 */
function flexline_remove_retired_login_settings(): void {
	$options = get_option( 'flexline_utilities', array() );
	if ( ! is_array( $options ) ) {
		return;
	}

	foreach ( array( 'custom_login_enabled', 'custom_login_slug', 'custom_login_strict_mode', 'custom_login_fallback_key', 'custom_login_fallback_value' ) as $key ) {
		unset( $options[ $key ] );
	}
	update_option( 'flexline_utilities', $options, false );
}
add_action( 'init', __NAMESPACE__ . '\\flexline_run_platform_migrations', 0 );
