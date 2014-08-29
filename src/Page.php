<?php

namespace Mediawiki\DataModel;

use InvalidArgumentException;

class Page {

	/**
	 * @var Revisions
	 */
	private $revisions;

	/**
	 * @var int
	 */
	private $id;

	/**
	 * @var Title
	 */
	private $title;

	public function __construct() {
		$this->revisions = new Revisions();
	}

	/**
	 * @return self
	 */
	public static function factory() {
		return new self();
	}

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return Revisions
	 */
	public function getRevisions() {
		return $this->revisions;
	}

	/**
	 * @return Title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param int $id
	 * @throws \InvalidArgumentException
	 * @return $this
	 */
	public function setId( $id ) {
		if( !is_int( $id ) ) {
			throw new InvalidArgumentException( '$id must be an int' );
		}
		$this->id = $id;
		return $this;
	}

	/**
	 * @param Revisions $revisions
	 * @return $this
	 */
	public function setRevisions( $revisions ) {
		$this->revisions = $revisions;
		return $this;
	}

	/**
	 * @param Title $title
	 * @return $this
	 */
	public function setTitle( $title ) {
		$this->title = $title;
		return $this;
	}



} 