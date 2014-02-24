<?php

namespace Mediawiki\DataModel\Test;

use Mediawiki\DataModel\Revision;

/**
 * @covers \Mediawiki\DataModel\Revision
 */
class RevisionTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @dataProvider provideValidConstruction
	 */
	public function testValidConstruction( $content, $pageid, $id, $editInfo, $user, $timestamp ) {
		$rev = new Revision( $content, $pageid, $id, $editInfo, $user, $timestamp );
		$this->assertEquals( $content, $rev->getContent() );
		$this->assertEquals( $pageid, $rev->getPageId() );
		$this->assertEquals( $id, $rev->getId() );
		if( !is_null( $editInfo ) ) {
			$this->assertEquals( $editInfo, $rev->getEditInfo() );
		} else {
			$this->assertInstanceOf( '\Mediawiki\DataModel\EditInfo', $rev->getEditInfo() );
		}
		$this->assertEquals( $user, $rev->getUser() );
		$this->assertEquals( $timestamp, $rev->getTimestamp() );
	}

	public function provideValidConstruction() {
		$mockContent = $this->getMockBuilder( 'Mediawiki\DataModel\Content' )
			->disableOriginalConstructor()
			->getMock();
		$mockEditInfo = $this->getMockBuilder( '\Mediawiki\DataModel\EditInfo' )
			->disableOriginalConstructor()
			->getMock();

		return array(
			array( $mockContent, null, null, null, null, null ),
			array( $mockContent, 1, null , null, null,null ),
			array( $mockContent, 1, 1 , null, null, null ),
			array( $mockContent, 1, 1 , $mockEditInfo, null, null ),
			array( $mockContent, 1, 1 , $mockEditInfo, 'foo', null ),
			array( $mockContent, 1, 1 , $mockEditInfo, 'foo', '20141212121212' ),
		);
	}

} 