<?php
namespace ArbkomEKvW\Evangtermine\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Christoph Roth <christoph.roth@lka.ekvw.de>, Evangelische Kirche von Westfalen
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Eventcontainer
 */
class Eventcontainer extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity implements \ArbkomEKvW\Evangtermine\Domain\Model\EventcontainerInterface {
	
	/**
	 * itemsInResult 
	 *
	 * @var integer
	 */
	private $numberOfItems = 0;
	
	/**
	 * items array of SimpleXML objects
	 *
	 * @var array
	 */
	private $items = array();
	
	/**
	 * content of the <meta> tag in XML result 
	 * @var \SimpleXMLElement
	 */
	private $metaData = NULL;
	
	/**
	 * detail-tag, only present in single view
	 * @var array
	 */
	private $detail = NULL;
	
	/**
	 * returns number of items in container
	 * 
	 * @return integer
	 */
	public function getNumberOfItems() {
		return $this->numberOfItems;
	}
	
	/**
	 * sets the number of items in result
	 * @param integer 
	 * @return void
	 */
	public function setNumberOfItems($numItems) {
		$this->numberOfItems = $numItems;
	}
	
	/**
	 * returns items array
	 * @return array $items
	 */
	public function getItems() {
		return $this->items;
	}
	
	/**
	 * sets items array
	 * 
	 * @param array $items
	 * @return void
	 */
	public function setItems(array $items) {
		$this->items = $items;
	}
	

	public function getMetaData() {
		return $this->metaData;
	}
	
	public function setMetaData($metaData) {
		$this->metaData = $metaData;
	}
	
	public function setDetail($detail) {
		$this->detail = $detail;
	}
	
	public function getDetail() {
		return $this->detail;
	}
	
	/**
	 * transform XML into array and load item attributes
	 * @param string $xmlString
	 * @return void
	 */
	public function loadXML($xmlString) {
		
		$xmlString = trim($xmlString);
		
		if (!$xmlString || substr($xmlString, 0, 5) != '<?xml') {
			$this->reset();
		} else {
			try {
				$xmlSimple = new \SimpleXMLElement($xmlString);
			} catch (\Exception $e) {
				$this->reset();
				return;
			}
			
			// extract event data
			$this->setItems($xmlSimple->xpath('//Veranstaltung'));
			$this->setNumberOfItems(count($this->getItems()));
			
			// extract meta data
			$this->setMetaData($xmlSimple->Export->meta);
			
			// extract detail
			$this->setDetail($xmlSimple->Export->detail->item);
		}
		
	}
	
	/**
	 * set values to empty
	 */
	private function reset() {
		$this->setNumberOfItems(0);
		$this->setItems(array());
		$this->setMetaData(NULL);
	}
	
	
	
}