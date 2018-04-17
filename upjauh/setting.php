
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Setting</title>
 </head>
 <?php 
	include("head.html");
	include ("../koneksi.php");
	session_start();
$user = $_SESSION['user'];
if(($user) == ""){
  header("location:index.php");
}
	$user 		= $_SESSION['user'];
	$id_ktg		= $_GET['id_ktg'];
	$admin_id	= $_GET['admin'];
	if(($user) == ""){
	  header("location:index.php");
	}
	$admin 		= mysqli_query($koneksi,"SELECT*FROM admin WHERE user = '$admin_id'");
	$tampil_admin = mysqli_fetch_array($admin);
	$admin_all 	= mysqli_query($koneksi,"SELECT*FROM admin");
	
	$kategori 	= mysqli_query($koneksi,"SELECT*FROM kategori");
	$ktg_edit	= mysqli_query($koneksi,"SELECT*FROM kategori WHERE id_ktg = $id_ktg");
	$kategori_edit	= mysqli_fetch_array($ktg_edit);

	
 ?>
<div class="col-sm-10">
	
	<div class="col-sm-9">
		<center><h1>Admin Setting</h1></center>
		<br>
		<form method="post" action="proses/admin-edit.php?id=<?php echo $tampil_admin['id_admin']; ?>" class="form-group">
				    <div class="input-group">
					    <input type="text" class="form-control" placeholder="Username" name="user" value="<?php echo $tampil_admin['user']; ?>"> 
					    <div class="input-group-btn">
					      <button class="btn btn-default" type="submit">
					        <i class="glyphicon glyphicon-user"></i>
					      </button>
					    </div>
					  </div>
					  <div class="input-group">
					    <input type="password" class="form-control" placeholder="Password" id="look" name="pass" value="<?php echo $tampil_admin['pass']; ?>">
					    <div class="input-group-btn">
					      <a class="btn btn-default" type="submit" href="#">
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
					  	<button class="btn btn-primary">Edit</button>
					  </div>
					</form>
	</div>
	<div class="col-sm-3">
		<br><br>
		<center><label>Daftar Admin</label></center>
		<table class="table">
			
			<tr>
				<td>Username</td>
				<td>Edit</td>
			</tr>
			<?php while($tampil_admin_all = mysqli_fetch_array($admin_all)){ ?>
			<tr>
				<td><label><?php echo $tampil_admin_all['user']; ?></label></td>
				<td>
					<a href="setting.php?id_ktg=0&admin=<?php echo $tampil_admin_all['user']; ?>"><span class="glyphicon glyphicon-edit"></span></a>
					
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
	
	<div class="col-sm-9">
		<center><h1>Kategori</h1></center>
		<form action="proses/kategori-edit.php?id=<?php echo $kategori_edit['id_ktg']; ?>" method="post">
			<div class="input-group">
			    <input type="text" class="form-control" placeholder="Kategori" name="ktg" value="<?php echo $kategori_edit['kategori']; ?>">
			    <div class="input-group-btn">
			      <a class="btn btn-default" type="submit" href="#">
			        <i class="glyphicon glyphicon-book"></i>
			      </a>
			    </div>
			  </div>
			  
			  <br>
			  <div>
			  	<button class="btn btn-primary">Edit</button>
			  </div>
			</form>
		</div>

	<div class="col-sm-3">
		<br><br>
		<center><label>Daftar Kategori</label></center>
		<table class="table">
			
			<tr>
				<td>Kategori</td>
				<td>Edit</td>
			</tr>
			<?php while($tampil_kategori = mysqli_fetch_array($kategori)){ ?>
			<tr>
				<td><label><?php echo $tampil_kategori['kategori']; ?></label></td>
				<td>
					<a href="setting.php?id_ktg=<?php echo $tampil_kategori['id_ktg']; ?>&admin=null"><span class="glyphicon glyphicon-edit"></span></a>
					&nbsp;
					
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
</div>
 
 </body>
 </html>