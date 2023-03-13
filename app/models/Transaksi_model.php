<?php
class Transaksi_model
{
    private $db;
    private $table = "transaksi";

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllTransaksi()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->resultAll();
    }

    public function selectTransaksi()
    {
        $this->db->query("SELECT * FROM selecttransaksi");
        return $this->db->resultAll();
    }

    public function getTransaksiByIdSiswa($id_transaksi)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE siswa_id = :siswa_id");
        $this->db->bind("siswa_id", $id_transaksi);
        return $this->db->resultAll();
    }

    public function tambahTransaksi($data)
    {
        // $raw = $data;

        unset($data["siswa_id"]);
        // unset($data["pembayaran_id"]);

        $year = date('Y');

        foreach ($data["bulan"] as $bln) {
            $this->db->query("INSERT INTO {$this->table} VALUES (null, :siswa_id, :pembayaran_id, :tanggal_dibayar, :bulan_dibayar, :tahun_dibayar, :petugas_id)");
            $this->db->bind("siswa_id", $data["id_siswa"]);
            $this->db->bind("pembayaran_id", $data["pembayaran_id"]);
            $this->db->bind("tanggal_dibayar", date('Y-m-d'));
            $this->db->bind("bulan_dibayar", $bln);
            $this->db->bind("tahun_dibayar", "$year");
            $this->db->bind("petugas_id", 3);
            $this->db->execute();
        }
        return $this->db->rowCount();
    }

    public function getBulanByIdTransaksi($id_transaksi)
    {
        $this->db->query("SELECT bulan_dibayar FROM {$this->table} WHERE siswa_id = :siswa_id");
        $this->db->bind("siswa_id", $id_transaksi);
        $this->db->resultAll();
    }
}
// spp = pembayaran
// pembayaran = transaksi