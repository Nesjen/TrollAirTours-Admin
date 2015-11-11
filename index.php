<?php
/*
 * Index page for the Login in the Troll Air Tours Admin interface. 
 * To be able to init the AreLoggedIn variable and restricting access to only the Login controller.
 * If a login is successfull, the user will be redirected to the main index file of the project. 
 */

//Creates a new Session with the client
session_start();

//Init of the AreLoggedIn Session variable, default false
$_SESSION["AreLoggedIn"] = false;


//Gets all config data
require_once("admin/config.php");

//Gets PDO connection and models for the entire project
require_once("admin/model/db.php");

//Gets all controllers
require_once("admin/controller/controllers.php");

//Gets router
require_once("admin/controller/Router.php");

//Creates a new Router
$router = new Router();

//Gets the logincontroller
$controller = $router->getLoginController();

//Calls the show function of the logincontroller
$controller->show($router->getPage());

//Check if the user are logged in, if true the user will be redirected to the main index file.
if($_SESSION["AreLoggedIn"] == true)
{
    header("Location:admin/index.php");
}
    
    