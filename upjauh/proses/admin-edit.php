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
$id_admin = test_input($_GET['id']);
$user 	= test_input($_POST['user']);
$pass 	= test_input(md5(md5($_POST['pass'])));
$edit_admin	= mysqli_query($koneksi,"UPDATE admin SET user ='$user',pass = '$pass' WHERE id_admin=$id_admin");
if($edit_admin){
	header("location:../setting.php?id_ktg=0&admin=null");
}else{
	echo "gagal";
}

 ?>