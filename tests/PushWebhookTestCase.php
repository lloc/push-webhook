<?php declare( strict_types=1 );

namespace lloc\PushWebhook\Tests;

use PHPUnit\Framework\TestCase;
use Brain\Monkey;
use Brain\Monkey\Functions;

class PushWebhookTestCase extends TestCase {

	/**
	 * Instance of the class to test
	 *
	 * @var object $test
	 */
	protected object $test;

	protected function setUp(): void {
		parent::setUp();
		Monkey\setUp();

		Functions\when( 'esc_attr' )->returnArg();
	}


	protected function tearDown(): void {
		restore_error_handler();

		Monkey\tearDown();
		parent::tearDown();
	}
}
