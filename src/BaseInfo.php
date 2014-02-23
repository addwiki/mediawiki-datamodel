<?php

namespace Mediawiki\DataModel;

class BaseInfo {

	/**
	 * @var int|null
	 */
	protected $revid;

	/**
	 * @var null|string
	 */
	protected $timestamp;

	/**
	 * @param int|null $revid
	 * @param string|null $timestamp
	 */
	public function __construct( $revid = null, $timestamp = null ) {
		$this->revid = $revid;
		$this->timestamp = $timestamp;
	}

	/**
	 * @return int|null
	 */
	public function getRevid() {
		return $this->revid;
	}

	/**
	 * @return string|null
	 */
	public function getTimestamp() {
		return $this->timestamp;
	}

} 