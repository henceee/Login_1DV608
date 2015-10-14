<?php
require_once("model/UserCatalog.php");
class UserDAL
{
	private static $table = "users";
	

	function __construct(mysqli $db)
	{
		$this->database = $db;	
		$this->userCatalog = new UserCatalog();		
	}

	/**
	*	Acquire all users from the database.
	*	@return userCatalog
	*/
	public function getUsers()
	{	
		//Prepare the statement...
		$stmt = $this->database->prepare("SELECT * FROM " . self::$table);
		if ($stmt === FALSE) {
			throw new Exception($this->database->error);
		}

		//Execute and bind with params.
		$stmt->execute();
	 	
	    $stmt->bind_result($id, $userName, $password);

	    /*Iterates through result, creates and adds user(s)
		* to user catalog.
		*/
	    while ($stmt->fetch())
	    {	
	    	$user = new User($userName, $password,$id);
	    	$this->userCatalog->add($user);
		}

		return  $this->userCatalog;	
	}

	/**
	*	Add username of the database.
	*	@return void
	*/
	public function add(User $toBeAdded)
	{	

		$this->userCatalog = $this->getUsers();
		
		//Check if exists before inserting into database.
		if(!$this->userCatalog->userExists($toBeAdded))
		{	
			$stmt = $this->database->prepare("INSERT INTO  `".self::$table."`(
				`ID` , `Username` , `Password`)
					VALUES (?, ?, ?)");
			if ($stmt === FALSE) {
				throw new Exception($this->database->error);
			}
			$id = $toBeAdded->getID();
			$username = $toBeAdded->getUsername();
			$password = md5($toBeAdded->getPassword());
			$stmt->bind_param('sss', $id, $username, $password);

			$stmt->execute();
			$this->userCatalog->add($toBeAdded);
		}
		else
		{
			throw new  Exception("User with this userName already exists.");
			
		}
	}
}


