<?php

namespace Mediawiki\DataModel\Test;

use Mediawiki\DataModel\Revision;
use Mediawiki\DataModel\RevisionDetails;

/**
 * @covers \Mediawiki\DataModel\Revision
 */
class RevisionTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @dataProvider provideValidConstruction
	 */
	public function testValidConstruction( $content, $id, $baserev, $details ) {
		$rev = new Revision( $content, $id, $baserev, $details );
		$this->assertEquals( $content, $rev->getContent() );
		$this->assertEquals( $id, $rev->getId() );
		$this->assertEquals( $baserev, $rev->getBaseRevId() );
		$this->assertEquals( $details, $rev->getDetails() );
		$this->assertFalse( $rev->hasChanged() );
	}

	public function provideValidConstruction() {
		return array(
			array( '', 2, 1, null ),
			array( new \stdClass(), 12345, 999999, new RevisionDetails() ),
		);
	}

	public function testNewFromRevision() {
		$startRev = new Revision( 'foo', 1 );
		$newRev = Revision::newFromRevision( $startRev );
		$this->assertEquals( $startRev->getContent(), $newRev->getContent() );
		$this->assertEquals( $startRev->getId(), $newRev->getBaseRevId() );
	}

	public function testNewFromRevisionClonesObjects() {
		$startRev = new Revision( new \stdClass(), 1 );
		$newRev = Revision::newFromRevision( $startRev );

		$newRev->getContent()->foo = 'foo';

		$this->assertNotEquals( $startRev->getContent(), $newRev->getContent() );
		$this->assertEquals( $startRev->getId(), $newRev->getBaseRevId() );
	}

} 