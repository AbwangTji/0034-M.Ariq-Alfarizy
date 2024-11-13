<?php
class Barang {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function getAllBarang() {
        $query = "SELECT * FROM barang";
        return $this->db->query($query);
    }

    public function getBarangByKode($kode_brg) {
        $query = "SELECT * FROM barang WHERE kode_brg = :kode_brg";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':kode_brg', $kode_brg);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function addBarang($kode_brg, $nama_brg, $harga, $stok) {
        $query = "INSERT INTO barang (kode_brg, nama_brg, harga, stok) VALUES (:kode_brg, :nama_brg, :harga, :stok)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':kode_brg', $kode_brg);
        $stmt->bindParam(':nama_brg', $nama_brg);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':stok', $stok);
        return $stmt->execute();
    }

    public function updateBarang($kode_brg, $nama_brg, $harga, $stok) {
        $query = "UPDATE barang SET nama_brg = :nama_brg, harga = :harga, stok = :stok WHERE kode_brg = :kode_brg";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':kode_brg', $kode_brg);
        $stmt->bindParam(':nama_brg', $nama_brg);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':stok', $stok);
        return $stmt->execute();
    }

    public function deleteBarang($kode_brg) {
        $query = "DELETE FROM barang WHERE kode_brg = :kode_brg";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':kode_brg', $kode_brg);
        return $stmt->execute();
    }
}
