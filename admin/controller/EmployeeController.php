<?php

require_once("Controller.php");

class EmployeeController extends Controller {

    /**
     * Shows all possible pages
     * @param string $page
     */
    public function show($page) {
        if ($page == "addEmployee") {
            $this->addEmployeeAction();
        } else if ($page == "employee") {
            $this->showEmployeesAction();
        }else if ($page == "removeEmployee") {
            $this->removeEmployeeAction();
        }
    }
    

    private function showEmployeesAction() {
        $employeeModel = $GLOBALS["employeeModel"];
        $employees = $employeeModel->getAll();


        $tempEmployeeID = isset($_REQUEST["employeeID"]) ? $_REQUEST["employeeID"] : "";
        $employeeID = htmlspecialchars($tempEmployeeID);
        
        $data = array(
            "employees" => $employees,
            "employeeID" => $employeeID,
            
        );
        
        return $this->render("employee", $data);
    }
    
    
    private function addEmployeeAction() {
        $givenEmployeeID = $_REQUEST["givenEmployeeID"];
        $givenEmployeeFN = $_REQUEST["givenEmployeeFN"];
        $givenEmployeeLN = $_REQUEST["givenEmployeeLN"];
        $givenEmployeeP = $_REQUEST["givenEmployeeP"];
        if (!$givenEmployeeID) {
            return $this->showCustomersAction();
        }

        $employeeModel = $GLOBALS["employeeModel"];
        $added = $employeeModel->add($givenEmployeeID,$givenEmployeeFN,$givenEmployeeLN,$givenEmployeeP);

        // Render the page
        $data = array(
            "added" => $added,
            "givenEmployeeID" => $givenEmployeeID,
        );
        return $this->render("employeeAdd", $data);
    }
   
    private function removeEmployeeAction()
    {
        $employeeIDDelete = filter_input(INPUT_POST,"givenEmployeeID");
        $employeeModel = $GLOBALS["employeeModel"];
        $flightCrewModel = $GLOBALS["flightCrewModel"];
        $flightCrew = $flightCrewModel->getAllWhereEmployeeID($employeeIDDelete);
        $feedBackText = "";
        
        
        $added = true;
        if(count($flightCrew) === 0)
        {
            
            $employeeModel->delete($employeeIDDelete);

        }else
        {
            $added = false;
            $feedBackText = "Could not remove employee, you have to remove all connected flight first.";  
        }
        $data = array(
            "added" => $added,
            "feedback" => $feedBackText,
        );
        
        
        return $this->render("employeeRemove", $data);
    }
        
    
}