<?php

namespace Mediawiki\DataModel;

class Title {

	/**
	 * @var string
	 */
	protected $title;

	/**
	 * @var int
	 */
	protected $ns;

	/**
	 * @param string $title
	 * @param int $ns
	 */
	public function __construct( $title, $ns = 0 ) {
		$this->title = $title;
		$this->ns = $ns;
	}

	/**
	 * @return int
	 */
	public function getNs() {
		return $this->ns;
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}


} 