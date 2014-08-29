<?php

namespace Mediawiki\DataModel\Test;

use Mediawiki\DataModel\EditInfo;
use PHPUnit_Framework_TestCase;

/**
 * @covers \Mediawiki\DataModel\EditInfo
 * @author Adam Shorland
 */
class EditInfoTest extends PHPUnit_Framework_TestCase {

	public function testValidConstruction() {
		new EditInfo();
		$this->assertTrue( true );
	}

} 