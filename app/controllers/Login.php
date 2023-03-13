<?php

class Login extends Controller
{
    public function index()
    {
        $this->view("auth/login");
    }

    public function prosesLogin()
    {
        $dataUser = null;

        if (!$dataUser = $this->model("Siswa_model")->getSiswaByUsernamePassword($_POST["username"], $_POST["password"])) {
            if (!$dataUser = $this->model("Petugas_model")->authPetugasByUsernamePassword($_POST["username"], $_POST["password"])) {
                header("Location: " . baseurl . "login");
                exit;
            }
        }

        $_SESSION["username"] = $dataUser["username"];
        $_SESSION["is_login"] = true;

        if ($dataUser["role"] == 1) {
            $_SESSION["role"] = 1;
            $_SESSION["pengguna_id"] = $dataUser["pengguna_id"];
            header("Location: " . baseurl . "admin");
            exit;
        } elseif ($dataUser["role"] == 2) {
            $_SESSION["role"] = 2;
            $_SESSION["pengguna_id"] = $dataUser["pengguna_id"];
            header("Location: " . baseurl . "petugas");
            exit;
        } else {
            $_SESSION["role"] = 3;
            $_SESSION["id_siswa"] = $dataUser["id_siswa"];
            header("Location: " . baseurl . "siswa");
            exit;
        }
    }
}
