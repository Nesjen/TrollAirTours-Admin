<?php



class SeatReservationModel {
    
    private $dbConn;

    const TABLE = "FlightCrew";
    const SELECT_QUERY = "SELECT * FROM " . SeatReservationModel::TABLE;
    const DELETE_QUERY = "DELETE FROM " . SeatReservationModel::TABLE . " WHERE (FlightID)=(:flightID)";


    private $delStmt;

    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->delStmt = $this->dbConn->prepare(SeatReservationModel::DELETE_QUERY);
        
    }

    public function removeFlightWhereID($flightID)
    {
       return $this->delStmt->execute(array("flightID" => $flightID));
    }

    

}