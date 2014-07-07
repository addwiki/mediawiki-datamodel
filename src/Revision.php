<?php

namespace Mediawiki\DataModel;

/**
 * Representation of a version of content
 * @author Adam Shorland
 */
class Revision {

	/**
	 * @var int Id of the revision
	 */
	private $id;

	/**
	 * @var int|null of the page for the revision
	 */
	private $pageId;

	/**
	 * @var Content
	 */
	private $content;

	/**
	 * @var EditInfo
	 */
	private $editInfo;

	/**
	 * @var null|string
	 */
	private $user;

	/**
	 * @var null|string
	 */
	private $timestamp;

	/**
	 * @param Content $content
	 * @param int|null $pageId
	 * @param int|null $revId
	 * @param EditInfo|null $editInfo
	 * @param string|null $user
	 * @param string|null $timestamp
	 */
	public function __construct( Content $content, $pageId = null, $revId = null, EditInfo $editInfo = null, $user = null, $timestamp = null ) {
		if( is_null( $editInfo ) ) {
			$editInfo = new EditInfo();
		}
		$this->content = $content;
		$this->pageId = $pageId;
		$this->id = $revId;
		$this->editInfo = $editInfo;
		$this->user = $user;
		$this->timestamp = $timestamp;
	}

	/**
	 * @return Content
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * @return EditInfo
	 */
	public function getEditInfo() {
		return $this->editInfo;
	}

	/**
	 * @return int|null
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return int|null
	 */
	public function getPageId() {
		return $this->pageId;
	}

	/**
	 * @return null|string
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * @return null|string
	 */
	public function getTimestamp() {
		return $this->timestamp;
	}

}