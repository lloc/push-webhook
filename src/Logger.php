<?php

namespace lloc\PushWebhook;

use Monolog\Level;
use Monolog\Logger as MonologLogger;
use Monolog\Handler\StreamHandler;

class Logger {

	private $log;

	/**
	 * @param string $log_file
	 */
	public function __construct( string $log_file ) {
		$this->log = new MonologLogger( 'push-webhook' );
		$this->log->pushHandler( new StreamHandler( $log_file, Level::Warning ) );
	}

	public function info( $message ) {
		$this->log->info( $message );
	}

	public function error( $message ) {
		$this->log->error( $message );
	}
}