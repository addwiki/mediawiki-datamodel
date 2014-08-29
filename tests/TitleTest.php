<?php

namespace Mediawiki\DataModel\Test;

use Mediawiki\DataModel\Title;

/**
 * @covers \Mediawiki\DataModel\Title
 * @author Adam Shorland
 */
class TitleTest extends \PHPUnit_Framework_TestCase {

	public function testValidConstruction() {
		new Title();
		$this->assertTrue( true );
	}

} 