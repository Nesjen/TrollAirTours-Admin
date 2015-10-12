<?php

require_once("Controller.php");


class HomeController extends Controller {


    public function show($page) {
        $this->render("home");
    }

}