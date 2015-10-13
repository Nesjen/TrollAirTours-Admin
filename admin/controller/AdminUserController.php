<?php

require_once("Controller.php");

class AdminUserController extends Controller {

    /**
     * Shows all possible pages
     * @param string $page
     */
    public function show($page) {
        if ($page == "addAdminUser") {
            $this->addAdminUserAction();
        } else if ($page == "adminUser") {
            $this->showAdminUserAction();
        }
    }
    

    private function showAdminUserAction() {
        $userModel = $GLOBALS["userModel"];
        $adminUsers = $userModel->getAll();


        $tempAdminUsername = isset($_REQUEST["Username"]) ? $_REQUEST["Username"] : "";
        $adminUsername = htmlspecialchars($tempAdminUsername);
        
        $data = array(
            "adminUsers" => $adminUsers,
            "adminUsername" => $adminUsername,
            
        );
        
        return $this->render("adminUser", $data);
    }
    
    
    private function addAdminUserAction() {
        // Find "customerName" parameter in request,
        $givenAdminUsername = $_REQUEST["givenAdminUsername"];
        $givenAdminPassword = $_REQUEST["givenAdminPassword"];
        
        if (!$givenAdminUsername) {
            // No customer name supplied, redirect to customer list
            return $this->showCustomersAction();
        }

        // Try to add new customer, Set action response code - success or not
        /** @var CustomerModel $customerModel */
        $userModel = $GLOBALS["userModel"];
        $added = $userModel->add($givenAdminUsername,$givenAdminPassword);

        // Render the page
        $data = array(
            "added" => $added,
            "givenAdminUsername" => $givenAdminUsername,
        );
        return $this->render("adminUserAdd", $data);
    }
   
    
        
    
}