<?php


class Router {
    

    public function getPage() {
        if (isset($_REQUEST["page"])) {
            $page = $_REQUEST["page"];
        } else {
            $page = $GLOBALS["DEFAULT_PAGE"];
        }
        return $page;
    }
    
    public function getLoginController()
    {
        return new LoginController();
    }
    

    public function getController() {
        $page = $this->getPage();
        
      if((isset($_SESSION["AreLoggedIn"])) && ($_SESSION["AreLoggedIn"] == "true"))
      {
          switch ($page) {

                case "login":
                case "login_action":
                    return new LoginController();
                    
                case "addFlight":
                case "removeFlight":
                case "flight":
                case "flightsToday":
                    return new FlightController();

                case "adminUser":
                case "addAdminUser":
                case "removeAdminUser":
                    return new AdminUserController();

                case "seatReservation":
                case "removeSeatReservation":
                    return new SeatReservationController();
                    
                case "aircraft":
                case "addAircraft":
                case "removeAircraft":
                    return new AircraftController();

                case "product":
                case "addProduct":
                case "removeProduct":
                    return new ProductController();
                    
                case "customer":
                case "addCustomer":
                case "removeCustomer":
                case "getCustomer":
                    return new CustomerController();
                    
                case "employee":
                case "addEmployee":
                case "removeEmployee":
                    return new EmployeeController();

                case "customBooking":
                case "booking":
                case "bookingRemove":
                    return new BookingController();
                    
                case "home":
                default:
                    return new homeController();
            }
          
      }else
      {
          return new LoginController();
      }
        
      
        }
    

}