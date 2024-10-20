<?php
    include 'database.php';
    $db = new Database;
    $aksi = $_GET['aksi'];

    // Proses upload foto, jika ada file yang diupload
    if ($_FILES['foto']['name'] != '') {
        $foto = $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], "uploads/" . $foto);
    } else {
        $foto = 'default.jpg';  // Jika tidak ada foto yang diupload, gunakan foto default
    }

    // Logika untuk menambah data
    if ($aksi == "tambah") {
        $db->tambahData($_POST['nama'], $_POST['alamat'], $_POST['nohp'], $foto, $_POST['jenis_kelamin'], $_POST['email']);
        header("location:index.php");

    // Logika untuk memperbarui data
    } elseif ($aksi == "update") {
        // Jika tidak ada foto baru yang diupload, gunakan foto lama dari database
        if ($_FILES['foto']['name'] == '') {
            // Ambil data foto lama dari database
            $existingData = $db->editData($_POST['id']);
            $foto = $existingData[0]['foto'];
        }

        $db->updateData($_POST['id'], $_POST['nama'], $_POST['alamat'], $_POST['nohp'], $foto, $_POST['jenis_kelamin'], $_POST['email']);
        header("location:index.php");

    // Logika untuk menghapus data
    } elseif ($aksi == "hapus") {
        $db->hapusData($_GET['id']);
        header("location:index.php");
    }
?>