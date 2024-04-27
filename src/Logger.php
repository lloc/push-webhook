<?php

namespace lloc\PushWebhook;

use Monolog\Logger as MonologLogger;
use Monolog\Handler\StreamHandler;

class Logger {

	private $log;

	/**
	 * @param string $log_file
	 */
	public function __construct( string $log_file ) {
		$this->log = new MonologLogger( 'push-webhook' );
		$this->log->pushHandler( new StreamHandler( $log_file, MonologLogger::WARNING ) );
	}

	public function info( $message ): void {
		$this->log->info( $message );
	}

	public function error( $message ): void {
		$this->log->error( $message );
	}
}