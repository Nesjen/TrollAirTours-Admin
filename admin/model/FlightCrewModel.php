<?php



class FlightCrewModel {
    
    private $dbConn;

    const TABLE = "FlightCrew";
    const SELECT_WHERE_QUERY = "SELECT * FROM " . FlightCrewModel::TABLE . " WHERE FlightID= ?";
    const SELECT_QUERY = "SELECT * FROM " . FlightCrewModel::TABLE;
    //-ORIGINAL- const INSERT_QUERY = "INSERT INTO " . FlightCrewModel::TABLE . " (FlightID,PilotID,GuideID) VALUES (:FlightIDFK,:PilotIDFK,:GuideIDFK)";
    const INSERT_SINGLE_QUERY = "INSERT INTO " . FlightCrewModel::TABLE . " (FlightID,EmployeeID) VALUES (:FlightIDFK,:EmployeeIDFK)";
    const DELETE_QUERY = "DELETE FROM " . FlightCrewModel::TABLE . " WHERE (FlightID)=(:flightID)";
    const SELECT_ALL_PILOT_QUERY = "SELECT * FROM " . FlightCrewModel::TABLE . " WHERE EmployeeID = ? ";
    const SELECT_ALL_GUIDE_QUERY = "SELECT * FROM " . FlightCrewModel::TABLE . " WHERE GuideID = ? ";


    private $selStmt;
    private $addStmt;
    private $selWhrStmt;
    private $delStmt;
    private $selPilotStmt;
    private $selGuideStmt;
    private $addSingleStmt;

    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        //$this->addStmt = $this->dbConn->prepare(FlightCrewModel::INSERT_QUERY);
        $this->addSingleStmt = $this->dbConn->prepare(FlightCrewModel::INSERT_SINGLE_QUERY);
        $this->selWhrStmt = $this->dbConn->prepare(FlightCrewModel::SELECT_WHERE_QUERY);
        $this->selStmt = $this->dbConn->prepare(FlightCrewModel::SELECT_QUERY);
        $this->delStmt = $this->dbConn->prepare(FlightCrewModel::DELETE_QUERY);
        $this->selGuideStmt = $this->dbConn->prepare(FlightCrewModel::SELECT_ALL_GUIDE_QUERY);
        $this->selPilotStmt = $this->dbConn->prepare(FlightCrewModel::SELECT_ALL_PILOT_QUERY);
    }

    public function getAll() {
        $this->selStmt->execute();
        return $this->selStmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getAllWhereFlightID($FlightID) {
        $this->selStmt->execute(array($FlightID));
        return $this->selStmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getAllWhereEmployeeID($EmployeeID) {
        $this->selPilotStmt->execute(array($EmployeeID));
        return $this->selPilotStmt->fetchAll(PDO::FETCH_ASSOC);
    }
    /*
    public function getAllWherePilotID($PilotID) {
        $this->selPilotStmt->execute(array($PilotID));
        return $this->selPilotStmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getAllWhereGuideID($GuideID) {
        $this->selGuideStmt->execute(array($GuideID));
        return $this->selGuideStmt->fetchAll(PDO::FETCH_ASSOC);
    }
    */
    public function removeFlightWhereID($flightID)
    {
       //echo $flightID . " Sletter fra Flightcrew..";
       return $this->delStmt->execute(array("flightID" => $flightID));
    }

    public function addSingle($givenFlightIDFK,$givenEmployeeIDFK) {
        return $this->addSingleStmt->execute(array("FlightIDFK" => $givenFlightIDFK,"EmployeeIDFK" => $givenEmployeeIDFK));
    }
    
    public function addDual($givenPilotIDFK,$givenGuideIDFK,$givenFlightID)
    {
        //Orginal return $this->addStmt->execute(array("FlightIDFK" => $givenFlightID,"PilotIDFK" => $givenPilotIDFK,"GuideIDFK" => $givenGuideIDFK));
        $this->addSingleStmt->execute(array("FlightIDFK" => $givenFlightID,"EmployeeIDFK" => $givenPilotIDFK)); //Adding Pilot
        return $this->addSingleStmt->execute(array("FlightIDFK" => $givenFlightID,"EmployeeIDFK" => $givenGuideIDFK)); //Adding Guide
    }
    

}