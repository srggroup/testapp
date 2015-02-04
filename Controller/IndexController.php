<?php
/**
 * Index controller
 *
 * @copyright   Copyright (c) 2015 SRG Group Kft. (http://www.srg.hu)
 * @link        http://srg.hu
 * @author      Ádám Bálint (adam.balint@srg.hu)
 */
namespace Controller;

use Model\Users;

/**
 * Class IndexController
 * @package Controller
 */
class IndexController extends \Controller {

	/**
	 * @var Users
	 */
	private $_userModel;

	/**
	 * Constructor for IndexController
	 * Initialize UserModel
	 */
	public function __construct(){
		$this->_userModel=new Users();
	}

	/**
	 * Index page
	 * List of users
	 */
	function index(){

		$users=$this->_userModel->find();

		$this->render('index_index', array(
			'title'=>'SRG Teszt',
			'users'=>$users
		));
	}

	/**
	 * Add page
	 * Add a user
	 */
	function add(){

		$this->render('index_add', array(
			'title'=>'Adding user'
		));
	}

	/**
	 * Edit page
	 * Edit a user
	 */
	function edit(){

		$this->render('index_edit', array(
			'title'=>'Editing user'
		));
	}

	/**
	 * Delete function
	 * Delete a user
	 */
	function delete(){

		header('Location: /');
		exit;
	}
	
}
