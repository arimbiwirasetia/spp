<?php
class Admin extends Controller
{
    public function index()
    {
        $data["judul"] = "Dashboard Admin";
        $data["name"] = "Admin";
        $this->view("templates/header", $data);
        $this->view("templates/sidebar/admin", $data);
        $this->view("admin/home/index", $data);
        $this->view("templates/footer");
    }

    public function kelas()
    {
        $data["judul"] = "Data Kelas";
        $data["name"] = "Admin";
        $data["kelas"] = $this->model("Kelas_model")->getAllKelas();
        $this->view("templates/header", $data);
        $this->view("templates/sidebar/admin", $data);
        $this->view("admin/kelas/index", $data);
        $this->view("templates/footer");
    }

    public function tambahKelas()
    {
        if ($this->model("Kelas_model")->tambahKelas($_POST) > 0) {
            header("Location: " . baseurl . "admin/kelas");
            exit;
        }
    }

    public function hapusKelas($id_kelas)
    {
        if ($this->model("Kelas_model")->hapusKelas($id_kelas) > 0) {
            header("Location: " . baseurl . "admin/kelas");
            exit;
        }
    }

    public function editKelas($id_kelas)
    {
        $data["judul"] = "Data Kelas";
        $data["name"] = "Admin";
        $data["kelas"] = $this->model("Kelas_model")->getKelasById($id_kelas);

        $this->view("templates/header", $data);
        $this->view("templates/sidebar/admin", $data);
        $this->view("admin/kelas/edit", $data);
        $this->view("templates/footer");
    }

    public function prosesEditKelas()
    {
        if ($this->model("Kelas_model")->editKelas($_POST)) {
            header("Location: " . baseurl . "admin/kelas");
            exit;
        }
    }

    public function pembayaran()
    {
        $data["judul"] = "Data Pembayaran";
        $data["name"] = "Admin";
        $data["pembayaran"] = $this->model("Pembayaran_model")->getAllPembayaran();
        $this->view("templates/header", $data);
        $this->view("templates/sidebar/admin", $data);
        $this->view("admin/pembayaran/index", $data);
        $this->view("templates/footer");
    }

    public function tambahPembayaran()
    {
        if ($this->model("Pembayaran_model")->tambahPembayaran($_POST) > 0) {
            header("Location: " . baseurl . "admin/pembayaran");
            exit;
        }
    }

    public function hapusPembayaran($id)
    {
        if ($this->model("Pembayaran_model")->hapusPembayaran($id)) {
            header("Location: " . baseurl . "admin/pembayaran");
            exit;
        }
    }

    public function editPembayaran($id)
    {
        $data["judul"] = "Data Pembayaran";
        $data["name"] = "Admin";
        $data["pembayaran"] = $this->model("Pembayaran_model")->getPembayaranById($id);
        $this->view("templates/header", $data);
        $this->view("templates/sidebar/admin", $data);
        $this->view("admin/pembayaran/edit", $data);
        $this->view("templates/footer");
    }

    public function prosesEditPembayaran()
    {
        if ($this->model("Pembayaran_model")->editPembayaran($_POST)) {
            header("Location: " . baseurl . "admin/pembayaran");
            exit;
        }
    }

    public function petugas()
    {
        $data = [
            "judul" => "Data Petugas",
            "name" => "Admin",
            "pengguna" => $this->model("Pengguna_model")->getAllPengguna(),
            "petugas" => $this->model("Petugas_model")->selectAllPetugas()
        ];
        $this->view("templates/header", $data);
        $this->view("templates/sidebar/admin", $data);
        $this->view("admin/petugas/index", $data);
        $this->view("templates/footer");
    }

    public function tambahPetugas()
    {
        if ($this->model("Petugas_model")->tambahPetugas($_POST) > 0) {
            header("Location: " . baseurl . "admin/petugas");
            exit;
        }
    }

    public function hapusPetugas()
    {
        if ($this->model("Petugas_model")->hapusPetugas($_POST["id_petugas"]) > 0) {
            header("Location: " . baseurl . "admin/petugas");
            exit;
        }
    }

    public function editPetugas($id_petugas)
    {
        $data = [
            "judul" => "Data Petugas",
            "name" => "Admin",
            "petugas" => $this->model("Petugas_model")->getPetugasById($id_petugas),
            "pengguna" => $this->model("Pengguna_model")->getAllPengguna()
        ];

        $this->view("templates/header", $data);
        $this->view("templates/sidebar/admin", $data);
        $this->view("admin/petugas/index", $data);
        $this->view("templates/footer");
    }

    public function prosesEditPetugas()
    {
        if ($this->model("Petugas_model")->editPetugas($_POST)) {
            header("Location: " . baseurl . "admin/petugas");
            exit;
        }
    }

    public function siswa()
    {
        $data = [
            "judul" => "Data Siswa",
            "name" => "Admin",
            "siswa" => $this->model("Siswa_model")->selectAllSiswa(),
            "kelas" => $this->model("Kelas_model")->getAllKelas(),
            "pengguna" => $this->model("Pengguna_model")->getAllPengguna(),
            "pembayaran" => $this->model("Pembayaran_model")->getAllPembayaran(),
        ];

        $this->view("templates/header", $data);
        $this->view("templates/sidebar/admin", $data);
        $this->view("admin/siswa/index", $data);
        $this->view("templates/footer");
    }

    public function tambahSiswa()
    {
        $data = [
            "username" => $_POST["nis"],
            "password" => $_POST["password"],
            "role" => "3"
        ];

        if ($this->model("Pengguna_model")->tambahPengguna($data)) {
            $pengguna = $this->model("Pengguna_model")->getPenggunaByUsername($data["username"]);

            $data = [
                "nisn" => $_POST["nisn"],
                "nis" => $_POST["nis"],
                "nama" => $_POST["nama"],
                "alamat" => $_POST["alamat"],
                "telepon" => $_POST["telepon"],
                "id_kelas" => $_POST["id_kelas"],
                "id_pembayaran" => $_POST["id_pembayaran"],
                "id_pengguna" => $_POST["id_pengguna"]
            ];
        }

        if ($this->model("Siswa_model")->tambahSiswa($_POST) > 0) {
            header("Location: " . baseurl . "admin/siswa");
            exit;
        }
    }

    public function hapusSiswa($id_siswa)
    {
        if ($this->model("Siswa_model")->hapusSiswa($id_siswa) > 0) {
            header("Location: " . baseurl . "admin/siswa");
            exit;
        }
    }

    public function editSiswa($id_siswa)
    {
        $pengguna = $this->model("Pengguna_model")->getAllPengguna();

        $data = [
            "judul" => "Data Siswa",
            "name" => "Admin",
            "siswa" => $this->model("Siswa_model")->getSiswaById($id_siswa),
            "kelas" => $this->model("Kelas_model")->getAllKelas(),
            "pengguna" => $pengguna,
            "pembayaran" => $this->model("Pembayaran_model")->getAllPembayaran()
        ];

        $this->view("templates/header", $data);
        $this->view("templates/sidebar/admin", $data);
        $this->view("admin/siswa/edit", $data);
        $this->view("templates/footer");
    }

    public function prosesEditSiswa()
    {
        $data = [
            "username" => $_POST["nis"],
            "password" => $_POST["nis"],
            "role" => 3
        ];

        if ($this->model("Pengguna_model")->editPengguna($data)) {
            $data = [
                "id_siswa" => $_POST["id_siswa"],
                "nis" => $_POST["nis"],
                "nisn" => $_POST["nisn"],
                "nama" => $_POST["nama"],
                "alamat" => $_POST["alamat"],
                "telepon" => $_POST["telepon"],
                "id_kelas" => $_POST["id_kelas"],
                "id_pengguna" => $_POST["id_pengguna"],
                "id_pembayaran" => $_POST[$data["pengguna"]["id_pengguna"]]
            ];
        }

        if ($this->model("Siswa_model")->editSiswa($_POST) > 0) {
            header("Location: " . baseurl . "admin/siswa");
            exit;
        }
    }


    public function pengguna()
    {
        $data = [
            "judul" => "Data Pengguna",
            "name" => "Admin",
            "pengguna" => $this->model("Pengguna_model")->getAllPengguna(),
            "petugas" => $this->model("Petugas_model")->getAllPetugas()
        ];

        $this->view("templates/header", $data);
        $this->view("templates/sidebar/admin", $data);
        $this->view("admin/pengguna/index", $data);
        $this->view("templates/footer");
    }

    public function tambahPengguna()
    {
        if ($this->model("Pengguna_model")->tambahPengguna($_POST) > 0) {
            header("Location: " . baseurl . "admin/pengguna");
            exit;
        }
    }

    public function hapusPengguna($id_pengguna)
    {
        if ($this->model("Pengguna_model")->hapusPengguna($id_pengguna)) {
            header("Location: " . baseurl . "admin/pengguna");
            exit;
        }
    }

    public function editPengguna($id_pengguna)
    {
        $data = [
            "judul" => "Data Pengguna",
            "name" => "Admin",
            "pengguna" => $this->model("Pengguna_model")->getPenggunaById($id_pengguna),
            "petugas" => $this->model("Petugas_model")->getAllPetugas()
        ];

        $this->view("templates/header", $data);
        $this->view("templates/sidebar/admin", $data);
        $this->view("admin/pengguna/edit", $data);
        $this->view("templates/footer");
    }

    public function prosesEditPengguna()
    {
        if ($this->model("Pengguna_model")->editPengguna($_POST) > 0) {
            header("Location: " . baseurl . "admin/pengguna");
            exit;
        }
    }

    public function transaksi()
    {
        $data = [
            "judul" => "Entri Transaksi",
            "name" => "Admin",
            "siswa" => $this->model("Siswa_model")->getAllSiswa(),
            "transaksi" => $this->model("Transaksi_model")->getAllTransaksi()
        ];
        $this->view("templates/header", $data);
        $this->view("templates/sidebar/admin", $data);
        $this->view("admin/transaksi/index", $data);
        $this->view("templates/footer");
    }

    public function detailTransaksi($id_siswa)
    {
        $siswa = $this->model("Siswa_model")->getSiswaById($id_siswa);
        $transaksi = $this->model("Transaksi_model")->getTransaksiByIdSiswa($siswa["id_siswa"]);

        $bulan = [
            [
                "juli", "agustus", "september", "oktober", "november", "desember",
            ],
            [
                "januari", "februari", "maret", "april", "mei", "juni",
            ]
        ];

        $bulan_dibayar = [];

        foreach ($transaksi as $t) {
            array_push($bulan_dibayar, $t["bulan_dibayar"]);
        }

        $data = [
            "judul" => "Detail Pembayaran",
            "name" => "Admin",
            "siswa" => $siswa,
            "transaksi" => $transaksi,
            "bulan" => $bulan,
            "bulan_dibayar" => $bulan_dibayar
        ];

        $this->view("templates/header", $data);
        $this->view("templates/sidebar/admin", $data);
        $this->view("admin/transaksi/detail", $data);
        $this->view("templates/footer");
    }

    public function storeTransaksi()
    {
        if ($this->model("Transaksi_model")->tambahTransaksi($_POST) > 0) {
            header("Location: " . baseurl . "admin/transaksi");
        }
    }

    public function history($id)
    {
        // $id = $_SESSION["id_siswa"];

        $history = $this->model("Transaksi_model")->getTransaksiByIdSiswa($id);

        $data = [
            "history" => $history,
            "judul" => "History Pembayaran",
            "name" => "Siswa"
        ];

        $this->view("templates/header", $data);
        $this->view("templates/sidebar/admin", $data);
        $this->view("admin/history/index", $data);
        $this->view("templates/footer");
    }
}
