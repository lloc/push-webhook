<?php

/**
 * Plugin Name: Push Webhook
 */

require __DIR__ . '/vendor/autoload.php';

add_action( 'rest_api_init', function () {
	$log_file = constant( 'WP_CONTENT_DIR' ) . '/uploads/push-webhook.log';
	$logger = new lloc\PushWebhook\Logger( $log_file );
	lloc\PushWebhook\Consumer::init( $logger );
} );