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
class Eventcontainer extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
	
	/**
	 * itemsInResult 
	 *
	 * @var integer
	 */
	protected $itemsInResult = 0;
	
	/**
	 * items
	 *
	 * @var array
	 */
	protected $items = array();
	
	/**
	 * returns number of items in result
	 * 
	 * @return integer $itemsInResult
	 */
	public function getItemsInResult() {
		return $this->itemsInResult;
	}
	
	/**
	 * sets the number of items in result
	 * @param integer $itemsInResult
	 * @return void
	 */
	public function setItemsInResult($itemsInResult) {
		$this->itemsInResult = $itemsInResult;
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
	
	
}