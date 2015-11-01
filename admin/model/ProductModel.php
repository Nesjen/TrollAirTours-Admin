<?php

class ProductModel {
    private $dbConn;

    const TABLE = "Product";
    const SELECT_QUERY = "SELECT * FROM " . ProductModel::TABLE;
    const INSERT_QUERY = "INSERT INTO " . ProductModel::TABLE . " (ProductID,ProductType,ProductName,ProductDescription,ProductPrice) VALUES (:ProductID,:ProductType,:ProductName,:ProductDescription,:ProductPrice)";
    const DELETE_QUERY = " DELETE FROM " . ProductModel::TABLE . " WHERE (ProductID)=(:ProductID)";   

    private $selStmt; // Select Statement
    private $addStmt;
    private $delStmt;

    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->selStmt = $this->dbConn->prepare(ProductModel::SELECT_QUERY);
        $this->addStmt = $this->dbConn->prepare(ProductModel::INSERT_QUERY);
        $this->delStmt = $this->dbConn->prepare(ProductModel::DELETE_QUERY);
    }

  
    public function getAll() {
        $this->selStmt->execute();
        return $this->selStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function add($ProductID,$ProductType,$ProductName,$ProductDescription,$ProductPrice)
    {
         return $this->addStmt->execute(array("ProductID" => $ProductID,"ProductType" => $ProductType,"ProductName" => $ProductName,"ProductDescription" => $ProductDescription,"ProductPrice" => $ProductPrice));
    }
    
    public function remove($ProductID)
    {
        return $this->delStmt->execute(array("ProductID" => $ProductID));
    }

}