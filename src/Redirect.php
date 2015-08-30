<?php

namespace Mediawiki\DataModel;

class Redirect {

	private $from;
	private $to;

	public function __construct( Title $from, Title $to ) {
		$this->from = $from;
		$this->to = $to;
	}

	/**
	 * @return Title
	 */
	public function getFrom() {
		return $this->from;
	}

	/**
	 * @return Title
	 */
	public function getTo() {
		return $this->to;
	}

}
