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

    public function getController() {
        $page = $this->getPage();
        
         
        switch ($page) {
            case "flight":
                return new FlightController();
                
            case "aircraft":
            case "addAircraft":
                return new AircraftController();
                
                
            case "employee":
            case "addEmployee":    
                return new EmployeeController();
                
                
            case "home":
            default:
                return new HomeController();
        }

    }

}