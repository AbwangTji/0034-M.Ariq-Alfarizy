<?php
class Pelanggan {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Fetch all customers
    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM pelanggan");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fetch a specific customer by ID
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM pelanggan WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create a new customer record
    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO pelanggan (nama, alamat, telepon) VALUES (?, ?, ?)");
        $stmt->execute([$data['nama'], $data['alamat'], $data['telepon']]);
    }

    // Update an existing customer record by ID
    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE pelanggan SET nama = ?, alamat = ?, telepon = ? WHERE id = ?");
        $stmt->execute([$data['nama'], $data['alamat'], $data['telepon'], $id]);
    }

    // Delete a customer record by ID, with check for associated transactions
    public function delete($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM pelanggan WHERE id = ?");
            $result = $stmt->execute([$id]);
            
            if ($result && $stmt->rowCount() > 0) {
                return true;
            } else {
                throw new Exception('Gagal menghapus data pelanggan');
            }
        } catch (PDOException $e) {
            throw new Exception('Terjadi kesalahan database: ' . $e->getMessage());
        }
    }
}
