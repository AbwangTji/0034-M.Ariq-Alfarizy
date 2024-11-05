<?php require 'views/layout.php'; ?>

<!-- Tambahkan link CSS Animate.css di header -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<div class="container-fluid py-3">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <!-- Breadcrumb dengan animasi fade -->
            <nav aria-label="breadcrumb" class="mb-3 animate__animated animate__fadeIn">
                <ol class="breadcrumb bg-light p-2 rounded">
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none"><i class="fas fa-home fa-sm"></i> Beranda</a></li>
                    <li class="breadcrumb-item"><a href="index.php?controller=pelanggan&action=index" class="text-decoration-none"><i class="fas fa-users fa-sm"></i> Pelanggan</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user-edit fa-sm"></i> Edit Data</li>
                </ol>
            </nav>

            <div class="row g-3">
                <!-- Form Column dengan animasi slide -->
                <div class="col-12 col-md-8 animate__animated animate__fadeInLeft">
                    <div class="card shadow-sm hover-card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title mb-0"><i class="fas fa-user-edit me-2 pulse-icon"></i>Edit Data Pelanggan</h5>
                        </div>
                        <div class="card-body">
                            <form action="index.php?controller=pelanggan&action=edit&id=<?= $pelanggan['id'] ?>" method="POST" class="needs-validation" novalidate>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <div class="input-group hover-input">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($pelanggan['nama']) ?>" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat Lengkap</label>
                                    <div class="input-group hover-input">
                                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?= htmlspecialchars($pelanggan['alamat']) ?></textarea>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="telepon" class="form-label">Nomor Telepon</label>
                                    <div class="input-group hover-input">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        <input type="tel" class="form-control" id="telepon" name="telepon" value="<?= htmlspecialchars($pelanggan['telepon']) ?>" pattern="[0-9]{10,13}" required>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-outline-secondary hover-button" onclick="history.back()">
                                        <i class="fas fa-arrow-left me-1"></i> Kembali
                                    </button>
                                    <button type="submit" class="btn btn-primary hover-button">
                                        <i class="fas fa-save me-1"></i> Simpan Perubahan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Info Column dengan animasi slide -->
                <div class="col-12 col-md-4 animate__animated animate__fadeInRight">
                    <div class="card shadow-sm hover-card">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <div class="avatar-circle mx-auto pulse-avatar">
                                    <?= strtoupper(substr($pelanggan['nama'], 0, 1)) ?>
                                </div>
                            </div>
                            <h5 class="card-title"><?= htmlspecialchars($pelanggan['nama']) ?></h5>
                            <p class="card-text text-muted">ID: #<?= $pelanggan['id'] ?></p>
                            <hr>
                            <div class="info-item d-flex justify-content-between mb-2">
                                <small><i class="fas fa-clock text-info"></i> Terakhir Diperbarui</small>
                                <small>2 jam yang lalu</small>
                            </div>
                            <div class="info-item d-flex justify-content-between mb-2">
                                <small><i class="fas fa-user-shield text-success"></i> Status</small>
                                <small>Pelanggan Aktif</small>
                            </div>
                            <div class="info-item d-flex justify-content-between">
                                <small><i class="fas fa-shopping-cart text-warning"></i> Total Transaksi</small>
                                <small>23 Transaksi</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
:root {
    --primary: #007bff;
    --secondary: #6c757d;
    --success: #28a745;
    --info: #17a2b8;
    --warning: #ffc107;
    --danger: #dc3545;
    --light: #f8f9fa;
    --dark: #343a40;
}

/* General Styles */
body {
    font-size: 0.9rem;
    background-color: #f4f6f9;
}

/* Card Styles & Animations */
.card {
    border: none;
    border-radius: 0.5rem;
    transition: all 0.3s ease;
}

.hover-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.card-header {
    border-radius: 0.5rem 0.5rem 0 0;
}

/* Input Group Styles & Animations */
.input-group {
    transition: all 0.3s ease;
}

.hover-input {
    border-radius: 0.5rem;
    overflow: hidden;
}

.hover-input:focus-within {
    transform: translateY(-2px);
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}

.form-control, .input-group-text {
    font-size: 0.9rem;
}

.input-group-text {
    background: transparent;
    border-right: none;
}

.form-control {
    border-left: none;
}

/* Button Styles & Animations */
.btn {
    font-size: 0.9rem;
    transition: all 0.3s ease;
    border-radius: 0.5rem;
}

.hover-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 3px 8px rgba(0,0,0,0.1);
}

/* Avatar Styles & Animations */
.avatar-circle {
    width: 60px;
    height: 60px;
    background-color: var(--primary);
    color: white;
    font-size: 1.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    transition: all 0.3s ease;
    animation: pulse 2s infinite;
}

.pulse-avatar {
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% {
        box-shadow: 0 0 0 0 rgba(0, 123, 255, 0.4);
    }
    70% {
        box-shadow: 0 0 0 10px rgba(0, 123, 255, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(0, 123, 255, 0);
    }
}

/* Breadcrumb Styles & Animations */
.breadcrumb-item a {
    transition: all 0.3s ease;
}

.breadcrumb-item a:hover {
    color: var(--primary);
    transform: translateX(3px);
}

/* Loading Animation */
.loading {
    position: relative;
    pointer-events: none;
}

.loading::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255,255,255,0.8);
    display: flex;
    justify-content: center;
    align-items: center;
    animation: fadeIn 0.3s;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

/* Validation Feedback Animations */
.was-validated .form-control:valid {
    animation: validShake 0.3s;
}

.was-validated .form-control:invalid {
    animation: invalidShake 0.3s;
}

@keyframes validShake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    75% { transform: translateX(5px); }
}

@keyframes invalidShake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    75% { transform: translateX(5px); }
}

/* Animasi Durasi */
.animate__animated {
    animation-duration: 0.8s;
}

@media (max-width: 768px) {
    .container-fluid {
        padding-left: 10px;
        padding-right: 10px;
    }
}
</style>

<script>
// Form validation
(function() {
    'use strict';
    var forms = document.querySelectorAll('.needs-validation');
    Array.prototype.slice.call(forms).forEach(function(form) {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
})();

// Animasi loading saat submit form
document.querySelector('form').addEventListener('submit', function(e) {
    if (this.checkValidity()) {
        this.classList.add('loading');
    }
});

// Animasi smooth scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});
</script>