<?php

namespace Mediawiki\DataModel\Test;

use Mediawiki\DataModel\Title;

/**
 * @covers \Mediawiki\DataModel\Title
 */
class TitleTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @dataProvider provideValidConstruction
	 */
	public function testValidConstruction( $title, $ns ) {
		$titleObj = new Title( $title, $ns );
		$this->assertEquals( $title, $titleObj->getTitle() );
		$this->assertEquals( $ns, $titleObj->getNs() );
	}

	public function provideValidConstruction() {
		return array(
			array( 'fooo', 0 ),
			array( 'Foo:Bar', 15 ),
			array( 'FooBar:Bar', 9999 ),
		);
	}

} 