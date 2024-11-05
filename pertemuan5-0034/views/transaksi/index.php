<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Transaksi</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        /* Modern Variables */
        :root {
            --primary-gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            --success-gradient: linear-gradient(135deg, #059669 0%, #047857 100%);
            --danger-gradient: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
            --warning-gradient: linear-gradient(135deg, #d97706 0%, #b45309 100%);
            --info-gradient: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            
            --bg-main: #f3f4f6;
            --bg-card: #ffffff;
            --bg-dark: #1f2937;
            
            --text-primary: #111827;
            --text-secondary: #4b5563;
            --text-muted: #6b7280;
            
            --border-light: #e5e7eb;
            --border-dark: #d1d5db;
            
            --radius-sm: 0.375rem;
            --radius-md: 0.5rem;
            --radius-lg: 1rem;
            
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            color: var(--text-primary);
            line-height: 1.6;
        }

        .dashboard-container {
            padding: 2rem;
            max-width: 1400px;
            margin: 0 auto;
            background-color: var(--bg-main);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
        }

        .header-section {
            background-color: var(--bg-card);
            padding: 1.5rem;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            margin-bottom: 2rem;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .main-title {
            font-size: 2rem;
            font-weight: 800;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 0.5rem;
        }

        .title-icon {
            font-size: 1.5rem;
            color: #4f46e5;
        }

        .gradient-text {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .breadcrumb-elegant {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            color: var(--text-muted);
        }

        .crumb-link {
            color: var(--text-secondary);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .crumb-link:hover {
            color: var(--text-primary);
        }

        .action-button {
            background: var(--primary-gradient);
            color: white;
            border: none;
            padding: 0.75rem 1. 5rem;
            font-size: 1rem;
            font-weight: 600;
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .action-button:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--bg-card);
            padding: 2rem;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border-light);
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            backdrop-filter: blur(10px);
            border-radius: var(--radius-lg);
        }

        .stat-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .stat-details {
            position: relative;
            z-index: 1;
        }

        .stat-value {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 0.25rem;
        }

        .stat-label {
            font-size: 1rem;
            color: var(--text-muted);
        }

        .primary-gradient {
            background: var(--primary-gradient);
        }

        .primary-gradient .stat-icon,
        .primary-gradient .stat-value,
        .primary-gradient .stat-label {
            color: white;
        }

        .success-gradient {
            background: var(--success-gradient);
        }

        .success-gradient .stat-icon,
        .success-gradient .stat-value,
        .success-gradient .stat-label {
            color: white;
        }

        .table-container {
            background-color: var(--bg-card);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            padding: 1.5rem;
            overflow: hidden;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .elegant-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            font-size: 0.875rem;
        }

        .elegant-table th {
            background-color: #f8fafc; /* #f8fafc */
            color: var(--text-secondary);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 2px solid var(--border-dark);
            padding: 1rem;
        }

        .elegant-table tr:hover {
            background-color: #f8fafc;
            transition: all 0.3s ease;
        }

        .elegant-table td {
            background-color: var(--bg-card);
            border-bottom: 1px solid var(--border-light);
            padding: 1rem;
        }

        .id-column {
            width: 10%;
        }

        .customer-column {
            width: 30%;
        }

        .date-column {
            width: 15%;
        }

        .amount-column {
            width: 20%;
        }

        .action-column {
            width: 25%;
            text-align: center;
        }

        .id-badge {
            background-color: #f3f4f6;
            color: var(--text-primary);
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: var(--radius-sm);
        }

        .avatar {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-weight: 600;
            color: white;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        }

        .action-buttons {
            display: flex;
            gap: 0.75rem;
        }

        .action-btn {
            padding : 0.5rem;
            border-radius: var(--radius-md);
            transition: all 0.3s ease;
            border: 1px solid var(--border-light);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .action-btn.view-btn {
            background-color: #eef2ff;
            color: #4f46e5;
        }

        .action-btn.edit-btn {
            background-color: #ecfdf5;
            color: #059669;
        }

        .action-btn.delete-btn {
            background-color: #fef2f2;
            color: #dc2626;
        }

        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .table-row {
            animation: fadeIn 0.3s ease forwards;
        }
    </style>
</head>
<body>
    <div class="dashboard-container animate__animated animate__fadeInDown">
        <div class="header-section">
            <div class="header-content">
                <div class="title-wrapper">
                    <h1 class="main-title">
                        <i class="fas fa-receipt title-icon"></i>
                        <span class="gradient-text">Daftar Transaksi</span>
                    </h1>
                    <div class="breadcrumb-elegant">
                        <a href="index.php" class="crumb-link">
                            <i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                        <i class="fas fa-chevron-right separator"></i>
                        <span class="current">Transaksi</span>
                    </div>
                </div>
                <button class="action-button" onclick="window.location.href='index.php?controller=transaksi&action=create'">
                    <div class="button-content">
                        <i class="fas fa-plus-circle"></i>
                        <span>Tambah Transaksi</span>
                    </div>
                </button>
            </div>
        </div>

        <div class="stats-container animate__animated animate__fadeInUp">
            <div class="stat-card primary-gradient">
                <div class="stat-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="stat-details">
                    <h3 class="stat-value"><?= count($transaksi) ?></h3>
                    <p class="stat-label">Total Transaksi</p>
                </div>
                <div class="stat-chart">
                    <!-- Add sparkline chart here if needed -->
                </div>
            </div>

            <div class="stat-card success-gradient">
                <div class="stat-icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="stat-details">
                    <h3 class="stat-value">Rp <?= number_format(array_sum(array_column($transaksi, 'total')), 0 , ',', '.') ?></h3>
                    <p class="stat-label">Total Pendapatan</p>
                </div>
                <div class="stat-chart">
                    <!-- Add sparkline chart here if needed -->
                </div>
            </div>
        </div>

        <div class="table-container animate__animated animate__fadeInUp">
            <div class="table-wrapper">
                <table class="elegant-table">
                    <thead>
                        <tr>
                            <th>ID Transaksi</th>
                            <th>Informasi Pelanggan</th>
                            <th>Tanggal</th>
                            <th>Total Transaksi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $urutan = 1;
                        foreach ($transaksi as $item): 
                            $item['urutan'] = $urutan;
                            $urutan++;
                        ?>
                        <tr class="table-row">
                            <td class="id-column">
                                <span class="id-badge">#<?= sprintf('%04d', $item['urutan']) ?></span>
                            </td>
                            <td class="customer-column">
                                <div class="customer-info">
                                    <div class="avatar" style="background-color: <?= sprintf('#%06X', mt_rand(0, 0xFFFFFF)) ?>">
                                        <?= strtoupper(substr($item['nama_pelanggan'], 0, 1)) ?>
                                    </div>
                                    <div class="customer-details">
                                        <h4><?= $item['nama_pelanggan'] ?></h4>
                                        <span>ID Pelanggan: <?= $item['id'] ?></span>
                                    </div>
                                </div>
                            </td>
                            <td class="date-column">
 <div class="date-wrapper">
                                    <i class="far fa-calendar"></i>
                                    <span><?= date('d F Y', strtotime($item['tanggal'])) ?></span>
                                </div>
                            </td>
                            <td class="amount-column">
                                <div class="amount-wrapper">
                                    <span class="currency">Rp</span>
                                    <span class="amount"><?= number_format($item['total'], 0, ',', '.') ?></span>
                                </div>
                            </td>
                            <td class="action-column">
                                <div class="action-buttons">
                                    <button class="action-btn view-btn" 
                                            onclick="window.location.href='index.php?controller=transaksi&action=detail&id=<?= $item['id'] ?>'"
                                            data-tooltip="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="action-btn edit-btn"
                                            onclick="window.location.href='index.php?controller=transaksi&action=edit&id=<?= $item['id'] ?>'"
                                            data-tooltip="Edit Transaksi">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="action-btn delete-btn"
                                            onclick="confirmDelete(<?= $item['id'] ?>)"
                                            data-tooltip="Hapus Transaksi">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            if (confirm('Apakah Anda yakin ingin menghapus transaksi ini?')) {
                window.location.href = 'index.php?controller=transaksi&action=delete&id=' + id;
            }
        }
    </script>
</body>
</html>