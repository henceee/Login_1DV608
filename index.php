<?php
//start session
session_start();
ob_start();
//INCLUDE THE FILES NEEDED...



require_once('view/DateTimeView.php');
require_once('view/LayoutView.php'); 
require_once("controller/MasterController.php");



//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$dateTimeView = new DateTimeView();
$LayoutView = new LayoutView();

//Create new master, which handles input & acquires view.
$master = new MasterController();
$master->handleInput();
$view = $master->generateOutPut();
$LayoutView->render($view, $dateTimeView);

