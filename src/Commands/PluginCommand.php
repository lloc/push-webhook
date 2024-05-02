<?php

namespace lloc\PushWebhook\Commands;

class PluginCommand {


	protected string $path;

	/**
	 * @param string $name
	 */
	public function __construct( string $name ) {
		$this->path = self::build_plugin_path( $name );
	}

	/**
	 * @param string $name
	 *
	 * @return string
	 */
	protected static function build_plugin_path( string $name ): string {
		return trailingslashit( WP_PLUGIN_DIR ) . strtolower( esc_attr( $name ) );
	}
}
