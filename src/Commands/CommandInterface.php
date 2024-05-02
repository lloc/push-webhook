<?php declare( strict_types=1 );

namespace lloc\PushWebhook\Commands;

interface CommandInterface {


	/**
	 * @return bool
	 */
	public function exec(): bool;
}
