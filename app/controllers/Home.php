<?php
class Home extends Controller
{
    public function index()
    {
        $data["judul"] = "Dashboard";
        $this->view("templates/header", $data);
        $this->view("templates/sidebar/siswa", $data);
        $this->view("home/index");
        $this->view("templates/footer");
    }
}
