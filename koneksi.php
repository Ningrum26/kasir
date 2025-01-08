<?php
//Mengatur data koneksi
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "belajar_php_kelas_kronjo";

//Membuat koneksi
$conn = mysqli_connect($host, $user, $pass, $dbname);

//Cek apakah koneksi berhasil
if(!$conn) 
    die("Koneksi Gagal: " . mysqli_connect_error());
echo "Koneksi Berhasil!";
?>