<?php
/**
 * Renders the Avatar Menu block on the frontend.
 *
 * @package RafyCo\AvatarMenu
 */

defined( 'ABSPATH' ) || exit;

$user = avatar_menu_get_current_user_data();
if ( ! $user ) {
    return '';
}

$avatar = get_avatar( $user->ID, 96 );
$name   = esc_html( $user->display_name );

echo sprintf(
    '<div class="avatar-menu-block">%1$s<p>%2$s</p></div>',
    $avatar,
    $name
);
