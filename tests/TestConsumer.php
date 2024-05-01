<?php declare( strict_types = 1 );

namespace lloc\PushWebhook\Tests;

use lloc\PushWebhook\Consumer;
use Brain\Monkey\Functions;

class TestConsumer extends PushWebhookTestCase {

	public function test_init(): void {
		Functions\when( 'register_rest_route' )->justReturn();

		$this->expectOutputString( '' );

		Consumer::init();
	}

	public function test_handle_request() {
		$request = \Mockery::mock( 'WP_REST_Request', \ArrayAccess::class );

		$this->assertTrue( Consumer::handle_permission( $request ) );
	}
}
