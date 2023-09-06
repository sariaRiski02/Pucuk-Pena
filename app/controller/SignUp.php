<?php

class SignUp extends Controller
{

    public function index()
    {
        $data["tab-name"] = "Daftar";
        $data["style"] = "SignUp";
        $this->view("templates/header", $data);
        $this->view("SignUp/index", $data);
        $this->view("templates/footer");
    }
}
