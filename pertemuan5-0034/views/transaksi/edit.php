<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi</title>
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
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
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

    .breadcrumb-elegant {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
        color: rgba(255, 255, 255, 0.8);
    }

    .crumb-link {
        color: white;
        text-decoration: none;
        transition: opacity 0.3s ease;
    }

    .crumb-link:hover {
        opacity: 0.8;
    }

    .content-card {
        background: var(--bg-card);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-md);
        padding: 2rem;
        margin-bottom: 2rem;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        color: var(--text-primary);
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
        font-size: 1rem;
        border: 1px solid var(--border-light);
        border-radius: 0.5rem;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-control:focus {
        border-color: #4f46e5;
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        outline: none;
    }

    .btn {
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
        font-weight: 500;
        text-align: center;
        border: none;
        border-radius: 0.5rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background: var(--primary-gradient);
        color: white;
    }

    .btn-secondary {
        background: var(--secondary-gradient);
        color: white;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="header-section animate__animated animate__fadeIn">
            <div class="header-content">
                <h1 class="main-title">
                    <i class="fas fa-edit"></i>
                    Edit Transaksi
                </h1>
                <div class="breadcrumb-elegant">
                    <a href="index.php" class="crumb-link">
                        <i class="fas fa-home"></i>
                        <span>Beranda</span>
                    </a>
                    <i class="fas fa-chevron-right"></i>
                    <a href="index.php?controller=transaksi&action=index" class="crumb-link">
                        <span>Transaksi</span>
                    </a>
                    <i class="fas fa-chevron-right"></i>
                    <span>Edit</span>
                </div>
            </div>
        </div>

        <div class="content-card animate__animated animate__fadeInUp">
            <h2 class="card-title">Form Edit Transaksi</h2>
            <form action="index.php?controller=transaksi&action=edit&id=<?= htmlspecialchars($transaksi['id']) ?>" 
                  method="POST" 
                  class="needs-validation" 
                  novalidate>
                
                <div class="form-group">
                    <label for="pelanggan_id" class="form-label">
                        <i class="fas fa-user"></i> Pelanggan
                    </label>
                    <select name="pelanggan_id" 
                            id="pelanggan_id" 
                            class="form-control" 
                            required>
                        <option value="">Pilih Pelanggan</option>
                        <?php foreach ($pelanggan as $p): ?>
                            <option value="<?= htmlspecialchars($p['id']) ?>" 
                                    <?= $p['id'] == $transaksi['pelanggan_id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($p['nama']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        Silakan pilih pelanggan
                    </div>
                </div>

                <div class="form-group">
                    <label for="tanggal" class="form-label">
                        <i class="fas fa-calendar-alt"></i> Tanggal Transaksi
                    </label>
                    <input type="date" 
                           name="tanggal" 
                           id="tanggal" 
                           class="form- control" 
                           value="<?= htmlspecialchars($transaksi['tanggal']) ?>" 
                           required>
                    <div class="invalid-feedback">
                        Tanggal transaksi harus diisi
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Transaksi
                    </button>
                    <a href="index.php?controller=transaksi&action=index" 
                       class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Form Validation Script -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Form validation
        const form = document.querySelector('.needs-validation');
        
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        });

        // Set min date to today for the date input
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('tanggal').setAttribute('max', today);
    });
    </script>
</body>
</html>