<?php

namespace Mediawiki\DataModel;

use RuntimeException;

/**
 * Represents a collection or revisions
 */
class Revisions {

	/** @var Revision[] */
	protected $revisions;

	/**
	 * @param Revisions[] $revisions
	 */
	public function __construct( $revisions = array() ) {
		$this->revisions = array();
		$this->addRevisions( $revisions );
	}

	/**
	 * @param Revision[]|Revisions $revisions
	 */
	public function addRevisions( $revisions ) {
		if( $revisions instanceof Revisions ) {
			$revisions = $revisions->toArray();
		}
		foreach( $revisions as $revision ) {
			$this->addRevision( $revision );
		}
	}

	/**
	 * @param Revision $revision
	 */
	public function addRevision( Revision $revision ) {
		$this->revisions[$revision->getId()] = $revision;
	}

	/**
	 * @param int $id
	 *
	 * @return bool
	 */
	public function hasRevisionWithId( $id ){
		return array_key_exists( $id, $this->revisions );
	}

	/**
	 * @param Revision $revision
	 *
	 * @return bool
	 */
	public function hasRevision( Revision $revision ){
		return array_key_exists( $revision->getId(), $this->revisions );
	}

	/**
	 * @return Revision
	 */
	public function getLatest() {
		return $this->revisions[ max( array_keys( $this->revisions ) ) ];
	}

	/**
	 * @param int $revid
	 *
	 * @throws RuntimeException
	 * @return Revision
	 */
	public function get( $revid ){
		if( $this->hasRevisionWithId( $revid ) ){
			return $this->revisions[$revid];
		}
		throw new RuntimeException( 'No such revision loaded in Revisions object' );
	}

	/**
	 * @return Revision[]
	 */
	public function toArray() {
		return $this->revisions;
	}
}