<?php

class BookingModel {
    private $dbConn;

    const TABLE = "Booking";
    const SELECT_QUERY = "SELECT * FROM " . BookingModel::TABLE;
    const SELECT_CUSTOM_QUERY = "SELECT * FROM " . BookingModel::TABLE . " WHERE CustomRequest !='0' ";
    const SELECT_PRE_QUERY = "SELECT * FROM " . BookingModel::TABLE . " WHERE CustomRequest = '0' ";
    const DELETE_QUERY = " DELETE FROM " . BookingModel::TABLE . " WHERE (CustomerID)=(:CustomerID)";   

    private $selStmt; // Select Statement
    private $selCustStmt;
    private $selPreStmt;
    private $delStmt;

    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->selStmt = $this->dbConn->prepare(BookingModel::SELECT_QUERY);
        $this->delStmt = $this->dbConn->prepare(BookingModel::DELETE_QUERY);
        $this->selCustStmt = $this->dbConn->prepare(BookingModel::SELECT_CUSTOM_QUERY);
         $this->selPreStmt = $this->dbConn->prepare(BookingModel::SELECT_PRE_QUERY);

    }

  
    public function getAll() {
        $this->selStmt->execute();
        return $this->selStmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getAllPre()
    {
        $this->selPreStmt->execute();
        return $this->selPreStmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function getAllCustom()
    {
       $this->selCustStmt->execute();
        return $this->selCustStmt->fetchAll(PDO::FETCH_ASSOC); 
    }
    
    public function remove($CustomerID)
    {
        return $this->delStmt->execute(array("CustomerID" => $CustomerID));
    }

}