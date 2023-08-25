<?php

class Home extends Controller
{

    public function index()
    {
        $data["Home"] = "Home";
        $this->view("templates/header");
        $this->view("Home/index");
        $this->view("templates/footer");
    }
}
