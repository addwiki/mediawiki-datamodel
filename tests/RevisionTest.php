<?php

namespace Mediawiki\DataModel\Test;

use Mediawiki\DataModel\Revision;
use Mediawiki\DataModel\RevisionInfo;

/**
 * @covers \Mediawiki\DataModel\Revision
 */
class RevisionTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @dataProvider provideValidConstruction
	 */
	public function testValidConstruction( $content, $id, $details ) {
		$rev = new Revision( $content, $id, $details );
		$this->assertEquals( $content, $rev->getContent() );
		$this->assertEquals( $id, $rev->getId() );
		if( !is_null( $details ) ) {
			$this->assertEquals( $details, $rev->getInfo() );
		} else {
			$this->assertInstanceOf( '\Mediawiki\DataModel\RevisionInfo', $rev->getInfo() );
		}
		$this->assertFalse( $rev->hasChanged() );
	}

	public function provideValidConstruction() {
		return array(
			array( '', 2 , null ),
			array( new \stdClass(), 12345, new RevisionInfo() ),
		);
	}

	public function testNewFromRevision() {
		$startRev = new Revision( 'foo', 1 );
		$newRev = Revision::newFromRevision( $startRev );
		$this->assertEquals( $startRev->getContent(), $newRev->getContent() );
		$this->assertEquals( $startRev->getId(), $newRev->getInfo()->getBaseRevId() );
	}

	public function testNewFromRevisionClonesObjects() {
		$startRev = new Revision( new \stdClass(), 1 );
		$newRev = Revision::newFromRevision( $startRev );

		$newRev->getContent()->foo = 'foo';

		$this->assertNotEquals( $startRev->getContent(), $newRev->getContent() );
		$this->assertEquals( $startRev->getId(), $newRev->getInfo()->getBaseRevId() );
	}

} 