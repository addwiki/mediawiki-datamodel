<?php

namespace Mediawiki\DataModel;

class RevisionDetails {

	/**
	 * @var string
	 */
	protected $user;
	/**
	 * @var EditFlags
	 */
	protected $flags;
	/**
	 * @var string
	 */
	protected $timestamp;

	/**
	 * @param EditFlags|null $flags
	 * @param string|null $timestamp
	 * @param string|null $user
	 */
	public function __construct( EditFlags $flags = null, $timestamp = null, $user = null ) {
		if( is_null( $flags ) ) {
			$flags = new EditFlags();
		}
		$this->flags = $flags;
		$this->timestamp = $timestamp;
		$this->user = $user;
	}

	/**
	 * @return EditFlags
	 */
	public function getFlags() {
		return $this->flags;
	}

	/**
	 * @return string
	 */
	public function getTimestamp() {
		return $this->timestamp;
	}

	/**
	 * @return string
	 */
	public function getUser() {
		return $this->user;
	}

}