<?php
require_once 'config/database.php';
require_once 'app/models/barang.php';

$database = new Database();
$db = $database->getConnection(); 
$modelBarang = new Barang($db);

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'barang';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controllerFile = "app/controllers/controller{$controller}.php";
$controllerClass = 'Controller' . ucfirst($controller); 

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerObject = new $controllerClass($modelBarang); 

    if (method_exists($controllerObject, $action)) {
        $controllerObject->$action();
    } else {
        echo "Aksi $action tidak ditemukan di controller $controllerClass.";
    }
} else {
    echo "Controller $controller tidak ditemukan.";
}
?>
