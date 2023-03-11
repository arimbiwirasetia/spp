<?php
class Siswa extends Controller
{
    public function index()
    {
        $data["judul"] = "Dashboard";
        $data["name"] = "Siswa";
        $this->view("templates/header", $data);
        $this->view("templates/sidebar/siswa", $data);
        $this->view("siswa/home/index", $data);
        $this->view("templates/footer");
    }
}
