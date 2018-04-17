<?php 

include("../../koneksi.php");
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$id 		= $_GET['id'];
$pass_1		= md5(md5($_POST['pass']));
$nama 		= test_input($_POST['nama']);
$email 		= test_input($_POST['email']);
$pass 		= test_input($pass_1);
$update = mysqli_query($koneksi,"UPDATE pembeli SET nama = '$nama',email = '$email',pass = '$pass' WHERE id_pembeli = $id");
if($update){
	header("location:../admin-pembeli.php");
}

 ?>