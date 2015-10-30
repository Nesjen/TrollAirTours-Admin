<?php

require_once("Controller.php");

class FlightController extends Controller {


    public function show($page) {
        if ($page == "addFlight") {
            $this->addFlightAction();
        } else if ($page == "flight") {
            $this->showFlightAction();
        }else if ($page == "removeFlight") {
            $this->removeFlightAction();
        }
    }
    

    private function showFlightAction() {
        $flightModel = $GLOBALS["flightModel"];
        $flights = $flightModel->getAll();
        $flightFK = $flightModel->getAllWithFK();
        $flightFkAndNames = $flightModel->getAllWithFkAndNames();
        
        $aircraftModel = $GLOBALS["aircraftModel"];
        $aircrafts = $aircraftModel->getAll();
        
        $employeeModel = $GLOBALS["employeeModel"];
        $employees = $employeeModel->getAll();
    
        $flightCrewModel = $GLOBALS["flightCrewModel"];
        $FlightCrews = $flightCrewModel->getAll();
       
        $pilots =  $employeeModel->getAllWherePosition("Pilot");
        $guides =  $employeeModel->getAllWherePosition("Guide");
   
    
        $data = array(
            "flights" => $flights,
            "flightFK" => $flightFK,
            "flightFkAndNames" => $flightFkAndNames,
            "aircrafts" => $aircrafts,
            "flightCrews" => $FlightCrews,
            "pilots" => $pilots,
            "guides" => $guides,
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
        
        $added2 = $flightCrewModel->addDual($givenPilotIDFK,$givenGuideIDFK,$givenFlightID);
        
        
        $data = array(
            "added" => $added,
            "added2" => $added2,
            "givenRegID" => $givenFlightID,
        );
        return $this->render("flightAdd", $data);
    }
   
    
    /**
     * Remove posted flightID.
     * 
     * @return type
     */
    private function removeFlightAction()
    {
        $givenFlightID = filter_input(INPUT_POST, "givenFlightID");
        $flightModel = $GLOBALS["flightModel"];
        $flightCrewModel = $GLOBALS["flightCrewModel"];
        $seatReservationModel = $GLOBALS["seatReservationModel"];
        
        
        $added2 = $flightCrewModel->removeFlightWhereID($givenFlightID);
        $added3 = $seatReservationModel->removeFlightWhereID($givenFlightID);
        $added = $flightModel->removeFlightWhereID($givenFlightID);
        
        
        
        $data = array(
            "added" => $added,
            "added2" => $added2,
            "added3" => $added3,
            "givenFlightID" => $givenFlightID,
        );
        return $this->render("flightRemove", $data);
    }
    
}