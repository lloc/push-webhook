<?php declare( strict_types=1 );

namespace lloc\PushWebhook\Logger;

use Monolog\Formatter\FormatterInterface;
use Monolog\Formatter\JsonFormatter;

class Formatter extends JsonFormatter implements FormatterInterface {

	/**
	 * @param array<string, mixed> $record
	 *
	 * @return string
	 */
	public function format( array $record ): string {
		$record['siteUrl'] = site_url();
		$record['blogId']  = get_current_blog_id();

		return parent::format( $record );
	}

}
