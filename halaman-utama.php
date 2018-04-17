<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
$email =  $_SESSION['user'];
echo $email;
if($email == ""){
	header("location:index.php?konfirmasi=2");
}else{
	include("koneksi.php");
	$pembeli		= mysqli_query($koneksi,"SELECT*FROM pembeli WHERE email = '$email'");
	$tampil_pembeli	= mysqli_fetch_array($pembeli);
	
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Bookers</title>
</head>
<?php 
include("boostrap.html"); 
include("koneksi.php"); ?>
<body  style="background: #A3C0FA;">


<nav class="navbar navbar-inverse navbar-fixed-top" id="nav"" style="background-color: #0A0A60">
 		 <div class="container-fluid">
 		 	<div class="navbar-header">
 		 		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="	false">
 		 			<span class="sr-only">Toggle navigation</span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
       				<span class="icon-bar"></span>
 		 		</button>
 		 		<a href="halaman-utama.php?page=1" class="navbar-brand"><i><span class="glyphicon glyphicon-book" style="color:#D4C807;"></span>&nbsp;Bookers</i></a>
		 	</div>
 		 	<div id="menu">
 		 		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
 		 				<ul class="nav navbar-nav navbar-right">
	 		 	 			<li><a><span style="color:#D4C807; ">User : <?php echo strtoupper($tampil_pembeli['nama']); ?></span></a>
	 		 	 			</li>
	 		 	 			<li>
	 		 	 				<a href="proses/logout.php?id=<?php echo $tampil_pembeli['id_pembeli']; ?>" ><span class="glyphicon glyphicon-log-out" style="color:#E40101; ">&nbsp;Logout</span></a>
	 		 	 			</li>
	 		 			</ul>
 		 	 				<div> 		 	 						
 		 	 					
	 	 					</div>
 		 	 			</div>
	 		 	</div>
	 		 </div>
	 	</nav>
	 <br><br><br>
	 <div class="row">
	  		<div class="col-sm-2">
	  			<div style="background-color: #0A0A60;">
		  			<ul class="nav nav-pills nav-stacked" id="">
		  				<li><a href="add-cart.php?id_user=<?php echo $tampil_pembeli['id_pembeli']; ?>"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Lihat Keranjang</a></li>
		  				<li>
		  					<form  method="post" action="halaman-utama.php?page=1" >
									  <div class="input-group">
									    <input type="text" class="form-control" placeholder="Search" name="cari">
									    <div><center>
									    <button class="btn btn-default" type="submit">
								        <i class="glyphicon glyphicon-search"></i>
									    </button>
									    </center>
										</div>
									</div>
								</form>
							</li><br>
					   	<li><a href=""><span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;Kategori</a>
					   			</li>
					   			<ul>
						   				<li><a href="halaman-utama.php?ktg=<?php echo ""; ?>">Pilih Semua</a></li>
						   				<?php 
					   				$ktg = "SELECT*FROM Kategori ";
					   				$ktg1 = mysqli_query($koneksi,$ktg);
					   				while($tampil_kategori = mysqli_fetch_array($ktg1)){
					   				 ?>
    						      	<li><a href="halaman-utama.php?ktg=<?php echo $tampil_kategori['kategori']; ?>"><?php echo $tampil_kategori['kategori']; ?></a></li>
								     <?php } ?>
						   			</ul>
						   
					   	<li><br></li>
					   	<li><br></li>
					</ul>
				</div>
	  		</div>
	  		
	  		<div class="col-sm-10">
	  			
				<div class="row text-center">
					
	  				<?php
	  				$prepare  	= 8;
	  				$data 		= isset($_GET['page'])? (int)$_GET['page']:1;
	  				$hasil 		= ($data>1)? ($data*$prepare)-$prepare:0;
	  				$ktg 		= $_GET['ktg'];
	  				$halo = $_POST['cari'];
				$buku_total 	= mysqli_query($koneksi,"SELECT * FROM buku_total  WHERE judul LIKE '%$halo%' AND kategori LIKE '%$ktg%' LIMIT $hasil,$prepare");
				while($tampil_buku = mysqli_fetch_array($buku_total)){
		  		 ?>

	  				<div class="col-sm-3">
 					<a href="detail-buku.php?id=<?php echo $tampil_buku['id_buku']; ?>" class="thumbnail"><img style="width: 100px;height: 180px" src="<?php echo str_replace("../../", "", $tampil_buku['gambar']); ?>"<></a>
 					<table align="left">
 						<tr><p><?php echo strtoupper($tampil_buku['judul']); ?></p></tr>
 						<tr><p><?php echo strtoupper($tampil_buku['pengarang'])?> (<?php echo $tampil_buku['th_terbit']; ?>) </p></tr>
 						<tr><p><?php echo "Harga : ".$tampil_buku['harga']; ?></p></tr>
 						<tr><p><a href="detail-buku.php?id=<?php echo $tampil_buku['id_buku']; ?>">Lihat Detail</a></p></tr>
 						<form method="post" action="proses/add-cart.php?id=<?php echo $tampil_buku['id_buku']; ?>">
 						<tr><p><input type="number" name="jumlah" value="1" max="<?php echo $tampil_buku['stok']; ?>"></p></tr>
 						<tr><button class="btn btn-info"><i class="glyphicon glyphicon-plus">&nbsp; Add Cart</i></button></tr>
 						</form>
 						
 					</table>
 				</div>
 				<?php } ?>
	  			</div>
	  			<div class="page">
	  				<ul class="pagination">
	  					<?php 
	  						$buku_total_a 	= mysqli_query($koneksi,"SELECT * FROM buku_total WHERE judul LIKE '%$halo%'");
	  						$count 			= mysqli_num_rows($buku_total_a);
	  						$panjang = ceil($count/$prepare);
	  						for ($i=1; $i <= $panjang ; $i++) {
	  						 ?>
	  							<li <?php $s = $_GET['page']; if($s == $i){echo 'class="active"';} ?>><a  href="?page=<?php echo $i; ?>"><?php echo $i ?></a></li>
	  					<?php } ?>
	  				</ul>
	  			</div>
	  		</div>
	  		
	  	</div> 	
</body>
</html>