<?php

namespace Mediawiki\DataModel;

class RevisionInfo {

	/**
	 * @var string|null
	 */
	protected $user;

	/**
	 * @var EditFlags
	 */
	protected $flags;

	/**
	 * @var BaseInfo
	 */
	protected $baseInfo;

	/**
	 * @param EditFlags|null $flags
	 * @param BaseInfo|null $baseInfo
	 * @param string|null $user
	 */
	public function __construct( EditFlags $flags = null, BaseInfo $baseInfo = null,  $user = null ) {
		if( is_null( $flags ) ) {
			$flags = new EditFlags();
		}
		if( is_null( $baseInfo ) ) {
			$baseInfo = new BaseInfo();
		}
		$this->flags = $flags;
		$this->baseInfo = $baseInfo;
		$this->user = $user;
	}

	/**
	 * @return EditFlags
	 */
	public function getFlags() {
		return $this->flags;
	}

	/**
	 * @return string|null
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * @return BaseInfo
	 */
	public function getBaseInfo() {
		return $this->baseInfo;
	}

}