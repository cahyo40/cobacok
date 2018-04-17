<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include("koneksi.php");
session_start();
$pembeli = $_SESSION['user'];
$id_pembeli = $_GET['id_user'];
if($pembeli == ""){
	header("location:index.php?konfirmasi=2");
}else{
	include("koneksi.php");
	$pembeli		= mysqli_query($koneksi,"SELECT*FROM pembeli WHERE email = '$pembeli'");
	$tampil_pembeli	= mysqli_fetch_array($pembeli);
	
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Keranjang</title>
 </head>
 <?php include("boostrap.html"); include("koneksi.php"); ?>
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
	 	<div class="col-sm-1"></div>
	 	<div class="col-sm-10">
	 		<form action="" method="post">
	 		<h2 align="center">Transaksi dari <?php echo strtoupper($tampil_pembeli['nama']) ?></h2>
	 		<br><br>
	 		<label><a href="halaman-utama.php?page=1" class="btn btn-warning"><span class="glyphicon glyphicon-plus">Tambah Buku</span></a></label>
	 		<table class="table">
	 			<tr class="danger">
	 				<th>Gambar</th>
	 				<th>Judul</th>
	 				<th>Pengarang</th>
	 				<th>Jumlah</th>
	 				<th>Harga</th>
	 				<th>Aksi</th>
	 			</tr>
	 			<?php 
	 					$transaksi 	= mysqli_query($koneksi,"SELECT*FROM transaksi_total WHERE id_pembeli = $id_pembeli");
	 					
	 					while($tampil 	= mysqli_fetch_array($transaksi)){
	 				 ?>
	 			<tr class="success">
	 				 <td width="110px"><img class="thumbnail" src="<?php echo str_replace("../../", "", $tampil['gambar']); ?>" style="width: 95px;height: 120px"></td>
	 				 <td width="320px"><label><?php echo $tampil['judul']; ?></label></td>
	 				 <td width="320px"><label><?php echo $tampil['pengarang']; ?></label></td>
	 				 <td><p><?php echo$tampil['jumlah'] ?>&nbsp;buah</p></td>
	 				 <td><label><?php echo "Rp. ".($tampil['harga']*$tampil['jumlah']); ?></label></td>
	 				 <td><a href="proses/batal-cart.php?id_buku=<?php echo $tampil['id_buku']; ?>&id_user=<?php echo $id_pembeli ?>">batal</a></td>
	 			 </tr>
	 			 <?php } ?>
	 		</table>
	 		<table class="table">
	 			<tr class="warning">
	 				<?php 
	 					$transaksi 	= mysqli_query($koneksi,"SELECT sum(jumlah*harga) as total FROM transaksi_total WHERE id_pembeli = $id_pembeli");
	 					$tampil_harga = mysqli_fetch_array($transaksi);
	 				 ?>
	 				<th width="110px"></th>
	 				<th width="320px"></th>
	 				<th width="320px"><label>Total Harga</label></th>
	 				<th><?php echo "Rp. ".$tampil_harga['total'] ; ?></th>
	 				<th></th>
	 			</tr>
	 		</table>
	 		<div>
	 			<center>
	 				<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" >Bayar</button>
	 				<a href="proses/batal.php?id_user=<?php echo $id_pembeli; ?>" class="btn btn-danger btn-lg">Batal</a><br><br><br><br>
	 			</center>
	 		</div>
	 		</form>
	 	</div>
	 	<div class="col-sm-1"></div>
	 </div>

<div>
	<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">No. Transaksi :&nbsp;<?php echo $id_pembeli ?></h4>
        </div>
        <div id="bodi">
        <div class="modal-body">
          <form action="" method="post">
          	<?php 
          		$tgl = mysqli_query($koneksi,"SELECT * FROM `transaksi` WHERE `id_pembeli` = $id_pembeli ORDER BY tgl desc limit 1");
          		$tampil_tgl = mysqli_fetch_array($tgl);
          	 ?>
	 		<h4 align="center">Transaksi dari <?php echo strtoupper($tampil_pembeli['nama']) ?></h4>
	 		<h6 align="center" class="modal-title">No. Transaksi :&nbsp;<?php echo $id_pembeli ?></h6>
	 		<p align="right"><?php echo $tampil_tgl['tgl']; ?></p>
	 		<br><br>
	 		
	 		<table class="table">
	 			<tr class="danger">
	 				<th>Judul</th>
	 				<th>Jumlah</th>
	 				<th>Harga</th>
	 				
	 			</tr>
	 			<?php 
	 					$transaksi 	= mysqli_query($koneksi,"SELECT*FROM transaksi_total WHERE id_pembeli = $id_pembeli");
	 					
	 					while($tampil 	= mysqli_fetch_array($transaksi)){
	 				 ?>
	 			<tr class="success">
	 				
	 				 <td width="320px"><label><?php echo $tampil['judul']; ?></label></td>
	 				
	 				 <td><p><?php echo$tampil['jumlah'] ?>&nbsp;buah</p></td>
	 				 <td><label><?php echo "Rp. ".($tampil['harga']*$tampil['jumlah']); ?></label></td>
	 				 
	 			 </tr>
	 			 <?php } ?>
	 		</table>
	 		<table class="table">
	 			<tr class="warning">
	 				<?php 
	 					$transaksi 	= mysqli_query($koneksi,"SELECT sum(jumlah*harga) as total FROM transaksi_total WHERE id_pembeli = $id_pembeli");
	 					$tampil_harga = mysqli_fetch_array($transaksi);
	 				 ?>
	 				<th width="110px"></th>
	 				<th width="320px"></th>
	 				<th width="320px"><label>Total Harga</label></th>
	 				<th><?php echo "Rp. ".$tampil_harga['total'] ; ?></th>
	 				<th></th>
	 			</tr>
	 		</table>
	 		</div>
	 		</form>
        </div>
        <div class="modal-footer" id="">
    		<a href="" class="btn btn-primary" onclick="cetak('bodi')"><span class="glyphicon glyphicon-print"></span>&nbsp;Cetak</a>
          	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <script>
      	function cetak(a){
      		var x = document.body.innerHTML;
      		var y = document.getElementById(a).innerHTML;
      		document.body.innerHTML = y;
      		window.print();
      	}
      </script>
    </div>
  </div>
</div>

 <div class="panel-footer">
 	<h6>Buatan Saya</h6>
 </div>
 </body>
 </html>
