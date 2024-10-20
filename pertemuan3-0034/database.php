<?php

class Database {
    public $host = "localhost";
    public $username = "root";
    public $password = "";
    public $database = "db_php_0034";
    public $connect;

    function __construct() {
        $this->connect = mysqli_connect($this->host, $this->username, $this->password);

        if (!$this->connect) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        mysqli_select_db($this->connect, $this->database);
        echo "Koneksi Berhasil </br>";
    }

    function tampilData(){
        
        $data = mysqli_query($this->connect, "SELECT * FROM tb_users");
        if (!$data) {
            die("Query Error: " . mysqli_error($this->connect)); 
        }

        $rows = mysqli_fetch_all($data, MYSQLI_ASSOC);
        return $rows;
    }

    function tambahData($nama, $alamat, $nohp, $foto, $jenis_kelamin, $email){
        mysqli_query($this->connect, "INSERT INTO tb_users VALUES (NULL, '$nama', '$alamat', '$nohp', '$foto', '$jenis_kelamin', '$email')");
    }
    

    function editData($id){
        $data = mysqli_query($this->connect, "SELECT * FROM tb_users WHERE id='$id'");
        $rows = mysqli_fetch_all($data, MYSQLI_ASSOC);
        return $rows;
    }
    
    function updateData($id, $nama, $alamat, $nohp, $foto, $jenis_kelamin, $email){
        mysqli_query($this->connect, "UPDATE tb_users SET nama='$nama', alamat='$alamat', nohp='$nohp', foto='$foto', jenis_kelamin='$jenis_kelamin', email='$email' WHERE id='$id'");
    }
    

    function hapusData($id){
        mysqli_query($this->connect, "DELETE FROM `tb_users` WHERE `tb_users`.`id` = '$id'");
    }

}
?>
