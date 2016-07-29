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


use core\html\attribute;
use core\html\tag;

/**
 * Class builder
 * @package core\forms
 */
class builder {
	/**
	 * @var attribute
	 */
	protected $object;
	/**
	 * @var int
	 */
	protected $id       = 0;
	/**
	 * @var array
	 */
	protected $elements = [];

	/**
	 * builder constructor.
	 */
	public function __construct() {
		$this->object   = tag::form();
	}

	/**
	 * @return attribute
	 */
	public function object(){
		return $this->object;
	}

	/**
	 * @return string
	 */
	public function __toString() {
		$text   = '';
		$keys   = array_keys($this->elements);
		$count  = count($this->elements);
		for($i  = 0;$i < $count;$i++){
		    $key= $keys[$i];
		    $val= $this->elements[$key];
		    $text   .= (string) $val;
		}
		$this->object->_changeText($text);
		return (string)$this->object;
	}

	/**
	 * @param attribute $obj
	 *
	 * @return int
	 */
	public function addObj(attribute &$obj){
		$this->elements[++$this->id]    = $obj;
		return $this->id;
	}

	/**
	 * @param $id
	 *
	 * @return bool
	 */
	public function delObj($id){
		if(isset($this->elements[$id])){
			unset($this->elements[$id]);
			return true;
		}
		return false;
	}

	/**
	 * @param           $id
	 * @param attribute $obj
	 *
	 * @return bool
	 */
	public function changeObj($id,attribute $obj){
		if(isset($this->elements[$id])){
			$this->elements[$id]    = (string)$obj;
			return true;
		}
		return false;
	}

	/**
	 * @param string $type
	 * @param null   $name
	 * @param null   $value
	 * @param null   $placeholder
	 *
	 * @return attribute
	 */
	public function input($type = 'text',$name = null,$value = null,$placeholder = null){
		$tag    = tag::input($type);
		if($name  !== null){
			$tag->name($name);
		}
		if($value !== null){
			$tag->value($value);
		}
		if($placeholder !== null){
			$tag->placeholder($placeholder);
		}
		$this->addObj($tag);
		return $tag;
	}


	/**
	 * @param null $name
	 * @param null $value
	 * @param null $placeholder
	 *
	 * @return attribute
	 */
	public function button($name = null, $value = null, $placeholder = null) {
		return $this->input('button',$name,$value,$placeholder);
	}

	/**
	 * @param null $name
	 * @param null $value
	 * @param null $placeholder
	 *
	 * @return attribute
	 */
	public function checkbox($name = null, $value = null, $placeholder = null) {
		return $this->input('checkbox',$name,$value,$placeholder);
	}

	/**
	 * @param null $name
	 * @param null $value
	 * @param null $placeholder
	 *
	 * @return attribute
	 */
	public function color($name = null, $value = null, $placeholder = null) {
		return $this->input('color',$name,$value,$placeholder);
	}

	/**
	 * @param null $name
	 * @param null $value
	 * @param null $placeholder
	 *
	 * @return attribute
	 */
	public function date($name = null, $value = null, $placeholder = null) {
		return $this->input('date',$name,$value,$placeholder);
	}

	/**
	 * @param null $name
	 * @param null $value
	 * @param null $placeholder
	 *
	 * @return attribute
	 */
	public function datetime($name = null, $value = null, $placeholder = null) {
		return $this->input('datetime',$name,$value,$placeholder);
	}

	/**
	 * @param null $name
	 * @param null $value
	 * @param null $placeholder
	 *
	 * @return attribute
	 */
	public function datetime_local($name = null, $value = null, $placeholder = null) {
		return $this->input('datetime_local',$name,$value,$placeholder);
	}

	/**
	 * @param null $name
	 * @param null $value
	 * @param null $placeholder
	 *
	 * @return attribute
	 */
	public function email($name = null, $value = null, $placeholder = null) {
		return $this->input('email',$name,$value,$placeholder);
	}

	/**
	 * @param null $name
	 * @param null $value
	 * @param null $placeholder
	 *
	 * @return attribute
	 */
	public function file($name = null, $value = null, $placeholder = null) {
		return $this->input('file',$name,$value,$placeholder);
	}

	/**
	 * @param null $name
	 * @param null $value
	 * @param null $placeholder
	 *
	 * @return attribute
	 */
	public function hidden($name = null, $value = null, $placeholder = null) {
		return $this->input('hidden',$name,$value,$placeholder);
	}

	/**
	 * @param null $name
	 * @param null $value
	 * @param null $placeholder
	 *
	 * @return attribute
	 */
	public function image($name = null, $value = null, $placeholder = null) {
		return $this->input('image',$name,$value,$placeholder);
	}

	/**
	 * @param null $name
	 * @param null $value
	 * @param null $placeholder
	 *
	 * @return attribute
	 */
	public function month($name = null, $value = null, $placeholder = null) {
		return $this->input('month',$name,$value,$placeholder);
	}

	/**
	 * @param null $name
	 * @param null $value
	 * @param null $placeholder
	 *
	 * @return attribute
	 */
	public function number($name = null, $value = null, $placeholder = null) {
		return $this->input('number',$name,$value,$placeholder);
	}

	/**
	 * @param null $name
	 * @param null $value
	 * @param null $placeholder
	 *
	 * @return attribute
	 */
	public function password($name = null, $value = null, $placeholder = null) {
		return $this->input('password',$name,$value,$placeholder);
	}

	/**
	 * @param null $name
	 * @param null $value
	 * @param null $placeholder
	 *
	 * @return attribute
	 */
	public function radio($name = null, $value = null, $placeholder = null) {
		return $this->input('radio',$name,$value,$placeholder);
	}

	/**
	 * @param null $name
	 * @param null $value
	 * @param null $placeholder
	 *
	 * @return attribute
	 */
	public function reset($name = null, $value = null, $placeholder = null) {
		return $this->input('reset',$name,$value,$placeholder);
	}

	/**
	 * @param null $name
	 * @param null $value
	 * @param null $placeholder
	 *
	 * @return attribute
	 */
	public function search($name = null, $value = null, $placeholder = null) {
		return $this->input('search',$name,$value,$placeholder);
	}

	/**
	 * @param null $name
	 * @param null $value
	 * @param null $placeholder
	 *
	 * @return attribute
	 */
	public function submit($name = null, $value = null, $placeholder = null) {
		return $this->input('submit',$name,$value,$placeholder);
	}

	/**
	 * @param null $name
	 * @param null $value
	 * @param null $placeholder
	 *
	 * @return attribute
	 */
	public function tel($name = null, $value = null, $placeholder = null) {
		return $this->input('tel',$name,$value,$placeholder);
	}

	/**
	 * @param null $name
	 * @param null $value
	 * @param null $placeholder
	 *
	 * @return attribute
	 */
	public function text($name = null, $value = null, $placeholder = null) {
		return $this->input('text',$name,$value,$placeholder);
	}

	/**
	 * @param null $name
	 * @param null $value
	 * @param null $placeholder
	 *
	 * @return attribute
	 */
	public function time($name = null, $value = null, $placeholder = null) {
		return $this->input('time',$name,$value,$placeholder);
	}

	/**
	 * @param null $name
	 * @param null $value
	 * @param null $placeholder
	 *
	 * @return attribute
	 */
	public function url($name = null, $value = null, $placeholder = null) {
		return $this->input('url',$name,$value,$placeholder);
	}

	/**
	 * @param null $name
	 * @param null $value
	 * @param null $placeholder
	 *
	 * @return attribute
	 */
	public function week($name = null, $value = null, $placeholder = null) {
		return $this->input('week',$name,$value,$placeholder);
	}

	/**
	 * @param null $name
	 * @param null $min
	 * @param null $max
	 * @param null $value
	 * @param null $step
	 *
	 * @return attribute
	 */
	public function range($name = null,$min = null,$max = null,$value = null,$step = null){
		$tag    = $this->input('range',$name,$value);
		if($min !== null){
			$tag->min($min);
		}
		if($max !== null){
			$tag->max($max);
		}
		if($step !== null){
			$tag->step($step);
		}
		return $tag;
	}
}