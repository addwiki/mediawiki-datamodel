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
	 * @param Revisions $revisions
	 *
	 * @throws InvalidArgumentException
	 */
	public function __construct( Title $title, $id, Revisions $revisions ) {
		if( !is_int( $id ) ) {
			throw new InvalidArgumentException( '$id must be an int' );
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

} 