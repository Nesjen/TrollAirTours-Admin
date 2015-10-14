<?php

class FlightCrewModel {
    
    private $dbConn;

    const TABLE = "FlightCrew";
    const SELECT_QUERY = "SELECT * FROM " . FlightCrewModel::TABLE;
    const INSERT_QUERY = "INSERT INTO " . FlightCrewModel::TABLE . " (FlightID,EmployeeID) VALUES (:FlightIDFK,:EmployeeIDFK)";
    const DELETE_QUERY = "DELETE FROM" . FlightCrewModel::TABLE . " WHERE FlightID= ?";

    /** @var PDOStatement Statement for selecting all entries */
    private $selStmt;
    /** @var PDOStatement Statement for adding new entries */
    private $addStmt;

    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(FlightCrewModel::INSERT_QUERY);
        $this->selStmt = $this->dbConn->prepare(FlightCrewModel::SELECT_QUERY);
        $this->delStmt = $this->dbConn->prepare(FlightCrewModel::DELETE_QUERY);
    }

    /**
     * Get all aircraft stored in the DB
     * @return array in associative form
     */
    public function getAll() {
        // Fetch all Aircraft as associative arrays
        $this->selStmt->execute();
        return $this->selStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Try to add a new aircraft
     *
     * @param 
     *
     * @return bool true on success, false otherwise
     */
    public function add($givenFlightIDFK,$givenEmployeeIDFK) {
        return $this->addStmt->execute(array("FlightIDFK" => $givenFlightIDFK,"EmployeeIDFK" => $givenEmployeeIDFK));
    }
    

}