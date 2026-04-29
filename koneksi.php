<?php
$conn = mysqli_connect("localhost","root","","db_latihan");

if(!$conn){
   die("Koneksi gagal");
}

echo "Berhasil konek";
?>