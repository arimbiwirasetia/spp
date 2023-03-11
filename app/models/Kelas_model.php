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

    public function getKelasById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id = :id");
        $this->db->bind("id", $id);
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
        $this->db->query("CALL editKelas(:id, :nama, :kompetensi_keahlian)");
        $this->db->bind("id", $data["id"]);
        $this->db->bind("nama", $data["nama"]);
        $this->db->bind("kompetensi_keahlian", $data["kompetensi_keahlian"]);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusKelas($id)
    {
        $this->db->query("CALL deleteKelas(:id)");
        $this->db->bind("id", $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
