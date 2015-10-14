<?php
require_once('view/globalsRegView.php');


/*
*	OBS: Inherits from helpclass globalRegView
*	which handles global vars.
*/
class RegView extends globalsRegView
{
	public $message = "";
	/**
	 * @ null || navigationView
	 */
	private $nav =null;

	function __construct($nav)
	{
		$this->nav = $nav;
	}

	/**
	*	Renders HTML output for the registration form.
	*	@return string
	*/
	public function getHTML()
	{
		return $this->nav->getReturnURL()."
		<p>$this->message</p>
		<form method='post'>
		<fieldset>
		<legend>Register</legend>
		<label for='".self::$userPostID."'>Username</label><br>
		<input id='".self::$userPostID."' type='text' name='".self::$userPostID."' value ='".$this->getUserNameSession()."'/><br>
		<label for='".self::$passPostID."'>Password</label><br>
		<input id='".self::$passPostID."' type='password' name='".self::$passPostID."'></input><br>
		<label for='".self::$pass2PostID."2'>Repeat your password</label><br>
		<input id='".self::$pass2PostID."' type='password' name='".self::$pass2PostID."'></input></p>
		<p><input type='submit' name='".self::$submitPostID."'></p>
		</fieldset>
		</form>
		";
	}

	/**
	*	Gets the user information
	*	from the user input
	*	@ return array || null
	*/
	public function getUser()
	{
		$username = $_POST[self::$userPostID];		
		$password = $_POST[self::$passPostID]; 
		$password2 = $_POST[self::$pass2PostID]; 
		
		if($password2 == $password)
		{			
			return array("username"=>$username,"password"=>$password);
		}
		$this->message .= "Passwords do not match.";
		return null;
	}

	/**
	*	Generates message for duplicate usernames
	*	@return void
	*/
	public function setDuplicate() {
		$this->message = "User exists, pick another username.";
	}

	

}
	