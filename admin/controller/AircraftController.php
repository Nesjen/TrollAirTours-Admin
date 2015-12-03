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
        } else if ($page == "removeAircraft") {
            $this->removeAircraftAction();
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
   
    private function removeAircraftAction() {
        //Gets regID for the aircraft User wants to remove
        $givenRegID = filter_input(INPUT_POST,"RegID");
        
        //Define boolean variables
        $deleteSeatRes  = true;
        $deleteSeatReservation  = true;
        $deleteFlightCrew  = true;
        $deleteFlight  = true;      
        //Gets all needed models
        $aircraftModel = $GLOBALS["aircraftModel"];
        $flightModel = $GLOBALS["flightModel"];
        $seatreservationModel = $GLOBALS["seatReservationModel"];
        $flightCrewModel = $GLOBALS["flightCrewModel"];

        //Gets an array with all flights connected to the given aircraft
        $connectedFlights = $flightModel->getAllByRegID($givenRegID);
        foreach($connectedFlights as $connectedFlight) //Loops all flights with given regID
        {
           $forFlightID = $connectedFlight["FlightID"] . " " ;
           $deleteSeatRes = $seatreservationModel->removeSeatReservationProduct($forFlightID); //Deletes seatreservationproduct for given flight
           $deleteSeatReservation = $seatreservationModel->removeFlightWhereID($forFlightID); //Deletes all seatreservation for given flight;
           $deleteFlightCrew = $flightCrewModel->removeFlightWhereID($forFlightID); //Deletes all flightcrew for given flight
           $deleteFlight = $flightModel->removeFlightWhereID($forFlightID); //Deletes all flights for given flightID
           
        }
        
        //deletes aircraft
        $deleteAircraft = $aircraftModel->removeAircraftWhereID($givenRegID);

        
        //checks if all has been succesfully deleted
        if(($deleteSeatRes)&&($deleteSeatReservation)&&($deleteFlightCrew)&&($deleteFlight)&&($deleteAircraft)&&($deleteAircraft))
        {
            $added = true;
        }else
        {
            $added = false;
        }
        
        $data = array(
            "added" => $added,
        );
        
        return $this->render("aircraftRemove", $data);
        
    }
        
    
}