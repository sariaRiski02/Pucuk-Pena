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
        $data["logic"] = "Contribute";
        $data["data"] = $this->model("Contribute_model")->Add($_POST);
        $this->view("templates/header", $data);
        $this->view("Contribute/index", $data);
        $this->view("templates/footer", $data);
    }

    public function UpdateBook($id)
    {

        if (!(isset($_SESSION["email"]) && isset($_SESSION["id_user"]))) {
            header("Location: " . BASEURL . "/Home");
        }
        $data["item"] = $this->model("Collections_model")->GetSingleItem($id);
        $data["warning"] = $this->model("Update_model")->Update($id, $_POST);
        $data["tab-name"] = "Edit";
        $data["style"] = "Update";
        $data["logic"] = "Update";
        $this->view("templates/header", $data);
        $this->view("Update/index", $data);
        $this->view("templates/footer", $data);
    }

    public function Delete($id)
    {

        if (!(isset($_SESSION["email"]) && isset($_SESSION["id_user"]))) {
            header("Location: " . BASEURL . "/Home");
        }
        $result = $this->model("Delete_model")->DeleteBook($id);
        if ($result) {
            header("Location: " . BASEURL . "/Collections");
        }
    }
}
