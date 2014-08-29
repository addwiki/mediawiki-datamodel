<?php

namespace Mediawiki\DataModel\Test;

use Mediawiki\DataModel\Revisions;
use PHPUnit_Framework_TestCase;

/**
 * @covers \Mediawiki\DataModel\Revisions
 * @author Adam Shorland
 */
class RevisionsTest extends PHPUnit_Framework_TestCase {

	public function testValidConstruction() {
		new Revisions();
		$this->assertTrue( true );
	}

} 