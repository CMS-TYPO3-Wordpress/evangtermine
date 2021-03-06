<?php
namespace ArbkomEKvW\Evangtermine\Tests\Unit\Domain\Model;

/**
 * *************************************************************
 * Copyright notice
 *
 * (c) 2015 Christoph Roth <christoph.roth@lka.ekvw.de>, Evangelische Kirche von Westfalen
 *
 * All rights reserved
 *
 * This script is part of the TYPO3 project. The TYPO3 project is
 * free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 *
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the script!
 * *************************************************************
 */

/**
 * Test case for class \ArbkomEKvW\Evangtermine\Domain\Model\Eventcontainer.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Christoph Roth <christoph.roth@lka.ekvw.de>
 */
class EventcontainerTest extends \ArbkomEKvW\Evangtermine\Tests\Unit\AbkekvwTestCase {
	
	/**
	 * @var \ArbkomEKvW\Evangtermine\Domain\Model\Eventcontainer
	 */
	protected $subject = NULL;
	
	protected function setUp() {
		$this->subject = $this->objectManager->get('\ArbkomEKvW\Evangtermine\Domain\Model\EventcontainerInterface');
	}
	
	protected function tearDown() {
		unset ($this->subject);
	}
	
	/**
	 * @test
	 */
	public function setNumberOfItemsInContainer() {
		$this->subject->setNumberOfItems(5);
		$this->assertEquals(5, $this->subject->getNumberOfItems());
	}
	
	/**
	 * @test
	 */
	public function setItems() {
		$this->subject->setItems(array(1, 2, 3));
		$this->assertEquals(1, $this->subject->getItems()[0]);
	}
	
	/**
	 * @test
	 */
	public function loadEmptyStringInContainer() {
		$this->subject->setNumberOfItems(42); // must be 0 after xml input
		$this->subject->loadXML('');
		$this->assertEquals(0, $this->subject->getNumberOfItems());
		$this->assertEquals(Null, $this->subject->getMetaData());
	}
	
	/**
	 * @test
	 */
	public function loadXmlInContainer() {
		// load five test events from disk
		$testXml = \ArbkomEKvW\Evangtermine\Tests\TestXmlData::getTestXmlFive();
		$this->subject->loadXML($testXml);
		$this->assertEquals(5, $this->subject->getNumberOfItems());
		$this->assertEquals('Gottesdienste', $this->subject->getMetaData()->eventtypes->eventtype[0]);
	}
	
	/**
	 * @test
	 */
	public function loadEmptyXmlInContainer() {
		$testXml = \ArbkomEKvW\Evangtermine\Tests\TestXmlData::getTestXmlEmpty();
		$this->subject->loadXML($testXml);
		$this->assertEquals(0, $this->subject->getNumberOfItems());
		$this->assertEquals(array(), $this->subject->getItems());
		$this->assertEquals('Gottesdienste', $this->subject->getMetaData()->eventtypes->eventtype[0]);
	}
}