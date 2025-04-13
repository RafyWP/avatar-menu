<?php

namespace RafyCo\AvatarMenu;

defined( 'ABSPATH' ) || exit;

/**
 * Checks if a user is currently logged in.
 *
 * @return bool
 */
function avatar_menu_is_logged_in(): bool {
    return is_user_logged_in();
}

/**
 * Gets the current logged-in user's data.
 *
 * @return \WP_User|null
 */
function avatar_menu_get_current_user_data(): ?\WP_User {
    $user = wp_get_current_user();
    return $user && $user->exists() ? $user : null;
}

/**
 * Verifies a nonce from a request using a given action.
 *
 * @param string $nonce  The nonce to verify.
 * @param string $action The action name.
 *
 * @return bool
 */
function avatar_menu_verify_nonce( string $nonce, string $action ): bool {
    return wp_verify_nonce( $nonce, $action ) === 1;
}
