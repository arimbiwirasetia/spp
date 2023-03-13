<?php
class Kelas_model
{
    private $table = "kelas";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllKelas()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->resultAll();
    }

    public function getKelasById($id_kelas)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id_kelas = :id_kelas");
        $this->db->bind("id_kelas", $id_kelas);
        return $this->db->resultSingle();
    }

    public function tambahKelas($data)
    {
        $this->db->query("CALL insertKelas(:nama, :kompetensi_keahlian)");
        $this->db->bind("nama", $data["nama"]);
        $this->db->bind("kompetensi_keahlian", $data["kompetensi_keahlian"]);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function editKelas($data)
    {
        $this->db->query("CALL editKelas(:id_kelas, :nama, :kompetensi_keahlian)");
        $this->db->bind("id_kelas", $data["id_kelas"]);
        $this->db->bind("nama", $data["nama"]);
        $this->db->bind("kompetensi_keahlian", $data["kompetensi_keahlian"]);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusKelas($id_kelas)
    {
        $this->db->query("CALL deleteKelas(:id_kelas)");
        $this->db->bind("id_kelas", $id_kelas);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
