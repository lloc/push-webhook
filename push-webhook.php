<?php
declare( strict_types=1 );

/**
 * Push Webhook
 *
 *  Plugin Name: Push Webhook
 *  Version: 0.1.0
 *  Plugin URI: http://msls.co/
 *  Description: Provides an endpoint to handle webhooks.
 *  Author: Dennis Ploetner
 *  Author URI: http://lloc.de/
 *  License: GPLv2 or later
 */

defined( 'ABSPATH' ) or die();

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

add_action( 'rest_api_init', function () {
	$log_file = constant( 'WP_CONTENT_DIR' ) . '/uploads/push-webhook.log';
	$logger   = new lloc\PushWebhook\Logger( $log_file );
	lloc\PushWebhook\Consumer::init( $logger );
} );