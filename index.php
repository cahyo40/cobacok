<!DOCTYPE html>
<html>
<head>
	<title>Bookers</title>
</head>

<?php error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); include("boostrap.html"); ?>
<body>
<nav class="navbar" id="nav"" style="background-color: #0A0A60">
</nav>
	<div class="container">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<center>
					<h1 style="font-size: 2cm"><span class="glyphicon glyphicon-book"></span></h1>
					<h1>BOOKERS</h1>
					<h3>Login</h3>
					<form method="post" action="proses/login.php">
				    <div class="input-group">
					    <input type="email" class="form-control" placeholder="Email" name="email" required> 
					    <div class="input-group-btn">
					      <button class="btn btn-default" type="submit">
					        <i class="glyphicon glyphicon-user"></i>
					      </button>
					    </div>
					  </div>
					  <div class="input-group">
					    <input type="password" class="form-control" placeholder="Password" id="look" name="pass" required>
					    <div class="input-group-btn">
					      <a class="btn btn-default" type="submit"  onclick="liatpass();" href="#">
					        <i class="glyphicon glyphicon-lock"></i>
					      </a>
					    </div>
					  </div>
					  <script>
					  	function liatpass(){
					  		var s = document.getElementById("look");
					  		if(s.type == "password"){
					  			s.type = "text";
					  		}else{
					  			s.type = "password";
					  		}
					  	}
					  </script>
					  <br>
					  <div>
					  	<button class="btn btn-primary">Login</button>
					  </div>
					</form>
				<br><br><br><br>
				<div class="alert alert-danger">
					<p>
					<?php 
					if ($_GET['konfirmasi'] == 1) {
						echo "gagal Login";
					}else if ($_GET['konfirmasi'] == 2) {
						echo "Login Terlebih Dahulu";
					}	
					else{
						echo "";
					}
					
					?>
					
				</p>
				</div>
				</center>
			</div>
			<div class="col-sm-3"></div>
		</div>
	</div>
<div align="center" class="panel-footer">Belum Punya Akun ??<a href="registrasi.php?pass=10">Registrasi sekarang</a></div>
</div>
</body>
</html>