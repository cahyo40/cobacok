<?php 
include("../../koneksi.php");
$id = $_GET['id'];
$delete = mysqli_query($koneksi,"DELETE FROM pembeli WHERE id_pembeli = $id");
if($delete){
	header("location:../admin-pembeli.php");
}else{
	echo "gagal";
}

 ?>