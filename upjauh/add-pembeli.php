<!DOCTYPE html>
<html>
<head>
	<title>ADD PEMBELI</title>
</head>
<?php include("head.html"); ?>
<body>
<div class="col-sm-10">
	<div class="col-sm-6">
		<nav style="height: 3cm;"></nav>
			<form method="post" action="proses/pembeli-add.php">
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
			</form>
		</div>
	</div>
</div>
</body>
</html>