<?php 
include("../koneksi.php");
session_start();
$email =  $_SESSION['user'];
echo $email;
if($email == ""){
	header("location:index.php?konfirmasi=2");
}

$id_pembeli = $_GET['id_user'];
$hapus_transaksi = mysqli_query($koneksi,"DELETE FROM transaksi WHERE id_pembeli = $id_pembeli");
if($hapus_transaksi){
	header("location:../halaman-utama.php?page=1");
}

 ?>

