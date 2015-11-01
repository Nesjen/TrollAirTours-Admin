<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
$_SESSION["AreLoggedIn"] = "false";

require_once("admin/config.php");

require_once("admin/model/db.php");

require_once("admin/controller/controllers.php");
require_once("admin/controller/Router.php");

$router = new Router();


$controller = $router->getLoginController();
    
$controller->show($router->getPage());


if($_SESSION["AreLoggedIn"] == "true")
{
    header("Location:admin/index.php");
}
    
    