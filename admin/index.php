<?php
session_start();

if($_SESSION["AreLoggedIn"]== "false")
{
  header("Location:../");
}

require("view/header.html");
require_once("config.php");

require_once("model/db.php");

require_once("controller/controllers.php");
require_once("controller/Router.php");

$router = new Router();


$controller = $router->getController();


if ($controller instanceof Controller) {
  $controller->show($router->getPage());
}  

require("view/footer.html");

