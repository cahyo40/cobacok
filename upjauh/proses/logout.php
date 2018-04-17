<?php
 session_start();
 if( session_destroy()){ 
 header("location:../index.php?konfirmasi=5"); 
}
else{
	header("location:../admin-only.php.php"); 
}
 ?>