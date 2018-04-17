<?php
session_start();
$email =  $_SESSION['user'];
echo $email;
if($email == ""){
	header("location:index.php?konfirmasi=2");
}
include("../koneksi.php");
$id = $_GET['id'];
 
 if( session_destroy()){ 

	$hapus = mysqli_query($koneksi,"DELETE FROM transaksi WHERE id_pembeli = $id");
	if($hapus){
	 header("location:../halaman-keluar.php"); 
	}

	else{
		// header("location:../halaman-utama.php"); 
		echo "GAGAL";
	}
}
 ?>