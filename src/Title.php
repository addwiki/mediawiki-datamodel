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
	 * @return self
	 */
	public static function factory() {
		return new self();
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

	/**
	 * @param int $ns
	 * @throws \InvalidArgumentException
	 * @return $this
	 */
	public function setNs( $ns ) {
		if( !is_int( $ns ) ) {
			throw new InvalidArgumentException( '$ns must be an int' );
		}
		$this->ns = $ns;
		return $this;
	}

	/**
	 * @param string $title
	 * @throws \InvalidArgumentException
	 * @return $this
	 */
	public function setTitle( $title ) {
		if( !is_string( $title ) ) {
			throw new InvalidArgumentException( '$title must be a string' );
		}
		$this->title = $title;
		return $this;
	}


} 