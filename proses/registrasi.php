<?php 
include("../koneksi.php");
session_start();
$email =  $_SESSION['user'];
echo $email;
if($email == ""){
	header("location:index.php?konfirmasi=2");
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$pass_1		= md5(md5($_POST['pass']));
$re_pass_1	= md5(md5($_POST['re-pass']));
$nama 		= test_input($_POST['nama']);
$email 		= test_input($_POST['email']);
$pass 		= test_input($pass_1);
$re_pass 	= test_input($re_pass_1);
if($pass == $re_pass){
	$tambah_pembeli = mysqli_query($koneksi,"INSERT INTO pembeli VALUES(NULL,'$nama','$email','$pass')");

	if($tambah_pembeli){
		header("location:../index.php?konfirmasi=berhasil&&nama='$nama'");
	}else{
		// header("location:../registrasi.php?konfirmasi=gagal");
		echo "gagal";
	}
}else{
	header("location:../registrasi.php?konfirmasi=0&&pass=0");
}



 ?>