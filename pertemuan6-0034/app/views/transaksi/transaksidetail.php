<?php
require_once '../../../config/database.php';
require_once '../../../app/models/transaksi.php';

// Initialize database connection
$database = new Database();
$db = $database->getConnection();

// Initialize model
$modelTransaksi = new Transaksi($db);

// Check if 'id' is provided in URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $transaksi = $modelTransaksi->getTransaksiById($id); // Fetch data for the given transaction ID
} else {
    echo "ID transaksi tidak ditemukan!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../../public/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../public/dist/css/adminlte.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Transaksi</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>ID Transaksi</th>
                        <td><?= $transaksi['id']; ?></td>
                    </tr>
                    <tr>
                        <th>Kode Barang</th>
                        <td><?= $transaksi['kode_brg']; ?></td>
                    </tr>
                    <tr>
                        <th>ID Pelanggan</th>
                        <td><?= $transaksi['id_plg']; ?></td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td><?= $transaksi['jumlah']; ?></td>
                    </tr>
                    <tr>
                        <th>Total Harga</th>
                        <td><?= $transaksi['total_harga']; ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td><?= $transaksi['tanggal']; ?></td>
                    </tr>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="viewtransaksi.php" class="btn btn-secondary">Kembali</a>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
    
</div>
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
</body>
</html>
