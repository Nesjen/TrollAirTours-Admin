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
        $givenAdminUsername = $_REQUEST["givenAdminUsername"];
        $givenAdminPassword = $_REQUEST["givenAdminPassword"];
        
        $userModel = $GLOBALS["userModel"];
        $Users = $userModel->getAll();
        //$userModel->add("enesje","test1234");// !! USE THIS FOR FIRST LOGIN !! 

        foreach($Users as $User)
        {
           if($User["Username"] == $givenAdminUsername)
           {
               if( $User["Password"] == sha1($givenAdminPassword))
               {
                   $_SESSION["AreLoggedIn"] = "true";
                   echo 'hello';
               }
                   
           }
        }
        
        header("Location:admin/");
 
        
    }
    
    
    
}