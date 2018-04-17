<?php 
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
$user = test_input($_SESSION['user']);

$buku = mysqli_query($koneksi,"SELECT*FROM buku ORDER BY id_buku DESC LIMIT 1");
$tampil_buku = mysqli_fetch_array($buku);
$id_buku = $tampil_buku['id_buku'];
$id_admin = $tampil_buku['id_admin'];
$insert_upload = mysqli_query($koneksi,"INSERT INTO upload VALUES ($id_admin,$id_buku,CURRENT_DATE)");
if($insert_upload){
	header("location:../admin_only.php");
}else{
	echo "errorrrrr";
}


 ?>