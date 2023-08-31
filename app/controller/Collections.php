<?php

class Collections extends Controller
{

    public function index()
    {
        $data["tab-name"] = "Koleksi";
        $data["style"] = "Collections";
        $data["content"] = $this->model("Upload")->GetAll();
        $this->view("templates/header", $data);
        $this->view("Collections/index", $data);
        $this->view("templates/footer");
    }

    public function unduh()
    {
        $data["tab-name"] = "Download";
        $this->view("templates/header", $data);
        $this->view("Download/index");
        $this->view("templates/footer");
    }
}
