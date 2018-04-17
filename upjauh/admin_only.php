  
<!DOCTYPE html>
<html>
<head>
  <title>Halaman Admin</title>
</head>
<?php 
include("head.html");
include ("../koneksi.php");
session_start();
$user = $_SESSION['user'];
if(($user) == ""){
  header("location:index.php");
}
 ?>

        <div class="col-sm-10">
          <div id="buku_data" ">
            <h1>BUKU</h1>
            <p align="right"><a href="buku-add.php" class="btn btn-primary">Tambah Buku &nbsp; <span class="glyphicon glyphicon-plus"></span></a></p>
            <br><br>
            <table class="table">
              <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Tahun Terbit</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Posting</th>
                <th>Action</th>
                <!-- <th><?php echo $user; ?></th> -->
              </tr>
              <?php 
                $buku = "SELECT*FROM buku_total";
                $query = mysqli_query($koneksi,$buku);
                 $no = 1;
                while($tampil_buku = mysqli_fetch_array($query)){
                  //kolom , tgl_post,judul,pemgarang,th_terbit,harga,ket,stok,gambar,user,kategori
                 
               ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $tampil_buku['judul']; ?></td>
                <td><?php echo $tampil_buku['pengarang']; ?></td>
                <td><?php echo $tampil_buku['th_terbit']; ?></td>
                <td><?php echo $tampil_buku['kategori']; ?></td>
                <td><?php echo $tampil_buku['stok']; ?></td>
                <td><?php echo "Rp. ".$tampil_buku['harga']; ?></td>
                <td><?php echo $tampil_buku['tgl_post']; ?></td>
                
                <td><a href="buku-edit.php?id=<?php echo $tampil_buku['id_buku']; ?>"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;<a href="proses/buku-hapus.php?id=<?php echo $tampil_buku['id_buku'] ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
              <?php $no++; } ?>
              </tr>
            </table>
          </div>
          <div>
            
            
          </div>
          
      </div>
    </nav>
      
   </body>

</html>