<?php
include 'database.php';
$db = new Database;
$detail = $db->editData($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-3">
        <h1>Detail Pengguna</h1>
        <hr class="mt-0">
        <?php foreach ($detail as $dataUser) { ?>
        <div class="card" style="width: 18rem;">
            <img src="uploads/<?php echo $dataUser['foto']; ?>" class="card-img-top" alt="Foto Pengguna">
            <div class="card-body">
                <h5 class="card-title"><?php echo $dataUser['nama']; ?></h5>
                <p class="card-text"><strong>Jenis Kelamin:</strong> <?php echo $dataUser['jenis_kelamin']; ?></p>
                <p class="card-text"><strong>No HP:</strong> <?php echo $dataUser['nohp']; ?></p>
                <p class="card-text"><strong>Email:</strong> <?php echo $dataUser['email']; ?></p>
                <p class="card-text"><strong>Alamat:</strong> <?php echo $dataUser['alamat']; ?></p>
                <a href="index.php" class="btn btn-primary">Kembali</a>
            </div>
        </div>
        <?php } ?>
    </div>
</body>
</html>