<?php

namespace Mediawiki\DataModel\Test;

use Mediawiki\DataModel\PageIdentifier;
use Mediawiki\DataModel\Title;

/**
 * @covers Mediawiki\DataModel\PageIdentifier
 */
class PageIdentifierTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @dataProvider provideValidConstruction
	 */
	public function testValidConstruction( $title, $pageid ) {
		$pageIdentifier = new PageIdentifier( $title, $pageid );
		if( is_string( $title ) ) {
			$this->assertEquals( new Title( $title ), $pageIdentifier->getTitle() );
		} else {
			$this->assertEquals( $title, $pageIdentifier->getTitle() );
		}
		$this->assertEquals( $pageid, $pageIdentifier->getId() );
	}

	public function provideValidConstruction() {
		return array(
			array( null, null ),
			array( new Title( 'Foo' ), null ),
			array( new Title( 'Foo', 2 ), null ),
			array( null, 3 ),
		);
	}

}
 