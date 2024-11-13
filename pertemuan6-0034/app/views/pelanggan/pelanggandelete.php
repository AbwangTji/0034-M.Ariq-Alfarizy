<?php
require_once '../../../config/database.php';
require_once '../../../app/models/pelanggan.php';

// Initialize database connection
$database = new Database();
$db = $database->getConnection();

// Initialize model
$modelPelanggan = new Pelanggan($db);

// Check if 'id_plg' is provided in URL
if (isset($_GET['id_plg'])) {
    $id_plg = $_GET['id_plg'];

    // Delete pelanggan data
    $modelPelanggan->deletePelanggan($id_plg);

    // Redirect back to viewpelanggan.php
    header("Location: viewpelanggan.php");
    exit();
} else {
    echo "ID pelanggan tidak ditemukan!";
    exit();
}
?>
