<?php
session_start();
ob_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config/database.php';
require_once 'controllers/ProdukController.php';
require_once 'controllers/PelangganController.php';
require_once 'controllers/TransaksiController.php';
require_once 'controllers/HomeController.php';

$controller = $_GET['controller'] ?? 'home';
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

switch ($controller) {
    case 'home':
        $homeController = new HomeController($db);
        $homeController->index();
        break;

    case 'produk':
        $produkController = new ProdukController($db);
        handleAction($produkController, $action, $id);
        break;

    case 'pelanggan':
        $pelangganController = new PelangganController($db);
        handleAction($pelangganController, $action, $id);
        break;

    case 'transaksi':
        $transaksiController = new TransaksiController($db);
        handleAction($transaksiController, $action, $id);
        break;

    default:
        echo "Error: Controller tidak dikenal.";
        break;
}

// Function to handle actions for each controller
function handleAction($controller, $action, $id = null) {
    switch ($action) {
        case 'index':
            $controller->index();
            break;
        case 'create':
            $controller->create();
            break;
            case 'edit':
                if ($id) {
                    $controller->edit($id);
                } else {
                    echo "Error: ID tidak ditemukan untuk aksi edit.";
                }
                break;
            case 'delete':
                if ($id) {
                    $controller->delete($id);
                } else {
                    echo "Error: ID tidak ditemukan untuk aksi delete.";
                }
                break;
            case 'detail':
                if (method_exists($controller, 'detail') && $id) {
                    $controller->detail($id);
                } else {
                    echo "Error: ID transaksi tidak ditemukan atau method detail tidak ada.";
                }
                break;
            default:
                echo "Error: Aksi tidak dikenal.";
                break;
        }
    }