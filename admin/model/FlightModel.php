<?php

class FlightModel {
    
    private $dbConn;

    const TABLE = "Flight";
    const SELECT_QUERY = "SELECT * FROM " . FlightModel::TABLE;
    const INSERT_QUERY = "INSERT INTO " . FlightModel::TABLE . " (FlightID,RegID,FlightDate,Departure,TourType) VALUES (:FlightID,:RegID,:FlightDate,:Departure,:TourType)";
    const DELETE_QUERY = "DELETE FROM" . FlightModel::TABLE . " WHERE FlightID= ?";

    /** @var PDOStatement Statement for selecting all entries */
    private $selStmt;
    /** @var PDOStatement Statement for adding new entries */
    private $addStmt;

    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(FlightModel::INSERT_QUERY);
        $this->selStmt = $this->dbConn->prepare(FlightModel::SELECT_QUERY);
        $this->delStmt = $this->dbConn->prepare(FlightModel::DELETE_QUERY);
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
    public function add($givenFlightID,$givenRegIDFK,$givenFlightDate,$givenDeparture,$givenTourType) {
        return $this->addStmt->execute(array("FlightID" => $givenFlightID,"RegID" => $givenRegIDFK,"FlightDate" => $givenFlightDate,"Departure" => $givenDeparture, "TourType" => $givenTourType));
    }
    

}