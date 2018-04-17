<?php 
session_start();
if($email == ""){
	header("location:index.php?konfirmasi=2");
}
include("../koneksi.php");
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$user 		= test_input($_SESSION['user']);
$id_buku 	= test_input($_GET['id']);
$jumlah		= test_input($_POST['jumlah']);

$pembeli			= mysqli_query($koneksi,"SELECT*FROM pembeli WHERE email = '$user'");
$buku 				= mysqli_query($koneksi,"SELECT*FROM buku WHERE id_buku= $id_buku");
$tampil_buku 		= mysqli_fetch_array($buku);
$tampil_pembeli 	= mysqli_fetch_array($pembeli);

$id_pembeli 	= 	$tampil_pembeli['id_pembeli'];
$harga 			=  	$tampil_buku['harga'];

// (`id_transaksi`, `id_buku`, `id_pembeli`, `total_harga`, `tgl`)

$buku 	= mysqli_query($koneksi,"SELECT*FROM transaksi_total WHERE id_buku =$id_buku");
$tampil_transaksi = mysqli_fetch_array($buku);
$row = mysqli_num_rows($buku);
if($row >= 1){
	$tambah = $tampil_transaksi['jumlah']+$jumlah;
	$update = mysqli_query($koneksi,"UPDATE transaksi SET jumlah = $tambah WHERE id_buku=$id_buku");
	if ($update) {
		header("location:../add-cart.php?id_buku=$id_buku&id_user=$id_pembeli");
	}
}else if($row == 0){
	$kueri	="INSERT INTO transaksi VALUES (null,$id_buku,$id_pembeli,$jumlah,$harga,CURRENT_TIMESTAMP)";
$query_transaksi = mysqli_query($koneksi,$kueri);
	if($query_transaksi){
		header("location:../add-cart.php?id_buku=$id_buku&id_user=$id_pembeli");
	}
	else{
		echo "gagal";
 	}
 }else{
 	echo "gagal";
}



 ?>