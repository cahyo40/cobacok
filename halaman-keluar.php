<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
$email =  $_SESSION['user'];
echo $email;
if($email == ""){
	header("location:index.php?konfirmasi=2");
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<?php include("boostrap.html"); ?>
<body>
<div class="container" style="background-color: #92B7F3;" >
	<div class="jumbotron" style="background-color: #D0DBEE;">
		<h1 align="center"><span class="glyphicon glyphicon-book"></span></h1>
		<h2 align="center">TERIMA KASIH ATAS KUNJUNGANNYA</h2>

	</div>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6"><center>
			<label><a  href="index.php">Kembali Login</a></label>
		</center></div>
	</div>
	<nav style="height: 9cm">
		
	</nav>
	
</div>
<div class="panel-footer">
	<h4 align="center">Buatan Saya</h4>
</div>

</body>
</html>