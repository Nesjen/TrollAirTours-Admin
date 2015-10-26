<?php



class FlightCrewModel {
    
    private $dbConn;

    const TABLE = "FlightCrew";
    const SELECT_WHERE_QUERY = "SELECT * FROM" . FlightCrewModel::TABLE . " WHERE FlightID= ?";
    const SELECT_QUERY = "SELECT * FROM " . FlightCrewModel::TABLE;
    const INSERT_QUERY = "INSERT INTO " . FlightCrewModel::TABLE . " (FlightID,PilotID,GuideID) VALUES (:FlightIDFK,:PilotIDFK,:GuideIDFK)";


    private $selStmt;
    private $addStmt;
    private $selWhrStmt;

    public function __construct(PDO $dbConn) {
        $this->dbConn = $dbConn;
        $this->addStmt = $this->dbConn->prepare(FlightCrewModel::INSERT_QUERY);
        $this->selWhrStmt = $this->dbConn->prepare(FlightCrewModel::SELECT_WHERE_QUERY);
        $this->selStmt = $this->dbConn->prepare(FlightCrewModel::SELECT_QUERY);
        
    }

    public function getAll() {
        $this->selStmt->execute();
        return $this->selStmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getAllWhereFlightID($FlightID) {
        $this->selStmt->execute(array($FlightID));
        return $this->selStmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    

    public function addSingle($givenFlightIDFK,$givenEmployeeIDFK) {
        return $this->addStmt->execute(array("FlightIDFK" => $givenFlightIDFK,"EmployeeIDFK" => $givenEmployeeIDFK));
    }
    
    public function addDual($givenPilotIDFK,$givenGuideIDFK,$givenFlightID)
    {
         return $this->addStmt->execute(array("FlightIDFK" => $givenFlightID,"PilotIDFK" => $givenPilotIDFK,"GuideIDFK" => $givenGuideIDFK));
        
    }
    

}