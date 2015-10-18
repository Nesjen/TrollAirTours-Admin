<?php

require_once("Controller.php");

class FlightController extends Controller {


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
        $flightFK = $flightModel->getAllWithFK();
        
        $aircraftModel = $GLOBALS["aircraftModel"];
        $aircrafts = $aircraftModel->getAll();
        
       $employeeModel = $GLOBALS["employeeModel"];
       $employees = $employeeModel->getAll();
       $pilots = $employeeModel->getAllWherePosition(array("Pilot"));
       $guides = $employeeModel->getAllWherePosition(array("Guide"));
        
        $flightCrewModel = $GLOBALS["flightCrewModel"];
        $FlightCrews = $flightCrewModel->getAll();
       
//        $flightArray = Array();
//        
//       foreach($flightsFK as $flightFK )
//       {
//           $FlightAR = array();
//           if($flightFK["Position"] == "Pilot")
//           {
//               $Pilot = $flightFK["employeeID"];
//           }else if ($flightFK["Position"] == "Guide")
//           {
//               $Guide = $flightFK["employeeID"];
//           }
//       }
        

           
        $data = array(
            "flights" => $flights,
            "flightFK" => $flightFK,
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
        //$added2 = $flightCrewModel->
        
        $added2 = $flightCrewModel->addDual($givenPilotIDFK,$givenGuideIDFK,$givenFlightID);
        
        
        $data = array(
            "added" => $added,
            "added2" => $added2,
            "givenRegID" => $givenFlightID,
        );
        return $this->render("flightAdd", $data);
    }
   
    
        
    
}