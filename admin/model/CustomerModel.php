<?php

class CustomerModel {
    private $dbConn;

    const TABLE = "customer";
    const SELECT_QUERY = "SELECT * FROM " . CustomerModel::TABLE;
    const INSERT_QUERY = " INSERT INTO " . CustomerModel::TABLE . " ( Gender, FirstName, LastName, AreaCode, TelephoneNumber, StreetAddress, City, ZipCode, Email, Country) VALUES ( :Gender,:FirstName,:LastName,:AreaCode,:TelephoneNumber,:StreetAddress,:City,:ZipCode,:Email,:Country)";
    const DELETE_QUERY = " DELETE FROM " . CustomerModel::TABLE . " WHERE (CustomerID)=(:CustomerID)";   

    private $selStmt; // Select Statement
    private $addStmt; // Insert Statement
    private $delStmt;

    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(CustomerModel::INSERT_QUERY);
        $this->selStmt = $this->dbConn->prepare(CustomerModel::SELECT_QUERY);
        $this->delStmt = $this->dbConn->prepare(CustomerModel::DELETE_QUERY);
    }

    /**
     * Gets all Customers, all fields.
     * 
     * @return Array - An Array with a set of Arrays for each row
     */
    public function getAll() {
        $this->selStmt->execute();
        return $this->selStmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Adds a new Customer.
     *
     * @param $name
     *
     * @return int - Last CustomerID( AutoIncrement value)
     */
    public function add($givenGender, $givenFirst_name, $givenLast_name, $givenStreet_address, $givenCountry_code, $givenPhone_number, $givenCity, $givenZip_code, $givenEmail, $givenCountry) {
      $this->addStmt->execute(array("Gender" =>$givenGender, "FirstName" => $givenFirst_name, "LastName" => $givenLast_name, "AreaCode" => $givenCountry_code, "TelephoneNumber" => $givenPhone_number, "StreetAddress" => $givenStreet_address, "City" => $givenCity, "ZipCode" => $givenZip_code, "Email" => $givenEmail, "Country" => $givenCountry));
      $lastID = $this->dbConn->lastInsertId('customer');
      return $lastID;
    }
    
    public function remove($CustomerID)
    {
        return $this->delStmt->execute(array("CustomerID" => $CustomerID));
    }

}