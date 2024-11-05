<?php
require_once 'models/Transaksi.php';
require_once 'models/Pelanggan.php';
require_once 'models/Produk.php';

class TransaksiController {
    private $transaksiModel;
    private $pelangganModel;
    private $produkModel;

    public function __construct($db) {
        $this->transaksiModel = new Transaksi($db);
        $this->pelangganModel = new Pelanggan($db);
        $this->produkModel = new Produk($db);
    }

    public function index() {
        $transaksi = $this->transaksiModel->getAll();
        ob_start();
        include 'views/transaksi/index.php';
        $content = ob_get_clean();
        include 'views/layout.php';
    }

    public function create() {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Validasi input
                if (empty($_POST['pelanggan_id']) || empty($_POST['tanggal']) || 
                    empty($_POST['produk_id']) || empty($_POST['jumlah'])) {
                    throw new Exception("Semua field harus diisi!");
                }

                // Sanitasi input
                $pelanggan_id = filter_input(INPUT_POST, 'pelanggan_id', FILTER_SANITIZE_NUMBER_INT);
                $tanggal = filter_input(INPUT_POST, 'tanggal', FILTER_SANITIZE_STRING);
                $produk_ids = $_POST['produk_id'];
                $jumlah = $_POST['jumlah'];

                // Validasi stok
                foreach ($produk_ids as $index => $produk_id) {
                    $produk = $this->produkModel->getById($produk_id);
                    if ($produk['stok'] < $jumlah[$index]) {
                        throw new Exception("Stok produk {$produk['nama']} tidak mencukupi!");
                    }
                }

                // Proses penyimpanan
                $result = $this->transaksiModel->create($pelanggan_id, $tanggal, $produk_ids, $jumlah);
                
                if ($result) {
                    $_SESSION['success'] = "Transaksi berhasil disimpan!";
                    header('Location: index.php?controller=transaksi&action=index');
                    exit;
                } else {
                    throw new Exception("Gagal menyimpan transaksi!");
                }
            }

            // Tampilkan form
            $pelanggan = $this->pelangganModel->getAll();
            $produk = $this->produkModel->getAll();
            ob_start();
            include 'views/transaksi/create.php';
            $content = ob_get_clean();
            include 'views/layout.php';

        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('Location: index.php?controller=transaksi&action=create');
            exit;
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dataToUpdate = [
                'pelanggan_id' => $_POST['pelanggan_id'],
                'tanggal' => $_POST['tanggal']
            ];
            
            if ($this->transaksiModel->update($id, $dataToUpdate)) {
                $_SESSION['success'] = "Transaksi berhasil diperbarui.";
                header('Location: index.php?controller=transaksi&action=index');
                exit();
            } else {
                $_SESSION['error'] = "Terjadi kesalahan saat mengupdate transaksi.";
                header("Location: index.php?controller=transaksi&action=edit&id=$id");
                exit();
            }
        } else {
            $transaksi = $this->transaksiModel->getById($id);
            $pelanggan = $this->pelangganModel->getAll();
            ob_start();
            include 'views/transaksi/edit.php';  // Make sure you include the correct view
            $content = ob_get_clean();
            include 'views/layout.php';
        }
    }
    
    public function delete($id) {
        // Ubah $this->model menjadi $this->transaksiModel
        if ($this->transaksiModel->delete($id)) {
            $_SESSION['success'] = "Transaksi berhasil dihapus.";
        } else {
            $_SESSION['error'] = "Terjadi kesalahan saat menghapus transaksi.";
        }
        header('Location: index.php?controller=transaksi&action=index');
        exit();
    }

    public function detail($id) {
        // Ubah $this->model menjadi $this->transaksiModel
        $transaksi = $this->transaksiModel->getById($id);
        $detail_transaksi = $this->transaksiModel->getDetailTransaksi($id);
        
        if (!$transaksi) {
            $_SESSION['error'] = "Transaksi tidak ditemukan.";
            header('Location: index.php?controller=transaksi&action=index');
            exit();
        }

        ob_start();
        include 'views/transaksi/detail.php';
        $content = ob_get_clean();
        include 'views/layout.php';
    }
}
