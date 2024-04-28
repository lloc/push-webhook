<?php

namespace lloc\PushWebhook\Handler;

class PullRequestMergedHandler {

	public function __construct( string $path ) {
		$this->path = $path;
	}

	public function run(): bool {
		chdir( $this->path );
		$command = 'git pull origin master 2>&1';
		$output  = shell_exec( $command );

		if ( ! empty( $output ) ) {
			push_webhook_logger()->error( 'Git pull failed', [ 'output' => $output ] );

			return false;
		}

		return true;
	}
}