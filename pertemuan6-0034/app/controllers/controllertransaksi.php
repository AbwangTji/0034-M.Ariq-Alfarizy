<?php
require_once 'app/models/transaksi.php';

class ControllerTransaksi {
    private $model;

    public function __construct($db) {
        $this->model = new Transaksi($db);
    }

    public function index() {
        $data = $this->model->getAllTransaksi();
        include 'app/views/transaksi/viewtransaksi.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $kode_brg = $_POST['kode_brg'];
            $id_plg = $_POST['id_plg'];
            $jumlah = $_POST['jumlah'];
            $total_harga = $_POST['total_harga'];
            $tanggal = $_POST['tanggal'];
            $this->model->addTransaksi($id, $kode_brg, $id_plg, $jumlah, $total_harga, $tanggal);
            header("Location: index.php?controller=transaksi");
        } else {
            include 'app/views/transaksi/transaksiadd.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $kode_brg = $_POST['kode_brg'];
            $id_plg = $_POST['id_plg'];
            $jumlah = $_POST['jumlah'];
            $total_harga = $_POST['total_harga'];
            $tanggal = $_POST['tanggal'];
            $this->model->updateTransaksi($id, $kode_brg, $id_plg, $jumlah, $total_harga, $tanggal);
            header("Location: index.php?controller=transaksi");
        } else {
            $data = $this->model->getTransaksiById($id);
            include 'app/views/viewindex.php';
        }
    }

    public function delete($id) {
        $this->model->deleteTransaksi($id);
        header("Location: index.php?controller=transaksi");
    }

    public function detail($id) {
        $data = $this->model->getTransaksiById($id);
        include 'app/views/transaksi/viewdetailtransaksi.php';
    }
}
