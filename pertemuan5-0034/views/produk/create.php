<div class="container animate__animated animate__fadeIn">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php"><i class="fas fa-home me-1"></i> Beranda</a>
            </li>
            <li class="breadcrumb-item">
                <a href="index.php?controller=produk&action=index"><i class="fas fa-box me-1"></i> Daftar Produk</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page"> Tambah Produk
            </li>
        </ol>
    </nav>
    

    <!-- Alert Container -->
    <div id="alertContainer">
        <?php if(isset($_SESSION['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i><?php echo $_SESSION['success']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i><?php echo $_SESSION['error']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
    </div>

    <div class="card main-card">
        <div class="card-header">
            <h4 class="mb-0"><i class="fas fa-plus-circle me-2"></i>Tambah Produk Baru</h4>
        </div>
        <div class="card-body">
            <form id="productForm" action="index.php?controller=produk&action=create" method="POST" class="needs-validation" novalidate>
                <input type="hidden" name="is_update" id="is_update" value="0">
                <input type="hidden" name="existing_id" id="existing_id" value="">
                
                <div class="mb-3">
                    <label for="nama" class="form-label">
                        <i class="fas fa-tag me-1"></i>Nama Produk
                    </label>
                    <input type="text" 
                           class="form-control" 
                           id="nama" 
                           name="nama" 
                           placeholder="Masukkan nama produk"
                           required>
                    <div class="invalid-feedback">
                        Nama produk harus diisi.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">
                        <i class="fas fa-dollar-sign me-1"></i>Harga
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="text" 
                               class="form-control" 
                               id="harga" 
                               name="harga" 
                               placeholder="Masukkan harga produk"
                               required>
                    </div>
                    <small class="text-muted mt-1">Format: 100.000</small>
                </div>

                <div class="mb-3">
                    <label for="stok" class="form-label">
                        <i class="fas fa-cubes me-1"></i>Stok
                    </label>
                    <input type="number" 
                           class="form-control" 
                           id="stok" 
                           name="stok" 
                           placeholder="Masukkan jumlah stok"
                           min="0" 
                           required>
                    <div class="invalid-feedback">
                        Stok harus diisi dengan angka valid.
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i>Simpan Produk
                    </button>
                    <a href="index.php?controller=produk&action=index" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i>Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script >
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('productForm');
    const hargaInput = document.getElementById('harga');

    // Format harga
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
            console.log('Raw response:', text); // Untuk debugging
            try {
                return JSON.parse(text);
            } catch (e) {
                console.error('Failed to parse JSON:', e);
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
                throw new Error(data.message || 'Terjadi kesalahan saat menyimpan produk');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: error.message || 'Terjadi kesalahan saat menyimpan produk'
            });
        });
    });
});
</script>
