<?php

class AircraftModel {
    
    private $dbConn;

    const TABLE = "Aircraft";
    const SELECT_QUERY = "SELECT * FROM " . AircraftModel::TABLE;
    const INSERT_QUERY = "INSERT INTO " . AircraftModel::TABLE . " (RegID,AircraftType,NumberOfSeats) VALUES (:RegID,:AircraftType,:NumberOfSeats)";
    const DELETE_QUERY = "DELETE FROM " . AircraftModel::TABLE . " WHERE RegID = ?";

    private $selStmt;
    private $addStmt;
    private $delStmt;

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
    
    public function removeAircraftWhereID($RegID)
    {
       return $this->delStmt->execute(array($RegID)); 
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