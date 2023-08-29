<?php

class Collections extends Controller
{

    public function index()
    {
        $data["tab-name"] = "Koleksi";
        $data["style"] = "Collections";
        $this->view("templates/header", $data);
        $this->view("Collections/index");
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
