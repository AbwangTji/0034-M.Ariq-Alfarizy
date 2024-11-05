<?php 
require_once 'models/Produk.php';

class ProdukController {
    private $model;

    public function __construct($db) {
        $this->model = new Produk($db);
    }

    public function index() {
        $produk = $this->model->getAll();
        ob_start();
        include 'views/produk/index.php';
        $content = ob_get_clean();
        include 'views/layout.php';
    }

    public function checkExistence() {
        $nama = $_GET['nama'] ?? '';
        $product = $this->model->getProductByName($nama);

        header('Content-Type: application/json');
        echo json_encode([
            'exists' => !empty($product),
            'product' => $product
        ]);
    }

    // ProdukController.php
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            ob_clean(); // Bersihkan output buffer
            header('Content-Type: application/json');
            
            try {
                // Validasi input
                if (empty($_POST['nama']) || empty($_POST['harga']) || empty($_POST['stok'])) {
                    throw new Exception("Semua field harus diisi!");
                }

                // Sanitasi dan konversi input
                $nama = htmlspecialchars(trim($_POST['nama']));
                $harga = str_replace('.', '', $_POST['harga']); // Hapus titik sebagai pemisah ribuan
                $harga = (float) str_replace(',', '.', $harga); // Konversi koma ke titik untuk decimal
                $stok = (int) $_POST['stok'];

                // Validasi nilai
                if ($harga <= 0 || $stok < 0) {
                    throw new Exception("Harga dan stok harus bernilai valid!");
                }

                // Simpan ke database
                $result = $this->model->create($nama, $harga, $stok);
                
                if ($result) {
                    echo json_encode([
                        'success' => true,
                        'message' => 'Produk berhasil disimpan',
                        'redirect' => 'index.php?controller=produk&action=index'
                    ]);
                } else {
                    throw new Exception("Gagal menyimpan produk");
                }

            } catch (Exception $e) {
                http_response_code(400);
                echo json_encode([
                    'success' => false,
                    'message' => $e->getMessage()
                ]);
            }
            exit;
        }

        // Tampilkan form
        ob_start();
        include 'views/produk/create.php';
        $content = ob_get_clean();
        include 'views/layout.php';
    }

    

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            ob_clean(); // Bersihkan output buffer
            header('Content-Type: application/json');
            
            try {
                if (empty($_POST['nama']) || empty($_POST['harga']) || empty($_POST['stok'])) {
                    throw new Exception("Semua field harus diisi!");
                }
    
                $nama = htmlspecialchars(trim($_POST['nama']));
                $harga = str_replace('.', '', $_POST['harga']);
                $harga = (float) str_replace(',', '.', $harga);
                $stok = (int) $_POST['stok'];
    
                if ($harga <= 0 || $stok < 0) {
                    throw new Exception("Harga dan stok harus bernilai valid!");
                }
    
                $result = $this->model->update($id, $nama, $harga, $stok);
                
                if ($result) {
                    echo json_encode([
                        'success' => true,
                        'message' => 'Produk berhasil diperbarui',
                        'redirect' => 'index.php?controller=produk&action=index'
                    ]);
                } else {
                    throw new Exception("Gagal memperbarui produk");
                }
    
            } catch (Exception $e) {
                http_response_code(400);
                echo json_encode([
                    'success' => false,
                    'message' => $e->getMessage()
                ]);
            }
            exit;
        }
    
        // Tampilkan form edit
        $produk = $this->model->getById($id);
        if (!$produk) {
            header('Location: index.php?controller=produk&action=index');
            exit;
        }
        
        ob_start();
        include 'views/produk/edit.php';
        $content = ob_get_clean();
        include 'views/layout.php';
    }

    public function delete($id) {
        $this->model->delete($id);
        header('Location: index.php?controller=produk&action=index');
    }
}