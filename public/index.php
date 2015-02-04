<?php
session_start();

/**
 * SRG Group Kft. Test app
 *
 * This app uses the MiniVC single-file MVC "framework"
 * @link https://github.com/mogui/MiniVC
 *
 * @copyright   Copyright (c) 2015 SRG Group Kft. (http://www.srg.hu)
 * @link        http://srg.hu
 * @author      Ádám Bálint (adam.balint@srg.hu)
 */
/**
 *
 */
require_once("../miniVC.php");

$debug=true;
if($debug) error_reporting(-1);
else error_reporting(0);

miniVC::$debug = $debug;
$app = miniVC::getInstance();

// ROUTER
$app->setUrls(array(
	'^/$'=>'/index/index/',
	'^/adduser$'=>'/index/add/',
	'^/edituser$'=>'/index/edit/',
	'^/deleteuser$'=>'/index/delete/',
));

//This makes our life easier when dealing with paths. Everything is relative to the application root now.
chdir(__DIR__.'/../');

//Set up autoloader
require_once ("Library/Autoloader.php");
spl_autoload_register('Library\Autoloader::loader');

//RUN the app
try {
	if(!$app->route($_SERVER['REQUEST_URI'])){	
		echo Controller::_render('home',array('title'=>_('test')));
	}
} catch (Exception $e){
	echo $e->getMessage();
}