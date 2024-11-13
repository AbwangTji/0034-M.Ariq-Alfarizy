<?php
class Transaksi {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function getAllTransaksi() {
        $query = "SELECT * FROM transaksi";
        return $this->db->query($query);
    }

    public function getTransaksiById($id) {
        $query = "SELECT * FROM transaksi WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function addTransaksi($id, $kode_brg, $id_plg, $jumlah, $total_harga, $tanggal) {
        $query = "INSERT INTO transaksi (kode_brg, id_plg, jumlah, total_harga, tanggal) VALUES (:kode_brg, :id_plg, :jumlah, :total_harga, :tanggal)";
        $stmt = $this->db->prepare($query);
    
        $stmt->bindParam(':kode_brg', $kode_brg);
        $stmt->bindParam(':id_plg', $id_plg);
        $stmt->bindParam(':jumlah', $jumlah);
        $stmt->bindParam(':total_harga', $total_harga);
        $stmt->bindParam(':tanggal', $tanggal);
    
        return $stmt->execute();
    }
    

    public function updateTransaksi($id, $kode_brg, $id_plg, $jumlah, $total_harga, $tanggal) {
        $query = "UPDATE transaksi SET kode_brg = :kode_brg, id_plg = :id_plg, jumlah = :jumlah, total_harga = :total_harga, tanggal = :tanggal WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':kode_brg', $kode_brg);
        $stmt->bindParam(':id_plg', $id_plg);
        $stmt->bindParam(':jumlah', $jumlah);
        $stmt->bindParam(':total_harga', $total_harga);
        $stmt->bindParam(':tanggal', $tanggal);
        return $stmt->execute();
    }

    public function deleteTransaksi($id) {
        $query = "DELETE FROM transaksi WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
