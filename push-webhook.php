<?php

/**
 * Plugin Name: Push Webhook
 */

namespace lloc\PushWebhook;

require __DIR__ . '/vendor/autoload.php';

add_action( 'rest_api_init', function () {
	$log_file = constant( 'WP_CONTENT_DIR' ) . '/uploads/push-webhook.php';
	$logger = new Logger( $log_file );
	Consumer::init( $logger );
} );