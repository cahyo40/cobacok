<!DOCTYPE html>
<html>
<head>
	<title>Admin Only</title>
</head>
<?php 
include ("../boostrap.html");
include ("../koneksi.php");
?>
<body>

	<div class="container">
		<div class="row">
			<h1 align="center">Login</h1>
			<div class="col-sm-3"></div>
			<div class="col-sm-6" align="center">
				<div class="form-group">
					<form class="form-group" method="post" action="proses/login.php">
						<div class="form-group">
							<input type="text" name="user" placeholder="User" value="">
						</div>
						<div class="form-group">
							<input type="password" name="pass" placeholder="Password" id="pass" value="">
						</div>
						<script >
							function pass(){
								var x = document.getElementById("pass");
								if(x.type == "password"){
									x.type ="text";
								}else{
									x.type = "password";
								}
							}
						</script>
						<div>
							<a href="#" onclick="pass()">liat Pass</a><br>
							<button>Login</button>
							<br>
							
						</div>
					</form>
				</div>
			</div>
			<div class="col-sm-3"></div>
		</div>
	</div>
</body>
</html>

