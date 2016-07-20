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

namespace core\exception;


use core\controller\controller;

/**
 * Class error_handler
 * @package core\exception
 */
class error_handler {
	/**
	 * @param $no
	 * @param $str
	 * @param $file
	 * @param $line
	 *
	 * @return void
	 */
	public static function handler($no,$str,$file,$line){
		controller::clean();
		$lines = file($file);
		echo '###@'.$lines[$line-1].$file.':'.$line."\n$str";
		exit();
	}

	/**
	 * @return void
	 */
	public static function shutDown(){
		$error  = error_get_last();
		if($error !== null){
			$no     = $error['type'];
			$str    = $error['message'];
			$file   = $error['file'];
			$line   = $error['line'];
			self::handler($no,$str,$file,$line);
		}
	}
}