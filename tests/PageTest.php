<?php

namespace Mediawiki\DataModel\Test;

use Mediawiki\DataModel\Page;

/**
 * @covers \Mediawiki\DataModel\Page
 */
class PageTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @dataProvider provideValidConstruction
	 */
	public function testValidConstruction( $title, $id, $revisions ) {
		$page = new Page( $title, $id, $revisions );
		$this->assertEquals( $title, $page->getTitle() );
		$this->assertEquals( $id, $page->getId() );
		$this->assertEquals( $revisions, $page->getRevisions() );
	}

	public function provideValidConstruction() {
		$mockTitle = $this->getMockBuilder( '\Mediawiki\DataModel\Title' )
			->disableOriginalConstructor()
			->getMock();
		$mockRevisions = $this->getMockBuilder( '\Mediawiki\DataModel\Revisions' )
			->disableOriginalConstructor()
			->getMock();

		return array(
			array( $mockTitle, 1, $mockRevisions ),
			array( $mockTitle, 99999999, $mockRevisions ),
		);
	}

} 