<?php


class Download extends Controller
{

    public function index()
    {
        $data["tab-name"] = "Unduh";
        $data["style"] = "Download";
        $this->view("templates/header", $data);
        $this->view("Download/index");
        $this->view("templates/footer");
    }
}
