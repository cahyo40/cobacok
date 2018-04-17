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
$id_buku 	= test_input($_GET['id']);
$del_book 	= "DELETE FROM buku WHERE id_buku = $id_buku";
$del_up		= "DELETE FROM upload WHERE id_buku = $id_buku";
$query_book	= mysqli_query($koneksi,$del_book);
$row		= mysqli_fetch_array($query_book);
$query_up	= mysqli_query($koneksi,$del_up);
if($query_up&&$query_book){
	unlink($row['gambar']);
	header("location:../admin_only.php");
}else{
	echo "gagal";
}


 ?>