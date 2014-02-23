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
	 * @var int baserev Id of the revision
	 */
	protected $baseRevId;

	/**
	 * @var mixed
	 */
	protected $content;

	/**
	 * @var string initial hash of the content
	 */
	protected $initialHash;

	/**
	 * @param mixed $content
	 * @param int|null $id
	 * @param int|null $baseRevId
	 * @param RevisionDetails|null $revisionDetails
	 */
	public function __construct( $content, $id = null, $baseRevId = null, $revisionDetails = null ) {
		$this->content = $content;
		$this->initialHash = sha1( serialize( $content ) );
		$this->id = $id;
		$this->baseRevId = $baseRevId;
		$this->details = $revisionDetails;
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
	public function getBaseRevId() {
		return $this->baseRevId;
	}

	/**
	 * @return RevisionDetails|null
	 */
	public function getDetails() {
		return $this->details;
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
		return new self( $content , null, $revision->getId() );
	}

}