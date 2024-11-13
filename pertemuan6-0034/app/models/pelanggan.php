<?php
class Pelanggan {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function getAllPelanggan() {
        $query = "SELECT * FROM pelanggan";
        return $this->db->query($query);
    }

    public function getPelangganById($id_plg) {
        $query = "SELECT * FROM pelanggan WHERE id_plg = :id_plg";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_plg', $id_plg);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function addPelanggan($id_plg, $nama_plg, $alamat) {
        $query = "INSERT INTO pelanggan (id_plg, nama_plg, alamat) VALUES (:id_plg, :nama_plg, :alamat)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_plg', $id_plg);
        $stmt->bindParam(':nama_plg', $nama_plg);
        $stmt->bindParam(':alamat', $alamat);
        return $stmt->execute();
    }

    public function updatePelanggan($id_plg, $nama_plg, $alamat) {
        $query = "UPDATE pelanggan SET nama_plg = :nama_plg, alamat = :alamat WHERE id_plg = :id_plg";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_plg', $id_plg);
        $stmt->bindParam(':nama_plg', $nama_plg);
        $stmt->bindParam(':alamat', $alamat);
        return $stmt->execute();
    }

    public function deletePelanggan($id_plg) {
        $query = "DELETE FROM pelanggan WHERE id_plg = :id_plg";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_plg', $id_plg);
        return $stmt->execute();
    }
}
