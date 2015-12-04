<?php

class UserModel {
    
    private $dbConn;

    const TABLE = "adminUsers";
    const SELECT_QUERY = "SELECT * FROM " . UserModel::TABLE;
    const INSERT_QUERY = "INSERT INTO " . UserModel::TABLE . " (Username,Password) VALUES (:givenAdminUsername,:givenAdminPassword)";
    const DELETE_QUERY = "DELETE FROM " . UserModel::TABLE . " WHERE Username= ?";

    private $selStmt;
    private $addStmt;

    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(UserModel::INSERT_QUERY);
        $this->selStmt = $this->dbConn->prepare(UserModel::SELECT_QUERY);
        $this->delStmt = $this->dbConn->prepare(UserModel::DELETE_QUERY);
    }


    public function getAll() {
        $this->selStmt->execute();
        return $this->selStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($givenAdminUsername,$givenAdminPassword) {
        return $this->addStmt->execute(array("givenAdminUsername" => $givenAdminUsername,"givenAdminPassword" => sha1($givenAdminPassword)));
    }
    
    public function remove($adminUser)
    {
       return $this->delStmt->execute(array($adminUser));

    }

}