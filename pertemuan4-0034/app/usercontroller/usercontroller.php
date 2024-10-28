<?php
require_once 'app/models/user.php';

class UserController {
    private $userModel;
    private $uploadDir;

    public function __construct($dbConnection) {
        $this->userModel = new User($dbConnection);
        $this->uploadDir = 'assets/images/';
    }

    public function index() {
        try {
            $users = $this->userModel->getAllUsers();
            require_once 'app/views/user/index.php';
        } catch(Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function show($id) {
        try {
            $user = $this->userModel->getUserById($id);
            if (!$user) {
                die("User not found");
            }
            require_once 'app/views/user/detail.php';
        } catch(Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function uploadImage($id) {
        try {
            if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
                $tempName = $_FILES['picture']['tmp_name'];
                $fileName = time() . '_' . $_FILES['picture']['name'];
                $uploadPath = $this->uploadDir . $fileName;
                
                if (move_uploaded_file($tempName, $uploadPath)) {
                    $this->userModel->updatePicture($id, $fileName);
                }
            }
            header("Location: index.php?action=show&id=" . $id);
        } catch(Exception $e) {
            die("Error uploading image: " . $e->getMessage());
        }
    }
}
?>
