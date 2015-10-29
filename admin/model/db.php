<?php

require_once("EmployeeModel.php");
require_once("AircraftModel.php");
require_once("DestinationModel.php");
require_once("UserModel.php");
require_once("FlightModel.php");
require_once("FlightCrewModel.php");
require_once("CustomerModel.php");

$dbConn = new PDO("sqlsrv:Server=$DB_HOST;Database=$DB_NAME", $DB_USER  , $DB_PWD);



$employeeModel = new EmployeeModel($dbConn);
$aircraftModel = new AircraftModel($dbConn);
$destinationModel = new DestinationModel($dbConn);
$userModel = new UserModel($dbConn);
$flightModel = new FlightModel($dbConn);
$flightCrewModel = new FlightCrewModel($dbConn);
$customerModel = new CustomerModel($dbConn);