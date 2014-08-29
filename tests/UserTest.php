<?php

namespace Mediawiki\DataModel\Test;

use Mediawiki\DataModel\User;

/**
 * @covers \Mediawiki\DataModel\User
 * @author Adam Shorland
 */
class UserTest extends \PHPUnit_Framework_TestCase {

	public function testValidConstruction() {
		new User();
		$this->assertTrue( true );
	}

}