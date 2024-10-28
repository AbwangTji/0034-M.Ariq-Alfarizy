<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1>User Detail</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?php echo $user['picture'] ? 'assets/images/' . htmlspecialchars($user['picture']) : 'assets/images/default.jpg'; ?>" 
                             class="img-fluid rounded mb-3" 
                             alt="User picture">
                        
                        <!-- Form Upload Gambar -->
                        <form action="index.php?action=upload&id=<?php echo $user['id']; ?>" 
                              method="POST" 
                              enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="picture" class="form-label">Update Picture</label>
                                <input type="file" class="form-control" id="picture" name="picture" accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-primary">Upload Image</button>
                        </form>
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <th>ID:</th>
                                <td><?php echo htmlspecialchars($user['id']); ?></td>
                            </tr>
                            <tr>
                                <th>Name:</th>
                                <td><?php echo htmlspecialchars($user['name']); ?></td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td><?php echo htmlspecialchars($user['email']); ?></td>
                            </tr>
                        </table>
                        <a href="index.php" class="btn btn-primary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
