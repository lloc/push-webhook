<?php declare( strict_types=1 );

namespace lloc\PushWebhook;

class Consumer {

	const ROUTE_NAMESPACE = 'lloc/push-webhook/v1';
	const ROUTE           = '/handle_request';

	const ACTION_HANDLE_REQUEST = 'lloc/push-webhook/handle_request';

	public static function init(): void {
		register_rest_route(
			self::ROUTE_NAMESPACE,
			self::ROUTE,
			array(
				'methods'             => 'POST',
				'callback'            => array( __CLASS__, 'handle_request' ),
				'permission_callback' => array( __CLASS__, 'handle_permission' ),
			)
		);
	}

	/**
	 * Handle the incoming request.
	 *
	 * @codeCoverageIgnore
	 *
	 * @param \WP_REST_Request $request
	 *
	 * @return \WP_REST_Response
	 */
	public static function handle_request( \WP_REST_Request $request ): \WP_REST_Response {
		$context = $request->get_json_params();

		do_action( self::ACTION_HANDLE_REQUEST, $context );

		return new \WP_REST_Response( 'Request received', 200 );
	}

	/**
	 * Handle the permission callback.
	 *
	 * @codeCoverageIgnore
	 *
	 * @param \WP_REST_Request $request
	 *
	 * @return bool
	 */
	public static function handle_permission( \WP_REST_Request $request ): bool {
		return true;
	}
}
