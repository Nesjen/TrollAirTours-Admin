<?php

require_once("Controller.php");

class SeatReservationController extends Controller {


    public function show($page) {
        if ($page == "seatReservation") {
            $this->showSeatReservationAction();
        }else if($page == "removeSeatReservation"){
            $this->removeSeatReservationAction();
        }
    }
    

    private function showSeatReservationAction() {
        $FlightID = filter_input(INPUT_POST, "FlightID");
        $seatReservationModel = $GLOBALS["seatReservationModel"];
        
        $seatReservations = $seatReservationModel->getAllWhereFlightID($FlightID);
        $seatProducts = $seatReservationModel->getAllProdWhereFlightID($FlightID);
        
        $seatRes = array();
        foreach($seatReservations as $seatReservation)
        {
            $productString = "";
            $seatNumber = $seatReservation["SeatNumber"];
            foreach($seatProducts as $seatProduct)
            {
                if($seatNumber == $seatProduct["SeatNumber"])
                {
                    if($productString !== "")
                    {
                        $productString = $productString . ", " . $seatProduct["ProductID"];

                    }else
                    {
                      $productString = $seatProduct["ProductID"];
                    }
                }
            }
            $seatReservation["ProductIDs"] = $productString;
            array_push($seatRes,$seatReservation);
        }
        

        $data = array(
            "FlightID" => $FlightID,
            "seatReservations" => $seatRes,     
        );
        
        return $this->render("SeatReservation", $data);
    }
    
    
    private function removeSeatReservationAction()
    {
        $seatNumber = filter_input(INPUT_POST, "givenSeatNumber");
        $flightID = filter_input(INPUT_POST, "givenFlightID");
        
        $seatReservationModel = $GLOBALS["seatReservationModel"];
        
        $seatReservationModel->removeSeatProductByFlightAndSeat($seatNumber,$flightID);
        $added = $seatReservationModel->removeSeatByFlightAndSeat($seatNumber,$flightID);
        
        $data = array(
            "added" => $added,
            "FlightID" => $flightID,
        );
        
        if($added)
        {
            return $this->render("SeatReservation", $data);
        }else
        {
            return $this->render("SeatReservationRemove", $data);
        }
        
    }
    
}