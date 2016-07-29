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

namespace core\forms;

use core\exception\youn_exception;
use core\validate\validatorInterface;

/**
 * Class data
 * @package core\forms
 */
class data {
	/**
	 * @param                         $name
	 * @param validatorInterface|null $validator
	 *
	 * @return bool
	 */
	public static function get($name,validatorInterface $validator = null){
		if(isset($_GET[$name])){
			if($validator !== null){
				if(!$validator->is_valid($_GET[$name])){
					return false;
				}
			}
			return $_GET[$name];
		}
		return false;
	}

	/**
	 * @param                         $name
	 * @param validatorInterface|null $validator
	 *
	 * @return bool
	 */
	public static function post($name,validatorInterface $validator = null){
		if(isset($_POST[$name])){
			if($validator !== null){
				if(!$validator->is_valid($_POST[$name])){
					return false;
				}
			}
			return $_GET[$name];
		}
		return false;
	}

	/**
	 * @param                         $name
	 * @param validatorInterface|null $validator
	 *
	 * @return void
	 */
	public static function file($name,validatorInterface $validator = null){
//todo write it
	}

	/**
	 * @param array     $data
	 * @param callable  $function
	 *
	 * @return array
	 * @throws youn_exception
	 */
	protected static function _loop($data,$function){
		if(!is_callable($function)){
			throw new youn_exception('','Second parameter of loop function must be callable.');
		}
		$keys   = array_keys($data);
		$count  = count($data);
		for($i  = 0;$i < $count;$i++){
			$data[$keys[$i]]    = $function($keys[$i],$data[$keys[$i]]);
		}
		return $data;
	}

	/**
	 * @return array
	 */
	public static function getKeys(){
		return array_keys($_GET);
	}

	/**
	 * @param $function
	 *
	 * @return array
	 * @throws youn_exception
	 */
	public static function getLoop($function){
		return static::_loop($_GET,$function);
	}

	/**
	 * @return array
	 */
	public static function postKey(){
		return array_keys($_POST);
	}

	/**
	 * @param $function
	 *
	 * @return array
	 * @throws youn_exception
	 */
	public static function postLoop($function){
		return static::_loop($_POST,$function);
	}
}