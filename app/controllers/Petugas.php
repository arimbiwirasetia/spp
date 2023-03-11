<?php
class Petugas extends Controller
{
    public function index()
    {
        $data["judul"] = "Dashboard Petugas";
        $data["name"] = "Petugas";
        $this->view("templates/header", $data);
        $this->view("templates/sidebar/petugas", $data);
        $this->view("petugas/home/index", $data);
        $this->view("templates/footer");
    }


    public function kelas()
    {
        $data["judul"] = "Data Kelas";
        $data["name"] = "Petugas";
        $data["kelas"] = $this->model("Kelas_model")->getAllKelas();
        $this->view("templates/header", $data);
        $this->view("templates/sidebar/petugas", $data);
        $this->view("petugas/kelas/index", $data);
        $this->view("templates/footer");
    }

    public function tambahKelas()
    {
        if ($this->model("Kelas_model")->tambahKelas($_POST) > 0) {
            header("Location: " . baseurl . "petugas/kelas");
            exit;
        }
    }

    public function hapusKelas($id)
    {
        if ($this->model("Kelas_model")->hapusKelas($id) > 0) {
            header("Location: " . baseurl . "petugas/kelas");
            exit;
        }
    }

    public function editKelas($id)
    {
        $data["judul"] = "Data Kelas";
        $data["name"] = "Petugas";
        $data["kelas"] = $this->model("Kelas_model")->getKelasById($id);
        $this->view("templates/header", $data);
        $this->view("templates/sidebar/petugas", $data);
        $this->view("petugas/kelas/edit", $data);
        $this->view("templates/footer");
    }

    public function prosesEditKelas()
    {
        if ($this->model("Kelas_model")->editKelas($_POST)) {
            header("Location: " . baseurl . "petugas/kelas");
            exit;
        }
    }
}
