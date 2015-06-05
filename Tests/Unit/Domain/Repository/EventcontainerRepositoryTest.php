<?php
namespace ArbkomEKvW\Evangtermine\Tests\Unit\Domain\Repository;

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
 * Test case for class \ArbkomEKvW\Evangtermine\Domain\Repository\EventcontainerRepository.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *         
 * @author Christoph Roth <christoph.roth@lka.ekvw.de>
 */
class EventcontainerRepositoryTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 *
	 * @var \ArbkomEKvW\Evangtermine\Domain\Repository\EventcontainerRepository
	 */
	protected $subject = NULL;
	
	protected function setUp() {
		// need mock of \TYPO3\CMS\Extbase\Object\ObjectManagerInterface
		$objectManager = $this->getMock ('\TYPO3\CMS\Extbase\Object\ObjectManagerInterface');
		$this->subject = new \ArbkomEKvW\Evangtermine\Domain\Repository\EventcontainerRepository($objectManager);
	}
	
	protected function tearDown() {
		unset ( $this->subject );
	}
	
	/**
	 * @test
	 */
	public function hasSourceUrl() {
		$this->assertEquals ( 
				'http://www.veranstaltungen-ekvw.de/Veranstalter/xml.php',
				$this->subject->getXmlSourceUrl());
	}
	
}