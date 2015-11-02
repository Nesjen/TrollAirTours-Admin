<?php
/**
 * BookingController - Troll Air Tours Admin Interface.
 * 
 *  
 */

require_once("Controller.php");

class BookingController extends Controller {


    public function show($page) {
        if ($page == "customBooking") {
            $this->ShowCustomBookingAction();
        } else if ($page == "booking") {
            $this->showBookingAction();
        } 
    }
    

    private function ShowCustomBookingAction() {
        $bookingModel = $GLOBALS["bookingModel"];
        $customBookings = $bookingModel->getAllCustom();

        $data = array(
            "customBookings" => $customBookings,     
        );
        
        return $this->render("customBooking", $data);
    }
    
    
    private function showBookingAction() {
        $bookingModel = $GLOBALS["bookingModel"];
        $bookings = $bookingModel->getAllPre();

        $data = array(
            "bookings" => $bookings,     
        );
        
        return $this->render("booking", $data);
    }
   
    
        
    
}