<?php

namespace lloc\PushWebhook;

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class ConcreteLogger {

	private $log;

	/**
	 * @param string $log_file
	 */
	public function __construct( string $log_file ) {
		$this->log = new Logger( 'push-webhook' );
		$this->log->pushHandler( new StreamHandler( $log_file, Level::Warning ) );
	}

	public function info( $message ): void {
		$this->log->info( $message );
	}

	public function error( $message ): void {
		$this->log->error( $message );
	}
}