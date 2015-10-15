<?php

class FlightCrewModel {
    
    private $dbConn;

    const TABLE = "FlightCrew";
    const SELECT_QUERY = "SELECT * FROM " . FlightCrewModel::TABLE;
    const INSERT_QUERY = "INSERT INTO " . FlightCrewModel::TABLE . " (FlightID,EmployeeID) VALUES (:FlightIDFK,:EmployeeIDFK)";
    const DELETE_QUERY = "DELETE FROM" . FlightCrewModel::TABLE . " WHERE FlightID= ?";


    private $selStmt;
    private $addStmt;

    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(FlightCrewModel::INSERT_QUERY);
        $this->selStmt = $this->dbConn->prepare(FlightCrewModel::SELECT_QUERY);
        $this->delStmt = $this->dbConn->prepare(FlightCrewModel::DELETE_QUERY);
    }

    public function getAll() {
        // Fetch all Aircraft as associative arrays
        $this->selStmt->execute();
        return $this->selStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addSingle($givenFlightIDFK,$givenEmployeeIDFK) {
        return $this->addStmt->execute(array("FlightIDFK" => $givenFlightIDFK,"EmployeeIDFK" => $givenEmployeeIDFK));
    }
    
    public function addDual($givenPilotIDFK,$givenGuideIDFK,$givenFlightID)
    {
         $this->addStmt->execute(array("FlightIDFK" => $givenFlightID,"EmployeeIDFK" => $givenPilotIDFK));
         $this->addStmt->execute(array("FlightIDFK" => $givenFlightID,"EmployeeIDFK" => $givenGuideIDFK));
        
    }
    

}