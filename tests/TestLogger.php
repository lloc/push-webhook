<?php

namespace lloc\PushWebhook\Tests;

use lloc\PushWebhook\Logger;
use Brain\Monkey\Functions;

class TestLogger extends PushWebhookTestCase {

	public function setUp(): void {
		parent::setUp(); // TODO: Change the autogenerated stub

		Functions\expect( 'site_url' )->once()->andReturn( 'https://example.org' );
		Functions\expect( 'get_current_blog_id' )->once()->andReturn( 1 );

		$this->test = new Logger( 'test' );
	}

	public function test_info(): void {
		$this->expectOutputString( '' );

		$this->test->info( 'test' );
	}

	public function test_error(): void {
		$this->expectOutputString( '' );

		$this->test->error( 'test' );
	}
}