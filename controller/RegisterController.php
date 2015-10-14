<?php

class RegisterController
{

	private $model;
	private $view;

	public function __construct(RegFacade $reg, RegView $regView)
	{
		$this->model = $reg;
		$this->view = $regView;

	}

	/**
	*	Adds user, if username does not contain
	* 	invalid chars, and input length is correct.
	*	@return void
	*/
	public function addUser()
	{		

		if ($this->view->wantsToCreateUser())
		{
			$user = $this->view->getUser();	

			$username = $user['username'];
			$password = $user['password'];

			if(preg_match("/(\W)(\D)(\S)/", $username))
			{
				$this->view->message .="Username contains invalid characters";
			}
			else
			{
				if($user !== null)
				{
					if(strlen($username) < 3)
					{
						$this->view->message .= "Username has too few characters, at least 3 characters.";
					}
					if(strlen($password) < 6)
					{
						$this->view->message .= "Password has too few characters, at least 6 characters.";
					}
					else
					{
						$user = new User($username, $password);
						try
						{
							$this->model->add($user);
							$this->view->message = "Registered new user.";		
						} 
						catch (Exception $e)
						{
							$this->view->setDuplicate();
						}
					}							
				}	
			}			
		}	
	}
}
	
