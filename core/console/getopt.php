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
 * Class getopt
 * @package core\console
 */
class getopt {
	/**
	 * @var array
	 */
	protected $opts     = [];
	/**
	 * @var array
	 */
	protected $default  = [];

	/**
	 * getopt constructor.
	 *
	 * @param $string
	 */
	public function __construct($string){
		$this->opts = static::parse($string);
	}

	/**
	 * @param array $default
	 *
	 * @return array
	 */
	public function setDefaults(array $default){
		$last   = $this->default;
		$this->default  = $default;
		return $last;
	}

	/**
	 * @param      $name
	 * @param null $value
	 *
	 * @return null
	 *
	 */
	public function def($name,$value = null){
		if($value === null){
			if(isset($this->default[$name])){
				return $this->default[$name];
			}
			return null;
		}
		$last   = $this->def($name);
		$this->default[$name]   = $value;
		return $last;
	}

	/**
	 * @param $input
	 *
	 * @return array
	 */
	public static function parse($input){
		$input  = trim($input);
		$input  = str_replace('=',' ',$input);
		/**
		 * @link http://stackoverflow.com/a/2202489/6126002
		 */
		preg_match_all('/"(?:\\\\.|[^\\\\"])*"|\S+/', $input, $matches);
		$matches    = $matches[0];
		$count      = count($matches);
		$return     = [''];
		$b          = false;
		for($i  = 0;$i < $count;$i++){
			$case   = $matches[$i];
			$m      = $i+1;
			$value  = false;
			if(isset($matches[$m])){
				if($matches[$m][0] !== '-'){
					$value  = $matches[$m];
					if($matches[$m][0] == '"'){
						$value  = substr($value,1,-1);
						$value  = str_replace('\n',"\n",$value);
						$value  = str_replace('\"',"\"",$value);
						$value  = str_replace('\\\\',"\\",$value);
					}
				}
			}
			if($b){
				if(substr($case,0,2) == '--'){
					$return[substr($case,2)]    = $value;
				}elseif(substr($case,0,1) == '-'){
					$return[substr($case,1)]    = $value;
				}
			}else{
				if(substr($case,0,2) == '--'){
					$return[substr($case,2)]    = $value;
					$b                          = true;
				}elseif(substr($case,0,1) == '-'){
					$return[substr($case,1)]    = $value;
					$b                          = true;
				}else{
					$return[0]                 .= ' '.$case;
				}
			}
		}
		$return[0]  = trim($return[0]);
		return $return;
	}

	/**
	 * @return mixed
	 */
	public function getSubCommand(){
		return $this->opts[0];
	}

	/**
	 * @param $name
	 *
	 * @return null
	 */
	public function __get($name) {
		if(isset($this->opts[$name])){
			return $this->opts[$name];
		}
		return $this->def($name);
	}

	/**
	 * @param $name
	 *
	 * @return bool
	 */
	public function __isset($name) {
		return isset($this->opts[$name]);
	}

	/**
	 * @param $name
	 * @param $value
	 *
	 * @return mixed
	 */
	public function __set($name, $value) {
		return $this->opts[$name]   = $value;
	}
}