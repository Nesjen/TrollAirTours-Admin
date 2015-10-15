<?php

require_once("Controller.php");

class AdminUserController extends Controller {

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
        $givenAdminUsername = $_REQUEST["givenAdminUsername"];
        $givenAdminPassword = $_REQUEST["givenAdminPassword"];
        
        if (!$givenAdminUsername) {
            return $this->showCustomersAction();
        }

        $userModel = $GLOBALS["userModel"];
        $added = $userModel->add($givenAdminUsername,$givenAdminPassword);
        $data = array(
            "added" => $added,
            "givenAdminUsername" => $givenAdminUsername,
        );
        return $this->render("adminUserAdd", $data);
    }
   
    
        
    
}