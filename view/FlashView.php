<?php

public static function flash($name,$string ='')
{
	if(isset($_SESSION[$name])
	{
		$sess = $_SESSION[$name];
		unset($_SESSION[$name]);
		return $sess;
	}else{

		$_SESSION[$name] = $string;
	}
}