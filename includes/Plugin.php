<?php

namespace RafyCo\AvatarMenu;

defined( 'ABSPATH' ) || exit;

/**
 * Main plugin class responsible for initialization and hook management.
 *
 * @package RafyCo\AvatarMenu
 */
class Plugin {

	/**
	 * Initializes the plugin.
	 *
	 * @return void
	 */
	public static function init(): void {
		try {
			load_plugin_textdomain( 'avatar-menu', false, dirname( plugin_basename( __FILE__ ), 2 ) . '/languages' );
			self::add_hooks();
		} catch ( Exception $e ) {
			error_log( 'Avatar Menu initialization failed: ' . $e->getMessage() );
			add_action( 'admin_notices', function() use ( $e ) {
				echo '<div class="error"><p>' . esc_html( $e->getMessage() ) . '</p></div>';
			});
		}
	}

	/**
	 * Registers all action/filter hooks.
	 *
	 * @return void
	 */
	private static function add_hooks(): void {
		Assets::register();
		add_shortcode( 'avatar_menu', [ self::class, 'render_shortcode' ] );
		add_action( 'admin_init', [ self::class, 'register_settings' ] );
		add_action( 'admin_menu', [ self::class, 'add_settings_page' ] );
	}

	/**
	 * Registers plugin settings securely.
	 *
	 * @return void
	 */
	public static function register_settings(): void {
		register_setting( 'avatar_menu_settings_group', 'avatar_menu_settings', [
			'type' => 'array',
			'description' => 'Avatar Menu plugin settings',
			'sanitize_callback' => [ self::class, 'sanitize_settings' ],
			'show_in_rest' => false,
		] );

		register_setting( 'avatar_menu_settings_group', 'avatar_menu_delete_on_uninstall', [
			'type' => 'string',
			'sanitize_callback' => function( $value ) {
				return $value === 'yes' ? 'yes' : 'no';
			},
			'show_in_rest' => false,
		] );
	}

	/**
	 * Adds settings page under WordPress Settings menu.
	 *
	 * @return void
	 */
	public static function add_settings_page(): void {
		add_options_page(
			esc_html__( 'Avatar Menu Settings', 'avatar-menu' ),
			esc_html__( 'Avatar Menu', 'avatar-menu' ),
			'manage_options',
			'avatar-menu-settings',
			[ self::class, 'render_settings_page' ]
		);
	}

	/**
	 * Renders the settings page.
	 *
	 * @return void
	 */
	public static function render_settings_page(): void {
		$settings = get_option( 'avatar_menu_settings', [] );
		$delete_option = get_option( 'avatar_menu_delete_on_uninstall', 'no' );
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'Avatar Menu Settings', 'avatar-menu' ); ?></h1>
			<form method="post" action="options.php">
				<?php
				settings_fields( 'avatar_menu_settings_group' );
				do_settings_sections( 'avatar_menu_settings_group' );
				?>

				<table class="form-table" role="presentation">
					<tr>
						<th scope="row">
							<label for="avatar_menu_delete_on_uninstall">
								<?php esc_html_e( 'Remove data on uninstall?', 'avatar-menu' ); ?>
							</label>
						</th>
						<td>
							<input type="checkbox" name="avatar_menu_delete_on_uninstall" id="avatar_menu_delete_on_uninstall" value="yes" <?php checked( $delete_option, 'yes' ); ?> />
							<p class="description"><?php esc_html_e( 'Check to delete all plugin data when uninstalling.', 'avatar-menu' ); ?></p>
						</td>
					</tr>
				</table>

				<?php submit_button(); ?>
			</form>
		</div>
		<?php
	}

	/**
	 * Sanitizes plugin settings before saving.
	 *
	 * @param mixed $settings Raw submitted settings.
	 * @return array
	 */
	public static function sanitize_settings( $settings ): array {
		return is_array( $settings ) ? array_map( 'sanitize_text_field', $settings ) : [];
	}

	/**
	 * Renders the [avatar_menu] shortcode.
	 *
	 * @return string HTML output
	 */
	public static function render_shortcode(): string {
		if ( ! avatar_menu_is_logged_in() ) {
			return '<p>' . esc_html__( 'Hello, visitor! Please log in to see your profile.', 'avatar-menu' ) . '</p>';
		}

		$user = avatar_menu_get_current_user_data();
		if ( ! $user ) {
			return '';
		}

		$uid    = 'avatar-menu-name-' . $user->ID;
		$avatar = get_avatar(
			$user->ID,
			96,
			get_avatar_url( 0 ),
			esc_attr( $user->display_name ),
			[
				'loading'     => 'lazy',
				'class'       => 'avatar',
				'extra_attr'  => 'role="img" aria-label="' . esc_attr( $user->display_name ) . '"',
			]
		);
		$name   = esc_html( $user->display_name );

		return sprintf(
			'<div class="avatar-menu-block" role="region" aria-labelledby="%1$s" aria-live="polite">%2$s<p id="%1$s">%3$s</p></div>',
			$uid,
			$avatar,
			$name
		);
	}
}
