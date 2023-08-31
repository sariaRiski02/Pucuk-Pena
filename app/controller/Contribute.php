<?php

class Contribute extends Controller
{

    public function index()
    {
        $data["tab-name"] = "Donasi";
        $data["style"] = "Contribute";
        $data["data"] = $this->model("Upload")->Add($_POST);
        $this->view("templates/header", $data);
        $this->view("Contribute/index", $data);
        $this->view("templates/footer");
    }
}
