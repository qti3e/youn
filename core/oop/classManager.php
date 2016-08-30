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

namespace core\oop;
use ReflectionClass;

/**
 * Class classManager
 * @package core\oop
 */
class classManager {
	/**
	 * @param $className
	 *
	 * @return bool
	 */
	public static function isInternal($className){
		if(!class_exists($className)){
			return false;
		}
		$class  = new ReflectionClass($className);
		return $class->isInternal();
	}

	/**
	 * @param $className
	 *
	 * @return bool
	 */
	public static function isUserDefined($className){
		if(!class_exists($className)){
			return false;
		}
		$class  = new ReflectionClass($className);
		return $class->isUserDefined();
	}

	/**
	 * @param $className
	 *
	 * @return array|bool
	 */
	public static function getLocation($className){
		if(!class_exists($className)){
			return false;
		}
		$class  = new ReflectionClass($className);
		return [
			'file'  => $class->getFileName(),
			'start' => $class->getStartLine(),
			'end'   => $class->getEndLine()
		];
	}

	/**
	 * @param $className
	 *
	 * @return bool|string
	 */
	public static function getDoc($className){
		if(!class_exists($className)){
			return false;
		}
		$class  = new ReflectionClass($className);
		return $class->getDocComment();
	}

	/**
	 * @param $className
	 *
	 * @return array|bool
	 */
	public static function getConstants($className){
		if(!class_exists($className)){
			return false;
		}
		$class  = new ReflectionClass($className);
		return $class->getConstants();
	}

	/**
	 * @param $className
	 * @param $name
	 *
	 * @return bool|mixed
	 */
	public static function getConstant($className,$name){
		if(!class_exists($className)){
			return false;
		}
		$class  = new ReflectionClass($className);
		if(!$class->hasConstant($name)){
			return false;
		}
		return $class->getConstant($name);
	}
}