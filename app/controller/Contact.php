<?php

class Contact extends Controller
{

    public function index()
    {
        $data["tab-name"] = "Kontak";
        $data["style"] = "Contact";
        $this->view("templates/header", $data);
        $this->view("Contact/index");
        $this->view("templates/footer");
    }
}
