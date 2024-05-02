<?php declare( strict_types=1 );

namespace lloc\PushWebhook;

use lloc\PushWebhook\Commands\PluginGitUpdateCommand;

class Handler {

	const ACTION_PULL_REQUEST_MERGED = 'lloc/push-webhook/pull_request_merged';

	/**
	 * @return void
	 */
	public static function init(): void {
		add_action( Consumer::ACTION_HANDLE_REQUEST, array( __CLASS__, 'pull_request_merged' ) );
	}

	/**
	 * @param array $context
	 *
	 * @return void
	 */
	public static function pull_request_merged( array $context ): void {
		$action = $context['action'] ?? '';
		if ( $action === 'closed' && ! empty( $context['pull_request']['merged'] ) ) {
			$message = 'Pull request merged';
			push_webhook_logger()->info( $message, $context );
			$name = $context['repository']['name'] ?? '';
			do_action( self::ACTION_PULL_REQUEST_MERGED, $name );
		}
	}
}
