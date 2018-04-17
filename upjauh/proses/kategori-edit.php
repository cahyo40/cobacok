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
$user	 	= test_input($_SESSION['user']);
$id_ktg 	= test_input($_GET['id']);
$ktg 		= test_input(strtoupper($_POST['ktg']));
$kategori 	= mysqli_query($koneksi,"UPDATE kategori SET kategori = '$ktg' WHERE id_ktg = '$id_ktg'");
if($kategori){
	header("location:../setting.php?id_ktg=0&admin=null");
}else{
	echo "gagal";
}

 ?>