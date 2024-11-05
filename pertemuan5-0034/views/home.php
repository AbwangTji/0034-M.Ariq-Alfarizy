<div class="home-container">
    <div class="welcome-section">
        <h1 class="welcome-title">Selamat Datang di Sistem Manajemen Produk</h1>
        <p class="welcome-subtitle">Kelola bisnis Anda dengan mudah dan efisien</p>
    </div>

    <div class="dashboard-stats">
        <div class="stat-card">
            <i class="fas fa-box stat-icon"></i>
            <h3>Total Produk</h3>
            <p class="stat-number"><?php echo $data['totalProduk']; ?></p>
        </div>
        <div class="stat-card">
            <i class="fas fa-users stat-icon"></i>
            <h3>Total Pelanggan</h3>
            <p class="stat-number"><?php echo $data['totalPelanggan']; ?></p>
        </div>
        <div class="stat-card">
            <i class="fas fa-shopping-cart stat-icon"></i>
            <h3>Total Transaksi</h3>
            <p class="stat-number"><?php echo $data['totalTransaksi']; ?></p>
        </div>
        <div class="stat-card">
            <i class="fas fa-dollar-sign stat-icon"></i>
            <h3>Pendapatan</h3>
            <p class="stat-number">Rp <?php echo number_format($data['totalPendapatan'], 0, ',', '.'); ?></p>
        </div>
    </div>

    <div class="recent-activities">
        <h2>Transaksi Terbaru</h2>
        <div class="activity-list">
            <?php foreach ($data['recentTransactions'] as $transaction): ?>
            <div class="activity-item">
                <div class="activity-icon"><i class="fas fa-receipt"></i></div>
                <div class="activity-details">
                    <h4>Transaksi #<?php echo $transaction['id']; ?></h4>
                    <p>Pelanggan: <?php echo $transaction['nama_pelanggan']; ?></p>
                    <p>Total: Rp <?php echo number_format($transaction['total'], 0, ',', '.'); ?></p>
                </div>
                <div class="activity-time"><?php echo $transaction['tanggal']; ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- SweetAlert2 Library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var currentPath = window.location.pathname;
    
    if (currentPath === 'Create By: Erol_0058' || currentPath === 'Create By: Erol_0058') {
        if (window.location.search === '') {
            if (!sessionStorage.getItem('popupShown')) {
                Swal.fire({
                    title: 'Permohonan Maaf',
                    text: 'Mohon maaf kepada Bapak Dosen jika pengerjaan tugas website ini tidak sesuai dengan materi file yang dikirimkan oleh bapak.',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Saya Maafkan',
                    cancelButtonText: 'Tidak Saya Maafkan',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika user klik "Saya Mengerti"
                        sessionStorage.setItem('popupShown', 'true');
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        // Jika user klik "Tidak Mengerti"
                        Swal.fire({
                            title: 'Permohonan Maaf Kembali',
                            text: 'Mohon maaf sekali lagi karena membuat tugas dengan website yang tidak sesuai file, saya hanya mencoba memperbagus tampilan website yang Bapak suruh kerjakan.',
                            icon: 'info',
                            confirmButtonText: 'Baik, Saya Mengerti',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                sessionStorage.setItem('popupShown', 'true');
                            }
                        });
                    }
                });
            }
        }
    }
});
</script>