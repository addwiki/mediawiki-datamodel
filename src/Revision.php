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
	 * @var RevisionInfo
	 */
	protected $info;

	/**
	 * @param mixed $content
	 * @param int|null $pageId
	 * @param int|null $id
	 * @param RevisionInfo|null $revisionInfo
	 */
	public function __construct( $content, $pageId = null, $id = null, $revisionInfo = null ) {
		if( is_null( $revisionInfo ) ) {
			$revisionInfo = new RevisionInfo();
		}
		$this->content = $content;
		$this->initialHash = sha1( serialize( $content ) );
		$this->pageId = $pageId;
		$this->id = $id;
		$this->info = $revisionInfo;
	}

	/**
	 * @return mixed
	 */
	public function getContent() {
		return $this->content;
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
	 * @return RevisionInfo
	 */
	public function getInfo() {
		return $this->info;
	}

	/**
	 * Has the content been changed since object construction
	 * @return bool
	 */
	public function hasChanged() {
		return $this->initialHash !== sha1( serialize( $this->content ) );
	}

	/**
	 * Convenience function for creating new revisions
	 *
	 * @param Revision $revision
	 *
	 * @return Revision
	 */
	public static function newFromRevision( $revision ) {
		$content = $revision->getContent();
		if( is_object( $content ) ) {
			$content = clone $content;
		}
		return new self(
			$content ,
			null,
			new RevisionInfo(
				null,
				new BaseInfo(
					$revision->getId(),
					$revision->getInfo()->getBaseInfo()->getTimestamp()
				)
			)
		);
	}

}