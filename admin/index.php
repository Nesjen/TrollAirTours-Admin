<?php
/**
 * Main Index page for the Troll Air Tours Admin interface. 
 * This file is the "Clue" in the project. If the user are loggedin, a webpage will be created.
 * Webpage build up: Static header and footer on all pages(header.html,footer.html). 
 * The router will return Controller for the page, and the controller will render the rest of the page.
 * Default controller are HomeController, and it will render the home.php view.
 */



//Creates a new Session with the client
session_start();

//Checking if AreLoggedIn Session are set and not false. If the AreLoggedIn is false or not set, user are sent back to login.
if(($_SESSION["AreLoggedIn"]== false)||(!isset($_SESSION["AreLoggedIn"])))
{
  header("Location:../");
}

//Inserts Header template
require("view/header.html");

//Gets all config data
require_once("config.php");

//Gets pdo connection and all models
require_once("model/db.php");

//Gets all controllers
require_once("controller/controllers.php");

//Gets router
require_once("controller/Router.php");

//Creates a router object
$router = new Router();

// Gets the current controller  
$controller = $router->getController();


//Checks if the controller is an instance of Controller(Controller exsist)

if ($controller instanceof Controller) {
  $controller->show($router->getPage()); //Calls the show method of the controller.
}  

//Inserts footer template
require("view/footer.html");

