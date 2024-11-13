<?php
require_once 'app/models/pelanggan.php';

class ControllerPelanggan {
    private $model;

    public function __construct($db) {
        $this->model = new Pelanggan($db);
    }

    public function index() {
        $data = $this->model->getAllPelanggan();
        include 'app/views/pelanggan/viewpelanggan.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_plg = $_POST['id_plg'];
            $nama_plg = $_POST['nama_plg'];
            $alamat = $_POST['alamat'];
            $this->model->addPelanggan($id_plg, $nama_plg, $alamat);
            header("Location: index.php?controller=pelanggan");
        } else {
            include 'app/views/pelanggan/pelangganadd.php';
        }
    }

    public function edit($id_plg) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama_plg = $_POST['nama_plg'];
            $alamat = $_POST['alamat'];
            $this->model->updatePelanggan($id_plg, $nama_plg, $alamat);
            header("Location: index.php?controller=pelanggan");
        } else {
            $data = $this->model->getPelangganById($id_plg);
            include 'app/views/viewindex.php';
        }
    }

    public function delete($id_plg) {
        $this->model->deletePelanggan($id_plg);
        header("Location: index.php?controller=pelanggan");
    }

    public function detail($id_plg) {
        $data = $this->model->getPelangganById($id_plg);
        include 'app/views/pelanggan/viewdetailpelanggan.php';
    }
}
