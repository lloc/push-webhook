<?php declare( strict_types=1 );

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
		$context = $request->get_json_params();

		$action = $context['action'] ?? '';
		if ( $action === 'closed' && ! empty( $context['pull_request']['merged'] ) ) {
			$message = 'Pull request merged';

			do_action( 'pull_request_merged', $context );
			$this->logger->info( $message, $context );
			return new \WP_REST_Response( $message, 200 );
		}

		return new \WP_REST_Response( 'Request received', 200 );
	}

}