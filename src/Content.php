<?php

namespace Mediawiki\DataModel;

/**
 * Class Representing the content of a revision
 * @author Adam Shorland
 */
abstract class Content {

	/**
	 * @var string sha1 hash of the object content upon creation
	 */
	private $initialHash;

	/**
	 * Should always be called AFTER overriding constructors so a hash can be created
	 */
	public function __construct() {
		$this->initialHash = $this->getHash();
	}

	/**
	 * @return string
	 */
	abstract public function getModel();

	/**
	 * Returns a sha1 hash of the content
	 * @return string
	 */
	abstract public function getHash();

	/**
	 * Has the content been changed since object construction (this shouldn't happen!)
	 * @return bool
	 */
	public function hasChanged() {
		return $this->initialHash !== $this->getHash();
	}

	/**
	 * Returns native representation of the data. Interpretation depends on
	 * the content model used, as given by getModel().
	 *
	 * @return mixed The native representation of the content. Could be a
	 *    string, a nested array structure, an object, a binary blob...
	 *    anything, really.
	 *
	 * @note Caller must be aware of content model!
	 */
	abstract public function getData();

} 