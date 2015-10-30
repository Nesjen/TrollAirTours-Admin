<?php



class SeatReservationModel {
    
    private $dbConn;

    const TABLE = "SeatReservation";
    const SELECT_QUERY = "SELECT * FROM " . SeatReservationModel::TABLE;
    const DELETE_QUERY = "DELETE FROM " . SeatReservationModel::TABLE . " WHERE (FlightID)=(:flightID)";
    const DELETE_CUSTOMER_QUERY = "DELETE FROM " . SeatReservationModel::TABLE . " WHERE (CustomerID)=(:customerID)";

    private $delStmt;
    private $delCustStmt;

    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->delStmt = $this->dbConn->prepare(SeatReservationModel::DELETE_QUERY);
        $this->delCustStmt = $this->dbConn->prepare(SeatReservationModel::DELETE_CUSTOMER_QUERY);
        
    }

    public function removeFlightWhereID($flightID)
    {
       return $this->delStmt->execute(array("flightID" => $flightID));
    }
    
    public function removeBookingWhereCustID($customerID)
    {
       return $this->delCustStmt->execute(array("customerID" => $customerID));
    }

    

}