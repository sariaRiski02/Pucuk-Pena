<?php

class Collections extends Controller
{

    public function index()
    {
        $data["tab-name"] = "Koleksi";
        $data["style"] = "Collections";
        $data["content"] = $this->model("Collections_model")->GetAllItem();
        $this->view("templates/header", $data);
        $this->view("Collections/index", $data);
        $this->view("templates/footer");
    }

    public function unduh($id)
    {
        $data["tab-name"] = "Unduh";
        $data["style"] = "Download";
        $data["item"] = $this->model("Collections_model")->GetSingleItem($id);
        $this->view("templates/header", $data);
        $this->view("Download/index", $data);
        $this->view("templates/footer");
    }

    public function start_download($id)
    {
        $this->model("Download_model");
    }
}
