<?php

namespace Mediawiki\DataModel;

/**
 * Class Representing the content of a revision
 * @author Adam Shorland
 */
abstract class Content {

	/**
	 * Name of the content model this Content object represents.
	 * @var string $model_id
	 */
	protected $model_id;

	/**
	 * @var string sha1 hash of the object content upon creation
	 */
	private $initialHash;

	/**
	 * Should always be called AFTER overriding constructors so a hash can be created
	 * @param string $modelId
	 */
	public function __construct( $modelId ) {
		$this->model_id = $modelId;
		$this->initialHash = $this->getHash();
	}

	/**
	 * @return string
	 */
	final public function getModel() {
		return $this->model_id;
	}

	/**
	 * Returns a sha1 hash of the content
	 * @return string
	 */
	abstract public function getHash();

	/**
	 * Has the content been changed since object construction (this shouldn't happen!)
	 * @return bool
	 */
	final public function hasChanged() {
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
	abstract public function getNativeData();

	/**
	 * @param string $model_id
	 * @return $this
	 */
	final public function setModelId( $model_id ) {
		$this->model_id = $model_id;
		return $this;
	}

} 