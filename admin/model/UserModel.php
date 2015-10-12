<?php

class UserModel {
    
    private $dbConn;

    const TABLE = "User";
    const SELECT_QUERY = "SELECT * FROM " . UserModel::TABLE;
    const INSERT_QUERY = "INSERT INTO " . UserModel::TABLE . " (Username,Password) VALUES (:givenUsername,:givenPassword)";
    const DELETE_QUERY = "DELETE FROM" . UserModel::TABLE . " WHERE EmployeeID= ?";

    /** @var PDOStatement Statement for selecting all entries */
    private $selStmt;
    /** @var PDOStatement Statement for adding new entries */
    private $addStmt;

    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(EmployeeModel::INSERT_QUERY);
        $this->selStmt = $this->dbConn->prepare(EmployeeModel::SELECT_QUERY);
        $this->delStmt = $this->dbConn->prepare(EmployeeModel::DELETE_QUERY);
    }

    /**
     * Get all customers stored in the DB
     * @return array in associative form
     */
    public function getAll() {
        // Fetch all customers as associative arrays
        $this->selStmt->execute();
        return $this->selStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Try to add a new customer
     *
     * @param 
     *
     * @return bool true on success, false otherwise
     */
    public function add($givenUsername,$givenPassword) {
        return $this->addStmt->execute(array("givenUsername" => $givenUsername,"givenPassword" => $givenPassword));
    }
    
    

    // TODO - create additional functions for customer model here

}