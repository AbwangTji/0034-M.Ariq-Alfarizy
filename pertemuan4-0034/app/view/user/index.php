<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>User List</h1>
            <a href="index.php?action=create" class="btn btn-success">Add New User</a>
        </div>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Picture</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['id']); ?></td>
                    <td><?php echo htmlspecialchars($user['name']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td>
                        <img src="<?php echo $user['picture'] ? 'assets/images/' . htmlspecialchars($user['picture']) : 'assets/images/default.jpg'; ?>"
                             alt="Profile" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                    </td>
                    <td>
                        <a href="index.php?action=show&id=<?php echo $user['id']; ?>" 
                           class="btn btn-info btn-sm">Detail</a>
                        <a href="index.php?action=edit&id=<?php echo $user['id']; ?>" 
                           class="btn btn-warning btn-sm">Edit</a>
                        <a href="index.php?action=delete&id=<?php echo $user['id']; ?>" 
                           class="btn btn-danger btn-sm" 
                           onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
