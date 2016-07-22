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

namespace core\database\drivers;

use core\database\driver;

/**
 * Class mysqli
 * @package core\database\drivers
 */
class mysqli_driver implements driver{
	/**
	 * @var \mysqli
	 */
	protected $object;
	/**
	 * @var bool
	 */
	private $error = false;
	/**
	 * @var
	 */
	private $errorDetail;
	/**
	 * @var \mysqli_stmt
	 */
	private $prepare;

	public function __construct() {
		$this->object   =   new \mysqli(db_host,db_user,db_pass,db_name,db_port);
		if(mysqli_connect_errno()){
			$this->error = true;
			$this->errorDetail = mysqli_connect_error();
		}
	}

	/**
	 * @return void
	 */
	public function close() {
		$this->object->close();
	}

	/**
	 * @return \mysqli
	 */
	public function getObject() {
		return $this->object;
	}

	/**
	 * @return string
	 */
	public function getErrorDetail() {
		return $this->errorDetail;
	}

	/**
	 * @return bool
	 */
	public function isError() {
		return $this->error;
	}

	/**
	 * @param $query
	 *
	 * @return bool|\mysqli_result
	 */
	public function query($query){
		return $this->object->query($query);
	}

	/**
	 * @param $query
	 *
	 * @return \mysqli_stmt
	 */
	public function prepare($query){
		$this->prepare = $this->object->prepare($query);
		return $this->prepare;
	}

	/**
	 * @param        $params
	 * @param string $type
	 *
	 * @return void
	 */
	public function bind_param($params,$type = '') {
		if($this->prepare == null){

		}
		if($type === ''){
			$type   = str_repeat('s',count($params));
		}
		$this->prepare->bind_param($type,$params);
	}

	/**
	 * @return bool
	 */
	public function execute(){
		return $this->prepare->execute();
	}
}