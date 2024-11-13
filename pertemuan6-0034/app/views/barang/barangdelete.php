<?php
require_once '../../../config/database.php';
require_once '../../../app/models/barang.php';

// Initialize database connection
$database = new Database();
$db = $database->getConnection();

// Initialize model
$modelBarang = new Barang($db);

// Check if 'kode_brg' is provided in URL
if (isset($_GET['kode_brg'])) {
    $kode_brg = $_GET['kode_brg'];

    // Delete barang data
    $modelBarang->deleteBarang($kode_brg);

    // Redirect back to viewbarang.php
    header("Location: viewbarang.php");
    exit();
} else {
    echo "Kode barang tidak ditemukan!";
    exit();
}
?>
