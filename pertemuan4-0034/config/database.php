<?php
function getDBConnection() {
    try {
        $host = 'localhost';
        $dbname = 'dbmvc-zy';  // nama database yang sudah diubah
        $username = 'root';
        $password = '';
        
        $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch(PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}
?>
