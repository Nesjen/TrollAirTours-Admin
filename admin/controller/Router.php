<?php


class Router {
    

    public function getPage() {
        // Get page from request, or use default
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
        
        if($_SESSION["AreLoggedIn"] == "false")
        { 
            return new LoginController();
        }else{
            switch ($page) {

                case "login":
                case "login_action":
                    return new LoginController();
                    
                case "addFlight":
                case "flight":
                    return new FlightController();

                case "adminUser":
                case "addAdminUser":
                    return new AdminUserController();

                case "aircraft":
                case "addAircraft":
                    return new AircraftController();


                case "employee":
                case "addEmployee":    
                    return new EmployeeController();


                case "destination":
                case "addDestination":
                    return new DestinationController();    

                case "home":
                default:
                    return new homeController();
            }
        }
    }

}