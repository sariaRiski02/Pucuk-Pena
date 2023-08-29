
<?php

class About extends Controller
{

    public function index()
    {
        $data["tab-name"] = "Tentang";
        $data["style"] = "About";
        $this->view("templates/header", $data);
        $this->view("About/index");
        $this->view("templates/footer");
    }
}
