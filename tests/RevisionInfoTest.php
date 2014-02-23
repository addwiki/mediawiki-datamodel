<?php

namespace Mediawiki\DataModel\Test;

use Mediawiki\DataModel\RevisionInfo;

/**
 * @covers \Mediawiki\DataModel\RevisionInfo
 */
class RevisionInfoTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @dataProvider provideValidConstruction
	 */
	public function testValidConstruction( $flags, $timestamp, $baserevid, $user ) {
		$details = new RevisionInfo( $flags, $timestamp, $baserevid, $user );

		if( !is_null( $flags ) ) {
			$this->assertEquals( $flags, $details->getFlags() );
		} else {
			$this->assertInstanceOf( '\Mediawiki\DataModel\EditFlags', $details->getFlags() );
		}
		$this->assertEquals( $timestamp, $details->getTimestamp() );
		$this->assertEquals( $user, $details->getUser() );
	}

	public function provideValidConstruction() {
		$mockFlags = $this->getMockBuilder( '\Mediawiki\DataModel\EditFlags' )
			->disableOriginalConstructor()
			->getMock();

		return array(
			array( null, null, null, null ),
			array( $mockFlags, null, null, null ),
			array( $mockFlags, '20140213222222', null, null ),
			array( $mockFlags, '20140213222222', 1, null ),
			array( $mockFlags, '20140213222222', 1, 'user' ),
			array( $mockFlags, '20140213222222', 999999999, 'user' ),
			array( null, '20140213222222', 999999999 , 'user' ),
			array( null, null, 999999999 , 'user' ),
			array( $mockFlags, null, 999999999, 'user' ),
		);
	}

} 