<?php

class BookingModel {
    private $dbConn;

    const TABLE = "Booking";
    const SELECT_QUERY = "SELECT * FROM " . BookingModel::TABLE;
    const DELETE_QUERY = " DELETE FROM " . BookingModel::TABLE . " WHERE (CustomerID)=(:CustomerID)";   

    private $selStmt; // Select Statement

    private $delStmt;

    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->selStmt = $this->dbConn->prepare(BookingModel::SELECT_QUERY);
        $this->delStmt = $this->dbConn->prepare(BookingModel::DELETE_QUERY);
    }

  
    public function getAll() {
        $this->selStmt->execute();
        return $this->selStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function remove($CustomerID)
    {
        return $this->delStmt->execute(array("CustomerID" => $CustomerID));
    }

}