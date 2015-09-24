<?php
//start session
session_start();
ob_start();
//INCLUDE THE FILES NEEDED...

require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php'); 
require_once("controller/LoginController.php");
require_once("model/User.php");


//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');
////CREATE OBJECTS OF THE VIEWS
$loginView = new LoginView();
$dateTimeView = new DateTimeView();
$LayoutView = new LayoutView();

//Could be created using data from db, this is just convenient for the task.
$user = new User("Admin","Password");
$LoginController = new LoginController($user,$loginView);
$LoginController-> doLogin();
$LayoutView->render($loginView, $dateTimeView);

