<?php

require_once("Controller.php");


class FlightController extends Controller {

    
    public function show($page) {
        $this->render("flight");
    }

}