<?php

namespace Mediawiki\DataModel;

class Page {

	/**
	 * @var Revisions
	 */
	protected $revisions;

	/**
	 * @var int
	 */
	protected $id;

	/**
	 * @var Title
	 */
	protected $title;

	/**
	 * @param string $title
	 * @param int $id
	 * @param Revisions $revisions
	 */
	public function __construct( $title, $id, Revisions $revisions ) {
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