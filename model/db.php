<?php

require_once("EmployeeModel.php");
require_once("AircraftModel.php");
require_once("DestinationModel.php");

// TODO - change the DB connection here (if it's Microsoft SQL server or other non-MySQL DB)
// Create DB connection
//$dbConn = new PDO("sqlsrv:Server=$DB_HOST,1433;Database=$DB_NAME", $DB_USER , $DB_PWD);
$dbConn = new PDO("sqlsrv:Server=$DB_HOST;Database=$DB_NAME", $DB_USER  , $DB_PWD);



$employeeModel = new EmployeeModel($dbConn);
$aircraftModel = new AircraftModel($dbConn);
$destinationModel = new DestinationModel($dbConn);
// TODO - create new models here. First create them as a new class
// TODO - once you have more model classes, perhaps some of the functions can be moved to a common parent class?