
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi Penjualan | Beranda</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../public/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../public/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-collapse layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="viewindex.php" class="navbar-brand">
        <img src="../../public/dist/img/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Aplikasi Penjualan</span>
      </a>
    
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="viewindex.php" class="nav-link">Home</a>
          </li>
        <li class="nav-item">
            <a href="../views/barang/viewbarang.php" class="nav-link">Barang</a> 
        <li class="nav-item">
            <a href="../views/pelanggan/viewpelanggan.php" class="nav-link">Pelanggan</a> 
        <li class="nav-item">
            <a href="../views/transaksi/viewtransaksi.php" class="nav-link">Transaksi</a> 
        </ul>
     </div>
    </div>
  </nav>
  <!-- /Navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2 justify-content-center">
          <div class="col-sm-5 ">
            <h1 class="m-0 mb-4 center "> Selamat Datang di Aplikasi Penjualan</h1>
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
     
    <!-- Main content -->
    <div class="content ">
      <div class="container">
        <div class="row ">
        <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row justify-content-center ">
          <div class="col-lg-3 col-6 ">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Barang</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
              <i class="ion ion-bag"></i>
              </div>
              <a href="../views/barang/viewbarang.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Pelanggan</h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
              <i class="fas fa-users"></i>
              </div>
              <a href="../views/pelanggan/viewpelanggan.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Transaksi</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
              <i class="ion ion-stats-bars"></i>
              </div>
              <a href="../views/transaksi/viewtransaksi.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
        </div>
        <!-- /.row -->
       
      </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Main Footer -->
   
  <footer class="main-footer">
    <!-- To the right -->
    
    <!-- Default to the left -->
    <strong>Copyright &copy; 2024 <a href="https://github.com/Staginoir/tugaspemprogramanweb2_0029">23.230.0029</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../../public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../public/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- ionicon -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
