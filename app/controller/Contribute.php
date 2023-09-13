<?php

class Contribute extends Controller
{

    public function index()
    {

        if (!(isset($_SESSION["email"]) && isset($_SESSION["id_user"]))) {
            header("Location: " . BASEURL . "/Home");
        }
        $data["tab-name"] = "Donasi";
        $data["style"] = "Contribute";
        $data["data"] = $this->model("Contribute_model")->Add($_POST);
        $this->view("templates/header", $data);
        $this->view("Contribute/index", $data);
        $this->view("templates/footer", $data);
    }
}
