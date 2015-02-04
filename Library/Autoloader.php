<?php

namespace Library;

/**
 * Namespace-based autoloader
 * Class Autoloader
 */
class Autoloader {
	static public function loader($className) {
		$filename = str_replace('\\', '/', $className).'.php';
    if(file_exists($filename)){
      include($filename);
      if(class_exists($className)) {
        return true;
      }
    }
    return false;
  }
}
