<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi #<?= htmlspecialchars($transaksi['id']) ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            --secondary-gradient: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            --success-gradient: linear-gradient(135deg, #059669 0%, #047857 100%);
            --bg-main: #f3f4f6;
            --bg-card: #ffffff;
            --text-primary: #111827;
            --text-secondary: #4b5563;
            --border-light: #e5e7eb;
            --radius-lg: 1rem;
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-hover: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--bg-main);
            margin: 0;
            padding: 0;
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
            padding: 2.5rem;
            border-radius: var(--radius-lg);
            margin-bottom: 2rem;
            box-shadow: var(--shadow-md);
            animation: fadeInDown 0.5s ease-out;
            position: relative;
            overflow: hidden;
        }

        .header-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 100%);
            pointer-events: none;
        }

        .main-title {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            animation: fadeIn 0.5s ease-out;
        }

        .transaction-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            animation: fadeIn 0.5s ease-out 0.2s backwards;
        }

        .info-item {
            display: flex;
            flex-direction: column;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 0.75rem;
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .info-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .info-label {
            font-size: 0.875rem;
            opacity: 0.9;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .info-value {
            font-size: 1.5rem;
            font-weight: 600;
            margin-top: 0.5rem;
        }

        .content-card {
            background: var(--bg-card);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            padding: 2rem;
            margin-bottom: 2rem;
            animation: fadeIn 0.5s ease-out 0.4s backwards;
            transition: all 0.3s ease;
        }

        .content-card:hover {
            box-shadow: var(--shadow-hover);
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--border-light);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .detail-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            animation: fadeIn 0.5s ease-out 0.6s backwards;
        }

        .detail-table th {
            background-color: #f8fafc;
            padding: 1.25rem 1rem;
            text-align: left;
            font-weight: 600;
            color: var(--text-secondary);
            text-transform: uppercase;
            font-size: 0.875rem;
            letter-spacing: 0.05em;
        }

        .detail-table td {
            padding: 1.25rem 1rem;
            border-bottom: 1px solid var(--border-light);
            transition: background-color 0.3s ease;
        }

        .detail-table tr:hover td {
            background-color: #f8fafc;
        }

        .product-cell {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .product-icon {
            width: 40px;
            height: 40px;
            background: var(--secondary-gradient);
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: transform 0.3s ease;
        }

        .product-cell:hover .product-icon {
            transform: scale(1.1);
        }

        .total-section {
            background: var(--success-gradient);
            color: white;
            padding: 1.5rem 2rem;
            border-radius: var(--radius-lg);
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            animation: fadeIn 0.5s ease-out 0.8s backwards;
            box-shadow: var(--shadow-md);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .total-section:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }

        .total-label {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .total-value {
            font-size: 1.5rem;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem 2rem; background: var(--primary-gradient);
            color: white;
            text-decoration: none;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            animation: fadeIn 0.5s ease-out 1s backwards;
            box-shadow: var(--shadow-md);
        }

        .back-button:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-hover);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-50px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="header-section">
            <h1 class="main-title">
                <i class="fas fa-file-invoice"></i>
                Detail Transaksi #<?= sprintf('%06d', htmlspecialchars($transaksi['id'])) ?>
            </h1>
            <div class="transaction-info">
                <div class="info-item">
                    <span class="info-label">Tanggal Transaksi</span>
                    <span class="info-value"><?= date('d F Y', strtotime($transaksi['tanggal'])) ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Pelanggan</span>
                    <span class="info-value"><?= htmlspecialchars($transaksi['nama_pelanggan'] ?? 'Umum') ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Total Transaksi</span>
                    <span class="info-value">Rp <?= number_format($transaksi['total'], 0, ',', '.') ?></span>
                </div>
            </div>
        </div>

        <div class="content-card">
            <h2 class="card-title">
                <i class="fas fa-box-open"></i>
                Detail Produk
            </h2>
            <table class="detail-table">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detail_transaksi as $detail): ?>
                    <tr>
                        <td class="product-cell">
                            <div class="product-icon">
                                <i class="fas fa-box"></i>
                            </div>
                            <?= htmlspecialchars($detail['nama_produk']) ?>
                        </td>
                        <td><?= htmlspecialchars($detail['jumlah']) ?></td>
                        <td>Rp <?= number_format($detail['harga'], 0, ',', '.') ?></td>
                        <td>Rp <?= number_format($detail['jumlah'] * $detail['harga'], 0, ',', '.') ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="total-section">
            <span class="total-label">Total Pembayaran</span>
            <span class="total-value">Rp <?= number_format($transaksi['total'], 0, ',', '.') ?></span>
        </div>

        <div style="margin-top: 2rem;">
            <a href="index.php?controller=transaksi&action=index" class="back-button">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Daftar Transaksi
            </a>
        </div>
    </div>
</body>
</html>