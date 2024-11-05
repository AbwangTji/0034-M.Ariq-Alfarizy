<?php require 'views/layout.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" rel="stylesheet">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

<div class="container py-4">
    <!-- Hero Section -->
    <div class="hero-section animate__animated animate__fadeIn">
        <h1>Manajemen Pelanggan</h1>
        <p>Kelola data pelanggan Anda dengan mudah dan efisien</p>
    </div>

    <!-- Search Bar with Animation -->
    <div class="search-wrapper mb-4" data-aos="fade-down">
        <div class="search-box">
            <input type="text" id="searchInput" class="search-input" placeholder="Cari pelanggan...">
            <div class="search-icon-wrapper">
                <i class="fas fa-search search-icon"></i>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="stats-grid" data-aos="fade-up" data-aos-delay="100">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-details">
                <h3><?= count($pelanggan) ?></h3>
                <p>Total Pelanggan</p>
            </div>
            <div class="stat-chart">
                <svg viewBox="0 0 36 36">
                    <path d="M18 2.0845
                        a 15.9155 15.9155 0 0 1 0 31.831
                        a 15.9155 15.9155 0 0 1 0 -31.831"
                        fill="none"
                        stroke="#4ade80"
                        stroke-width="3"
                        stroke-dasharray="75, 100"/>
                </svg>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon blue">
                <i class="fas fa-chart-line"></i>
            </div>
            <div class="stat-details">
                <h3>85%</h3>
                <p>Tingkat Kepuasan</p>
            </div>
            <div class="stat-chart">
                <svg viewBox="0 0 36 36">
                    <path d="M18 2.0845
                        a 15.9155 15.9155 0 0 1 0 31.831
                        a 15.9155 15.9155 0 0 1 0 -31.831"
                        fill="none"
                        stroke="#60a5fa"
                        stroke-width="3"
                        stroke-dasharray="85, 100"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content-card" data-aos="fade-up" data-aos-delay="200">
        <div class="content-header">
            <div class="header-left">
                <h2><i class="fas fa-users"></i> Daftar Pelanggan</h2>
                <p>Kelola dan pantau data pelanggan Anda</p>
            </div>
            <a href="index.php?controller=pelanggan&action=create" class="btn-add">
                <i class="fas fa-plus"></i>
                <span>Tambah Pelanggan</span>
            </a>
        </div>

        <div class="table-container">
            <table class="modern-table">
                <thead>
                    <tr>
                        <th>Pelanggan</th>
                        <th>Info Kontak</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pelanggan as $item): ?>
                    <tr class="table-row" data-aos="fade-up">
                        <td>
                            <div class="customer-profile">
                                <div class="avatar" style="background: <?= sprintf('#%06X', mt_rand(0, 0xFFFFFF)) ?>">
                                    <?= strtoupper(substr($item['nama'], 0, 1)) ?>
                                </div>
                                <div class="profile-info ">
                                    <h4><?= htmlspecialchars($item['nama']) ?></h4>
                                    <span>#<?= $item['id'] ?></span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="contact-details">
                                <p><i class="fas fa-phone"></i> <?= htmlspecialchars($item['telepon']) ?></p>
                                <p><i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($item['alamat']) ?></p>
                            </div>
                        </td>
                        <td>
                            <?php 
                            $transactionCount = $item['transaction_count'] ?? 0;
                            $statusClass = $transactionCount > 0 ? 'has-transactions' : 'active';
                            $statusText = $transactionCount > 0 ? 'Ada Transaksi' : 'Aktif';
                            ?>
                            <span class="status <?= $statusClass ?>">
                                <?= $statusText ?>
                                <?php if($transactionCount > 0): ?>
                                    <span class="count"><?= $transactionCount ?></span>
                                <?php endif; ?>
                            </span>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn-icon edit" onclick="window.location.href='index.php?controller=pelanggan&action=edit&id=<?= $item['id'] ?>'">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn-icon delete" onclick="confirmDelete(<?= $item['id'] ?>)">
                                    <i class="fas fa-trash"></i>
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

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
AOS.init({
    duration: 800,
    once: true
});

// Search functionality
document.getElementById('searchInput').addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const rows = document.querySelectorAll('.table-row');
    
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchTerm) ? '' : 'none';
    });
});

// Delete confirmation
function confirmDelete(id) {
    Swal.fire({
        title: 'Hapus Pelanggan?',
        text: "Data yang dihapus tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#6B7280',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal',
         }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Menghapus Data...',
                text: 'Mohon tunggu sebentar',
                allowOutsideClick: false,
                showConfirmButton: false,
                willOpen: () => {
                    Swal.showLoading();
                }
            });

            fetch(`index.php?controller=pelanggan&action=delete&id=${id}`)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: data.message,
                            icon: 'success',
                            confirmButtonColor: '#22c55e'
                        }).then(() => {
                            window.location.reload();
                        });
                    } else {
                        throw new Error(data.message || 'Terjadi kesalahan saat menghapus data');
                    }
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Error!',
                        text: error.message,
                        icon: 'error',
                        confirmButtonColor: '#ef4444'
                    });
                });
        }
    });
}
</script>

<style>
:root {
    --primary: #6366f1;
    --secondary: #4f46e5;
    --success: #22c55e;
    --danger: #ef4444;
    --warning: #f59e0b;
    --info: #3b82f6;
    --background: #f8fafc;
    --text: #1e293b;
    --border: #e2e8f0;
}

body {
    background-color: var(--background);
    font-family: 'Inter', sans-serif;
}

.container {
    max-width: 1000px;
    padding: 1rem;
    margin: 0 auto;
}

.hero-section {
    background: var(--primary);
    padding: 2rem;
    color: white;
    border-radius: 0.5rem;
    margin-bottom: 1rem;
}

.search-wrapper {
    margin-bottom: 1rem;
}

.search-box {
    background : white;
    border-radius: 1rem;
    padding: 0.5rem 1rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
    transition: all 0.3s ease;
    max-width: 500px;
    margin: 0 auto;
}

.search-input {
    border: none;
    flex: 1;
    font-size: 0.9rem;
    padding: 0.5rem;
    outline: none;
}

.search-icon-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: var(--primary);
    color: white;
    cursor: pointer;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: white;
    border-radius: 0.5rem;
    padding: 1rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.stat-icon {
    font-size: 2rem;
    color: var(--primary);
}

.stat-details {
    margin-left: 1rem;
}

.stat-chart {
    margin-top: 1rem;
}

.stat-chart svg {
    width: 36px;
    height: 36px;
}

.content-card {
    background: white;
    border-radius: 0.5rem;
    padding: 1rem;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    margin-bottom: 2rem;
}

.content-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
}

.header-left {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.header-left h2 {
    margin: 0;
    font-weight: 600;
    font-size: 1.1rem;
}

.header-left p {
    margin: 0;
    color: #64748b;
    font-size: 0.8rem;
}

.btn-add {
    background: var(--primary);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    font-size: 0.9rem;
}

.table-container {
    overflow-x: auto;
}

.modern-table {
    width: 100%;
    border-collapse: collapse;
}

.modern-table thead th {
    background: var(--background);
    padding: 0.75rem;
    text-align: left;
    font-weight: 600;
    color: var(--text);
    font-size: 0.9rem;
}

.modern-table tbody tr {
    border-bottom: 1px solid var(--border);
}

.modern-table td {
    padding: 0.75rem;
    vertical-align: middle;
    font-size: 0.9rem;
}

.customer-profile {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.avatar {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background: var(--primary);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
}

.profile-info {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.profile-info h4 {
    margin: 0;
    font-weight: 600;
    font-size: 0.9rem;
}

.profile-info span {
    margin: 0;
    color: #64748b;
    font-size: 0.75rem;
}

.contact-details {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.contact-details p {
    margin: 0;
    color: #64748b;
    font-size: 0.75rem;
}

.status {
    padding: 0.25rem 0.5rem;
    border-radius: 2rem;
    font-size: 0.8rem;
    font-weight: 600;
    color: white;
}

.status.has-transactions {
    background: var(--success);
}

 .status.active {
    background: var(--primary);
}

.count {
    font-size: 0.75rem;
    margin-left: 0.25rem;
    opacity: 0.8;
}

.action-buttons {
    display: flex;
    gap: 0.5rem;
}

.btn-icon {
    width: 30px;
    height: 30px;
    border: none;
    border-radius: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 0.9rem;
}

.btn-icon:hover {
    transform: translateY(-2px);
}

.btn-icon.edit {
    color: var(--primary);
}

.btn-icon.edit:hover {
    background: var(--primary);
    color: white;
}

.btn-icon.delete {
    color: var(--danger);
}

.btn-icon.delete:hover {
    background: var(--danger);
    color: white;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        padding: 0.5rem;
    }
    
    .content-header {
        flex-direction: column;
        gap: 1rem;
        align-items: stretch;
    }
    
    .btn-add {
        text-align: center;
        justify-content: center;
    }
    
    .modern-table {
        display: block;
        overflow-x: auto;
    }
    
    .contact-details {
        font-size: 0.8rem;
    }
    
    .status {
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
    }
    
    .action-buttons {
        flex-direction: row;
        justify-content: center;
    }
}

/* Optimasi untuk layar kecil */
@media (max-width: 576px) {
    .stat-card__content {
        flex-direction: column;
        text-align: center;
    }
    
    .customer-profile {
        flex-direction: column;
        text-align: center;
        gap: 0.5rem;
    }
    
    .avatar {
        margin: 0 auto;
    }
    
    .contact-details {
        text-align: center;
    }
    
    .contact-item {
        justify-content: center;
    }
}

/* Tambahan untuk mengoptimalkan tampilan tabel di mobile */
@media (max-width: 480px) {
    .modern-table thead {
        display: none; /* Menyembunyikan header tabel di mobile */
    }
    
    .modern-table, 
    .modern-table tbody, 
    .modern-table tr, 
    .modern-table td {
        display: block;
        width: 100%;
    }
    
    .modern-table tr {
        margin-bottom: 1rem;
        border: 1px solid var(--border);
        border-radius: 0.5rem;
        background: white;
    }
    
    .modern-table td {
        text-align: center;
        padding: 0.5rem;
        border: none;
        border-bottom: 1px solid var(--border);
    }
    
    .modern-table td:last-child {
        border-bottom: none;
    }
}
</style>