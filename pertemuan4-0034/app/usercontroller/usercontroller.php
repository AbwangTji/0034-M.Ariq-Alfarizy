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
            throw new Exception("Query failed: " . $e->getMessage());
        }
    }

    public function getUserById($id) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            throw new Exception("Query failed: " . $e->getMessage());
        }
    }

    public function createUser($name, $email) {
        try {
            $stmt = $this->db->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            return $stmt->execute();
        } catch(PDOException $e) {
            throw new Exception("Create failed: " . $e->getMessage());
        }
    }

    public function updateUser($id, $name, $email) {
        try {
            $stmt = $this->db->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            return $stmt->execute();
        } catch(PDOException $e) {
            throw new Exception("Update failed: " . $e->getMessage());
        }
    }

    public function deleteUser($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch(PDOException $e) {
            throw new Exception("Delete failed: " . $e->getMessage());
        }
    }

    public function updatePicture($id, $picture) {
        try {
            $stmt = $this->db->prepare("UPDATE users SET picture = :picture WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':picture', $picture);
            return $stmt->execute();
        } catch(PDOException $e) {
            throw new Exception("Update failed: " . $e->getMessage());
        }
    }
}
?>
