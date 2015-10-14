<?php


class NavigationView
{
	private static $regURL = "register";

	/**
	*	Determines what view is to be used
	*	by checking url.
	*	@return bool
	*/
	public function wantsToReg() {
		return isset($_GET[self::$regURL]) == false;
	}

	/**
	*	Gets the link to return to login || register page
	*	@return string - HTML output
	*/
	public function getReturnURL()
	{
		return ($this->wantsToReg() ? "<a href='?register'>Register<a>": "<a href='?'>Back To Login<a>");
	}
}