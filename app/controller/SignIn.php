<?php

class SignIn extends Controller
{

    public function index()
    {
        $data["tab-name"] = "Masuk";
        $data["style"] = "SignIn";
        $this->view("templates/header", $data);
        $this->view("SignIn/index", $data);
        $this->view("templates/footer");
    }
}
