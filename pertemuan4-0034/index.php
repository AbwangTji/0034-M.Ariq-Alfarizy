<?php
require_once 'config/database.php';
require_once 'app/controller/usercontroller.php';

try {
    $dbConnection = getDBConnection();
    $controller = new UserController($dbConnection);
    
    $action = isset($_GET['action']) ? $_GET['action'] : 'index';
    $id = isset($_GET['id']) ? intval($_GET['id']) : null;
    
    switch($action) {
        case 'show':
            if ($id) {
                $controller->show($id);
            }
            break;
        case 'upload':
            if ($id) {
                $controller->uploadImage($id);
            }
            break;
        default:
            $controller->index();
            break;
    }
} catch(Exception $e) {
    die("Application Error: " . $e->getMessage());
}
?>
