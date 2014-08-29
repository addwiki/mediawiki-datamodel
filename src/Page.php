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

	/**
	 * @param Title $title
	 * @param int $id
	 * @param Revisions|null $revisions
	 *
	 * @throws InvalidArgumentException
	 */
	public function __construct( Title $title, $id, Revisions $revisions = null ) {
		if( !is_int( $id ) ) {
			throw new InvalidArgumentException( '$id must be an int' );
		}
		if( is_null( $revisions ) ) {
			$revisions = new Revisions();
		}
		$this->id = $id;
		$this->revisions = $revisions;
		$this->title = $title;
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
	 * @return $this
	 */
	public function setId( $id ) {
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