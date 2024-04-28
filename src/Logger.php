<?php declare( strict_types=1 );

namespace lloc\PushWebhook;

use lloc\PushWebhook\Logger\Formatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger as MonologLogger;

class Logger {

	private $log;

	/**
	 * @param string $log_file
	 */
	public function __construct( string $log_file ) {
		$formatter = new Formatter();

		$handler = new StreamHandler( $log_file, MonologLogger::DEBUG );
		$handler->setFormatter( $formatter );

		$this->log = new MonologLogger( 'push-webhook' );
		$this->log->pushHandler( $handler );
	}

	public function info( string $message, array $context = [] ): void {
		$this->log->info( $message, $context );
	}

	public function error( string $message, array $context = [] ): void {
		$this->log->error( $message, $context );
	}
}