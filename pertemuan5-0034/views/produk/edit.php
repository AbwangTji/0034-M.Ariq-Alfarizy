<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk Eksklusif</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f6f9fc 0%, #e9f2f9 100%);
            min-height: 100vh;
        }
        .container {
            max-width: 900px;
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
        .form-control, .input-group-text {
            border-radius: 15px;
            padding: 0.75rem;
            border: 1px solid #dee2e6;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(106, 17, 203, 0.25);
            border-color: #6a11cb;
        }
        .input-group-text {
            background-color: #f8f9fa;
        }
        .form-label {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }
        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 30px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            border: none;
        }
        .btn-secondary {
            background: linear-gradient(45deg, #11998e, #38ef7d);
            border: none;
            color: white;
        }
        .breadcrumb {
            background-color: rgba(255, 255, 255, 0.5);
            padding: 1rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
        }
        .breadcrumb-item a {
            color: #6a11cb;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .breadcrumb-item a:hover {
            color: #2575fc;
        }
        .animate__animated {
            animation-duration: 0.6s;
        }
    </style>
</head>
<body>
    <div class="container" data-aos="fade-up">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="animate__animated animate__fadeIn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php"><i class="fas fa-home me-1"></i>Beranda</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="index.php?controller=produk&action=index"><i class ="fas fa-gem me-1"></i>Katalog Produk</a>
                </li>
                <li class="breadcrumb-item active">
                    <i class="fas fa-edit me-1"></i>Edit Produk
                </li>
            </ol>
        </nav>

        <div class="card main-card animate__animated animate__fadeIn">
            <div class="card-header">
                <h3 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Produk Eksklusif</h3>
            </div>
            <div class="card-body">
                <form action="index.php?controller=produk&action=edit&id=<?= htmlspecialchars($produk['id']) ?>" 
                      method="POST" 
                      class="needs-validation" 
                      novalidate>
                    
                    <div class="mb-4">
                        <label class="form-label">
                            <i class="fas fa-tag me-1"></i>Nama Produk
                        </label>
                        <input type="text" 
                               class="form-control" 
                               name="nama" 
                               value="<?= htmlspecialchars($produk['nama']) ?>" 
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">
                            <i class="fas fa-dollar-sign me-1"></i>Harga
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="text" 
                                   class="form-control" 
                                   name="harga" 
                                   id="harga"
                                   value="<?= number_format($produk['harga'], 0, ',', '.') ?>" 
                                   required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">
                            <i class="fas fa-cubes me-1"></i>Stok
                        </label>
                        <input type="number" 
                               class="form-control" 
                               name="stok" 
                               value="<?= htmlspecialchars($produk['stok']) ?>" 
                               min="0" 
                               required>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>Simpan Perubahan
                        </button>
                        <a href="index.php?controller=produk&action=index" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('.needs-validation');
            const hargaInput = document.getElementById('harga');

            function formatHarga(input) {
                let value = input.value.replace(/\D/g, '');
                if (value !== '') {
                    value = parseInt(value);
                    input.value = new Intl.NumberFormat('id-ID').format(value);
                }
            }

            hargaInput.addEventListener('input', function() {
                formatHarga(this);
            });

            form.addEventListener('submit', function(event) {
                event.preventDefault();
                
                if (!form.checkValidity()) {
                    event.stopPropagation();
                    form.classList.add('was-validated');
                    return;
                }

                const hargaValue = hargaInput.value.replace(/\./g, '');
                const formData = new FormData(form);
                formData.set('harga', hargaValue);

                fetch(form.action, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(text => {
                    try {
                        return JSON.parse(text);
                    } catch (e) {
                        console.error('Raw response:', text);
                        throw new Error('Invalid server response');
                    }
                })
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            window.location.href = data.redirect;
                        });
                    } else {
                        throw new Error(data.message || 'Terjadi kesalahan saat menyimpan perubahan');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: error.message || 'Terjadi kesalahan saat menyimpan perub ahan'
                    });
                });
            });
        });
    </script>
</body>
</html>