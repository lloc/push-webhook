<?php declare( strict_types=1 );

namespace lloc\PushWebhook;

class Consumer {

	const ROUTE_NAMESPACE = 'lloc/push-webhook/v1';

	const ACTION_HANDLE_REQUEST = 'lloc/push-webhook/handle_request';

	public static function init(): void {
		register_rest_route( self::ROUTE_NAMESPACE, '/handle_request', [
			'methods'  => \WP_REST_Server::CREATABLE,
			'callback' => [ __CLASS__, 'handle_request' ],
			'permission_callback'   => function () {
				return true;
			}
		] );
	}

	public static function handle_request( \WP_REST_Request $request ): \WP_REST_Response {
		$context = $request->get_json_params();

		do_action( self::ACTION_HANDLE_REQUEST, $context );

		return new \WP_REST_Response( 'Request received', 200 );
	}

}