<?php

namespace Mediawiki\DataModel\Test;

use Mediawiki\DataModel\Revision;
use Mediawiki\DataModel\Revisions;

/**
 * @covers \Mediawiki\DataModel\Revisions
 */
class RevisionsTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @dataProvider provideValidConstruction
	 */
	public function testValidConstruction( $input, $expected ) {
		$revisions = new Revisions( $input );
		$this->assertEquals( $expected, $revisions->toArray() );
	}

	public function provideValidConstruction() {
		//todo mock these
		$rev1 = new Revision( '1', 1 );
		$rev2 = new Revision( '2', 2 );
		$rev4 = new Revision( '4', 4 );

		return array(
			array( array( $rev1 ), array( 1 => $rev1 ) ),
			array( array( $rev2, $rev1 ), array( 1 => $rev1, 2 => $rev2 ) ),
			array( array( $rev4, $rev1 ), array( 1 => $rev1, 4 => $rev4 ) ),
			array( new Revisions( array( $rev4, $rev1 ) ), array( 1 => $rev1, 4 => $rev4 ) ),
		);
	}

} 