<?php


class User
{
	//TODO: change so that username is not hardcoded
	private $username;
	//TODO: change so that password is not hardcoded
	private $password;

	function __construct($username,$password)
	{
		assert(is_string($username) && strlen($username)>0);
		assert(is_string($password) && strlen($password)>0);
		
		$this->username = $username;
		$this->password = $password;	
				
	}

	public function getUsername()
	{
		return $this->username;
	}
	
	public function getPassword()
	{
		return $this->password;
	}
}