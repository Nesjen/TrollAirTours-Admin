<?php

require_once("Controller.php");

class CustomerController extends Controller {


    public function show($page) {
        if ($page == "addCustomer") {
            $this->addCustomerAction();
        } else if ($page == "customer") {
            $this->showCustomerAction();
        } else if ($page == "removeCustomer")
        {
            $this->removeCustomerAction();
        }
    }
    

    private function showCustomerAction() {
        $customerModel = $GLOBALS["customerModel"];
        $customers = $customerModel->getAll();

        $data = array(
            "customers" => $customers,     
        );
        
        return $this->render("customer", $data);
    }
    
    
    private function addCustomerAction() {
        $givenGender     =  filter_input(INPUT_POST, "givenGender");
        $givenCustomerFN =  filter_input(INPUT_POST, "givenCustomerFN");
        $givenCustomerLN =  filter_input(INPUT_POST, "givenCustomerLN");
        $givenAreaCode   =  filter_input(INPUT_POST, "givenAreaCode");
        $givenTelephone  =  filter_input(INPUT_POST, "givenTelephone");
        $givenStreet     =  filter_input(INPUT_POST, "givenStreet");
        $givenCity       =  filter_input(INPUT_POST, "givenCity");
        $givenZipCode    =  filter_input(INPUT_POST, "givenZipCode");
        $givenEmail      =  filter_input(INPUT_POST, "givenEmail");
        $givenCountry    =  filter_input(INPUT_POST, "givenCountry");
        
        $customerModel = $GLOBALS["customerModel"];
        $customerID = $customerModel->add($givenGender, $givenCustomerFN, $givenCustomerLN, $givenStreet, $givenAreaCode, $givenTelephone, $givenCity, $givenZipCode, $givenEmail, $givenCountry);
        
        
        $data = array(
            "customerID" => $customerID,
        );
        return $this->render("customerAdd", $data);
    }
   
    
    private function removeCustomerAction()
    {
        $givenCustomerID     =  filter_input(INPUT_POST, "givenCustomerID");
        $customerModel = $GLOBALS["customerModel"];
        $bookingModel = $GLOBALS["bookingModel"];
        $seatReservationModel = $GLOBALS["seatReservationModel"];
        
        $SeatResRemoved = $seatReservationModel->removeBookingWhereCustID($givenCustomerID);
        $bookingRemoved =  $bookingModel->remove($givenCustomerID);
        $customerRemoved = $customerModel->remove($givenCustomerID);
        
        $data = array(
            "SeatResRemoved" => $SeatResRemoved,
            "bookingRemoved" => $bookingRemoved,
            "customerRemoved" => $customerRemoved
        );
                
        
        return $this->render("customerRemove", $data);
    }
        
    
}