<?php



class LoginController
{


	/**
	 * @var null | \model\user
	 */
	private $user = null;
	/**
	 * @var null | \view\LoginView
	 */
	private $loginView = null;


	function __construct(User $user, LoginView $loginView)
	{
		$this->user = $user;
		$this->loginView = $loginView;
	}

	/**
	*	Gets required pass and username if posted, checks if user
	*	wants to login, tries to authenticate, or logs out if user wants
	*	to logout.
	* 	@param bool $isLoggedIn
	* 	@return  void
	*/
	public function doLogin()
	{
		$userNameCookie = $this->loginView->getUserNameCookie();
		$passwordCookie = $this->loginView->getPasswordCookie();

		if(isset($userNameCookie) && isset($passwordCookie))
		{
			$this->tryTologin($userNameCookie,$passwordCookie,true);
		}

		$reqUsername = $this->loginView->getRequestUserName();
		$reqPass = $this->loginView->getRequestPassword();

		if($this->loginView->userWantsToLogin())
		{
			$this->tryTologin($reqUsername,$reqPass);			
		}
		/* 	Since logout operation requires session variable to be set, after authenticating
		*	login details, It really should not matter if the message is still 'Bye bye'
		*/
		else if(isset($_SESSION['user']) && $this->loginView->userWantsToLogout())
		{
				$this->logout();
		}
	}

	/**
	*	Checks inputted login-data against /model/User object	
	*
	*	@param string $username
	* 	@param string $password
	* 	@return  void
	*/
	private function tryTologin($username, $password, $cookie =false)
	{
		if($cookie)
		{
			$passFromUser =$this->user->getPassword();
			if($this->user->getUsername() == $username && $password == md5($passFromUser))
			{
				$_SESSION['user'] = $username;
			}
		}

		else if($this->authenticate($username,$password))
		{
			if(!isset($_SESSION['user']))
			{
				$_SESSION['user'] = $this->user->getUsername();	
				
			}
		} 

		
	}

	/**
	*	Checks inputted login-data against /model/User object	
	*
	*	@param string $username
	* 	@param string $password
	* 	@return  bool
	*/
	private function authenticate($username,$password)
	{
		return $authentic = ($username == $this->user->getUsername() && $password == $this->user->getPassword() ? true : false);

	}

	
	/**
	*	Unsets session index user, logging the user out.
	*
	*	@param string $username
	* 	@param string $password
	* 	@return  void
	*/
	public function logout()
	{					
			//unset the index 'user' of global arr. $_SESSION
			unset($_SESSION['user']);
			//end session
			session_destroy();
			ob_end_flush();
	}
}