<?php declare( strict_types = 1 );

namespace lloc\PushWebhook\Tests;

use lloc\PushWebhook\Executor;
use lloc\PushWebhook\Handler;

class TestExecutor extends PushWebhookTestCase {

	public function test_init(): void {
		Executor::init();

		$this->assertTrue( has_action( Handler::ACTION_PULL_REQUEST_MERGED, array( Executor::class, 'execute_plugin_git_update' ) ) === 10 );
	}
}
