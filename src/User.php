<?php

namespace Mediawiki\DataModel;

/**
 * Represents a mediawiki user
 */
class User {

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var int
	 */
	protected $id;

	/**
	 * @var int
	 */
	protected $editcount;

	/**
	 * @var string
	 */
	protected $registration;

	/**
	 * @var array
	 */
	protected $groups;

	/**
	 * @var array
	 */
	protected $rights;

	/**
	 * @var string
	 */
	protected $gender;

	/**
	 * @param string $name
	 * @param int $id
	 * @param int $editcount
	 * @param string $registration
	 * @param array $groups
	 * @param array $rights
	 * @param string $gender
	 */
	public function __construct( $name, $id, $editcount, $registration, $groups, $rights, $gender ) {
		$this->editcount = $editcount;
		$this->gender = $gender;
		$this->groups = $groups;
		$this->id = $id;
		$this->name = $name;
		$this->registration = $registration;
		$this->rights = $rights;
	}

	/**
	 * @return int
	 */
	public function getEditcount() {
		return $this->editcount;
	}

	/**
	 * @return string
	 */
	public function getGender() {
		return $this->gender;
	}

	/**
	 * @return array
	 */
	public function getGroups() {
		return $this->groups;
	}

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function getRegistration() {
		return $this->registration;
	}

	/**
	 * @return array
	 */
	public function getRights() {
		return $this->rights;
	}


} 