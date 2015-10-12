<?php

require_once("Controller.php");



class LoginController extends Controller {
    
    public function show($page) {
        if ($page == "login_action") {
            $this->loginAction();
        } else {
            $this->showLoginFormAction();
        }
    }

    
    public function showLoginFormAction() {  
        return $this->render("loginform");
    }
    
    
    public function loginAction()
    {
        
        $userModel = $GLOBALS["UserModel"];
        $Users = $userModel->getAll();
        
        foreach($Users as $User)
        {
           echo $User;
        }
        
 
        
    }
    
    
    
}