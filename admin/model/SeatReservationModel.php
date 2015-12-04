<?php



class SeatReservationModel {
    
    private $dbConn;

    const TABLE = "SeatReservation";
    const SELECT_QUERY = "SELECT * FROM " . SeatReservationModel::TABLE;
    const SELECT_WHERE_FLIGHTID_QUERY = "SELECT * FROM " . SeatReservationModel::TABLE . " WHERE (FlightID)=(:flightID)";
    const SELECT_WHERE_SEAT_QUERY = "SELECT * FROM " . SeatReservationModel::TABLE . " WHERE (FlightID)=(:flightID)";
    const DELETE_QUERY = "DELETE FROM " . SeatReservationModel::TABLE . " WHERE (FlightID)=(:flightID)";
    const SELECT_SEATPRODUCTS_QUERY = "SELECT * FROM SeatReservation_Product WHERE (FlightID)=(:flightID)"; 
    const DELETE_SEATPRODUCUTS_QUERY = "DELETE FROM SeatReservation_Product WHERE (FlightID)=(:flightID)";
    const DELETE_CUSTOMER_QUERY = "DELETE FROM " . SeatReservationModel::TABLE . " WHERE (CustomerID)=(:customerID)";
    const DELETE_SEAT_FLIGHT_QUERY = "DELETE FROM " . SeatReservationModel::TABLE . " WHERE (FlightID)=(:FlightID) AND (SeatNumber)=(:SeatNumber)";
    const DELETE_SEAT_PROD_FLIGHT_QUERY = "DELETE FROM SeatReservation_Product WHERE (FlightID)=(:FlightID) AND (SeatNumber)=(:SeatNumber)";
    const DELETE_SEAT_PROD_CUSTOMER_QUERY = "DELETE FROM SeatReservation_Product WHERE (CustomerID)=(:CustomerID)";
    const SELECT_ALL_BY_CUSTOMER_ID = "SELECT * FROM " . SeatReservationModel::TABLE . " WHERE (CustomerID)=(:CostomerID)";

    
    //Select variable
    private $selWhrFStmt;
    private $selAllbyCustStmt;
    private $selSeatProdStmt;
    
    // Delete variable
    private $delStmt;
    private $delCustStmt;
    private $delSeatResProdStmt;
    private $delSeatFlightStmt;
    private $delSeatProdFlightStmt;
    private $delSeatProdCustStmt;


    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->delStmt = $this->dbConn->prepare(SeatReservationModel::DELETE_QUERY);
        $this->delCustStmt = $this->dbConn->prepare(SeatReservationModel::DELETE_CUSTOMER_QUERY);
        $this->selWhrFStmt = $this->dbConn->prepare(SeatReservationModel::SELECT_WHERE_FLIGHTID_QUERY);
        $this->selSeatProdStmt = $this->dbConn->prepare(SeatReservationModel::SELECT_SEATPRODUCTS_QUERY);
        $this->delSeatResProdStmt = $this->dbConn->prepare(SeatReservationModel::DELETE_SEATPRODUCUTS_QUERY);
        $this->delSeatFlightStmt = $this->dbConn->prepare(SeatReservationModel::DELETE_SEAT_FLIGHT_QUERY);
        $this->delSeatProdFlightStmt = $this->dbConn->prepare(SeatReservationModel::DELETE_SEAT_PROD_FLIGHT_QUERY);
        $this->delSeatProdCustStmt = $this->dbConn->prepare(SeatReservationModel::DELETE_SEAT_PROD_CUSTOMER_QUERY);
        $this->selAllbyCustStmt = $this->dbConn->prepare(SeatReservationModel::SELECT_ALL_BY_CUSTOMER_ID);


    }

    public function selectAllByCustomerID($customerID)
    {
       $this->selAllbyCustStmt->execute(array("CustomerID" => $customerID));
       return $this->selAllbyCustStmt->fetchAll(PDO::FETCH_ASSOC); 
    }
    
    public function removeFlightWhereID($flightID)
    {
       return $this->delStmt->execute(array("flightID" => $flightID));
    }
    
    public function removeSeatProdByCustomerID($customerID)
    {
       return $this->delSeatProdCustStmt->execute(array("CustomerID" => $customerID));
    }
    
    
    //Removes all seatreservation product from a given flight.
    public function removeSeatReservationProduct($flightID)
    {
       return $this->delSeatResProdStmt->execute(array("flightID" => $flightID));
    }
    
    
    public function removeBookingWhereCustID($customerID)
    {
       return $this->delCustStmt->execute(array("customerID" => $customerID));
    }

    
    public function removeSeatProductByFlightAndSeat($seatNumber,$flightID)
    {
       return $this->delSeatProdFlightStmt->execute(array("FlightID" => $flightID,  "SeatNumber" => $seatNumber));
    }
    
    public function removeSeatByFlightAndSeat($seatNumber,$flightID)
    {
       return $this->delSeatFlightStmt->execute(array("FlightID" => $flightID,  "SeatNumber" => $seatNumber));
    }
    
    
    public function getAllWhereFlightID($FlightID)
    {
       $this->selWhrFStmt->execute(array("flightID" => $FlightID));
       return $this->selWhrFStmt->fetchAll(PDO::FETCH_ASSOC); 
    }
    
    public function getAllProdWhereFlightID($FlightID)
    {
       $this->selSeatProdStmt->execute(array("flightID" => $FlightID));
       return $this->selSeatProdStmt->fetchAll(PDO::FETCH_ASSOC); 
    }
    
}