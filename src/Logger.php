<?php declare( strict_types=1 );

namespace lloc\PushWebhook;

use Monolog\Formatter\JsonFormatter;
use Monolog\Logger as MonologLogger;
use Monolog\Handler\StreamHandler;

class Logger {

	private $log;

	/**
	 * @param string $log_file
	 */
	public function __construct( string $log_file ) {
		$formatter = new JsonFormatter();

		$handler = new StreamHandler( $log_file, MonologLogger::DEBUG );
		$handler->setFormatter( $formatter );

		$this->log = new MonologLogger( 'push-webhook' );
		$this->log->pushHandler( $handler );
	}

	public function info( $message ): void {
		$this->log->info( $message );
	}
}