<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include("../koneksi.php"); 
session_start();
$user = $_SESSION['user'];
if(($user) == ""){
  header("location:index.php");
}$user = $_SESSION['user'];
$tadmin = mysqli_query($koneksi,"SELECT*FROM admin WHERE user ='$user'");
$tampil_admin = mysqli_fetch_array($tadmin);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Buku</title>
</head>
<body>
	<?php include "head.html"; ?>
<div class="col-sm-10">
	<h1 align="center">Tambah Buku</h1>
  <h4 align="center"><?php echo $tampil_admin['id_admin']; ?></h4>
	<br><br>
	<form class="form-horizontal" action="proses/buku-add.php?id=<?php echo $tampil_admin['id_admin']; ?>" method="post" enctype="multipart/form-data">
	<div class="form-group">
    	<label class="control-label col-sm-2" >Judul Buku</label>
    <div class="col-sm-10">
      	<input required type="text" class="form-control" id="email" placeholder="Judul Buku" name="nama">
    </div>
  </div>
  <div class="form-group">
    	<label class="control-label col-sm-2" >Pengarang</label>
    <div class="col-sm-10">
      	<input required type="text" class="form-control" id="email" placeholder="Pengarang" name="pengarang">
    </div>
  </div>
  <div class="form-group">
    	<label class="control-label col-sm-2" >Kategori</label>
    <div class="col-sm-10">
    	<select class="form-control" name="ktg">
    	
    	<?php 
    	$ktg = "SELECT*FROM kategori";
    	$kateg = mysqli_query($koneksi,$ktg);
    	while($tampil_ktg = mysqli_fetch_array($kateg)){
    	 ?>
      	<option name="ktg" id="ktg" value="<?php echo $tampil_ktg['kategori']; ?>"><?php echo $tampil_ktg['kategori']; ?></option>
      	<?php } ?>
      	</select>
    </div>
  </div>
  <div class="form-group">
    	<label class="control-label col-sm-2" >Tahun Terbit</label>
    <div class="col-sm-10">
      	<input required maxlength="4" type="text" class="form-control" id="tahun-terbit" placeholder="Tahun Terbit" name="tahun">
    </div>
  </div>
  <div class="form-group">
    	<label class="control-label col-sm-2" >Harga</label>
    <div class="col-sm-10">
      	<input required type="text" class="form-control" id="harga" placeholder="Harga" name="harga">
    </div>
  </div>
  <div class="form-group">
    	<label class="control-label col-sm-2" >Stok</label>
    <div class="col-sm-10">
      	<input required type="number" class="form-control" id="stok" placeholder="Stok" name="stok">
    </div>
  </div>
  <div class="form-group">
    	<label class="control-label col-sm-2" >Gambar</label>
    <div class="col-sm-3">
      	<input required type="file" class="form-control" id="image" name="gambar">
    </div>
  </div>
  <div class="form-group">
    	<label class="control-label col-sm-2" >Keterangan</label>
    <div class="col-sm-10">
      	<textarea class="form-control" name="ket"></textarea>
    </div>
  </div>
  <div align="center">
  	<button class="btn btn-primary" name="submit">Simpan</button>
   <!--  <a class="btn btn-primary">Simpan</a> -->
  </div>
	</form>
  <div class="alert alert-danger">
  <label><?php 
    if($_GET['ket']==1){
      echo "Tahun Harus Angak Semua";
    }

   ?></label>
</div>
</div>


</body>
</html>