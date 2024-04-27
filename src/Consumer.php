<?php

namespace lloc\PushWebhook;

class Consumer {

	const ROUTE_NAMESPACE = 'lloc/push-webhook/v1';
	private ConcreteLogger $logger;

	public function __construct( ConcreteLogger $logger ) {
		$this->logger = $logger;
	}

	public static function init( ConcreteLogger $logger ) {
		$consumer = new self( $logger );

		register_rest_route( self::ROUTE_NAMESPACE, '/handle_request', [
			'methods'  => \WP_REST_Server::CREATABLE,
			'callback' => [ $consumer, 'handle_request' ],
			'permission_callback'   => function () {
				return true;
			}
		] );
	}

	public function handle_request( $request ) {
		$data = $request->get_json_params();
		$this->logger->info( $data );
	}

}