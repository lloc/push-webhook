<?php declare( strict_types = 1 );

namespace lloc\PushWebhook\Tests;

use lloc\PushWebhook\Consumer;
use lloc\PushWebhook\Handler;
use Brain\Monkey\Functions;
use lloc\PushWebhook\Logger;

class TestHandler extends PushWebhookTestCase {

	public function test_init(): void {
		Handler::init();

		$this->assertTrue( has_action( Consumer::ACTION_HANDLE_REQUEST, array( Handler::class, 'pull_request_merged' ) ) === 10 );
	}

	public function test_pull_request_merged() {
		$logger = \Mockery::mock( Logger::class );
		$logger->shouldReceive( 'info' )->once();

		Functions\expect( 'push_webhook_logger' )->once()->andReturn( $logger );

		Handler::pull_request_merged(
			array(
				'action'       => 'closed',
				'pull_request' => array(
					'merged' => true,
				),
				'repository'   => array(
					'name' => 'Test',
				),
			)
		);

		$this->assertSame( 1, did_action( Handler::ACTION_PULL_REQUEST_MERGED ) );
	}
}
