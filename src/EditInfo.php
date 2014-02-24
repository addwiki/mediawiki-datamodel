<?php

namespace Mediawiki\DataModel;

use InvalidArgumentException;

/**
 * Represents flags that can be used when edits are made
 */
class EditInfo {

	//minor flags
	const MINOR = true;
	const NOTMINOR = false;
	//bot flags
	const BOT = true;
	const NOTBOT = false;

	/**
	 * @var EditInfo::MINOR|self::NOTMINOR
	 */
	protected $minor = false;

	/**
	 * @var EditInfo::BOT|self::NOTBOT
	 */
	protected $bot = false;

	/**
	 * @var string
	 */
	protected $summary = null;

	/**
	 * @var string initial hash of the object
	 */
	private $initialHash;

	/**
	 * @param string $summary
	 * @param bool $minor
	 * @param bool $bot
	 *
	 * @throws InvalidArgumentException
	 */
	public function __construct( $summary = '', $minor = self::NOTMINOR, $bot = self::NOTBOT ) {
		if( !is_string( $summary ) ) {
			throw new InvalidArgumentException( '$summary must be a string' );
		}
		if( !is_bool( $minor ) ) {
			throw new InvalidArgumentException( '$minor must be a bool' );
		}
		if( !is_bool( $bot ) ) {
			throw new InvalidArgumentException( '$bot must be a bool' );
		}

		$this->summary = $summary;
		$this->bot = $bot;
		$this->minor = $minor;
		$this->initialHash = $this->getHash();
	}

	/**
	 * @return EditInfo::BOT|self::NOTBOT
	 */
	public function getBot() {
		return $this->bot;
	}

	/**
	 * @return EditInfo::MINOR|self::NOTMINOR
	 */
	public function getMinor() {
		return $this->minor;
	}

	/**
	 * @return string
	 */
	public function getSummary() {
		return $this->summary;
	}

	/**
	 * @param EditInfo::BOT|self::NOTBOT $value
	 */
	public function setBot( $value ) {
		$this->bot = $value;
	}

	/**
	 * @param EditInfo::MINOR|self::NOTMINOR $value
	 */
	public function setMinor( $value ) {
		$this->minor = $value;
	}

	/**
	 * @param string $value
	 */
	public function setSummary( $value ) {
		$this->summary = $value;
	}

	/**
	 * Has the content been changed since object construction (this shouldn't happen!)
	 * @return bool
	 */
	public function hasChanged() {
		return $this->initialHash !== $this->getHash();
	}

	/**
	 * @return string
	 */
	private function getHash() {
		return sha1( $this->summary . strval( $this->bot ) . strval( $this->minor ) );
	}

}