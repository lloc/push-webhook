<?php declare( strict_types=1 );

namespace lloc\PushWebhook;

use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger as MonologLogger;
use Monolog\Handler\StreamHandler;

class Logger {

	const MAX_FILES = 7;

	private $log;

	/**
	 * @param string $log_file
	 */
	public function __construct( string $log_file ) {
		$formatter = new Formatter();

		$handler = new RotatingFileHandler( $log_file, self::MAX_FILES, MonologLogger::DEBUG );
		$handler->setFormatter( $formatter );

		$this->log = new MonologLogger( 'push-webhook' );
		$this->log->pushHandler( $handler );
	}

	public function info( string $message, array $context = [] ): void {
		$this->log->info( $message, $context );
	}
}