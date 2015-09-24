<?php

class LoginView
{
	private static $login	= 'LoginView::Login';
	private static $logout 	= 'LoginView::Logout';
	private static $name 	= 'LoginView::UserName';
	private static $password 	= 'LoginView::Password';
	private static $cookieName 	= 'LoginView::CookieName';
	private static $cookiePassword = 'LoginView::CookiePassword';
	private static $keep 		= 'LoginView::KeepMeLoggedIn';
	private static $messageId 	= 'LoginView::Message';
	private static $msgError 	= 'error';
	private static $msgSucess 	= 'sucess';
	private static $msgMessage	= 'message';

	
	/**
	 * Create HTTP response
	 *
	 * Should be called after a login attempt has been determined
	 *
	 * @return  void BUT writes to standard output and cookies!
	 */
	public function response($isLoggedIn) {
		
		if($this->userWantsToSave())
		{
			$this->getUserNameCookie();
			$this->getPasswordCookie();
		}

		$reqPass 	 = $this->getRequestPassword();
		$reqUserName = $this->getRequestUserName();

		if(empty($Post))
		{
			$_SESSION[self::$msgSucess]  ="";
			$_SESSION[self::$msgError] 	 ="";
			$_SESSION[self::$msgMessage] ="";
		}
		if($this->userWantsToLogin() && !$isLoggedIn)
		{

			$_SESSION[self::$msgError] = array("Wrong name or password");
		}
					
		if($this->userWantsToLogin())
		{

			if(empty($reqPass))
			{
				$_SESSION[self::$msgError] =array('Password is missing');
			}
			if(empty($reqUserName))
			{
				$_SESSION[self::$msgError] =array('Username is missing');
			}	

			if(isset($_COOKIE[self::$cookieName]))
			{				
				$_SESSION[self::$msgSucess] =array("Login with cookies. Hello again ".$_COOKIE[self::$cookieName].".");
			
			}

		}

		if($this->userHasInputtedName() && $this->userHasInputtedPassword())
		{

			if($this->userWantsToSave())
			{
				$this->getUserNameCookie();
			}
		}

		if($this->userWantsToLogin() && $isLoggedIn)
		{
			$_SESSION[self::$msgSucess] = array('Welcome');
		}

		if($this->userWantsToLogout())
		{			
			$_SESSION[self::$msgMessage] =array("Bye bye!");
		}

		$response = ($isLoggedIn) ? $this->generateLogoutButtonHTML() : $this->generateLoginFormHTML();
		
		return $response;
	}

	

	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	private function generateLogoutButtonHTML() {
		return '
			<form  method="post" >
				<p id="' . self::$messageId . '">' . $this->getMessages() .'</p>
				<input type="submit" name="' . self::$logout . '" value="logout"/>
			</form>
		';
	}
	
	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	private function generateLoginFormHTML() {
		
		return '
			<form method="post" > 
				<fieldset>
					<legend>Login - enter Username and password</legend>
					<p id="' . self::$messageId . '">' . $this->getMessages() . '</p>
					
					<label for="' . self::$name . '">Username :</label>
					<input type="text" id="' . self::$name . '" name="' . self::$name . '" />

					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />

					<label for="' . self::$keep . '">Keep me logged in  :</label>
					<input type="checkbox" id="' . self::$keep . '" name="' . self::$keep . '" />
					
					<input type="submit" name="' . self::$login . '" value="login" />
				</fieldset>
			</form>
		';
	}
	
	
	/**
	*	Accsesses message from session variable, saves in local var, unsets the index
	*	and gives the message to be presented
	* @return  string $msg
	*/
	public function getMessages()
	{
		$types = array(self::$msgError,self::$msgMessage, self::$msgSucess);
		foreach ($types as $type)
		{
			if(isset($_SESSION[$type]) && !empty($_SESSION[$type]) && is_array($_SESSION[$type]))
			{
				foreach ($_SESSION[$type] as $message)
				{
					$msg = $message;
					unset($message);
					return $msg;					
				}
				//unset($_SESSION[$type]);
			}
		}
		
	}

		
	public function getUserNameCookie()
	{		
			$name = $this->getRequestUserName();
			setcookie(self::$cookieName, $name, time() + 60*60*24*365);
			$_COOKIE[self::$cookieName] = $name;
									
			return $name;		
	}

	
	public function getPasswordCookie()
	{		
			$password = $this->getRequestPassword();
			$password = md5($password);
			setcookie(self::$cookieName, $password, time() + 60*60*24*365);	
			$_COOKIE[self::$cookiePassword] = $password;
			return $password;		
	}
/*
	public function removeCookie()
	{
		if(isset($_COOKIE[self::$cookieName]))
		{
			setcookie(self::$cookieName, $_SESSION['user']->getName(), 1);	
		}
		
	}
	
*/
	/**
	 *	Check if there has been a http post request to page by pressing 'login' button
	 *	@return  bool
	 */
	public function userWantsToLogin()
	{
		return (isset($_POST[self::$login]) ? true : false);
	}

	/**
	 *	Check if there has been a http post request to page by pressing 'log out' button
	 *	@return  bool
	 */
	public function userWantsToLogout()
	{
		return (isset($_POST[self::$logout]) ? true : false);
	}

	/**
	 *	Check if name is set in global array $_POST (from input for username)
	 *	@return  bool
	 */
	private function userHasInputtedName()
	{
		return (isset($_POST[self::$name]) ? true : false);
		
	}
	
	/**
	 *	Provides the username provided by the user
	 *	@return  string (Username)
	 */
	public function getRequestUserName() {
		
		if($this->userHasInputtedName())
		{
			return $_POST[self::$name];
		}
	}

	/**
	 *	Check if password is set in global array $_POST (from input for password)
	 *	@return  bool
	 */
	private function userHasInputtedPassword()
	{
		return (isset($_POST[self::$password]) ? true : false);
		
	}

	/**
	 *	Provides the password provided by the user
	 *	@return  string (Password)
	 */
	public function getRequestPassword() {
		
		if($this->userHasInputtedPassword())
		{
			return $_POST[self::$password];
		}
	}

	/**
	 *	Check if keep is set in global array $_POST (from input 'keep me logged in')
	 *	@return  bool
	 */
	private function userWantsToSave()
	{
		return (isset($_POST[self::$keep]));
		
	}	

	

}