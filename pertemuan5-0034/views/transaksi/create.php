<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
    :root {
        --primary-gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        --secondary-gradient: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        --bg-main: #f3f4f6;
        --bg-card: #ffffff;
        --text-primary: #111827;
        --text-secondary: #4b5563;
        --border-light: #e5e7eb;
        --radius-lg: 1rem;
        --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    body {
        font-family: 'Inter', sans-serif;
        background-color: var(--bg-main);
        color: var(--text-primary);
        line-height: 1.6;
    }

    .dashboard-container {
        padding: 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }

    .header-section {
        background: var(--primary-gradient);
        color: white;
        padding: 2rem;
        border-radius: var(--radius-lg);
        margin-bottom: 2rem;
        box-shadow: var(--shadow-md);
    }

    .header-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .main-title {
        font-size: 1.75rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .content-card {
        background: var(--bg-card);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-md);
        padding: 2rem;
        margin-bottom: 2rem;
        animation: fadeIn 0.5s ease;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: var(--text-secondary);
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid var(--border-light);
        border-radius: 0.5rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #4f46e5;
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        outline: none;
    }

    .produk-item {
        background: #f8fafc;
        padding: 1rem;
        border-radius: 0.5rem;
        margin-bottom: 1rem;
        animation: slideIn 0.3s ease;
    }

    .btn {
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
    }

    .btn-primary {
        background: var(--primary-gradient);
        color: white;
    }

    .btn-secondary {
        background: var(--secondary-gradient);
        color: white;
    }

    .btn-outline {
        border: 1px solid var(--border-light);
        background: white;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .button-group {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="header-section animate__animated animate__fadeIn">
            <div class="header-content">
                <h1 class="main-title">
                    <i class="fas fa-plus-circle"></i>
                    Tambah Transaksi Baru
                </h1>
                <div class="breadcrumb-elegant">
                    <a href="index.php" class="crumb-link">
                        <i class="fas fa-home"></i>
                        <span>Beranda</span>
                    </a>
                    <i class="fas fa-chevron-right"></i>
                    <span>Tambah Transaksi</span>
                </div>
            </div>
        </div>

        <div class="content-card">
            <form action="index.php?controller=transaksi&action=create" method="POST" class="needs-validation" novalidate>
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-user"></i> Pelanggan
                    </label>
                    <select name="pelanggan_id" class="form-control" required>
                        <option value="">Pilih Pelanggan</option>
                        <?php foreach ($pelanggan as $p): ?>
                            <option value="<?= htmlspecialchars($p['id']) ?>">
                                <?= htmlspecialchars($p['nama']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-calendar"></i> Tanggal Transaksi
                    </label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                <div id="produk-container">
                    <div class="produk-item">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-box"></i> Produk
                            </label>
                            <select name="produk_id[]" class="form-control" required>
                                <option value="">Pilih Produk</option>
                                <?php foreach ($produk as $p): ?>
                                    <option value="<?= htmlspecialchars($p['id']) ?>">
                                        <?= htmlspecialchars($p['nama']) ?> (Stok: <?= htmlspecialchars($p['stok']) ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-sort-numeric- asc"></i> Jumlah
                            </label>
                            <input type="number" name="jumlah[]" class="form-control" min="1" required>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-secondary" onclick="tambahProduk()">Tambah Produk</button>

                <div class="button-group">
                    <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
                    <a href="index.php?controller=transaksi&action=index" class="btn btn-outline">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    <script>
    function tambahProduk() {
        const container = document.getElementById('produk-container');
        const div = document.createElement('div');
        div.className = 'produk-item';
        div.innerHTML = `
            <div class="form-group">
                <label class="form-label">
                    <i class="fas fa-box"></i> Produk
                </label>
                <select name="produk_id[]" class="form-control" required>
                    <?php foreach ($produk as $p): ?>
                        <option value="<?= htmlspecialchars($p['id']) ?>">
                            <?= htmlspecialchars($p['nama']) ?> (Stok: <?= htmlspecialchars($p['stok']) ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">
                    <i class="fas fa-sort-numeric-asc"></i> Jumlah
                </label>
                <input type="number" name="jumlah[]" class="form-control" min="1" required>
            </div>
        `;
        container.appendChild(div);
    }
    </script>
</body>
</html>
