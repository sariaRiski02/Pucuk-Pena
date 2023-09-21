<?php

class SignUp extends Controller
{

    public function index()
    {
        $data["tab-name"] = "Daftar";
        $data["style"] = "SignUp";
        $data["logic"] = "SignUp";
        $data["data"] = $this->model("SignUpSignIn_model")->AddUser($_POST);
        $this->view("templates/header", $data);
        $this->view("SignUp/index", $data);
        $this->view("templates/footer", $data);
    }
}
