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
	 * @param Title|string|null $title
	 * @param int|null $id
	 * @throws InvalidArgumentException
	 */
	public function __construct( $title = null, $id = null ) {
		if( !is_string( $title ) && !$title instanceof Title && !is_null( $title ) ) {
			throw new InvalidArgumentException( '$title must be a string or a Title object' );
		}
		if( !is_int( $id ) && !is_null( $id ) ) {
			throw new InvalidArgumentException( '$id must be an int' );
		}
		if( is_string( $title ) ) {
			$title = new Title( $title );
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
 