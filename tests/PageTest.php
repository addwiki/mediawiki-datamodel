<?php

namespace Mediawiki\DataModel\Test;

use Mediawiki\DataModel\Page;
use PHPUnit_Framework_TestCase;

/**
 * @covers \Mediawiki\DataModel\Page
 * @author Adam Shorland
 */
class PageTest extends PHPUnit_Framework_TestCase {

	public function testValidConstruction() {
		new Page();
		$this->assertTrue(true);
	}

} 