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

use core\exception\youn_exception;

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
	 * @param $string
	 *
	 * @return string
	 */
	protected static function real_escape_string($string){
		return addcslashes($string,"\x00\n\r\\'\"\x1a");
	}

	/**
	 * @param $comparison
	 *
	 * @return int
	 */
	protected static function validateComparison($comparison){
		return preg_match('/^[=!<>]{1,2}$/',$comparison);
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
	public static function where($validator = []){
		self::$query .= ' WHERE ';
		if(is_array($validator)){
			$keys   = array_keys($validator);
			$count  = count($validator);
			for($i  = 0;$i < $count;$i++){
				self::$query .= '\''.
					self::real_escape_string($keys[$i]).
					'\'=\''
					.self::real_escape_string($validator[$keys[$i]]).'\' ';
			}
		}elseif(is_string($validator)){
			self::$query .= $validator;
		}
	}

	/**
	 * @param $validator
	 * @param $comparison
	 *
	 * @return void
	 * @throws youn_exception
	 */
	public static function whereComparison($validator,$comparison){
		if(is_array($validator)){
			$keys   = array_keys($validator);
			$count  = count($validator);
			for($i  = 0;$i < $count;$i++){
				self::$query .= '\''.
					self::real_escape_string($keys[$i]).
					'\''.$comparison.'\''
					.self::real_escape_string($validator[$keys[$i]]).'\' ';
			}
		}elseif(is_string($validator)){
			self::$query .= $validator;
		}
	}

	/**
	 * @param $table
	 * @param $values
	 *
	 * @return void
	 */
	public static function insert($table,$values){
		$columns    = array_keys($values);
		$count      = count($values);
		self::$query .= 'INSERT INTO '.self::real_escape_string($table).'('
			.implode(', ',$columns).')VALUES (';
		for($i = 0;$i < $count;$i++){
			self::$query .= "'".self::real_escape_string($values[$columns[$i]])."', ";
		}
		self::$query = rtrim(self::$query,', ');
		self::$query .= ');';
	}

	/**
	 * @param $table
	 * @param $data
	 *
	 * @return void
	 */
	public static function update($table,$data){
		$columns    = array_keys($data);
		$count      = count($data);
		self::$query .= "UPDATE ".self::real_escape_string($table)." SET ";
		for($i = 0;$i < $count;$i++){
			self::$query .= "'".self::real_escape_string($columns[$i])."' = '".self::real_escape_string($data[$columns[$i]])."', ";
		}
		self::$query = rtrim(self::$query,', ');
	}

	/**
	 * @param       $table
	 * @param array $conditions
	 *
	 * @return void
	 */
	public static function delete($table,$conditions = []){
		self::$query .= "DELETE FROM ".self::real_escape_string($table);
		if($conditions !== []){
			self::where($conditions);
		}
	}

	/**
	 * @param        $column
	 * @param string $order
	 *
	 * @return void
	 */
	public static function order($column,$order = 'ASC'){
		self::$query .= ' ORDER BY "'.self::real_escape_string($column).'" '.($order == 'ASC' ? 'ASC' : 'DESC');
	}

	/**
	 * @param        $column
	 * @param string $order
	 *
	 * @return void
	 */
	public static function multiOrder($column,$order = 'ASC'){
		self::$query .= ', "'.self::real_escape_string($column).'" '.($order == 'ASC' ? 'ASC' : 'DESC');
	}
}