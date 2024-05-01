<?php

namespace lloc\PushWebhook\Tests;

use lloc\PushWebhook\Handler;

class TestHandler extends PushWebhookTestCase {

	public function test_init() {
		$this->expectOutputString( '' );

		Handler::init();
	}
}
