<?php
/**
 * One-time cache invalidation for the conditional-assets deployment.
 *
 * @package flexline
 */

namespace FlexLine;

/** Runs on fresh WordPress requests, including unauthenticated cron requests. */
final class Conditional_Assets_Cache {
	const OPTION = 'flexline_conditional_assets_cache_20261117';
	const LOCK   = 'flexline_conditional_assets_cache_lock';

	/** Register after plugin initialization. */
	public static function register() {
		add_action( 'init', array( self::class, 'run' ), 100 );
		add_action( 'shutdown', array( self::class, 'wake_sites' ) );
	}

	/**
	 * Purge this site's caches once; retain successful stages when retrying.
	 *
	 * @throws \RuntimeException Caught locally and saved for a later retry.
	 */
	public static function run() {
		$state = get_option( self::OPTION, array() );
		if ( ! empty( $state['complete'] ) || ( $state['retry_after'] ?? 0 ) > time() ) {
			return;
		}
		$lock = get_option( self::LOCK );
		if ( $lock && $lock < time() - 300 ) {
			delete_option( self::LOCK );
		}
		if ( ! add_option( self::LOCK, time(), '', false ) ) {
			return;
		}
		try {
			if ( empty( $state['rocket'] ) && function_exists( 'rocket_clean_domain' ) ) {
				if ( function_exists( 'get_rocket_option' ) && get_rocket_option( 'remove_unused_css', false ) ) {
					$container = apply_filters( 'rocket_container', null );
					if ( ! is_object( $container ) || ! is_callable( array( $container, 'get' ) ) ) {
						throw new \RuntimeException( 'WP Rocket container unavailable.' );
					}
					$subscriber = $container->get( 'rucss_admin_subscriber' );
					if ( ! is_callable( array( $subscriber, 'delete_used_css_rows' ) ) ) {
						throw new \RuntimeException( 'WP Rocket used CSS API unavailable.' );
					}
					$subscriber->delete_used_css_rows();
				}
				if ( function_exists( 'rocket_clean_minify' ) ) {
					rocket_clean_minify();
				}
				rocket_clean_domain();
				$state['rocket'] = true;
				update_option( self::OPTION, $state, false );
			}
			if ( empty( $state['siteground'] ) && function_exists( 'sg_cachepress_purge_cache' ) ) {
				// Explicit home URL scopes the purge to this site's path and descendants.
				$result = sg_cachepress_purge_cache( home_url( '/' ) );
				if ( false === $result || is_wp_error( $result ) ) {
					throw new \RuntimeException( 'SiteGround cache purge failed.' );
				}
				$state['siteground'] = true;
			}
			$state['complete'] = true;
			unset( $state['error'], $state['retry_after'] );
		} catch ( \Throwable $error ) {
			$state['error']       = $error->getMessage();
			$state['retry_after'] = time() + 300;
		} finally {
			update_option( self::OPTION, $state, false );
			delete_option( self::LOCK );
		}
	}

	/**
	 * Wake pending sites in their own PHP/plugin context, never a switched Rocket container.
	 * Cron URLs bypass HTML caches. A failed wake stays pending for a later request.
	 */
	public static function wake_sites() {
		if ( ! is_multisite() || wp_doing_cron() || wp_installing() ) {
			return;
		}
		$key = self::OPTION . '_wake';
		if ( get_site_option( $key . '_complete', false ) || get_site_transient( $key ) ) {
			return;
		}
		set_site_transient( $key, true, 300 );
		$offset  = (int) get_site_option( $key . '_offset', 0 );
		$pending = $offset ? (bool) get_site_option( $key . '_pending', false ) : false;
		$sites   = get_sites(
			array(
				'number'     => 20,
				'offset'     => $offset,
				'orderby'    => 'id',
				'order'      => 'ASC',
				'deleted'    => 0,
				'archived'   => 0,
				'spam'       => 0,
				'network_id' => get_current_network_id(),
			)
		);
		foreach ( $sites as $site ) {
			$id = (int) $site->blog_id;
			if ( get_current_blog_id() === $id || 'flexline' !== get_blog_option( $id, 'template' ) ) {
				continue;
			}
			$state = get_blog_option( $id, self::OPTION, array() );
			if ( ! empty( $state['complete'] ) ) {
				continue;
			}
			$pending = true;
			if ( ( $state['retry_after'] ?? 0 ) > time() ) {
				continue;
			}
			wp_remote_post(
				add_query_arg( 'doing_wp_cron', sprintf( '%.22F', microtime( true ) ), get_site_url( $id, 'wp-cron.php' ) ),
				array(
					'timeout'   => 0.01,
					'blocking'  => false,
					'sslverify' => true,
				)
			);
		}
		update_site_option( $key . '_pending', $pending );
		if ( count( $sites ) < 20 && ! $pending ) {
			update_site_option( $key . '_complete', true );
		}
		update_site_option( $key . '_offset', count( $sites ) < 20 ? 0 : $offset + 20 );
	}
}

Conditional_Assets_Cache::register();
