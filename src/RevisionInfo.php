<?php

namespace Mediawiki\DataModel;

class RevisionInfo {

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
	 * @var int baserev Id of the revision
	 */
	protected $baseRevId;

	/**
	 * @param EditFlags|null $flags
	 * @param string|null $timestamp
	 * @param int|null $baseRevId
	 * @param string|null $user
	 */
	public function __construct( EditFlags $flags = null, $timestamp = null, $baseRevId = null,  $user = null ) {
		if( is_null( $flags ) ) {
			$flags = new EditFlags();
		}
		$this->flags = $flags;
		$this->timestamp = $timestamp;
		$this->baseRevId = $baseRevId;
		$this->user = $user;
	}

	/**
	 * @return EditFlags|null
	 */
	public function getFlags() {
		return $this->flags;
	}

	/**
	 * @return string|null
	 */
	public function getTimestamp() {
		return $this->timestamp;
	}

	/**
	 * @return string|null
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * @return int|null
	 */
	public function getBaseRevId() {
		return $this->baseRevId;
	}

}