<?php

namespace Mediawiki\DataModel\Test;

use Mediawiki\DataModel\WikitextContent;

/**
 * @covers \Mediawiki\DataModel\WikitextContent
 * @author Adam Shorland
 */
class WikitextContentTest extends \PHPUnit_Framework_TestCase {

	public function provideValidTexts() {
		return array(
			array( 'fooo' ),
			array( 'foo65efw32cuy32hqwic3mp9q2or54k3q2\'5vk;3qvm;9v93uqo' ),
			array( '' ),
		);
	}

	public function provideInvalidTexts() {
		return array(
			array( 1234 ),
			array( array() ),
			array( null ),
			array( new \stdClass() ),
		);
	}

	/**
	 * @dataProvider provideValidTexts
	 */
	public function testValidConstruction( $text ) {
		$content = new WikitextContent( $text );
		$this->assertEquals( $text, $content->getText() );
		$this->assertEquals( $text, $content->getNativeData() );
	}

	/**
	 * @dataProvider provideInvalidTexts
	 */
	public function testInvalidConstruction( $text ) {
		$this->setExpectedException( 'InvalidArgumentException' );
		new WikitextContent( $text );
	}

	/**
	 * @dataProvider provideValidTexts
	 */
	public function testValidSetText( $text ) {
		$content = new WikitextContent( '' );
		$content->setText( $text );
		$this->assertEquals( $text, $content->getText() );
	}

	/**
	 * @dataProvider provideInvalidTexts
	 */
	public function testInvalidSetText( $text ) {
		$content = new WikitextContent( '' );
		$this->setExpectedException( 'InvalidArgumentException' );
		$content->setText( $text );
	}

	public function testGetHash() {
		$string = 'afsjhqhyrhq8j9wioaffq';
		$content = new WikitextContent( $string );
		$this->assertEquals( sha1( $string ), $content->getHash() );
	}

} 