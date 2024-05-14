<?php

namespace lloc\PushWebhook;

use lloc\PushWebhook\Commands\PluginComposerUpdateCommand;
use lloc\PushWebhook\Commands\PluginGitUpdateCommand;

class Executor {

	protected array $commands = array();

	/**
	 * @return void
	 */
	public static function init(): void {
		add_action( Handler::ACTION_PULL_REQUEST_MERGED, array( __CLASS__, 'execute_plugin_to_update' ) );
	}

	/**
	 * @param string $name
	 *
	 * @return void
	 */
	public static function execute_plugin_to_update( string $name ): void {
		( new PluginGitUpdateCommand( $name ) )->exec();
		( new PluginComposerUpdateCommand( $name ) )->exec();
	}
}
