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


        $tempFlightID = isset($_REQUEST["FlightID"]) ? $_REQUEST["FlightID"] : "";
        $FlightID = htmlspecialchars($tempFlightID);
        
        $data = array(
            "flights" => $flights,
            "FlightID" => $FlightID,
            
        );
        
        return $this->render("flight", $data);
    }
    
    
    private function addFlightAction() {
        // Find "customerName" parameter in request,
        $givenFlightID = $_REQUEST["givenFlightID"];
        $givenRegIDFK = $_REQUEST["givenRegIDFK"];
        $FlightDate = $_REQUEST["givenFlightDate"];
        $givenDeparture = $_REQUEST["givenDeparture"];
        $givenTourType = $_REQUEST["givenTourType"];
        if (!$givenFlightID) {
            return $this->showFlightAction();
        }

        // Try to add new customer, Set action response code - success or not
        /** @var CustomerModel $customerModel */
        $flightModel = $GLOBALS["flightModel"];
        $added = $flightModel->add($givenFlightID,$givenRegIDFK,$FlightDate,$givenDeparture,$givenTourType);

        // Render the page
        $data = array(
            "added" => $added,
            "givenRegID" => $givenFlightID,
        );
        return $this->render("flightAdd", $data);
    }
   
    
        
    
}