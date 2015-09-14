<?php
/**
 * Bootstrapping functions, essential and needed for Anax to work together with some common helpers. 
 *
 */

/**
 * Default exception handler.
 *
 */
function myExceptionHandler($exception) {
  echo "Oops: Uncaught exception: <p>" . $exception->getMessage() . "</p><pre>" . $exception->getTraceAsString(), "</pre>";
}
set_exception_handler('myExceptionHandler');


/**
 * Autoloader for classes.
 *
 */
function myAutoloader($path) {
  
  if(is_file($path)) {
    include($path);
  }
  else {
    throw new Exception("Classfile '{$path}' does not exists.");
  }
}



function dump($array) {
  echo "<pre>" . htmlentities(print_r($array, 1)) . "</pre>";
}
spl_autoload_register('myAutoloader');
