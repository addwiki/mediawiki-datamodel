<?php

namespace Mediawiki\DataModel\Test;

use Mediawiki\DataModel\NamespaceInfo;

/**
 * @covers \Mediawiki\DataModel\NamespaceInfo
 * @author gbirke
 */
class NamespaceInfoTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider provideValidConstruction
	 * @param int $id
	 * @param string $canonicalName
	 * @param string $localName
	 * @param string $caseHandling
	 * @param null $defaultContentModel
	 */
	public function testValidConstruction($id, $canonicalName, $localName, $caseHandling, $defaultContentModel = null ) {
		$namespace = new NamespaceInfo( $id, $canonicalName, $localName, $caseHandling, $defaultContentModel );
		$this->assertSame( $id, $namespace->getId() );
		$this->assertSame( $canonicalName, $namespace->getCanonicalName() );
		$this->assertSame( $localName, $namespace->getLocalName() );
		$this->assertSame( $caseHandling, $namespace->getCaseHandling() );
		$this->assertSame( $defaultContentModel, $namespace->getDefaultContentModel() );
	}

	public function provideValidConstruction() {
		return array(
			array( -2, 'Media', 'Media', 'first-letter' ),
			array( 0, '', '', 'first-letter' ),
			array( 4, 'Project', 'Wikipedia', 'first-letter' ),
			array( 2302, 'Gadget definition', 'Gadget definition', 'case-sensitive', 'GadgetDefinition' ),
		);
	}

	/**
	 * @param $id
	 * @param $canonicalName
	 * @param $localName
	 * @param $caseHandling
	 * @param null $defaultContentModel
	 *
	 * @dataProvider provideInvalidConstruction
	 */
	public function testInvalidConstruction($id, $canonicalName, $localName, $caseHandling, $defaultContentModel = null ) {
		$this->setExpectedException( 'InvalidArgumentException' );
		new NamespaceInfo( $id, $canonicalName, $localName, $caseHandling, $defaultContentModel );
	}

	public function provideInvalidConstruction() {
		return array(
			array( .5, 'Media', 'Media', 'first-letter' ),
			array( '0', '', '', 'first-letter' ),
			array( -2, null, 'Media', 'first-letter' ),
			array( -2, 'Media', null, 'first-letter' ),
			array( 4, 'Project', 'Wikipedia', 'first-letter', 5 ),
			array( 2302, null, 'Gadget definition', 'case-sensitive', 'GadgetDefinition' ),
			array( 4, 'Project', 'Wikipedia', 'first-letter', 5 ),
		);
	}

}
