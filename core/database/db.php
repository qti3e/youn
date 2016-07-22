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

namespace core\database;

/**
 * Class db
 * @package core\database
 */
class db {
	private static $query = '';
	private static $driver;

	/**
	 * db constructor.
	 *
	 * @param driver $driver
	 */
	public function __construct(driver $driver){
		self::$driver = $driver;
	}

	/**
	 * @return string
	 */
	public static function clear(){
		$re = self::$query;
		self::$query = '';
		return $re;
	}

	/**
	 * @return string
	 */
	public static function getQuery() {
		return self::$query;
	}

	/**
	 * @param       $table
	 * @param array $column
	 *
	 * @return void
	 */
	public static function select($table,$column = []){
		if(empty($column)){
			$column = '*';
		}else{
			$column = implode(', ',$column);
		}
		self::$query .= 'SELECT ('.$column.') FROM '.$table;
	}

	/**
	 * @param $validator
	 *
	 * @return void
	 */
	public static function where($validator){
		self::$query .= ' WHERE ';
		if(is_array($validator)){
			$keys   = array_keys($validator);
			$count  = count($validator);
			for($i  = 0;$i < $count;$i++){
				self::$query .= self::$driver->quote($keys[$i]).'='.self::$driver->quote($validator[$keys[$i]]).' ';
			}
		}elseif(is_string($validator)){
			self::$query .= $validator;
		}
	}

	public static function whereOperator($validator,$operator){

	}

	//public static function
}