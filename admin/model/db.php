<?php
/**
 * db.php in the Troll Air Tours Admin interface.
 * Creates the PDO connection object. 
 * Includes all models and creates an instance of each model with the PDO connection object as an parameter.
 * 
 */


//Includes all models
require_once("EmployeeModel.php");
require_once("AircraftModel.php");
require_once("UserModel.php");
require_once("FlightModel.php");
require_once("FlightCrewModel.php");
require_once("CustomerModel.php");
require_once("SeatReservationModel.php");
require_once("BookingModel.php");
require_once("ProductModel.php");

//Creates the PDO connection object.
$dbConn = new PDO("sqlsrv:Server=$DB_HOST;Database=$DB_NAME", $DB_USER  , $DB_PWD);


//Creates an object of all models.
$employeeModel = new EmployeeModel($dbConn);
$aircraftModel = new AircraftModel($dbConn);
$userModel = new UserModel($dbConn);
$flightModel = new FlightModel($dbConn);
$flightCrewModel = new FlightCrewModel($dbConn);
$customerModel = new CustomerModel($dbConn);
$seatReservationModel = new SeatReservationModel($dbConn);
$bookingModel = new BookingModel($dbConn);
$productModel = new ProductModel($dbConn);