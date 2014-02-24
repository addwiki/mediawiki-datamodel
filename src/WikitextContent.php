<?php

namespace Mediawiki\DataModel;

class WikitextContent extends Content {

	const contentModel = 'wikitext';

	/**
	 * @var string
	 */
	protected $text;

	/**
	 * @param string $text
	 */
	public function __construct( $text ) {
		$this->text = $text;
		parent::__construct( self::contentModel );
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
	public function getNativeData() {
		return $this->text;
	}

	/**
	 * @param string $text
	 */
	public function setText( $text ) {
		$this->text = $text;
	}

	/**
	 * @return string
	 */
	public function getHash() {
		return sha1( $this->text );
	}

} 