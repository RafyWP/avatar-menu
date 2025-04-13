<?php

namespace RafyCo\AvatarMenu;

defined( 'ABSPATH' ) || exit;

/**
 * Handles asset registration and enqueueing for the plugin.
 *
 * @package RafyCo\AvatarMenu
 */
class Assets {

	/**
	 * Registers hooks for loading assets.
	 *
	 * @return void
	 */
	public static function register(): void {
		add_action( 'init', [ self::class, 'register_block_assets' ] );
	}

	/**
	 * Registers block assets using metadata.
	 *
	 * @return void
	 */
	public static function register_block_assets(): void {
		$block_path = plugin_dir_path( __DIR__ ) . '../src';
		register_block_type( $block_path );
	}
}
