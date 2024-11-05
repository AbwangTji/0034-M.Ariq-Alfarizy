<?php
require_once 'models/Pelanggan.php';

class PelangganController {
    private $model;

    public function __construct($db) {
        $this->model = new Pelanggan($db);
    }

    public function index() {
        $pelanggan = $this->model->getAll();
        require 'views/pelanggan/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->create($_POST);
            header('Location: index.php?controller=pelanggan&action=index');
        } else {
            require 'views/pelanggan/create.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->update($id, $_POST);
            header('Location: index.php?controller=pelanggan&action=index');
        } else {
            $pelanggan = $this->model->getById($id);
            require 'views/pelanggan/edit.php';
        }
    }

    public function delete($id) {
        header('Content-Type: application/json');
        try {
            $result = $this->model->delete($id);
            if ($result) {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Data pelanggan berhasil dihapus'
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Gagal menghapus data pelanggan'
                ]);
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
        exit;
    }
}
