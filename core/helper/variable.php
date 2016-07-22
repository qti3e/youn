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

namespace core\helper;

/**
 * Class variable
 * @package core\helper
 */
class variable {
	public static function substr($input,$start,$len = 0){
		if(is_string($input)){
			return substr($input,$start,$len);
		}elseif(is_array($input)){
			if($len == 0){
				return [];
			}
			$count  = count($input);
			if($start < 0){
				$start = $start + $count;
			}
			if($len < 0){
				$end = $count + $len;
			}else{
				$end    = $start + $len;
			}
			if($end > $count){
				$end = $count;
			}
			if($start >= $count){
				return [];
			}
			$ret    = [];
			$keys   = array_keys($input);
			for($i  = $start;$i < $end;$i++){
				$ret[$keys[$i]] = $input[$keys[$i]];
			}
			return $ret;
		}
		return false;
	}
}