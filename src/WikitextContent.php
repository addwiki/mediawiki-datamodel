<?php

namespace Mediawiki\DataModel;

use InvalidArgumentException;

/**
 * @author Adam Shorland
 */
class WikitextContent extends Content {

	/**
	 * @var string
	 */
	private $text;

	/**
	 * @param string $text
	 */
	public function __construct( $text ) {
		$this->setText( $text );
		parent::__construct();
	}

	/**
	 * @return string
	 */
	public function getText() {
		return $this->text;
	}

	/**
	 * @return string
	 */
	public function getData() {
		return $this->text;
	}

	/**
	 * @param string $text
	 *
	 * @throws InvalidArgumentException
	 */
	public function setText( $text ) {
		if( !is_string( $text ) ) {
			throw new InvalidArgumentException( '$text needs to be a string' );
		}
		$this->text = $text;
	}

	/**
	 * @return string
	 */
	public function getHash() {
		return sha1( $this->text );
	}

	/**
	 * @return string
	 */
	public function getModel() {
		return 'wikitext';
	}
}