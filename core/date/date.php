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

namespace core\date;


class date {
	/**
	 * @param $string
	 *
	 * @return int
	 */
	public static function str2time($string){
		return strtotime($string);
	}

	/**
	 * @param $date
	 * @param $new_format
	 *
	 * @return bool|string
	 */
	public static function changeFormat($date,$new_format){
		return date($new_format,strtotime($date));
	}

	/**
	 * @param $month
	 * @param $day
	 * @param $year
	 *
	 * @return bool
	 */
	public static function checkDate($month,$day = null,$year = null){
		if($day === null){
			$day    = (int)date('d');
		}
		if($year === null){
			$year   = (int)date('y');
		}
		return checkdate($month,$day,$year);
	}

	/**
	 * @param      $format
	 * @param null $date
	 *
	 * @return bool|string
	 */
	protected static function _get($format,$date = null){
		if($date   === null){
			$date  = time();
		}elseif(is_string($date)){
			$date  = static::str2time($date);
		}
		return date($format,$date);
	}

	/**
	 * @param null $date
	 *
	 * @return bool|string
	 */
	public static function getYear($date = null){
		return static::_get('y', $date);
	}

	/**
	 * @param null $date
	 *
	 * @return bool|string
	 */
	public static function getMonth($date = null){
		return static::_get('m', $date);
	}

	/**
	 * @param null $date
	 *
	 * @return bool|string
	 */
	public static function getDay($date = null){
		return static::_get('d', $date);
	}

	/**
	 * @param null $date
	 *
	 * @return bool|string
	 */
	public static function getHour($date = null){
		return static::_get('h', $date);
	}

	/**
	 * @param null $date
	 *
	 * @return bool|string
	 */
	public static function getMin($date = null){
		return static::_get('i', $date);
	}

	/**
	 * @param null $date
	 *
	 * @return bool|string
	 */
	public static function getSecond($date = null){
		return static::_get('s', $date);
	}

	/**
	 * @param null $date
	 *
	 * @return bool|string
	 */
	public static function standard($date = null){
		return static::_get('D, d M Y H:i:s',$date);
	}


}