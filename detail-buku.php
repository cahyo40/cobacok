<?php 
include("koneksi.php");
session_start();
$user = $_SESSION['user'];
$id_buku 	= $_GET['id'];
// echo $id_buku;
if(empty($user)|| empty($id_buku)){
	header("location:index.php?konfirmasi=0");
}
$buku 			= mysqli_query($koneksi,"SELECT*FROM buku_total WHERE id_buku = $id_buku");
$pembeli 		= mysqli_query($koneksi,"SELECT*FROM pembeli WHERE email = '$user'");
$buku_not 		= mysqli_query($koneksi,"SELECT*FROM buku_total WHERE NOT id_buku = $id_buku ORDER BY tgl_post DESC LIMIT 4");
$tampil_buku	= mysqli_fetch_array($buku);

$tampil_pembeli	= mysqli_fetch_array($pembeli);
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title><?php echo $tampil_buku['judul']; ?></title>
 </head>
 <style>
 	#tabel{
 		padding: 10px;
 		color :#A3C0FA;
 	}
 </style>
 <?php include("boostrap.html"); ?>
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
<div class="container-fluid">
	<div class="row"> 
		<div class="col-sm-7">
			<center>
			<h1><?php echo " "; ?></h1>
			<p><img class="thumbnail" src="<?php echo str_replace("../../", "", $tampil_buku['gambar']); ?>" style="width: 450px;height: 450px"></p>
			</center>
			
		</div>
		<div class="col-sm-3" style="background-color: #0A0A60;">
			<br><br>
			<table >
				<tr id="tabel">
					<td id="tabel">Judul Buku</td>
					<td id="tabel">:</td>
					<td id="tabel"><?php echo strtoupper($tampil_buku['judul']); ?></td>
				</tr>
				<tr id="tabel">
					<td id="tabel">Pengarang Buku</td>
					<td id="tabel">:</td>
					<td id="tabel"><?php echo $tampil_buku['pengarang']; ?></td>
				</tr>
				<tr id="tabel">
					<td id="tabel">Tahun Terbit</td>
					<td id="tabel">:</td>
					<td id="tabel"><?php echo $tampil_buku['th_terbit'] ?></td>
				</tr>
				<tr id="tabel">
					<td id="tabel">Harga</td>
					<td id="tabel">:</td>
					<td id="tabel"><?php echo "Rp.".$tampil_buku['harga']; ?></td>
				</tr>
				<tr id="tabel">
					<td id="tabel">Stok</td>
					<td id="tabel">:</td>
					<td id="tabel"><?php echo $tampil_buku['stok']; ?></td>
					
				</tr>
				<tr id="tabel">
					<td id="tabel"><a href="proses/add-cart.php?id=<?php echo $tampil_buku['id_buku']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus">ADD CART</span></a></td>
				</tr>
				<tr id="tabel">
					<td id="tabel"><p >KETERANGAN</p></td>
				</tr>
				
			</table>
			<table>
				<tr id="tabel">
					<td id="tabel" align="justify"><?php echo $tampil_buku['ket']; ?></td>
				</tr>
			</table>
		</div>
		<div class="col-sm-2" style="background-color: #6295FA; border-left: solid 2px black">
			<h3 align="center">Buku Lain</h3>
			<?php while($tampil_buku_not= mysqli_fetch_array($buku_not)){ ?>
				<a href="detail-buku.php?id=<?php echo $tampil_buku_not['id_buku']; ?>" class="thumbnail"><img style="width: 250px;height: 250px" src="<?php echo str_replace("../../", "", $tampil_buku_not['gambar']); ?>"<></a>
				<a href="detail-buku.php?id=<?php echo $tampil_buku_not['id_buku']; ?>"><p style="color: black" align="center"><?php echo strtoupper($tampil_buku_not['judul']); ?></p></a>
			<?php	} ?>
		</div>
	</div>	
</div>
 
 </body>
 </html>