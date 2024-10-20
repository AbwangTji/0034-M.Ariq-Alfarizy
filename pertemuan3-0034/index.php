<?php

    include 'database.php';
    $db = new Database;

     $db->tampilData();
    
    
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container mt-3">
        <h1>OOP PHP CRUD</h1>
        <hr>
        <a href="input.php" class="btn btn-success">Tambah Data</a>
        <hr>
        <table class="table table-hover">
            <thead>
                <tr>
                <td scope="col">No</td>
                <td scope="col">Nama</td>
                <td scope="col">Alamat</td>
                <td scope="col">No HP</td>
                <td scope="col">Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $nomor = 1;
                foreach ($db->tampilData() as $dataUser) {
                ?>
                <tr>
                    <th scope="row"><?php echo $nomor++; ?></th>
                    <td><?php echo $dataUser['nama']; ?></td>
                    <td><?php echo $dataUser['alamat']; ?></td>
                    <td><?php echo $dataUser['nohp']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $dataUser['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="proses.php?id=<?php echo $dataUser['id']; ?>&aksi=hapus" class="btn btn-danger btn-sm">Hapus</a>
                        <a href="detail.php?id=<?php echo $dataUser['id']; ?>" class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>