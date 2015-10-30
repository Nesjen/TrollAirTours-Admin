<?php

require_once("FlightCrewModel.php");

class FlightModel {
    
    private $dbConn;

    const TABLE = "Flight";
    const SELECT_QUERY = "SELECT * FROM " . FlightModel::TABLE;
    const SELECT_FULL_FLIGHT_QUERY =  " Select f.FlightID, f.RegID, f.FlightDate, f.Departure, f.TourType, fl.PilotID,fl.GuideID, e1.FirstName AS PilotFN, e1.LastName AS PilotLN, e2.FirstName AS GuideFN, e2.LastName AS GuideLN FROM " . FlightModel::TABLE ." f
                                        INNER JOIN FlightCrew fl
                                	ON f.FlightID = fl.FlightID
                                        INNER JOIN Employee e1
                                        ON fl.PilotID = e1.employeeID
                                        INNER JOIN Employee e2 
                                        ON fl.GuideID = e2.EmployeeID ORDER BY FlightDate";
            
    const SELECT_QUERY_WFK = "SELECT * FROM " . FlightModel::TABLE . " INNER JOIN FlightCrew ON Flight.FlightID=FlightCrew.FlightID INNER JOIN Employee ON Flightcrew.EmployeeID=Employee.EmployeeID";
    const INSERT_QUERY = "INSERT INTO " . FlightModel::TABLE . " (FlightID,RegID,FlightDate,Departure,TourType) VALUES (:FlightID,:RegID,:FlightDate,:Departure,:TourType)";
    const DELETE_QUERY = "DELETE FROM " . FlightModel::TABLE . " WHERE (FlightID)=(:flightID)";

    private $selStmt;
    private $selFullFlightStmt;
    private $addStmt;
    private $selWFKStmt;
    private $delStmt;

    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(FlightModel::INSERT_QUERY);
        $this->selFullFlightStmt = $this->dbConn->prepare(FlightModel::SELECT_FULL_FLIGHT_QUERY);
        $this->selStmt = $this->dbConn->prepare(FlightModel::SELECT_QUERY);
        $this->selWFKStmt = $this->dbConn->prepare(FlightModel::SELECT_QUERY_WFK);
        $this->delStmt = $this->dbConn->prepare(FlightModel::DELETE_QUERY);
    }

    public function getAll() {
        $this->selStmt->execute();
        return $this->selStmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getAllWithFK()
    {
       $this->selWFKStmt->execute();
       return $this->selWFKStmt->fetchAll(PDO::FETCH_ASSOC); 
    }
    
    public function getAllWithFkAndNames()
    {
       $this->selFullFlightStmt->execute();
       return $this->selFullFlightStmt->fetchAll(PDO::FETCH_ASSOC); 
    }
    
    public function removeFlightWhereID($flightID)
    {
       echo $flightID;
       return $this->delStmt->execute(array("flightID" => $flightID)); 
    }
    

    
    

    public function add($givenFlightID,$givenRegIDFK,$givenFlightDate,$givenDeparture,$givenTourType) {
        return $this->addStmt->execute(array("FlightID" => $givenFlightID,"RegID" => $givenRegIDFK,"FlightDate" => $givenFlightDate,"Departure" => $givenDeparture, "TourType" => $givenTourType));
    }
    

}