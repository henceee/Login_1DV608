<?php
require_once("model/UserCatalog.php");
require_once("model/RegFacade.php");
require_once("model/UserDAL.php");
require_once("view/NavigationView.php");
require_once("view/RegView.php");
require_once('view/LoginView.php');
require_once("controller/LoginController.php");
require_once("controller/RegisterController.php");

class MasterController
{
	private $userController;
	private $navigationView;
	private $userDAL;

	function __construct()
	{
		$this->mysqli = new mysqli("localhost", "root", "", "user");
		if (mysqli_connect_errno())
		{
		    printf("Connect failed: %s\n", mysqli_connect_error());
		    exit();		    
		}

		$this->userDAL = new UserDAL($this->mysqli);
		$this->navigationView = new NavigationView();
	}

	/**
	*	Handles input, by calling according controller,
	*	an sets view depending on url.
	*	@return void
	*/
	public function handleInput() {
		if ($this->navigationView->wantsToReg())
		{
			//Create new controller, and handle login
			$login = new LoginController($this->userDAL->getUsers(),$this->navigationView);
			$login->doLogin();
			//Set the view to LoginView
			$this->view = $login->getOutPut();
			//Tell the view to output HTML for login/logout 
			$this->view->response = (isset($_SESSION['user'])) ?
			$this->view->generateLogoutButtonHTML() : $this->view->generateLoginFormHTML();

		} 
		else 
		{
			//Create controller and set view, add user.
			$model = new RegFacade($this->userDAL);
			$this->view = new RegView($this->navigationView);	
			$regControl = new RegisterController($model,$this->view);
			$regControl->addUser();
			//Set view
			$this->view->response=$this->view->getHTML();

		}

		$this->mysqli->close();
	}

	/**
	*	Returns the applicable view.
	*	@return LoginView || RegView
	*/
	public function generateOutPut()
	{
		return $this->view;
	}
}