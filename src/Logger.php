<?php declare( strict_types=1 );

namespace lloc\PushWebhook;

use Monolog\Logger as MonologLogger;
use Monolog\Handler\StreamHandler;

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
		$context = constant( 'WP_DEBUG' ) ? $context : [];

		$this->log->info( $message, $context );
	}
}