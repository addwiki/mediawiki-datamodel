<?php

namespace Mediawiki\DataModel;

use InvalidArgumentException;

/**
 * Represents flags that can be used when edits are made
 * @author Adam Shorland
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
	private $minor = self::NOTMINOR;

	/**
	 * @var EditInfo::BOT|self::NOTBOT
	 */
	private $bot = self::NOTBOT;

	/**
	 * @var string
	 */
	private $summary;

	/**
	 * @return self
	 */
	public static function factory() {
		return new self();
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
	 * @param EditInfo $bot
	 * @throws \InvalidArgumentException
	 * @return $this
	 */
	public function setBot( $bot ) {
		if( !is_bool( $bot ) ) {
			throw new InvalidArgumentException( '$bot must be a bool' );
		}
		$this->bot = $bot;
		return $this;
	}

	/**
	 * @param EditInfo $minor
	 * @throws \InvalidArgumentException
	 * @return $this
	 */
	public function setMinor( $minor ) {
		if( !is_bool( $minor ) ) {
			throw new InvalidArgumentException( '$minor must be a bool' );
		}
		$this->minor = $minor;
		return $this;
	}

	/**
	 * @param string $summary
	 * @throws \InvalidArgumentException
	 * @return $this
	 */
	public function setSummary( $summary ) {
		if( !is_string( $summary ) ) {
			throw new InvalidArgumentException( '$summary must be a string' );
		}
		$this->summary = $summary;
		return $this;
	}

}