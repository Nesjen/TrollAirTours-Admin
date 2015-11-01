<?php



class SeatReservationModel {
    
    private $dbConn;

    const TABLE = "SeatReservation";
    const SELECT_QUERY = "SELECT * FROM " . SeatReservationModel::TABLE;
    const SELECT_WHERE_FLIGHTID_QUERY = "SELECT * FROM " . SeatReservationModel::TABLE . " WHERE (FlightID)=(:flightID)";
    const DELETE_QUERY = "DELETE FROM " . SeatReservationModel::TABLE . " WHERE (FlightID)=(:flightID)";
    const DELETE_CUSTOMER_QUERY = "DELETE FROM " . SeatReservationModel::TABLE . " WHERE (CustomerID)=(:customerID)";

    private $delStmt;
    private $delCustStmt;
    private $selWhrFStmt;

    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->delStmt = $this->dbConn->prepare(SeatReservationModel::DELETE_QUERY);
        $this->delCustStmt = $this->dbConn->prepare(SeatReservationModel::DELETE_CUSTOMER_QUERY);
        $this->selWhrFStmt = $this->dbConn->prepare(SeatReservationModel::SELECT_WHERE_FLIGHTID_QUERY);
        
    }

    public function removeFlightWhereID($flightID)
    {
       return $this->delStmt->execute(array("flightID" => $flightID));
    }
    
    public function removeBookingWhereCustID($customerID)
    {
       return $this->delCustStmt->execute(array("customerID" => $customerID));
    }

    
    public function getAllWhereFlightID($FlightID)
    {
       $this->selWhrFStmt->execute(array("FlightID" => $FlightID));
       return $this->selWhrFStmt->fetchAll(PDO::FETCH_ASSOC); 
    }
}