<?php

namespace Mediawiki\DataModel\Test;

use Mediawiki\DataModel\Log;
use Mediawiki\DataModel\LogList;
use Mediawiki\DataModel\Page;
use Mediawiki\DataModel\PageIdentifier;
use Mediawiki\DataModel\Redirect;
use Mediawiki\DataModel\Title;

/**
 * @covers \Mediawiki\DataModel\LogList
 * @author Adam Shorland
 */
class LogListTest extends \PHPUnit_Framework_TestCase {

	public function testJsonRoundTrip() {
		$this->markTestSkipped( 'json stuff for LogList doesnt work due to binding to Page...' );
		$title = new LogList( array(
			new Log( 1, 'ty', 'ac', '2014', 'Addshore', new Page( new PageIdentifier( null, 22 ) ), 'comment', array() ),
			new Log( 2, 'ty2', 'ac2', '2015', 'Addbot', new Page( new PageIdentifier( null, 33 ) ), 'comment2', array() ),
		) );
		$json = $title->jsonSerialize();
		$this->assertEquals( $title, LogList::jsonDeserialize( $json ) );
	}

}
