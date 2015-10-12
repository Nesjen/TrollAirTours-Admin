<?php

class DestinationModel {
    
    private $dbConn;

    const TABLE = "Destination";
    const SELECT_QUERY = "SELECT * FROM " . DestinationModel::TABLE;
    const INSERT_QUERY = "INSERT INTO " . DestinationModel::TABLE . " (DestinationName) VALUES (:DestinationName)";
    const DELETE_QUERY = "DELETE FROM" . DestinationModel::TABLE . " WHERE RegID= ?";

    /** @var PDOStatement Statement for selecting all entries */
    private $selStmt;
    /** @var PDOStatement Statement for adding new entries */
    private $addStmt;

    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(DestinationModel::INSERT_QUERY);
        $this->selStmt = $this->dbConn->prepare(DestinationModel::SELECT_QUERY);
        $this->delStmt = $this->dbConn->prepare(DestinationModel::DELETE_QUERY);
    }

    /**
     * Get all aircraft stored in the DB
     * @return array in associative form
     */
    public function getAll() {
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
    public function add($givenDestinationName) {
        return $this->addStmt->execute(array("DestinationName" => $givenDestinationName));
    }
    

}