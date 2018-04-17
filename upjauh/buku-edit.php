<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include("../koneksi.php");
session_start();
$user = $_SESSION['user'];
if(($user) == ""){
  header("location:index.php");
}
$admin				=$_SESSION['user'];
$id_buku 			= $_GET['id'];
$tampil_buku  		= "SELECT*FROM buku WHERE id_buku = $id_buku";
$query_tampil_buku	= mysqli_query($koneksi,$tampil_buku);
$row_buku			= mysqli_fetch_array($query_tampil_buku); 	
$id_ktg				= $row_buku['id_ktg'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Buku <?php echo $row_buku['judul']; ?></title>
</head>
<body>
	<?php include "head.html"; ?>
<div class="col-sm-10">
	<h1 align="center">Edit Buku <?php echo $row_buku['judul']; ?></h1>
	<br><br>
	<form class="form-horizontal" action="proses/buku-edit.php?id=<?php echo $id_buku; ?>" method="post" >
	<div class="form-group">
    	<label class="control-label col-sm-2" >Judul Buku</label>
    <div class="col-sm-10">
      	<input required type="text" class="form-control" id="email" placeholder="Judul Buku" name="nama" value="<?php echo $row_buku['judul']; ?>">
    </div>
  </div>
  <div class="form-group">
    	<label class="control-label col-sm-2" >Pengarang</label>
    <div class="col-sm-10">
      	<input required type="text" class="form-control" id="email" placeholder="Pengarang" name="pengarang" value="<?php echo $row_buku['pengarang']; ?>">
    </div>
  </div>
  <div class="form-group">
    	<label class="control-label col-sm-2" >Kategori</label>
    <div class="col-sm-10">
    	<select class="form-control" name="ktg">
    	
    	<?php 
    	$ktg = "SELECT*FROM kategori WHERE id_ktg = $id_ktg";
    	$kateg = mysqli_query($koneksi,$ktg);
    	while($tampil_ktg = mysqli_fetch_array($kateg)){
    	 ?>
      	<option name="ktg" id="ktg" value="<?php echo $tampil_ktg['kategori']; ?>"><?php echo $tampil_ktg['kategori']; ?></option>
      	<?php } ?>
      	<?php 
    	$ktg_not = "SELECT*FROM kategori WHERE NOT id_ktg = $id_ktg";
    	$kateg_not = mysqli_query($koneksi,$ktg_not);
    	while($tampil_ktg_not = mysqli_fetch_array($kateg_not)){
    	 ?>
    	 <option name="ktg" id="ktg" value="<?php echo $tampil_ktg_not['kategori']; ?>"><?php echo $tampil_ktg_not['kategori']; ?></option>
    	 <?php } ?>
      	</select>
    </div>
  </div>
  <div class="form-group">
    	<label class="control-label col-sm-2" >Tahun Terbit</label>
    <div class="col-sm-10">
      	<input required maxlength="4" type="text" class="form-control" id="tahun-terbit" placeholder="Tahun Terbit" name="tahun" value="<?php echo $row_buku['th_terbit']; ?>">
    </div>
  </div>
  <div class="form-group">
    	<label class="control-label col-sm-2" >Harga</label>
    <div class="col-sm-10">
      	<input required type="text" class="form-control" id="harga" placeholder="Harga" name="harga" value="<?php echo $row_buku['harga']; ?>">
    </div>
  </div>
  <div class="form-group">
    	<label class="control-label col-sm-2" >Stok</label>
    <div class="col-sm-10">
      	<input required type="number" class="form-control" id="stok" placeholder="Stok" name="stok" value="<?php echo $row_buku['stok']; ?>">
    </div>
  </div>
  
  <div class="form-group">
    	<label class="control-label col-sm-2" >Keterangan</label>
    <div class="col-sm-10">
      	<textarea class="form-control" name="ket"><?php echo $row_buku['ket']; ?></textarea>
    </div>
  </div>
  <div align="center">
  	<button class="btn btn-primary" name="submit">Update</button>
  </div>
	</form>
   <label><?php 
    if($_GET['ket']==1){
      echo "Tahun Harus Angak Semua";
    }

   ?></label>
</div>


</body>
</html>