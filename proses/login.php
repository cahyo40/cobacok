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
$email 		= test_input($_POST['email']);
$pass 		= test_input(md5(md5($_POST['pass'])));
$cek_data	= mysqli_query($koneksi,"SELECT*FROM pembeli WHERE email = '$email' AND pass ='$pass'");
$data 		= mysqli_fetch_array($cek_data);
if(mysqli_num_rows($cek_data)>0){
	if($data['email']==$email && $data['pass']==$pass){
		session_start();
		$_SESSION['user'] = $email;
		header("location:../halaman-utama.php?konfirmasi=1&page=1");
	}
	else{
		header("location:../index.php?konfirmasi=1");
	}
}
else{
	header("location:../index.php?konfirmasi=1");
}


?>