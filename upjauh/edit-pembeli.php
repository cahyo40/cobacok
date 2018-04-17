<!DOCTYPE html>
<html>
<head>
	<title>edit pembeli</title>
</head>
<?php include("head.html"); ?>
<body>
<div class="col-sm-10">
	<div class="col-sm-6">
		<nav style="height: 3cm;"></nav>
		<?php 
				include ("../koneksi.php");
				$id = $_GET['id'];
					$edit = mysqli_query($koneksi,"SELECT*FROM pembeli WHERE id_pembeli = '$id' ");
					$tampil = mysqli_fetch_array($edit);

				 ?>
			<form method="post" action="proses/edit-pembeli.php?id=<?php echo $tampil['id_pembeli']; ?>">
				
				<div class="input-group">
					<input type="text" name="nama" placeholder="Nama" class="form-control" required value="<?php echo $tampil['nama']; ?>">
					<span class="input-group-addon"><i style="color: #D81212"  class="glyphicon glyphicon-user"></i></span>
				</div> 
				<div class="input-group">
					<input type="email" name="email" placeholder="Email" class="form-control" required value="<?php echo $tampil['email']; ?>">
					<span class="input-group-addon"><i style="color: #D81212"  class="glyphicon glyphicon-envelope"></i></span>
				</div>
				<div class="input-group">
					<input type="password" name="pass" placeholder="Password" class="form-control" id="pass" required value="<?php echo $tampil['pass']; ?>">
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
</body>
</html>