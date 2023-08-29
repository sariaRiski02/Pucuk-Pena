<?php

class Home extends Controller
{

    public function index()
    {
        $data["tab-name"] = "Beranda";
        $data["style"] = "Home";
        $this->view("templates/header", $data);
        $this->view("Home/index");
        $this->view("templates/footer");
    }
}
