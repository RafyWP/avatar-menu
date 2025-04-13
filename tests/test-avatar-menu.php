<?php

use PHPUnit\Framework\TestCase;
use function RafyCo\AvatarMenu\avatar_menu_is_logged_in;
use function RafyCo\AvatarMenu\avatar_menu_verify_nonce;

/**
 * Basic tests for Avatar Menu plugin helpers.
 */
class AvatarMenuHelperTest extends TestCase {

	/**
	 * Ensure helper returns false when not logged in (mocked).
	 */
	public function test_avatar_menu_is_logged_in_returns_boolean(): void {
		$this->assertIsBool( avatar_menu_is_logged_in() );
	}

	/**
	 * Verifies that a valid nonce passes.
	 */
	public function test_valid_nonce_passes(): void {
		$action = 'test_action';
		$nonce = wp_create_nonce( $action );
		$this->assertTrue( avatar_menu_verify_nonce( $nonce, $action ) );
	}

	/**
	 * Verifies that an invalid nonce fails.
	 */
	public function test_invalid_nonce_fails(): void {
		$this->assertFalse( avatar_menu_verify_nonce( 'invalid', 'test_action' ) );
	}
}
