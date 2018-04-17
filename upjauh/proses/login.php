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
$user = test_input($_POST['user']);
$pass = test_input($_POST['pass']);
$passs = md5(md5($pass));
$login = "SELECT*FROM admin WHERE user = '$user' && pass ='$passs'";
$query = mysqli_query($koneksi,$login);
$tampil = mysqli_fetch_array($query);
$total = mysqli_num_rows($query);
if($total>0){
	if ($tampil['user']==$user && $tampil['pass'] == $passs) {
		session_start();
		$_SESSION['user'] = $user;
		
		header("location:../admin_only.php");
	}
	else{
		header("location:../index.php");
		echo 'alert("gagal Login")';
	}

}
else{
		header("location:../index.php");
	}

 ?>