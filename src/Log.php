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
	 * @param int $id
	 * @param string $type
	 * @param string $action
	 * @param string $timestamp
	 * @param string $user
	 * @param Page $page
	 * @param string $comment
	 */
	public function __construct( $id, $type, $action, $timestamp, $user, $page, $comment ) {
		$this->id = $id;
		$this->type = $type;
		$this->action = $action;
		$this->timestamp = $timestamp;
		$this->user = $user;
		$this->page = $page;
		$this->comment = $comment;
	}

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
	 * @return \Mediawiki\DataModel\Page
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



}