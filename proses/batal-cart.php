<?php 

session_start();
$email =  $_SESSION['user'];
echo $email;
if($email == ""){
	header("location:index.php?konfirmasi=2");
}
if($email == ""){
	header("location:index.php?konfirmasi=2");
}
include("../koneksi.php");
$id_buku = $_GET['id_buku'];
$id_pembeli = $_GET['id_user'];
$hapus_transaksi = mysqli_query($koneksi,"DELETE FROM transaksi WHERE id_buku = $id_buku");
if($hapus_transaksi){
	header("location:../add-cart.php?id_user=$id_pembeli");
}

 ?>