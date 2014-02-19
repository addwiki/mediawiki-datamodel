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
	 * @var string
	 */
	protected $contentmodel;

	/**
	 * @param string $title
	 * @param int $id
	 * @param Revisions $revisions
	 * @param string $contentmodel
	 */
	public function __construct( $title, $id, Revisions $revisions, $contentmodel ) {
		$this->id = $id;
		$this->revisions = $revisions;
		$this->title = $title;
		$this->contentmodel = $contentmodel;
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
	 * @return string
	 */
	public function getContentmodel() {
		return $this->contentmodel;
	}

} 