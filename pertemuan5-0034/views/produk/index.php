<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk Eksklusif</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f6f9fc 0%, #e9f2f9 100%);
            min-height: 100vh;
        }
        .container {
            max-width: 1200px;
            margin-top: 3rem;
        }
        .main-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.8);
        }
        .card-header {
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            color: white;
            border: none;
            padding: 2rem;
        }
        .table {
            margin-bottom: 0;
        }
        .table th {
            border-top: none;
            text-transform: uppercase;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            color: #6a11cb;
        }
        .table td {
            vertical-align: middle;
            font-size: 0.95rem;
        }
        .product-item {
            transition: all 0.3s ease;
        }
        .product-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .btn-group .btn {
            border-radius: 30px;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }
        .btn-group .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .badge {
            padding: 0.6em 1em;
            border-radius: 30px;
            font-weight: 600;
        }
        .animate__animated {
            animation-duration: 0.6s;
        }
        .product-name {
            font-weight: 600;
            color: #2c3e50;
        }
        .price {
            font-weight: 700;
            color: #e74c3c;
        }
        .stock-high {
            background-color: #2ecc71;
        }
        .stock-low {
            background-color: #f39c12;
        }
        .add-product-btn {
            background: linear-gradient(45deg, #11998e, #38ef7d);
            border: none;
            color: white;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }
        .add-product-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(17, 153, 142, 0.3);
        }
    </style>
</head>
<body>
    <div class="container" data-aos="fade-up">
        <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" data-aos="fade-down">
            <i class="fas fa-check-circle me-2"></i><?php echo $_SESSION['success']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['success']); endif; ?>

        <div class="card main-card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0"><i class="fas fa-gem me-2"></i>Katalog Produk Eksklusif</h3>
                    <a href="index.php?controller=produk&action=create" class="btn add-product-btn">
                        <i class="fas fa-plus-circle me-2"></i>Tambah Produk Baru
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="productTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($produk as $item): ?>
                        <tr class="product-item" data-aos="fade-up">
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-box text-primary me-3 fa-2x"></i>
                                    <span class="product-name"><?= htmlspecialchars($item['nama']) ?></span>
                                </div>
                            </td>
                            <td>
                                <span class="price">
                                    Rp <?= number_format($item['harga'], 0, ',', '.') ?>
                                </span>
                            </td>
                            <td>
                                <span class="badge <?= $item['stok'] > 10 ? 'stock-high' : 'stock-low' ?>">
                                    <?= htmlspecialchars($item['stok']) ?> unit
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="index.php?controller=produk&action=edit&id=<?= $item['id'] ?>" 
                                       class="btn btn-outline-primary">
                                        <i class="fas fa-edit me-1"></i> Edit
                                    </a>
                                    <a href="index.php?controller=produk&action=delete&id=<?= $item['id'] ?>" 
                                       class="btn btn-outline-danger"
                                       onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                        <i class="fas fa-trash-alt me-1"></i> Hapus
                                    </a>
                                </div>
                            </td>
                        </tr>
                         <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });

        $(document).ready(function() {
            $('#productTable').DataTable({
                "pageLength": 5,
                "lengthMenu": [5, 10, 25],
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ produk",
                    "zeroRecords": "Tidak ada produk yang ditemukan",
                    "info": "Halaman _PAGE_ dari _PAGES_",
                    "infoEmpty": "Tidak ada produk yang tersedia",
                    "infoFiltered": "(disaring dari _MAX_ total produk)"
                }
            });
        });
    </script>
</body>
</html>