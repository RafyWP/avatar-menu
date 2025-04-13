<?php
/**
 * Avatar Menu Plugin
 *
 * @package           RafyCo\AvatarMenu
 * @author            Rafy Co.
 * @copyright         2025 Rafy Co.
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Avatar Menu
 * Plugin URI:        https://rafy.site/wordpress-projects/avatar-menu
 * Description:       Displays the logged-in user's avatar, name, and a customizable message in a Gutenberg block.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Rafy Co.
 * Author URI:        https://rafy.site
 * Text Domain:       avatar-menu
 * Domain Path:       /languages
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://rafy.site/wordpress-projects/avatar-menu
 */

declare(strict_types=1);

namespace RafyCo\AvatarMenu;

defined('ABSPATH') || exit;

/**
 * Check if Composer autoload is available before requiring it.
 */
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
    require_once __DIR__ . '/vendor/autoload.php';
}

/**
 * Include helpers.php for auxiliary functions.
 */
require_once __DIR__ . '/includes/helpers.php';

// Init
require_once __DIR__ . '/includes/Plugin.php';
Plugin::init();
