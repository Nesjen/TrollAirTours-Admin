<?php
/**
 * BookingController - Troll Air Tours Admin Interface.
 */

require_once("Controller.php");

class BookingController extends Controller {

/*
 * If the current page is 'customBooking' it will run the showCustomBookingAction(),
 * else if the page is 'booking' it will run showBookingAction().
 */
    public function show($page) {
        if ($page == "customBooking") { //Checks if page is set to 'customBooking'
            $this->ShowCustomBookingAction(); //Runs showCustomBookingAction()
        } else if ($page == "booking") { //Checks if page is set to 'booking'
            $this->showBookingAction(); //Runs showBookingAction()
        }  else if ($page == "bookingRemove") { 
            $this->deleteBooking();
        }
    }
    
/*
 * Receives the booking-model, then gets all custom bookings and adds them to an array then
 * renders next site.
 * #RENDER customBooking
 */
    private function ShowCustomBookingAction() {
        $bookingModel = $GLOBALS["bookingModel"]; //Gets booking-model
        $customBookings = $bookingModel->getAllCustom(); //Fetches all custom bookings

        $data = array( //Puts custom booking in a array variable
            "customBookings" => $customBookings,     
        );
        
        return $this->render("customBooking", $data); //Takes view part(customBooking) and model part (data) and renders the page.
    }
    
/*
 * Receives the booking-model, then gets all bookings that are NOT custom and adds them to an array then
 * renders next site.
 * #RENDER booking
 */
    private function showBookingAction() {
        $bookingModel = $GLOBALS["bookingModel"]; //Gets booking-model
        $bookings = $bookingModel->getAllPre(); //Fetches all NON custom bookings

        $data = array( //Puts bookings in a array variable
            "bookings" => $bookings,     
        );
        
        return $this->render("booking", $data); //Takes view part(booking) and model part (data) and renders the page.
    }
   
    
    private function deleteBooking()
    {
        $bookingID = filter_input(INPUT_POST, "givenBookingID");
        $customBooking = filter_input(INPUT_POST,"customBooking");
        $bookingModel = $GLOBALS["bookingModel"]; //Gets booking-model
        $added = $bookingModel->removeByBookingID($bookingID);
        
        $data = array( 
            "added" => $added,     
        );
        
        if($customBooking == 1)
        {
            return $this->render("customBookingRemove", $data);

        }else
        {
            return $this->render("bookingRemove", $data); 
        }
        
        
    }
    
}