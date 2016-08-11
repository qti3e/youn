<?php
/*****************************************************************************
 *         In the name of God the Most Beneficent the Most Merciful          *
 *___________________________________________________________________________*
 *   This program is free software: you can redistribute it and/or modify    *
 *   it under the terms of the GNU General Public License as published by    *
 *   the Free Software Foundation, either version 3 of the License, or       *
 *   (at your option) any later version.                                     *
 *___________________________________________________________________________*
 *   This program is distributed in the hope that it will be useful,         *
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of          *
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the           *
 *   GNU General Public License for more details.                            *
 *___________________________________________________________________________*
 *   You should have received a copy of the GNU General Public License       *
 *   along with this program.  If not, see <http://www.gnu.org/licenses/>.   *
 *___________________________________________________________________________*
 *                             Created by  Qti3e                             *
 *        <http://Qti3e.Github.io>    LO-VE    <Qti3eQti3e@Gmail.com>        *
 *****************************************************************************/

namespace core\console;

/**
 * Class help
 * Simple helper class for making more beautiful help pages.
 * @package core\console
 */
class help{
	/**
	 * @var string
	 */
	protected $title    =   '';
	/**
	 * @var string
	 */
	protected $des      =   '';
	/**
	 * @var string
	 */
	protected $usage    =   '';
	/**
	 * @var array
	 */
	protected $switches =   [];

	/**
	 * Set page title
	 * @param $name
	 *
	 * @return $this
	 */
	public function title($name){
		$this->title    = $name;
		return $this;
	}

	/**
	 * Set a short description for help page
	 * @param $des
	 *
	 * @return $this
	 */
	public function description($des){
		$this->des      = $des;
		return $this;
	}

	/**
	 * Set a one line usage description like:
	 *  command -a "value" -b
	 * @param $usage
	 *
	 * @return $this
	 */
	public function usage($usage){
		$this->usage    = $usage;
		return $this;
	}

	/**
	 * @param $name
	 * @param $description
	 *
	 * @return $this
	 */
	public function addSwitch($name,$description){
		$this->switches[$name]  = $description;
		return $this;
	}

	/**
	 * @param $name
	 *
	 * @return bool
	 */
	public function rmSwitch($name){
		if(isset($this->switches[$name])){
			$last   =   $this->switches[$name];
			unset($this->switches[$name]);
			return $last;
		}
		return false;
	}

	/**
	 * @return string
	 */
	public function __toString() {
		return '';
	}
}