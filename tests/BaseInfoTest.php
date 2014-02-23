<?php

namespace Mediawiki\DataModel\Test;

use Mediawiki\DataModel\BaseInfo;

/**
 * @covers \Mediawiki\DataModel\BaseInfo
 */
class BaseInfoTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @dataProvider provideValidConstruction
	 */
	public function testValidConstruction( $id, $timestamp ) {
		$baseInfo = new BaseInfo( $id, $timestamp );
		$this->assertEquals( $id, $baseInfo->getRevid() );
		$this->assertEquals( $timestamp, $baseInfo->getTimestamp() );
	}

	public function provideValidConstruction() {
		return array(
			array( null, null ),
			array( 1, null ),
			array( null, '20141212111111', ),
			array( 1, '20141212111111' ),
			array( 999, '20141212111111' ),
		);
	}

} 