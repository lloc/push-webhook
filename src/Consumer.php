<?php

namespace lloc\PushWebhook;

class Consumer {

	const ROUTE_NAMESPACE = 'lloc/push-webhook/v1';
	private Logger $logger;

	public function __construct( Logger $logger ) {
		$this->logger = $logger;
	}

	public static function init( Logger $logger ): Consumer {
		$consumer = new self( $logger );

		register_rest_route( self::ROUTE_NAMESPACE, '/handle_request', [
			'methods'  => \WP_REST_Server::READABLE,
			'callback' => [ $consumer, 'handle_request' ],
			'permission_callback'   => function () {
				return true;
			}
		] );
	}

	public function handle_request( $request ): \WP_REST_Response {
		$data = $request->get_json_params();

		$this->logger->info( $data );

		return new \WP_REST_Response( 'Received', 200 );
	}

}