<?php
class User {
    private $db;
    
    public function __construct($dbConnection) {
        $this->db = $dbConnection;    
    }

    public function getAllUsers() {
        try {
            $stmt = $this->db->query("SELECT * FROM users");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    public function getUserById($id) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    public function updatePicture($id, $picture) {
        try {
            $stmt = $this->db->prepare("UPDATE users SET picture = :picture WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':picture', $picture);
            return $stmt->execute();
        } catch(PDOException $e) {
            die("Update failed: " . $e->getMessage());
        }
    }
}
?>
