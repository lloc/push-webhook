<?php declare( strict_types = 1 );

namespace lloc\PushWebhook\Commands;

class PluginGitUpdateCommand extends PluginCommand implements CommandInterface {

	/**
	 * @return bool
	 */
	public function exec(): bool {
		chdir( $this->path );
		$command = 'git pull origin master 2>&1';
		$output  = shell_exec( $command );

		if ( ! empty( $output ) ) {
			push_webhook_logger()->error( 'Git pull failed', array( 'output' => $output ) );

			return false;
		}

		return true;
	}
}
