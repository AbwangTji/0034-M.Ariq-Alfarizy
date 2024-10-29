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

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $this->userModel->createUser($name, $email);
                header("Location: index.php");
                exit;
            } catch(Exception $e) {
                die("Error creating user: " . $e->getMessage());
            }
        } else {
            require_once 'app/views/user/create.php';
        }
    }

    public function edit($id) {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $this->userModel->updateUser($id, $name, $email);
                header("Location: index.php");
                exit;
            } else {
                $user = $this->userModel->getUserById($id);
                if (!$user) {
                    die("User not found");
                }
                require_once 'app/views/user/edit.php';
            }
        } catch(Exception $e) {
            die("Error editing user: " . $e->getMessage());
        }
    }

    public function delete($id) {
        try {
            $this->userModel->deleteUser($id);
            header("Location: index.php");
            exit;
        } catch(Exception $e) {
            die("Error deleting user: " . $e->getMessage());
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
