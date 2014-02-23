<?php

namespace Mediawiki\DataModel\Test;

use Mediawiki\DataModel\RevisionDetails;

/**
 * @covers \Mediawiki\DataModel\RevisionDetails
 */
class RevisionDetailsTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @dataProvider provideValidConstruction
	 */
	public function testValidConstruction( $flags, $timestamp, $user ) {
		$details = new RevisionDetails( $flags, $timestamp, $user );
		$this->assertEquals( $flags, $details->getFlags() );
		$this->assertEquals( $timestamp, $details->getTimestamp() );
		$this->assertEquals( $user, $details->getUser() );
	}

	public function provideValidConstruction() {
		$mockFlags = $this->getMockBuilder( '\Mediawiki\DataModel\EditFlags' )
			->disableOriginalConstructor()
			->getMock();

		return array(
			array( null, null, null ),
			array( $mockFlags, null, null ),
			array( $mockFlags, '20140213222222', null ),
			array( $mockFlags, '20140213222222', 1 ),
			array( $mockFlags, '20140213222222', 999999999 ),
			array( null, '20140213222222', 999999999 ),
			array( null, null, 999999999 ),
			array( $mockFlags, null, 999999999 ),
		);
	}

} 