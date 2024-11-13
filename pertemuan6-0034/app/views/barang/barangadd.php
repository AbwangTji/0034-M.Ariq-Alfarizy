<?php
require_once '../../../config/database.php';
require_once '../../../app/models/barang.php';

// Initialize database connection
$database = new Database();
$db = $database->getConnection();

// Initialize model
$modelBarang = new Barang($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $kode_brg = $_POST['kode_brg'];
    $nama_brg = $_POST['nama_brg'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Add barang to the database
    $modelBarang->addBarang($kode_brg, $nama_brg, $harga, $stok);

    // Redirect back to viewbarang.php
    header("Location: viewbarang.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Penjualan | Tambah Barang</title>
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
    <div class="container">
    <div class="row d-flex justify-content-center mt-5">
    <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Barang</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="kode_brg">Kode Barang</label>
                    <input type="text" class="form-control" id="kode_brg" placeholder="Kode Barang" name="kode_brg" required>
                  </div>
                  <div class="form-group">
                    <label for="nama_brg">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_brg" placeholder="Nama Barang" name="nama_brg" required>
                  </div>
                  <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" id="harga" placeholder="Harga" name="harga" required>
                  </div>
                  <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" class="form-control" id="stok" placeholder="Stok" name="stok" required>
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-outline-primary ">Simpan</button>
                  <a href="viewbarang.php" class="btn btn-outline-secondary">Batal</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
    </div>
    
    </div>

    <footer class="main-footer text-left mt-5">
        <strong>&copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>. All rights reserved.</strong>
        <div class="float-right d-none d-sm-inline">
            <b>Version</b> 3.2.0
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
