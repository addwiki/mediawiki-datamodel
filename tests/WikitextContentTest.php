<?php

namespace Mediawiki\DataModel\Test;

use Mediawiki\DataModel\WikitextContent;

/**
 * @covers \Mediawiki\DataModel\WikitextContent
 */
class WikitextContentTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @dataProvider provideValidConstruction
	 */
	public function testValidConstruction( $text ) {
		$content = new WikitextContent( $text );
		$this->assertEquals( $text, $content->getText() );
		$this->assertEquals( $text, $content->getNativeData() );
	}

	public function provideValidConstruction() {
		return array(
			array( 'fooo' ),
			array( 'foo65efw32cuy32hqwic3mp9q2or54k3q2\'5vk;3qvm;9v93uqo' ),
			array( '' ),
		);
	}

} 