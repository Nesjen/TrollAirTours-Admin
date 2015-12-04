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
        } else if ($page == "getCustomer")
        {
            $this->getCustomerAction();
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
        $seatRows = $seatReservationModel->selectAllByCustomerID($givenCustomerID);
        foreach($seatRows as $seatRow)
        {
            $seatnumber = $seatRow["SeatNumber"];
            $flightID = $seatRow["FlightID"];
            $seatProdRemoves = $seatReservationModel->removeSeatProductByFlightAndSeat($seatnumber,$flightID);
            $SeatResRemoved = $seatReservationModel->removeBookingWhereCustID($givenCustomerID);


        }
        $seatProdRemoves = $seatReservationModel->removeSeatProdByCustomerID($givenCustomerID);

        
        $bookingRemoved =  $bookingModel->remove($givenCustomerID);
        $customerRemoved = $customerModel->remove($givenCustomerID);
        
        $data = array(
            "SeatResRemoved" => $SeatResRemoved,
            "bookingRemoved" => $bookingRemoved,
            "customerRemoved" => $customerRemoved,
            "seatProdRemoved" => $seatProdRemoves,
        );
                
        
        return $this->render("customerRemove", $data);
    }
        
    
    private function getCustomerAction()
    {
        $customerID = filter_input(INPUT_POST, "givenCustomerID");
        $lastStep = filter_input(INPUT_POST, "lastStep");
        $customerModel = $GLOBALS["customerModel"];
        $Customers = $customerModel->get($customerID);
        
        $data = array(
            "Customers" => $Customers,
            "CustomerID" => $customerID,
            "lastStep" => $lastStep,
        );
                
        
        return $this->render("customerGet", $data);
    }
    
    
}