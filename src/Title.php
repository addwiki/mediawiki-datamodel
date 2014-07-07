<?php

namespace Mediawiki\DataModel;

use InvalidArgumentException;

/**
 * @author Adam Shorland
 */
class Title {

	/**
	 * @var string
	 */
	private $title;

	/**
	 * @var int
	 */
	private $ns;

	/**
	 * @param string $title
	 * @param int $ns
	 *
	 * @throws InvalidArgumentException
	 */
	public function __construct( $title, $ns = 0 ) {
		if( !is_string( $title ) ) {
			throw new InvalidArgumentException( '$title must be a string' );
		}
		if( !is_int( $ns ) ) {
			throw new InvalidArgumentException( '$ns must be an int' );
		}
		$this->title = $title;
		$this->ns = $ns;
	}

	/**
	 * @return int
	 */
	public function getNs() {
		return $this->ns;
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}


} 