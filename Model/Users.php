<?
/**
 * User Model
 *
 * Model functions for the dummy database (serialized array in a simple text file)
 * This class stores the users.
 * You can create a User instance with the create function.
 * With save function you can add newly created users to the "database", or update a user.
 * Find functions is for querying documents
 *
 * @copyright   Copyright (c) 2015 SRG Group Kft. (http://www.srg.hu)
 * @link        http://srg.hu
 * @author      Ádám Bálint (adam.balint@srg.hu)
 */
namespace Model;

/**
 * Class Users
 * @package Model
 */
class Users extends \ArrayObject{

	/**
	 * @var string Simple text file, which contains a serialized array of users
	 */
	private $_dbFile='database';

	/**
	 * Constructor for UserModel
	 * This reads the DB file, creates the User instances, and stores its in the ArrayObject
	 * @throws \Exception
	 */
	public function __construct(){
		if(!file_exists($this->_dbFile)){
			throw new \Exception('Database file does not exists');
		}
		$this->_getDb(); //Read and store users
		return $this;
	}

	/**
	 * Creates a User instance (but this function don't save it, you have to use the save function for this)
	 * @param array $data
	 * @return User
	 */
	public function create(array $data=array()){
		$user=new User($data);
		return $user;
	}

	/**
	 * Find users based on the given conditions
	 * Conditions is an array. Keys are the fields, and values are the searched values. Example:
	 *
	 *  array(
	 *    "gender" => "male"
	 *  );
	 *  This returns all male users in an array
	 *
	 * @param array $conditions
	 * @return User[]
	 */
	public function find(array $conditions=array()){
		$results=$this->getArrayCopy();
		$results=array_filter($results, function($item) use ($conditions){
			return $item->checkCondition($conditions); //Check if the user fulfills the conditions
		});
		return $results;
	}

	/**
	 * Helper function for easier querying
	 * @param string $field Criteria field
	 * @param mixed $value The serached value
	 * @return User[]
	 */
	public function findBy($field, $value){
		$conditions[$field]=$value;
		return $this->find($conditions);
	}

	/**
	 * Helper function for easier querying
	 * Finds the first document which fulfills the conditions
	 * @param array $conditions
	 * @see find()
	 * @return bool|User
	 */
	public function findOne(array $conditions=array()){
		$results=$this->find($conditions);
		return reset($results);
	}

	/**
	 * Helper function for easier queying
	 * Finds the first document which fulfills the condition
	 * @param string $field Criteria field
	 * @param mixed $value The serached value
	 * @return bool|User
	 */
	public function findOneBy($field, $value){
		$conditions[$field]=$value;
		return $this->findOne($conditions);
	}

	/**
	 * Helper function for easier queying
	 * Finds the first document with the given ID
	 * @param string $id ID of user
	 * @return bool|User
	 */
	public function findOneById($id){
		return $this->findOneBy('id', $id);
	}

	/**
	 * Adds a user to the model, or updates it if it already exists
	 * @param User $user
	 * @return Users
	 */
	public function save(User $user){
		$this->offsetSet($user->getId(), $user);
		$this->_setDb();
		return $this;
	}

	/**
	 * Save the current state of database to the text file
	 */
	private function _setDb(){
		file_put_contents($this->_dbFile, serialize($this->_toArray()));
	}

	/**
	 * Read the text-file-database, and creates User instances with fromArray method
	 */
	private function _getDb(){
		$dbArray=unserialize(file_get_contents($this->_dbFile));
		if(!is_array($dbArray)) $dbArray=array();
		$this->_fromArray($dbArray);
	}

	/**
	 * Creates an array from User instances
	 * @return array
	 */
	private function _toArray(){
		$array=array();
		$iterator=$this->getIterator();
		$iterator->rewind();
		foreach($iterator as $item){
			$array[]=$item->_toArray();
		}
		return $array;
	}

	/**
	 * Creates User instances based on an array from the text file
	 * @param array $array Unserialized database file
	 */
	private function _fromArray(array $array){
		foreach($array as $item){
			if(empty($item['id'])) continue;
			$this->offsetSet($item['id'], new User($item));
		}
	}

}