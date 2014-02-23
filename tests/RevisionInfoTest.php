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
	public function testValidConstruction( $flags, $baseInfo, $user ) {
		$details = new RevisionInfo( $flags, $baseInfo, $user );

		if( !is_null( $flags ) ) {
			$this->assertEquals( $flags, $details->getFlags() );
		} else {
			$this->assertInstanceOf( '\Mediawiki\DataModel\EditFlags', $details->getFlags() );
		}
		if( !is_null( $baseInfo ) ) {
			$this->assertEquals( $baseInfo, $details->getBaseInfo() );
		} else {
			$this->assertInstanceOf( '\Mediawiki\DataModel\BaseInfo', $details->getBaseInfo() );
		}
		$this->assertEquals( $user, $details->getUser() );
	}

	public function provideValidConstruction() {
		$mockFlags = $this->getMockBuilder( '\Mediawiki\DataModel\EditFlags' )
			->disableOriginalConstructor()
			->getMock();
		$mockBaseInfo = $this->getMockBuilder( '\Mediawiki\DataModel\BaseInfo' )
			->disableOriginalConstructor()
			->getMock();

		return array(
			array( null, null, null ),
			array( $mockFlags, null, null ),
			array( $mockFlags, $mockBaseInfo, null ),
			array( $mockFlags, $mockBaseInfo, 'user' ),
			array( null, $mockBaseInfo, 'user' ),
			array( $mockFlags, null, 'user' ),
			array( null, null, 'user' ),
		);
	}

} 