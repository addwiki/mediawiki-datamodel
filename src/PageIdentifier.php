<?php

namespace Mediawiki\DataModel;

use InvalidArgumentException;

class PageIdentifier {

	/**
	 * @var int|null
	 */
	private $id;

	/**
	 * @var Title|null
	 */
	private $title;

	/**
	 * @param Title|null $title
	 * @param int|null $id
	 * @throws InvalidArgumentException
	 */
	public function __construct( Title $title = null, $id = null ) {
		if( !is_int( $id ) && !is_null( $id ) ) {
			throw new InvalidArgumentException( '$id must be an int' );
		}
		$this->title = $title;
		$this->id = $id;
	}

	/**
	 * @return int|null
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return Title|null
	 */
	public function getTitle() {
		return $this->title;
	}



}
 