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
		$this->log = new MonologLogger( 'name' );
		$this->log->pushHandler( new StreamHandler( $log_file, Level::Warning ) );
	}

	public function log( $message ) {
		$this->log->warning( $message );
	}

	public function error( $message ) {
		$this->log->error( $message );
	}
}