<?php

namespace controller;

class UserController
{
	/**
	 * @var null | \model\user
	 */
	private $user = null;

	

	function __construct(\model\User $user)
	{
		$this->user = $user;
	}

	/*
	* @param $username
	*/
	public function login($username, $password)
	{
		if($this->authenticate($username,$password))
		{
			//start session
			session_start();

			//TODO this should be moved back to index.
			$this->user = new \model\User();

			 $_SESSION[$user] = $this->user;

			 return true;
		} else{

			return false;
		}
	}

	private function authenticate($username,$password)
	{
		return $authentic = ($username == $this->user->getUsername() && $password == $this->user->getPassword() ? true : false);

	}

	public function logout()
	{
		//ensure the session is started
		session_start();
		//unset the user index of global arr. $_SESSION
		unset($_SESSION[$user]);
		//end session
		session_destroy();
	}
}