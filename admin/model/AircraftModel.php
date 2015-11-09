<?php

class AircraftModel {
    
    private $dbConn;

    const TABLE = "Aircraft";
    const SELECT_QUERY = "SELECT * FROM " . AircraftModel::TABLE;
    const INSERT_QUERY = "INSERT INTO " . AircraftModel::TABLE . " (RegID,AircraftType,NumberOfSeats) VALUES (:RegID,:AircraftType,:NumberOfSeats)";
    const DELETE_QUERY = "DELETE FROM" . AircraftModel::TABLE . " WHERE RegID= ?";

    /** @var PDOStatement Statement for selecting all entries */
    private $selStmt;
    /** @var PDOStatement Statement for adding new entries */
    private $addStmt;

    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(AircraftModel::INSERT_QUERY);
        $this->selStmt = $this->dbConn->prepare(AircraftModel::SELECT_QUERY);
        $this->delStmt = $this->dbConn->prepare(AircraftModel::DELETE_QUERY);
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
    public function add($givenRegID,$givenAircraftType,$givenNumberOfSeats,$givenNumberOFCrew) {
        return $this->addStmt->execute(array("RegID" => $givenRegID,"AircraftType" => $givenAircraftType,"NumberOfSeats" => $givenNumberOfSeats));
    }
    

}