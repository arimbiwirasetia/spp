<?php
class Siswa_model
{
    private $table = "siswa";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllSiswa()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->resultAll();
    }

    public function getSiswaById($id_siswa)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id_siswa = :id_siswa");
        $this->db->bind("id_siswa", $id_siswa);
        return $this->db->resultSingle();
    }

    public function getSiswaByUsernamePassword($username, $password)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE username = :username AND password = :password");
        $this->db->bind("username", $username);
        $this->db->bind("password", $password);
        return $this->db->resultSingle();
    }

    public function tambahSiswa($data)
    {
        $this->db->query("CALL insertSiswa(:nisn, :nis, :nama, :alamat, :telepon, :kelas_id, :pengguna_id, :pembayaran_id)");
        $this->db->bind("nisn", $data["nisn"]);
        $this->db->bind("nis", $data["nis"]);
        $this->db->bind("nama", $data["nama"]);
        $this->db->bind("alamat", $data["alamat"]);
        $this->db->bind("telepon", $data["telepon"]);
        $this->db->bind("kelas_id", $data["kelas_id"]);
        $this->db->bind("pengguna_id", $data["pengguna_id"]);
        $this->db->bind("pembayaran_id", $data["pembayaran_id"]);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function editSiswa($data)
    {

        $this->db->query("CALL editSiswa(:id_siswa, :nisn, :nis, :nama, :alamat, :telepon, :kelas_id, :pengguna_id, :pembayaran_id)");
        $this->db->bind("id_siswa", $data["id_siswa"]);
        $this->db->bind("nisn", $data["nisn"]);
        $this->db->bind("nis", $data["nis"]);
        $this->db->bind("nama", $data["nama"]);
        $this->db->bind("alamat", $data["alamat"]);
        $this->db->bind("telepon", $data["telepon"]);
        $this->db->bind("kelas_id", $data["kelas_id"]);
        $this->db->bind("pengguna_id", $data["pengguna_id"]);
        $this->db->bind("pembayaran_id", $data["pembayaran_id"]);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusSiswa($id_siswa)
    {
        $this->db->query("CALL deleteSiswa(:id_siswa)");
        $this->db->bind("id_siswa", $id_siswa);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
