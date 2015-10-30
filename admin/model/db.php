<?php

require_once("EmployeeModel.php");
require_once("AircraftModel.php");
require_once("UserModel.php");
require_once("FlightModel.php");
require_once("FlightCrewModel.php");
require_once("CustomerModel.php");
require_once("SeatReservationModel.php");
require_once 'BookingModel.php';

$dbConn = new PDO("sqlsrv:Server=$DB_HOST;Database=$DB_NAME", $DB_USER  , $DB_PWD);



$employeeModel = new EmployeeModel($dbConn);
$aircraftModel = new AircraftModel($dbConn);
$userModel = new UserModel($dbConn);
$flightModel = new FlightModel($dbConn);
$flightCrewModel = new FlightCrewModel($dbConn);
$customerModel = new CustomerModel($dbConn);
$seatReservationModel = new SeatReservationModel($dbConn);
$bookingModel = new BookingModel($dbConn);