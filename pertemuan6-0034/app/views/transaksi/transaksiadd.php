<?php
require_once '../../../config/database.php';
require_once '../../../app/models/transaksi.php';
require_once '../../../app/models/barang.php';

// Initialize database connection
$database = new Database();
$db = $database->getConnection();

// Cek apakah ada parameter 'kode_brg' untuk menangani AJAX
if (isset($_GET['kode_brg'])) {
    $modelBarang = new Barang($db);

    $kode_brg = $_GET['kode_brg'];
    $barang = $modelBarang->getBarangByKode($kode_brg);

    if ($barang) {
        echo json_encode(['success' => true, 'harga' => $barang['harga']]);
    } else {
        echo json_encode(['success' => false]);
    }
    exit();
}

// Initialize Transaksi model
$modelTransaksi = new Transaksi($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $kode_brg = $_POST['kode_brg'];
    $id_plg = $_POST['id_plg'];
    $jumlah = $_POST['jumlah'];
    $total_harga = $_POST['total_harga'];
    
    // Set current datetime for `tanggal`
    $tanggal = date('Y-m-d H:i:s');

    // Add transaksi to the database
    $modelTransaksi->addTransaksi(null, $kode_brg, $id_plg, $jumlah, $total_harga, $tanggal);

    // Redirect back to viewtransaksi.php
    header("Location: viewtransaksi.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Penjualan | Tambah Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../../../public/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../../public/dist/css/adminlte.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Transaksi</h3>
                    </div>
                    <form action="" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kode_brg">Kode Barang</label>
                                <input type="text" class="form-control" id="kode_brg" name="kode_brg" required onchange="fetchHarga()">
                            </div>
                            <div class="form-group">
                                <label for="id_plg">ID Pelanggan</label>
                                <input type="text" class="form-control" id="id_plg" name="id_plg" required>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" required oninput="calculateTotal()">
                            </div>
                            <div class="form-group">
                                <label for="total_harga">Total Harga</label>
                                <input type="number" class="form-control" id="total_harga" name="total_harga" readonly>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                            <a href="viewtransaksi.php" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
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
    <script>
        let hargaBarang = 0;

        function fetchHarga() {
            const kodeBrg = document.getElementById('kode_brg').value;
            fetch(`transaksiadd.php?kode_brg=${kodeBrg}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        hargaBarang = data.harga;
                        calculateTotal();
                    } else {
                        alert('Kode barang tidak ditemukan');
                    }
                })
                .catch(error => console.error('Error fetching price:', error));
        }

        function calculateTotal() {
            const jumlah = document.getElementById('jumlah').value;
            const totalHarga = document.getElementById('total_harga');
            totalHarga.value = hargaBarang * jumlah;
        }
    </script>
</body>
</html>
