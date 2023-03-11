<?php
class Pembayaran_model
{
    private $table = "pembayaran";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPembayaran()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->resultAll();
    }

    public function getPembayaranById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id = :id");
        $this->db->bind("id", $id);
        return $this->db->resultSingle();
    }

    public function tambahPembayaran($data)
    {
        $this->db->query("CALL insertPembayaran(:tahun_ajaran, :nominal)");
        $this->db->bind("tahun_ajaran", $data["tahun_ajaran"]);
        $this->db->bind("nominal", $data["nominal"]);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function editPembayaran($data)
    {
        $this->db->query("CALL editPembayaran(:id, :tahun_ajaran, :nominal)");
        $this->db->bind("id", $data["id"]);
        $this->db->bind("tahun_ajaran", $data["tahun_ajaran"]);
        $this->db->bind("nominal", $data["nominal"]);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusPembayaran($id)
    {
        $this->db->query("CALL deletePembayaran(:id)");
        $this->db->bind("id", $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
