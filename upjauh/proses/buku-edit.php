<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include("../../koneksi.php");
session_start();
$user = $_SESSION['user'];
if(($user) == ""){
  header("location:index.php");
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$id_buku	= test_input($_GET['id']);
$nama 		= test_input($_POST['nama']);
$pengarang	= test_input($_POST['pengarang']);
$kategori	= test_input($_POST['ktg']);
$tahun		= test_input($_POST['tahun']);
$harga		= test_input($_POST['harga']);
$stok 		= test_input($_POST['stok']);
$ket 		= str_replace("'", "", $_POST['ket']);
$pilih_ktg 	= mysqli_query($koneksi,"SELECT*FROM kategori WHERE kategori = '$kategori'");
$tampil_ktg	= mysqli_fetch_array($pilih_ktg);
$id_ktg		= $tampil_ktg['id_ktg'];
$user 		= $_SESSION['user'];
$admin 		= mysqli_query($koneksi,"SELECT*FROM admin WHERE user = '$user'");
$tampil_admin = mysqli_fetch_array($admin);
$id_admin	= $tampil_admin['id_admin'];
if(!preg_match('/^[0-9]*$/', $tahun)){
			header("buku-edit.php?ket=1");
		}
$update_buku= mysqli_query($koneksi,"UPDATE buku SET ket = '$ket',judul = '$nama',pengarang = '$pengarang',th_terbit = '$tahun',harga = $harga,stok = $stok,id_ktg = $id_ktg WHERE id_buku = $id_buku");
if($update_buku){
	header("location:../admin_only.php");
}else{
	echo "gagal";
}

 ?>