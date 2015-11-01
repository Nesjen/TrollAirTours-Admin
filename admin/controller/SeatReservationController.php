<?php

require_once("Controller.php");

class SeatReservationController extends Controller {


    public function show($page) {
        if ($page == "seatReservation") {
            $this->showSeatReservationAction();
        }
    }
    

    private function showSeatReservationAction() {
        $FlightID = filter_input(INPUT_POST, "FlightID");
        $seatReservationModel = $GLOBALS["seatReservationModel"];
        
        $seatReservations = $seatReservationModel->getAllWhereFlightID($FlightID);
        


        $data = array(
            "FlightID" => $FlightID,
            "seatReservations" => $seatReservations,     
        );
        
        return $this->render("SeatReservation", $data);
    }
    
    
        
    
}