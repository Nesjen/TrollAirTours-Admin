<?php

require_once("Controller.php");

class ProductController extends Controller {


    public function show($page) {
        if ($page == "addProduct") {
            $this->addProductAction();
        } else if ($page == "product") {
            $this->showProductAction();
        }else if ($page == "removeProduct") {
            $this->removeProductAction();
        }
    }
    

    private function showProductAction() {
        $productModel = $GLOBALS["productModel"];
        $products = $productModel->getAll();
        
  
        $data = array(
            "products" => $products,
        );
        
        return $this->render("product", $data);
    }
    
    
    private function addProductAction() {
        $givenProductID = filter_input(INPUT_POST, "givenProductID");
        $givenProductType = filter_input(INPUT_POST, "givenProductType");
        $givenProductName = filter_input(INPUT_POST, "givenProductName");
        $givenProductDescription = filter_input(INPUT_POST, "givenProductDescription");
        

        $productModel = $GLOBALS["productModel"];
        $added = $productModel->add($givenProductID,$givenProductType,$givenProductName,$givenProductDescription);       
        
        $data = array(
            "added" => $added,
        );
        
        return $this->render("productAdd", $data);
    }
   
    
    /**
     * Remove posted flightID.
     * 
     * @return type
     */
    private function removeProductAction()
    {
        $givenProductID = filter_input(INPUT_POST, "givenProductID");
        $productModel = $GLOBALS["productModel"];
        

        $added = $productModel->remove($givenProductID);
      
        $data = array(
            "added" => $added,

        );
        return $this->render("productRemove", $data);
    }
    
}