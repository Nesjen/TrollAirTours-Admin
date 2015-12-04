<?php
//Controller for AdminUser page. 


require_once("Controller.php");

class AdminUserController extends Controller {

    /**
     * Show method - Uses the param param to redirect user to the correct function.
     * @param type $page - Page to be displayed
     */
    public function show($page) {
        if ($page == "addAdminUser") {
            $this->addAdminUserAction();
        } else if ($page == "adminUser") {
            $this->showAdminUserAction();
        } else if ($page == "removeAdminUser") {
            $this->removeAdminUserAction();
        }
    }
    
    /**
     * Default show page - Gets all adminusers and pass them to the render method.
     * 
     */
    private function showAdminUserAction() {
        $userModel = $GLOBALS["userModel"];
        $adminUsers = $userModel->getAll();


        $tempAdminUsername = filter_input(INPUT_POST,"Username");
        $adminUsername = htmlspecialchars($tempAdminUsername);
        
        $data = array(
            "adminUsers" => $adminUsers,
            "adminUsername" => $adminUsername,
            
        );
        
        return $this->render("adminUser", $data);
    }
    
    /**
     * Gets all post inputs from user and tries to add a new adminuser. Calls the render with the adminUser add page.
     * 
     */
    private function addAdminUserAction() {
        $givenAdminUsername = filter_input(INPUT_POST,"givenAdminUsername");
        $givenAdminPassword = filter_input(INPUT_POST,"givenAdminPassword");
        
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
   
    
    private function removeAdminUserAction()
    {
        $adminUsername = filter_input(INPUT_POST, "givenAdminUsername");
        $adminUserModel = $GLOBALS["userModel"];
        $added = $adminUserModel->remove($adminUsername);
        
        $data = array(
            "added" => $added,
        );
        return $this->render("adminUserRemove", $data);
    }
    
        
    
}