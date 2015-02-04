<?
/**
 * User
 *
 * A single User's class
 *
 * @copyright   Copyright (c) 2015 SRG Group Kft. (http://www.srg.hu)
 * @link        http://srg.hu
 * @author      Ádám Bálint (adam.balint@srg.hu)
 */
namespace Model;

/**
 * Class User
 * @package Model
 */
class User{

	/**
	 * @var string user's ID
	 */
	private $_id;

	/**
	 * @var string user's Username
	 */
	private $_username;

	/**
	 * @var string user's email
	 */
	private $_email;

	/**
	 * @var string user's name
	 */
	private $_name;

	/**
	 * @var string user's password
	 */
	private $_password;

	/**
	 * @var string user's gender
	 */
	private $_gender;

	/**
	 * @var string user's avatar image url
	 */
	private $_avatar;

	/**
	 * Set user'd data based on the given array
	 * @param array $data User's data as an array
	 * @return User
	 */
	public function __construct(array $data=array()){
		foreach($data as $field=>$value){
			$methodName='set'.ucfirst($field);
			$this->$methodName($value);
		}
		if(!$this->getId()) {
			$this->setId(uniqid('', true));
		}
		return $this;
	}

	/**
	 * Caller for the setField, getField, hasField functions
	 * @param $name string Method name
	 * @param $arguments array Method arguments
	 * @return User|bool
	 * @throws \Exception
	 */
	public function __call($name, $arguments){
		if(method_exists($this, $name)){
			return $this->$name;
		}
		$method=substr($name, 0, 3);
		$key=strtolower(substr($name, 3));
		$value = isset($arguments[0]) ? $arguments[0] : null;
		if(($method == 'get' || $method == 'set') && property_exists($this, '_'.$key)){
			$property='_'.$key;
			switch($method){
				case 'get':
					return $this->$property;
					break;
				case 'set':
					$this->$property = $value;
					return $this;
					break;
				case 'has':
					return !!$this->$property;
					break;
			}
		}

		throw new \Exception('Method "'.$name.'" does not exist and was not trapped in __call()');
	}

	/**
	 * Creates an array from this instance
	 * @return array
	 */
	public function _toArray(){
		return array(
			'id'=>$this->getId(),
			'username'=>$this->getUsername(),
			'email'=>$this->getEmail(),
			'name'=>$this->getName(),
			'avatar'=>$this->getAvatar(),
			'gender'=>$this->getGender(),
			'password'=>$this->getPassword(),
		);
	}

	/**
	 * Check if the user fulfills the conditions
	 * @param array $conditions
	 * @return bool
	 */
	public function checkCondition(array $conditions=array()){
		$check=true;
		foreach($conditions as $field=>$value){
			$propertyName='_'.$field;
			if(!property_exists($this, $propertyName)) continue;
			$check &= $this->$propertyName == $value;
		}
		return $check;
	}

}