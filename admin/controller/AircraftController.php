<?php

require_once("Controller.php");

class AircraftController extends Controller {

    /**
     * Shows all possible pages within the aircraft controller
     * @param string $page - The page to be rendered
     */
    public function show($page) {
        if ($page == "addAircraft") {
            $this->addAircraftAction();
        } else if ($page == "aircraft") {
            $this->showAircraftAction();
        }
    }
    
    /**
     * 
     * 
     */
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

        $givenRegID = $_REQUEST["givenRegID"];
        $givenAircraftType = $_REQUEST["givenAircraftType"];
        $givenNumberOfSeats = $_REQUEST["givenNumberOfSeats"];


        $aircraftModel = $GLOBALS["aircraftModel"];
        $added = $aircraftModel->add($givenRegID,$givenAircraftType,$givenNumberOfSeats);


        $data = array(
            "added" => $added,
            "givenRegID" => $givenRegID,
        );
        return $this->render("aircraftAdd", $data);
    }
   
    
        
    
}