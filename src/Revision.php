<?php

namespace Mediawiki\DataModel;

/**
 * Representation of a version of content
 */
class Revision {

	/**
	 * @var int Id of the revision
	 */
	protected $id;

	/**
	 * @var int|null of the page for the revision
	 */
	protected $pageId;

	/**
	 * @var mixed
	 */
	protected $content;

	/**
	 * @var string initial hash of the content
	 */
	protected $initialHash;

	/**
	 * @var EditInfo
	 */
	protected $editInfo;

	/**
	 * @var null|string
	 */
	protected $user;

	/**
	 * @var null|string
	 */
	protected $timestamp;

	/**
	 * @param mixed $content
	 * @param int|null $pageId
	 * @param int|null $revId
	 * @param EditInfo|null $editInfo
	 * @param string|null $user
	 * @param string|null $timestamp
	 */
	public function __construct( $content, $pageId = null, $revId = null, EditInfo $editInfo = null, $user = null, $timestamp = null ) {
		if( is_null( $editInfo ) ) {
			$editInfo = new EditInfo();
		}
		$this->content = $content;
		$this->initialHash = sha1( serialize( $content ) );
		$this->pageId = $pageId;
		$this->id = $revId;
		$this->editInfo = $editInfo;
		$this->user = $user;
		$this->timestamp = $timestamp;
	}

	/**
	 * @return mixed
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

	/**
	 * Has the content been changed since object construction (this shouldn't happen!)
	 * @return bool
	 */
	public function hasChanged() {
		return $this->initialHash !== sha1( serialize( $this->content ) );
	}

}