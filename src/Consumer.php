<?php

namespace lloc\PushWebhook;

class Consumer {

	const ROUTE_NAMESPACE = 'lloc/push-webhook/v1';
	private Logger $logger;

	public function __construct( Logger $logger ) {
		$this->logger = $logger;
	}

	public static function init( Logger $logger ): void {
		$consumer = new self( $logger );

		register_rest_route( self::ROUTE_NAMESPACE, '/handle_request', [
			'methods'  => \WP_REST_Server::CREATABLE,
			'callback' => [ $consumer, 'handle_request' ],
			'permission_callback'   => function () {
				return true;
			}
		] );
	}

	public function handle_request( \WP_REST_Request $request ): \WP_REST_Response {
		$data = $request->get_json_params();

		$this->logger->info( var_dump( $data ) );

		return new \WP_REST_Response( 'Received', 200 );
	}

}