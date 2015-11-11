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
    
    
        
    
}