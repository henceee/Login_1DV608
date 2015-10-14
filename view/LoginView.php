<?php
require_once('view/globalsLoginView.php');

class LoginView extends globalsLogin
{		

	public $response ="";
	private $nav;
	
	function __construct($nav)
	{
		$this->nav = $nav;
	}

	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	public function generateLogoutButtonHTML() {
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
	public function generateLoginFormHTML() 
	{
		return $this->nav->getReturnURL().'			
			<form method="post" > 
				<fieldset>
					<legend>Login - enter Username and password</legend>
					<p id="' . self::$messageId . '">' . $this->getMessages() . '</p>
					
					<label for="' . self::$name . '">Username :</label>
					<input type="text" id="' . self::$name . '" name="' . self::$name . '" value ="'.$this->getUserNameSession().'" />

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
			}
		}
		
	}
}