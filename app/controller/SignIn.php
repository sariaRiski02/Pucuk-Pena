<?php

class SignIn extends Controller
{

    public function index()
    {
        $data["tab-name"] = "Masuk";
        $data["style"] = "SignIn";
        $data["logic"] = "SignIn";
        $data["data"] = $this->model("SignUpSignIn_model")->login($_POST);
        $this->view("templates/header", $data);
        $this->view("SignIn/index", $data);
        $this->view("templates/footer", $data);
    }
}
