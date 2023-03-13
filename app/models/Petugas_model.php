<?php
class Petugas_model
{
    private $table = "petugas";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPetugas()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->resultAll();
    }

    public function selectAllPetugas()
    {
        $this->db->query("SELECT * FROM selectpetugas");
        return $this->db->resultAll();
    }

    public function getPetugasByUsername($username)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE username = :username");
        $this->db->bind("username", $username);
        $this->db->execute();
        return $this->db->resultSingle();
    }

    public function getPetugasById($id_petugas)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id_petugas = :id_petugas");
        $this->db->bind("id_petugas", $id_petugas);
        $this->db->execute();
        return $this->db->resultSingle();
    }

    public function authPetugasByUsernamePassword($username, $password)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE username = :username AND password = :password");
        $this->db->bind("username", $username);
        $this->db->bind("password", $password);
        $this->db->execute();
        return $this->db->resultSingle();
    }

    public function tambahPetugas($data)
    {
        $this->db->query("CALL insertPetugas (:nama, :pengguna_id)");
        $this->db->bind("nama", $data["nama"]);
        $this->db->bind("pengguna_id", $data["pengguna_id"]);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function editPetugas($data)
    {
        $this->db->query("CALL editPetugas (:id, :nama, :pengguna_id)");
        $this->db->bind("nama", $data["id"]);
        $this->db->bind("nama", $data["nama"]);
        $this->db->bind("pengguna_id", $data["pengguna_id"]);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusPetugas($id)
    {
        $this->db->query("CALL deletePetugas (:id)");
        $this->db->bind("id", $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
