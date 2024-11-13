<?php
require_once '../../../config/database.php';
require_once '../../../app/models/transaksi.php';

// Initialize database connection
$database = new Database();
$db = $database->getConnection();

// Initialize model
$modelTransaksi = new Transaksi($db);
$dataTransaksi = $modelTransaksi->getAllTransaksi();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Penjualan | Transaksi</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../../public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../../public/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../public/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-collapse layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="../viewindex.php" class="navbar-brand">
        <img src="../../../public/dist/img/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Aplikasi Penjualan</span>
      </a>
    
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="../viewindex.php" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="../barang/viewbarang.php" class="nav-link">Barang</a> 
          </li>
          <li class="nav-item">
            <a href="../pelanggan/viewpelanggan.php" class="nav-link">Pelanggan</a> 
          </li>
          <li class="nav-item">
            <a href="viewtransaksi.php" class="nav-link">Transaksi</a> 
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- /Navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Daftar Transaksi</h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="transaksiadd.php" class="btn btn-outline-primary mb-0 float-right">Tambah Transaksi</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID Transaksi</th>
                      <th>Kode Barang</th>
                      <th>ID Pelanggan</th>
                      <th>Jumlah</th>
                      <th>Total Harga</th>
                      <th>Tanggal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($dataTransaksi as $transaksi) :
                    ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $transaksi['id']; ?></td>
                      <td><?= $transaksi['kode_brg']; ?></td>
                      <td><?= $transaksi['id_plg']; ?></td>
                      <td><?= $transaksi['jumlah']; ?></td>
                      <td><?= $transaksi['total_harga']; ?></td>
                      <td><?= $transaksi['tanggal']; ?></td>
                      <td>
                        <a href="transaksidetail.php?id=<?= $transaksi['id']; ?>" class="btn btn-outline-primary btn-sm">Detail</a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>ID Transaksi</th>
                      <th>Kode Barang</th>
                      <th>ID Pelanggan</th>
                      <th>Jumlah</th>
                      <th>Total Harga</th>
                      <th>Tanggal</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../../../public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../../public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../../public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../../public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../../public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../../public/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../../public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../../public/plugins/jszip/jszip.min.js"></script>
<script src="../../../public/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../../public/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../../public/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../../public/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../../public/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../public/dist/js/adminlte.min.js"></script>
</body>
</html>
