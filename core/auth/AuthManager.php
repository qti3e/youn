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

namespace core\auth;

use core\session\SessionManager;

/**
 * Class AuthManager
 * @package core\auth
 */
class AuthManager {
	/**
	 * @var bool
	 */
	protected static $login     = null;
	/**
	 * @var null
	 */
	protected static $username  = null;

	/**
	 * @return bool
	 */
	public static function isLogin() {
		if(static::$login === null){
			static::$login  = (SessionManager::get('youn_auth_is_login') === 'true');
			if(static::$login){
				static::$username   = SessionManager::get('youn_auth_login');
			}
		}
		return static::$login;
	}

	/**
	 * @param $validator
	 * @param $checker
	 *
	 * @return void
	 */
	public static function login($validator,$checker){

	}

	/**
	 * @return void
	 */
	public static function logout(){

	}

	/**
	 * @return null
	 */
	public static function getUsername(){
		return static::$username;
	}

	/**
	 * @return void
	 */
	public static function createResetPasswordId(){

	}

	/**
	 * @param $resetId
	 * @param $oldPassword
	 * @param $newPassword
	 *
	 * @return void
	 */
	public static function resetPassword($resetId,$oldPassword,$newPassword){

	}

	/**
	 * @param $resetId
	 *
	 * @return void
	 */
	public static function isResetPasswordValid($resetId){

	}
}