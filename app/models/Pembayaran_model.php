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

    public function getPembayaranById($id_pembayaran)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id_pembayaran = :id_pembayaran");
        $this->db->bind("id_pembayaran", $id_pembayaran);
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
        $this->db->query("CALL editPembayaran(:id_pembayaran, :tahun_ajaran, :nominal)");
        $this->db->bind("id_pembayaran", $data["id_pembayaran"]);
        $this->db->bind("tahun_ajaran", $data["tahun_ajaran"]);
        $this->db->bind("nominal", $data["nominal"]);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusPembayaran($id_pembayaran)
    {
        $this->db->query("CALL deletePembayaran(:id_pembayaran)");
        $this->db->bind("id_pembayaran", $id_pembayaran);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
