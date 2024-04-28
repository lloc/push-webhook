<?php

namespace lloc\PushWebhook;

use lloc\PushWebhook\Handler\PullRequestMergedHandler;

class Handler {

	public static function init(): void {
		add_action( Consumer::ACTION_HANDLE_REQUEST, [ __CLASS__, 'pull_request_merged' ] );
	}

	public static function pull_request_merged( array $context ): void {
		$action = $context['action'] ?? '';
		if ( $action === 'closed' && ! empty( $context['pull_request']['merged'] ) ) {
			$message = 'Pull request merged';
			push_webhook_logger()->info( $message, $context );
			$path = self::build_plugin_path( $context['repository']['name'] ?? '' );
			if ( ! empty( $path ) ) {
				( new PullRequestMergedHandler( $path ) )->run();
			}
		}
	}

	protected static function build_plugin_path( string $name ): string {
		return WP_PLUGIN_DIR . '/' . strtolower( esc_attr( $name ) );
	}

}