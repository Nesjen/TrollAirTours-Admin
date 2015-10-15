<?php

require_once("Controller.php");

class FlightController extends Controller {

    /**
     * Shows all possible pages
     * @param string $page
     */
    public function show($page) {
        if ($page == "addFlight") {
            $this->addFlightAction();
        } else if ($page == "flight") {
            $this->showFlightAction();
        }
    }
    

    private function showFlightAction() {
        $flightModel = $GLOBALS["flightModel"];
        $flights = $flightModel->getAll();

        $aircraftModel = $GLOBALS["aircraftModel"];
        $aircrafts = $aircraftModel->getAll();
        
       $employeeModel = $GLOBALS["employeeModel"];
       $employees = $employeeModel->getAll();
        
        $flightCrewModel = $GLOBALS["flightCrewModel"];
        $FlightCrews = $flightCrewModel->getAll();
        
        $data = array(
            "flights" => $flights,
            "aircrafts" => $aircrafts,
            "flightCrews" => $FlightCrews,
            "employees" => $employees,
        );
        
        return $this->render("flight", $data);
    }
    
    
    private function addFlightAction() {
        $givenFlightID = $_REQUEST["givenFlightID"];
        $givenRegIDFK = $_REQUEST["givenRegIDFK"];
        $FlightDate = $_REQUEST["givenFlightDate"];
        $givenDeparture = $_REQUEST["givenDeparture"];
        $givenTourType = $_REQUEST["givenTourType"];
        $givenPilotIDFK = $_REQUEST["givenPilotIDFK"];
        $givenGuideIDFK = $_REQUEST["givenGuideIDFK"];
        
        if (!$givenFlightID) {
            return $this->showFlightAction();
        }
        
        $flightModel = $GLOBALS["flightModel"];
        $added = $flightModel->add($givenFlightID,$givenRegIDFK,$FlightDate,$givenDeparture,$givenTourType);

        $flightCrewModel = $GLOBALS["flightCrewModel"];
        $added2 = $flightCrewModel->add($givenPilotIDFK,$givenGuideIDFK,$givenFlightID);
        
        
        $data = array(
            "added" => $added,
            "added2" => $added2,
            "givenRegID" => $givenFlightID,
        );
        return $this->render("flightAdd", $data);
    }
   
    
        
    
}