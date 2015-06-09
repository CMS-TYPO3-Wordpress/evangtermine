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
 * EtKeys: Collection of key-value-pairs for requesting events
 */
class EtKeys extends \TYPO3\CMS\Extbase\DomainObject\AbstractValueObject {
	
	private $keysArray;
	
	/**
	 * Set a single key-value pair
	 * @param string $key
	 * @param string $value
	 */
	public function setSingleKey($key, $value) {
		$this->keysArray[$key] = $value;
	}
	
	/**
	 * Set keys array at once
	 * @param array $allKeysArray
	 */
	public function setAllKeys($allKeysArray) {
		$this->keysArray = $allKeysArray;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \TYPO3\CMS\Extbase\DomainObject\AbstractDomainObject::__toString()
	 * @return string
	 */
	public function __toString() {
		return http_build_query($this->keysArray);
	}
	
}