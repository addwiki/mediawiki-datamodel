<?php

namespace Mediawiki\DataModel\Test;

use Mediawiki\DataModel\Revision;

/**
 * @covers \Mediawiki\DataModel\Revision
 * @author Adam Shorland
 */
class RevisionTest extends \PHPUnit_Framework_TestCase {

	public function testValidConstruction() {
		new Revision();
		$this->assertTrue( true );
	}

} 