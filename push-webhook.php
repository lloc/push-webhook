<?php

/**
 * Plugin Name: Push Webhook
 */

namespace lloc\PushWebhook;

require __DIR__ . '/vendor/autoload.php';

$logger = new Logger( constant( 'WP_CONTENT_DIR' ) . '/uploads/push-webhook.php' );
Consumer::init( $logger);