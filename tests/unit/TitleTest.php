<?php

namespace Mediawiki\DataModel\Test;

use Mediawiki\DataModel\Title;

/**
 * @covers \Mediawiki\DataModel\Title
 * @author Addshore
 */
class TitleTest extends \PHPUnit\Framework\TestCase {

	/**
	 * @dataProvider provideValidConstruction
	 */
	public function testValidConstruction( $title, $ns ) {
		$titleObj = new Title( $title, $ns );
		$this->assertEquals( $title, $titleObj->getText() );
		$this->assertEquals( $title, $titleObj->getTitle() );
		$this->assertEquals( $ns, $titleObj->getNs() );
	}

	public function provideValidConstruction() {
		return [
		[ 'fooo', 0 ],
		[ 'Foo:Bar', 15 ],
		[ 'FooBar:Bar', 9999 ],
		];
	}

	/**
	 * @dataProvider provideInvalidConstruction
	 */
	public function testInvalidConstruction( $title, $ns ) {
		$this->expectException( 'InvalidArgumentException' );
		new Title( $title, $ns );
	}

	public function provideInvalidConstruction() {
		return [
		[ [], [] ],
		[ 'foo', [] ],
		[ [], 1 ],
		[ null, 1 ],
		[ null, null ],
		[ 'foo', null ],
		];
	}

	public function testJsonRoundTrip() {
		$title = new Title( 'Foo', 19 );
		$json = $title->jsonSerialize();
		$this->assertEquals( $title, Title::jsonDeserialize( $json ) );
	}

}