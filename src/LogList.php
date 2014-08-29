<?php

namespace Mediawiki\DataModel;

use InvalidArgumentException;
use RuntimeException;

/**
 * Represents a collection of Log classes
 * @author Adam Shorland
 */
class LogList {

	/**
	 * @var Log[]
	 */
	private $logs = array();

	/**
	 * @return self
	 */
	public static function factory() {
		return new self();
	}

	/**
	 * @param Log[]|LogList $logs
	 *
	 * @throws InvalidArgumentException
	 */
	public function addLogs( $logs ) {
		if( !is_array( $logs ) && !$logs instanceof LogList ) {
			throw new InvalidArgumentException( '$logs needs to either be an array or a LogList object' );
		}
		if( $logs instanceof LogList ) {
			$logs = $logs->toArray();
		}
		foreach( $logs as $log ) {
			$this->addLog( $log );
		}
	}

	/**
	 * @param Log $log
	 */
	public function addLog( Log $log ) {
		$this->logs[$log->getId()] = $log;
	}

	/**
	 * @param int $id
	 *
	 * @return bool
	 */
	public function hasLogWithId( $id ){
		return array_key_exists( $id, $this->logs );
	}

	/**
	 * @param Log $log
	 *
	 * @return bool
	 */
	public function hasLog( Log $log ){
		return array_key_exists( $log->getId(), $this->logs );
	}

	/**
	 * @return Log|null Log or null if there is no log
	 */
	public function getLatest() {
		if( empty( $this->logs ) ) {
			return null;
		}
		return $this->logs[ max( array_keys( $this->logs ) ) ];
	}


	/**
	 * @param int $id
	 *
	 * @throws RuntimeException
	 * @return Log
	 */
	public function get( $id ){
		if( $this->hasLogWithId( $id ) ){
			return $this->logs[$id];
		}
		throw new RuntimeException( 'No such Log loaded in LogList object' );
	}

	/**
	 * @return Log[]
	 */
	public function toArray() {
		return $this->logs;
	}

	/**
	 * @param Log[] $logs
	 * @return $this
	 */
	public function setLogs( $logs ) {
		$this->logs = $logs;
		return $this;
	}

}