<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include("../../koneksi.php");
session_start();
$user = $_SESSION['user'];
if(($user) == ""){
  header("location:index.php");
}
$user = $_SESSION['user'];
$admin = mysqli_query($koneksi,"SELECT*FROM admin WHERE user = '$user'");
$tampil_admin = mysqli_fetch_array($admin);
// echo $tampil_admin['id_admin'];

$direktori = "../../img/" . basename($_FILES["gambar"]["name"]);
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
		
		$nama 		= test_input($_POST['nama']);
		$pengarang	= test_input($_POST['pengarang']);
		$kategori	= test_input($_POST['ktg']);
		$tahun		= test_input($_POST['tahun']);

		$harga		= test_input($_POST['harga']);
		$stok 		= test_input($_POST['stok']);
		$gambar 	= $direktori;
		$ket 		= test_input($_POST['ket']);
		if(!preg_match('/^[0-9]*$/', $tahun)){
			header("buku-add.php?ket=1");
		}
		$kategori 	= mysqli_query($koneksi,"SELECT*FROM kategori WHERE kategori = '$kategori'");
		$tampil_ktg = mysqli_fetch_array($kategori);
		$id_ktg 	= $tampil_ktg['id_ktg'];
		$id_admin	= $tampil_admin['id_admin'];
	
		// (`id_buku`, `judul`, `pengarang`, `th_terbit`, `harga`, `ket`, `stok`, `gambar`, `id_admin`, `id_ktg`)
		// $insert_buku = "INSERT INTO buku VALUES (NULL,'$nama','$pengarang','$tahun',$harga,'$ket', $stok,'$gambar',$id_admin,$id_ktg)";
		$insert_buku = "INSERT INTO buku (id_buku, judul, pengarang, th_terbit, harga, ket, stok, gambar, id_admin, id_ktg)VALUES (NULL,'$nama','$pengarang','$tahun',$harga,'$ket', $stok,'$gambar',$id_admin,$id_ktg)";
		$buku 		= mysqli_query($koneksi,$insert_buku);
		$book		= mysqli_query($koneksi,"SELECT*FROM buku ORDER BY id_buku DESC LIMIT 1 ");
		$tampil_buku	= mysqli_fetch_array($book);

		if($buku){
			//INSERT INTO `upload`(id_admin, id_buku, tgl_post)
			move_uploaded_file($_FILES["gambar"]["tmp_name"], $direktori);
			header("location:buku-upload.php");
			} 
			
		else{
			// header("location:../buku-add.php?gagal");
			echo $tampil_admin['id_admin'];
		}



	


 ?>