<?php

class EmployeeModel {
    
    private $dbConn;

    const TABLE = "Employee";
    const SELECT_QUERY = "SELECT * FROM " . EmployeeModel::TABLE;
    const SELECT_WHERE_QUERY = "SELECT * FROM " . EmployeeModel::TABLE . " WHERE Position = ?";
    const SELECT_WHERE_ID_QUERY = "SELECT * FROM " . EmployeeModel::TABLE . " WHERE EmployeeID = ?";
    const INSERT_QUERY = "INSERT INTO " . EmployeeModel::TABLE . " (EmployeeID,Position,FirstName,LastName) VALUES (:EmployeeID,:EmployeeP,:EmployeeFN,:EmployeeLN)";
    const DELETE_QUERY = "DELETE FROM" . EmployeeModel::TABLE . " WHERE EmployeeID= ?";

    private $selStmt;
    private $addStmt;
    private $selWhereStmt;
    private $selWhereIDStmt;

    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(EmployeeModel::INSERT_QUERY);
        $this->selStmt = $this->dbConn->prepare(EmployeeModel::SELECT_QUERY);
        $this->selWhereStmt = $this->dbConn->prepare(EmployeeModel::SELECT_WHERE_QUERY);
        $this->selWhereIDStmt = $this->dbConn->prepare(EmployeeModel::SELECT_WHERE_ID_QUERY);
        $this->delStmt = $this->dbConn->prepare(EmployeeModel::DELETE_QUERY);
    }

    public function getAll() {
        // Fetch all customers as associative arrays
        $this->selStmt->execute();
        return $this->selStmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getAllWhereEmployeeID($EmployeeID) {
        // Fetch all customers as associative arrays
        $this->selWhereIDStmt->execute(array($EmployeeID));
        return $this->selWhereIDStmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    public function getAllWherePosition($Position) {
        // Fetch all customers as associative arrays
        $this->selWhereStmt->execute(array($Position));
        return $this->selWhereStmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function add($givenEmployeeID,$givenEmployeeFN,$givenEmployeeLN,$givenEmployeeP) {
        return $this->addStmt->execute(array("EmployeeID" => $givenEmployeeID,"EmployeeP" => $givenEmployeeP,"EmployeeFN" => $givenEmployeeFN,"EmployeeLN" => $givenEmployeeLN));
    }
    
    public function delete($EmployeeID) {
        return $this->delStmt->execute($EmployeeID);
    }
    
}