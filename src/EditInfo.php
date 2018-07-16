<?php

namespace Mediawiki\DataModel;

use InvalidArgumentException;

/**
 * Represents flags that can be used when edits are made
 * @author Addshore
 */
class EditInfo {

	//minor flags
	const MINOR = true;
	const NOTMINOR = false;
	//bot flags
	const BOT = true;
	const NOTBOT = false;
	//maxlag flags
	const OFFLAG = 0;

	/**
	 * @var EditInfo::MINOR|self::NOTMINOR
	 */
	protected $minor = false;

	/**
	 * @var EditInfo::BOT|self::NOTBOT
	 */
	protected $bot = false;
	
	/**
	 * @var integer
	 */
	protected $maxlag = 0;

	/**
	 * @var string
	 */
	protected $summary = null;

	/**
	 * @param string $summary
	 * @param bool $minor
	 * @param bool $bot
	 * @param int $maxlag
	 *
	 * @throws InvalidArgumentException
	 */
	public function __construct( $summary = '', $minor = self::NOTMINOR, $bot = self::NOTBOT, $maxlag = self::OFFLAG ) {
		if( !is_string( $summary ) ) {
			throw new InvalidArgumentException( '$summary must be a string' );
		}
		if( !is_bool( $minor ) ) {
			throw new InvalidArgumentException( '$minor must be a bool' );
		}
		if( !is_bool( $bot ) ) {
			throw new InvalidArgumentException( '$bot must be a bool' );
		}
		if( !is_int( $maxlag ) ) {
			throw new InvalidArgumentException( '$maxlag must be an integer' );	
		} 
		elseif( $maxlag < 0 ) {
			throw new InvalidArgumentException( '$maxlag must have a positive value' );
		}
		$this->summary = $summary;
		$this->bot = $bot;
		$this->minor = $minor;
		$this->maxlag = $maxlag;
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
	 * @return integer
	 */
	public function getMaxlag() {
		return $this->maxlag;
	}

	/**
	 * @return string
	 */
	public function getSummary() {
		return $this->summary;
	}

}
