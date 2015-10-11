<?php

require_once("Controller.php");

class AircraftController extends Controller {

    /**
     * Shows all possible pages
     * @param string $page
     */
    public function show($page) {
        if ($page == "addAircraft") {
            $this->addAircraftAction();
        } else if ($page == "aircraft") {
            $this->showAircraftAction();
        }
    }
    

    private function showAircraftAction() {
        $aircraftModel = $GLOBALS["aircraftModel"];
        $aircrafts = $aircraftModel->getAll();


        $tempRegID = isset($_REQUEST["RegID"]) ? $_REQUEST["RegID"] : "";
        $RegID = htmlspecialchars($tempRegID);
        
        $data = array(
            "aircrafts" => $aircrafts,
            "RegID" => $RegID,
            
        );
        
        return $this->render("aircraft", $data);
    }
    
    
    private function addAircraftAction() {
        // Find "customerName" parameter in request,
        $givenRegID = $_REQUEST["givenRegID"];
        $givenAircraftType = $_REQUEST["givenAircraftType"];
        $givenNumberOfSeats = $_REQUEST["givenNumberOfSeats"];
        $givenNumberOfCrew = $_REQUEST["givenNumberOfCrew"];
        if (!$givenRegID) {
            // No customer name supplied, redirect to customer list
            return $this->showAircraftAction();
        }

        // Try to add new customer, Set action response code - success or not
        /** @var CustomerModel $customerModel */
        $aircraftModel = $GLOBALS["aircraftModel"];
        $added = $aircraftModel->add($givenRegID,$givenAircraftType,$givenNumberOfSeats,$givenNumberOfCrew);

        // Render the page
        $data = array(
            "added" => $added,
            "givenRegID" => $givenRegID,
        );
        return $this->render("aircraftAdd", $data);
    }
   
    
        
    
}