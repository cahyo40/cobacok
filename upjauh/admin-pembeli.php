<!DOCTYPE html>
<html>
<head>
	<title>
		Admin Pembeli
	</title>
</head>
<?php include("head.html"); 
include ("../koneksi.php");
	session_start();
$user = $_SESSION['user'];
if(($user) == ""){
  header("location:index.php");
}
?>
<body>
	<div class="col-sm-10">
		<dir class="col-sm-8">
			<table class="table"> 
				<tr class="danger">
					<td>Nama</td>
					<td>Email</td>
					<td>Aksi</td>
				</tr>
				<?php 
				$kueri = mysqli_query($koneksi,"SELECT*FROM pembeli");
				while($tampil_pembeli = mysqli_fetch_array($kueri)){

				 ?>
				
				<tr class="info">
					<td><label><?php echo $tampil_pembeli['nama']; ?></label></td>
					<td><label><?php echo $tampil_pembeli['email']; ?></label></td>
					<td>
						<a href="edit-pembeli.php?id=<?php echo $tampil_pembeli['id_pembeli']; ?>"><span class="glyphicon glyphicon-edit"></span></a>
						<a href="proses/delete-pembeli.php?id=<?php echo $tampil_pembeli['id_pembeli']; ?>"><span class="glyphicon glyphicon-trash"></span></a>
					</td>
				</tr>
				<?php } ?>
			</table>
			<center><a href="add-pembeli.php" class="btn btn-info"><span class="glyphicon glyphicon-plus">Tambah Pembeli</span></a></center>
		</dir>
	</div>
</body>
</html>