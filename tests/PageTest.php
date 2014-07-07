<?php

namespace Mediawiki\DataModel\Test;

use Mediawiki\DataModel\Page;

/**
 * @covers \Mediawiki\DataModel\Page
 * @author Adam Shorland
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
		return array(
			array( $this->newMockTitle(), 1, $this->newMockRevisions() ),
			array( $this->newMockTitle(), 99999999, $this->newMockRevisions() ),
		);
	}

	/**
	 * @dataProvider provideInvalidConstruction
	 */
	public function testInvalidConstruction( $title, $id, $revisions ) {
		$this->setExpectedException( 'InvalidArgumentException' );
		new Page( $title, $id, $revisions );
	}

	public function provideInvalidConstruction() {
		return array(
			array( $this->newMockTitle(), 'foo', $this->newMockRevisions() ),
		);
	}

	private function newMockTitle() {
		return $this->getMockBuilder( '\Mediawiki\DataModel\Title' )
			->disableOriginalConstructor()
			->getMock();
	}

	private function newMockRevisions() {
		return $this->getMockBuilder( '\Mediawiki\DataModel\Revisions' )
			->disableOriginalConstructor()
			->getMock();
	}

} 