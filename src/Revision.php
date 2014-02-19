<?php

namespace Mediawiki\DataModel;

/**
 * Representation of a page version
 */
class Revision {

	/**
	 * @var int Id of the revision
	 */
	protected $id;
	/**
	 * @var string
	 */
	protected $content;
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

	public function __construct( $id, $content, $user, $flags, $timestamp ) {
		$this->content = $content;
		$this->flags = $flags;
		$this->id = $id;
		$this->timestamp = $timestamp;
		$this->user = $user;
	}

	/**
	 * @return string
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * @return EditFlags
	 */
	public function getFlags() {
		return $this->flags;
	}

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
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