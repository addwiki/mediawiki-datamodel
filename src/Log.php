<?php

namespace Mediawiki\DataModel;

/**
 * @since 0.5
 */
class Log {

	/**
	 * @var int
	 */
	private $id;

	/**
	 * @var string
	 */
	private $type;

	/**
	 * @var string
	 */
	private $action;

	/**
	 * @var string
	 */
	private $timestamp;

	/**
	 * @var string
	 */
	private $user;

	/**
	 * @var string
	 */
	private $comment;

	/**
	 * @var Page
	 */
	private $page;

	/**
	 * @var array
	 */
	private $details;

	/**
	 * @since 0.5
	 * @return string
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * @since 0.5
	 * @return string
	 */
	public function getAction() {
		return $this->action;
	}

	/**
	 * @since 0.5
	 * @return string
	 */
	public function getComment() {
		return $this->comment;
	}

	/**
	 * @since 0.5
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @since 0.5
	 * @return Page
	 */
	public function getPage() {
		return $this->page;
	}

	/**
	 * @since 0.5
	 * @return string
	 */
	public function getTimestamp() {
		return $this->timestamp;
	}

	/**
	 * @since 0.5
	 * @return string
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @since 0.5
	 * @return array
	 */
	public function getDetails() {
		return $this->details;
	}

	/**
	 * @param string $action
	 * @return $this
	 */
	public function setAction( $action ) {
		$this->action = $action;
		return $this;
	}

	/**
	 * @param string $comment
	 * @return $this
	 */
	public function setComment( $comment ) {
		$this->comment = $comment;
		return $this;
	}

	/**
	 * @param array $details
	 * @return $this
	 */
	public function setDetails( $details ) {
		$this->details = $details;
		return $this;
	}

	/**
	 * @param int $id
	 * @return $this
	 */
	public function setId( $id ) {
		$this->id = $id;
		return $this;
	}

	/**
	 * @param Page $page
	 * @return $this
	 */
	public function setPage( $page ) {
		$this->page = $page;
		return $this;
	}

	/**
	 * @param string $timestamp
	 * @return $this
	 */
	public function setTimestamp( $timestamp ) {
		$this->timestamp = $timestamp;
		return $this;
	}

	/**
	 * @param string $type
	 * @return $this
	 */
	public function setType( $type ) {
		$this->type = $type;
		return $this;
	}

	/**
	 * @param string $user
	 * @return $this
	 */
	public function setUser( $user ) {
		$this->user = $user;
		return $this;
	}

}