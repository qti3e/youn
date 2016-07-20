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

namespace core\controller;


class controller{
	private $configLoaded   = false;
	public function autoLoad($class){
		$file   = str_replace('\\','/',$class).'.php';
		if(file_exists($file)){
			include_once($file);
		}else{

		}
	}
	public function __construct() {
		//Don't display any error
		error_reporting(0);
		ini_set('display_errors', 0);
		//Set include path to the script's root directory
		set_include_path(__DIR__);
		//Autoload is way to auto include files when a class called
		spl_autoload_register([$this,'autoLoad']);
		//Handle all of errors with our own error handler
		set_error_handler('core\\exception\\error_handler::handler');

		//Start an output buffering, see __destruct() for more detail.
		ob_start();
	}

	public function config($configFile){
		if(file_exists($configFile)){
			$this->configLoaded = true;
		}
	}
	public function run(){
		if($this->configLoaded){
			//Read file url and run the specific page
		}else{

			//throw an error that says "Internal server error: you should set config file first"
		}
	}

	public function clean(){
		ob_clean();
	}

	public function __destruct() {
		//Display all of output at the end, so we can send new header to the client in all of running time

	}

	public static function header($key,$value){
		/**
		 * TODO: save headers to an array and send headers at the end, so we can have a new function called destroyHeader that remove headers!
		 */
		header(trim($key).' : '.trim($value).';');
	}
}