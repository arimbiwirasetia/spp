<?php
class Pengguna_model
{
    private $table = "pengguna";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPengguna()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->resultAll();
    }

    public function getPenggunaByUsername($username)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE username = :username");
        $this->db->bind("username", $username);
        $this->db->execute();
        return $this->db->resultSingle();
    }

    public function getPenggunaById($id_pengguna)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id_pengguna = :id_pengguna");
        $this->db->bind("id_pengguna", $id_pengguna);
        $this->db->execute();
        return $this->db->resultSingle();
    }

    public function authPenggunaByUsernamePassword($data)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE username = :username AND password = :password");
        $this->db->bind("username", $data["username"]);
        $this->db->bind("password", $data["password"]);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function tambahPengguna($data)
    {
        $this->db->query("CALL insertPengguna (:username, :password, :role)");
        $this->db->bind("username", $data["username"]);
        $this->db->bind("password", $data["password"]);
        $this->db->bind("role", $data["role"]);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function editPengguna($data)
    {
        $this->db->query("CALL editPengguna (:id_pengguna, :username, :password, :role)");
        $this->db->bind("id_pengguna", $data["id_pengguna"]);
        $this->db->bind("username", $data["username"]);
        $this->db->bind("password", $data["password"]);
        $this->db->bind("role", $data["role"]);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusPengguna($id_pengguna)
    {
        $this->db->query("CALL deletePengguna (:id_pengguna)");
        $this->db->bind("id_pengguna", $id_pengguna);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
