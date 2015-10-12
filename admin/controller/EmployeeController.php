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
        // Find "customerName" parameter in request,
        $givenEmployeeID = $_REQUEST["givenEmployeeID"];
        $givenEmployeeFN = $_REQUEST["givenEmployeeFN"];
        $givenEmployeeLN = $_REQUEST["givenEmployeeLN"];
        $givenEmployeeP = $_REQUEST["givenEmployeeP"];
        if (!$givenEmployeeID) {
            // No customer name supplied, redirect to customer list
            return $this->showCustomersAction();
        }

        // Try to add new customer, Set action response code - success or not
        /** @var CustomerModel $customerModel */
        $employeeModel = $GLOBALS["employeeModel"];
        $added = $employeeModel->add($givenEmployeeID,$givenEmployeeFN,$givenEmployeeLN,$givenEmployeeP);

        // Render the page
        $data = array(
            "added" => $added,
            "givenEmployeeID" => $givenEmployeeID,
        );
        return $this->render("employeeAdd", $data);
    }
   
    
        
    
}