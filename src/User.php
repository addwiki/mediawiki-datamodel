<?php

namespace Mediawiki\DataModel;

use InvalidArgumentException;

/**
 * Represents a mediawiki user
 * @author Adam Shorland
 */
class User {

	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var int
	 */
	private $id;

	/**
	 * @var int
	 */
	private $editcount;

	/**
	 * @var string
	 */
	private $registration;

	/**
	 * @var array
	 */
	private $groups;

	/**
	 * @var array
	 */
	private $rights;

	/**
	 * @var string
	 */
	private $gender;

	/**
	 * @return self
	 */
	public static function factory() {
		return new self();
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
	 * @param string $type 'groups' or 'implicitgroups'
	 *
	 * @return array
	 */
	public function getGroups( $type = 'groups' ) {
		return $this->groups[$type];
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

	/**
	 * @param int $editcount
	 * @throws \InvalidArgumentException
	 * @return $this
	 */
	public function setEditcount( $editcount ) {
		if( !is_int( $editcount ) ) {
			throw new InvalidArgumentException( '$editcount must be an int' );
		}
		$this->editcount = $editcount;
		return $this;
	}

	/**
	 * @param string $gender
	 * @throws \InvalidArgumentException
	 * @return $this
	 */
	public function setGender( $gender ) {
		if( !is_string( $gender ) ) {
			throw new InvalidArgumentException( '$gender must be a string' );
		}
		$this->gender = $gender;
		return $this;
	}

	/**
	 * @param array $groups
	 * @throws \InvalidArgumentException
	 * @return $this
	 */
	public function setGroups( $groups ) {
		if( !is_array( $groups ) || !array_key_exists( 'groups', $groups ) || !array_key_exists( 'implicitgroups', $groups ) ) {
			throw new InvalidArgumentException( '$groups must be an array or arrays with keys "groups" and "implicitgroups"' );
		}
		$this->groups = $groups;
		return $this;
	}

	/**
	 * @param int $id
	 * @throws \InvalidArgumentException
	 * @return $this
	 */
	public function setId( $id ) {
		if( !is_int( $id ) ) {
			throw new InvalidArgumentException( '$id must be an int' );
		}
		$this->id = $id;
		return $this;
	}

	/**
	 * @param string $name
	 * @throws \InvalidArgumentException
	 * @return $this
	 */
	public function setName( $name ) {
		if( !is_string( $name ) || empty( $name ) ) {
			throw new InvalidArgumentException( '$name must be a string and can not be empty' );
		}
		$this->name = $name;
		return $this;
	}

	/**
	 * @param string $registration
	 * @throws \InvalidArgumentException
	 * @return $this
	 */
	public function setRegistration( $registration ) {
		if( !is_string( $registration ) ) {
			throw new InvalidArgumentException( '$registration must be a string' );
		}
		$this->registration = $registration;
		return $this;
	}

	/**
	 * @param array $rights
	 * @throws \InvalidArgumentException
	 * @return $this
	 */
	public function setRights( $rights ) {
		if( !is_array( $rights ) ) {
			throw new InvalidArgumentException( '$rights must be an array' );
		}
		$this->rights = $rights;
		return $this;
	}


} 