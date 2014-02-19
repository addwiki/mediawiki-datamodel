<?php

namespace Mediawiki\DataModel\Test;

use Mediawiki\DataModel\EditFlags;
use PHPUnit_Framework_TestCase;

/**
 * @covers \Mediawiki\DataModel\EditFlags
 */
class EditFlagsTest extends PHPUnit_Framework_TestCase {

	/**
	 * @dataProvider provideValidConstruction
	 */
	public function testValidConstruction( $sum, $minor, $bot ) {
		$flags = new EditFlags( $sum, $minor, $bot );
		$this->assertEquals( $sum, $flags->getSummary() );
		$this->assertEquals( $minor, $flags->getMinor() );
		$this->assertEquals( $bot, $flags->getBot() );
	}

	public function provideValidConstruction() {
		return array(
			array( '', EditFlags::MINOR, EditFlags::BOT ),
			array( '', EditFlags::MINOR, EditFlags::NOTBOT ),
			array( '', EditFlags::NOTMINOR, EditFlags::BOT ),
			array( '', EditFlags::NOTMINOR, EditFlags::NOTBOT ),
			array( 'FOO', EditFlags::NOTMINOR, EditFlags::NOTBOT ),
		);
	}

	/**
	 * @dataProvider provideInvalidConstruction
	 */
	public function testInvalidConstruction( $sum, $minor, $bot ) {
		$this->setExpectedException( 'InvalidArgumentException' );
		new EditFlags( $sum, $minor, $bot );
	}

	public function provideInvalidConstruction() {
		return array(
			array( 1, 2, 3 ),
			array( "foo", false, 3 ),
			array( "foo", 3, false ),
			array( array(), true, false ),
		);
	}

} 