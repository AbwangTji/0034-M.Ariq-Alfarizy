<?php
require_once 'app/models/barang.php';

class ControllerBarang {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index() {
        $data = $this->model->getAllBarang();
        include 'app/views/viewindex.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $kode_brg = $_POST['kode_brg'];
            $nama_brg = $_POST['nama_brg'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];
            $this->model->addBarang($kode_brg, $nama_brg, $harga, $stok);
            header("Location: index.php?controller=barang");
        } else {
            include 'app/views/barang/barangadd.php';
        }
    }

    public function edit($kode_brg) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama_brg = $_POST['nama_brg'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];
            $this->model->updateBarang($kode_brg, $nama_brg, $harga, $stok);
            header("Location: index.php?controller=barang");
        } else {
            $data = $this->model->getBarangByKode($kode_brg);
            include 'app/views/barang/barangedit.php';
        }
    }

    public function delete($kode_brg) {
        $this->model->deleteBarang($kode_brg);
        header("Location: index.php?controller=barang");
    }

    public function detail($kode_brg) {
        $data = $this->model->getBarangByKode($kode_brg);
        include 'app/views/barang/viewdetailbarang.php';
    }
}
