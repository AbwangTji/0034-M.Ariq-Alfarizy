<?php require 'views/layout.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelanggan Baru</title>
    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary: #4e73df;
            --secondary: #858796;
            --success: #1cc88a;
            --info: #36b9cc;
            --warning: #f6c23e;
            --danger: #e74a3b;
            --light: #f8f9fc;
            --dark: #5a5c69;
        }

        body {
            background-color: #f8f9fc;
            font-family: 'Nunito', sans-serif;
        }

        /* Card Styling */
        .main-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            animation: slideInUp 0.5s ease-out;
        }

        .card-header {
            background: linear-gradient(45deg, var(--primary), #224abe);
            color: white;
            border-radius: 15px 15px 0 0;
            padding: 1.5rem;
        }

        /* Form Styling */
        .form-group {
            margin-bottom: 1.5rem;
            animation: fadeIn 0.5s ease-out;
        }

        .form-label {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .form-control {
            padding: 0.8rem;
            border-radius: 10px;
            border: 2px solid #e0e0e0;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }

        .input-group-text {
            background-color: #f8f9fc;
            border: 2px solid #e0e0e0;
            border-right: none;
        }

        /* Button Styling */
        .btn {
            padding: 0.8rem 1.5rem;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-back {
            background-color: #f8f9fc;
            color: var(--dark);
            border: 2px solid #e0e0e0;
        }

        .btn-save {
            background: linear-gradient(45deg, var(--primary), #224abe);
            color: white;
            border: none;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        /* Animations */
        @keyframes slideInUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Breadcrumb Styling */
        .custom-breadcrumb {
            background-color: white;
            padding: 1rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 2rem;
            animation: slideInDown 0.5s ease-out;
        }

        .breadcrumb-item a {
            color: var(--primary);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .breadcrumb-item a:hover {
            color: #224abe;
            transform: translateX(5px);
        }

        /* Icon Animations */
        .animate-icon {
            transition: all 0.3s ease;
        }

        .animate-icon:hover {
            transform: scale(1.2);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }
            
            .btn {
                width: 100%;
                margin: 0.5rem 0;
            }
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="custom-breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="index.php">
                        <i class="fas fa-home animate-icon me-2"></i>Beranda
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="index.php?controller=pelanggan&action=index">
                        <i class="fas fa-users animate-icon me-2"></i>Pelanggan
                    </a>
                </li>
                <li class="breadcrumb-item active">
                    <i class="fas fa-user-plus animate-icon me-2"></i>Tambah Pelanggan
                </li>
            </ol>
        </nav>

        <!-- Main Card -->
        <div class="card main-card">
            <div class="card-header">
                <h4 class="mb-0">
                    <i class="fas fa-user-plus me-2 animate-icon"></i>
                    Tambah Pelanggan Baru
                </h4>
            </div>
            
            <div class="card-body p-4">
                <form action="index.php?controller=pelanggan&action=create" method="POST" class="needs-validation" novalidate>
                    <!-- Nama Field -->
                    <div class="form-group">
                        <label class="form-label" for="nama">
                            <i class="fas fa-user me-2 text-primary"></i>Nama Lengkap
                        </label>
                        <input type="text" 
                               class="form-control" 
                               id="nama" 
                               name="nama" 
                               placeholder="Masukkan nama lengkap"
                               required>
                        <div class="invalid-feedback">
                            Nama lengkap harus diisi
                        </div>
                    </div>

                    <!-- Alamat Field -->
                    <div class="form-group">
                        <label class="form-label" for="alamat">
                            <i class="fas fa-map-marker-alt me-2 text-danger"></i>Alamat
                        </label>
                        <textarea class="form-control" 
                                  id="alamat" 
                                  name="alamat" 
                                  rows="3" 
                                  placeholder="Masukkan alamat lengkap"
                                  required></textarea>
                        <div class="invalid- feedback">
                            Alamat harus diisi
                        </div>
                    </div>

                    <!-- Telepon Field -->
                    <div class="form-group">
                        <label class="form-label" for="telepon">
                            <i class="fas fa-phone me-2 text-success"></i>Nomor Telepon
                        </label>
                        <input type="tel" 
                               class="form-control" 
                               id="telepon" 
                               name="telepon" 
                               placeholder="Masukkan nomor telepon"
                               required>
                        <div class="invalid-feedback">
                            Nomor telepon harus diisi
                        </div>
                    </div>

                    <!-- Button Group -->
                    <div class="button-group">
                        <a href="index.php?controller=pelanggan&action=index" class="btn btn-back">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                        <button type="submit" class="btn btn-save">
                            <i class="fas fa-save me-2"></i>Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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

        // Phone number formatting
        const phoneInput = document.getElementById('telepon');
        phoneInput.addEventListener('input', event => {
            const x = event.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
            event.target.value = !x[2] ? x[1] : `(${x[1]}) ${x[2]}${x[3] ? `-${x[3]}` : ''}`;
        });
    </script>
</body>
</html>
