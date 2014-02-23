<?php

namespace Mediawiki\DataModel;

class RevisionDetails {

	/**
	 * @var string|null
	 */
	protected $user;
	/**
	 * @var EditFlags|null
	 */
	protected $flags;
	/**
	 * @var string|null
	 */
	protected $timestamp;

	/**
	 * @param EditFlags|null $flags
	 * @param string|null $timestamp
	 * @param string|null $user
	 */
	public function __construct( EditFlags $flags = null, $timestamp = null, $user = null ) {
		$this->flags = $flags;
		$this->timestamp = $timestamp;
		$this->user = $user;
	}

	/**
	 * @return EditFlags|null
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