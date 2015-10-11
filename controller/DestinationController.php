

<?php

require_once("Controller.php");

class DestinationController extends Controller {

    /**
     * Shows all possible pages
     * @param string $page
     */
    public function show($page) {
        if ($page == "addDestination") {
            $this->addDestinationAction();
        } else if ($page == "destination") {
            $this->showDestinationAction();
        }
    }
    

    private function showDestinationAction() {
        $destinationModel = $GLOBALS["destinationModel"];
        $destinations = $destinationModel->getAll();


        $tempDestinationName = isset($_REQUEST["DestinationName"]) ? $_REQUEST["DestinationName"] : "";
        $DestinationName = htmlspecialchars($tempDestinationName);
        
        $data = array(
            "destinations" => $destinations,
            "DestinationName" => $DestinationName,
            
        );
        
        return $this->render("destination", $data);
    }
    
    
    private function addDestinationAction() {
        // Find "customerName" parameter in request,
        $givenDestinationName = $_REQUEST["givenDestinationName"];

        if (!$givenDestinationName) {
            // No customer name supplied, redirect to customer list
            return $this->showDestinationAction();
        }

        // Try to add new customer, Set action response code - success or not
        /** @var CustomerModel $customerModel */
        $destinationModel = $GLOBALS["destinationModel"];
        $added = $destinationModel->add($givenDestinationName);

        // Render the page
        $data = array(
            "added" => $added,
            "givenDestinationName" => $givenDestinationName,
        );
        return $this->render("destinationAdd", $data);
    }
   
    
        
    
}