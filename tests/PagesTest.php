<?php

namespace Mediawiki\DataModel\Test;

use Mediawiki\DataModel\Pages;
use PHPUnit_Framework_TestCase;

/**
 * @covers \Mediawiki\DataModel\Pages
 * @author Adam Shorland
 */
class PagesTest extends PHPUnit_Framework_TestCase {

	public function testValidConstruction() {
		new Pages();
		$this->assertTrue( true );
	}

}
