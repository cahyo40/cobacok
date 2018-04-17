<!DOCTYPE html>
<html>
<head>
	<title>Registrasi</title>
</head>

<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 
include("boostrap.html"); ?>
<body>
	<nav class="navbar" id="nav"" style="background-color: #0A0A60">
</nav>
	<div>
		<h1 align="center">REGISTASI</h1><br><br>
	</div>
	<div class="row">
		<div class="col-sm-3">
			
		</div>
		<div class="col-sm-6">
			<form method="post" action="proses/registrasi.php">
				<div class="input-group">
					<input type="text" name="nama" placeholder="Nama" class="form-control" required>
					<span class="input-group-addon"><i style="color: #D81212"  class="glyphicon glyphicon-user"></i></span>
				</div> 
				<div class="input-group">
					<input type="email" name="email" placeholder="Email" class="form-control" required>
					<span class="input-group-addon"><i style="color: #D81212"  class="glyphicon glyphicon-envelope"></i></span>
				</div>
				<div class="input-group">
					<input type="password" name="pass" placeholder="Password" class="form-control" id="pass" required>
					<span class="input-group-addon"><a onclick="pass()"><i style="color: #D81212" class="glyphicon glyphicon-lock" id="icon"></i></a></span>
				</div>
				<div class="input-group">
					<input type="password" name="re-pass" placeholder="Konfirmasi Password" class="form-control" id="pass2" required>
					<span class="input-group-addon"><a onclick="pass()"><i style="color: #D81212" class="glyphicon glyphicon-lock" id="icon"></i></a></span>
				</div>
				
				<div align="center">
					<br>
					<button class="btn btn-info">Registrasi</button>
					<input type="reset" name="" value="Reset" class="btn btn-danger">
										
				</div>
				<div class="alert alert-danger">
  			<?php if($_GET['pass']==0){
  				echo '<label><strong>GAGAL !! &nbsp;</strong>Password tidak sama</label>';
  			}else if($_GET['pass']==2){
  				echo '<label><strong>GAGAL !! &nbsp;</strong>Password kurang dari 5/label>';
  			}
  			?>
			</div>
			<div>
				<center><label>Kembali ke halamana &nbsp;<a href="index.php">Login</a></label></center>
			</div>
			</form>
		</div>
		<div class="col-sm-3">
			
		</div>
		<div >
			
		</div>
	</div>
	

</body>
</html>