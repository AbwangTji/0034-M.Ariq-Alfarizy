<?php
require_once 'models/Produk.php';
require_once 'models/Pelanggan.php';
require_once 'models/Transaksi.php';

class HomeController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function index() {
        $produkModel = new Produk($this->db);
        $pelangganModel = new Pelanggan($this->db);
        $transaksiModel = new Transaksi($this->db);

        $data['totalProduk'] = count($produkModel->getAll());
        $data['totalPelanggan'] = count($pelangganModel->getAll());
        $data['totalTransaksi'] = count($transaksiModel->getAll());
        
        // Hitung total pendapatan
        $allTransaksi = $transaksiModel->getAll();
        $data['totalPendapatan'] = array_sum(array_column($allTransaksi, 'total'));

        // Ambil 5 transaksi terbaru
        $data['recentTransactions'] = array_slice($allTransaksi, 0, 5);

        ob_start();
        include 'views/home.php';
        $content = ob_get_clean();

        include 'views/layout.php';
    }
}
