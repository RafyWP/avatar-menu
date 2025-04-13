<?php

namespace RafyCo\AvatarMenu;

defined( 'ABSPATH' ) || exit;

/**
 * Debugger utility class for logging and displaying admin notices.
 *
 * @package RafyCo\AvatarMenu
 */
class Debugger {

	/**
	 * Logs a custom message to a dedicated log file.
	 *
	 * @param string $message The message to be logged.
	 *
	 * @return void
	 */
	public static function log( string $message ): void {
		$log_file = WP_CONTENT_DIR . '/debug-log-avatar-menu.log';
		error_log( '[' . current_time( 'mysql' ) . "] $message\n", 3, $log_file );
	}

	/**
	 * Displays a dismissible admin notice in the WordPress dashboard.
	 *
	 * @param string $message The message to display.
	 * @param string $type    The type of notice (info, warning, error, success).
	 *
	 * @return void
	 */
	public static function display_admin_notice( string $message, string $type = 'error' ): void {
		add_action( 'admin_notices', function () use ( $message, $type ) {
			printf(
				'<div class="notice notice-%1$s is-dismissible"><p>%2$s</p></div>',
				esc_attr( $type ),
				esc_html( $message )
			);
		} );
	}
}
