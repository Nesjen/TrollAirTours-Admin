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
                    return new FlightController();

                case "adminUser":
                case "addAdminUser":
                    return new AdminUserController();

                case "aircraft":
                case "addAircraft":
                    return new AircraftController();

                case "product":
                case "addProduct":
                case "removeProduct":
                    return new ProductController();
                    
                case "customer":
                case "addCustomer":
                case "removeCustomer":
                    return new CustomerController();
                    
                case "employee":
                case "addEmployee":
                case "removeEmployee":
                    return new EmployeeController();


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