

<?php

include_once '../config/config.php';
if(isset($_GET['id_harga_menu']))
{
	$res=mysql_query("SELECT file_foto FROM harga_menu WHERE id_harga_menu=".$_GET['id_harga_menu']);
	$datapost=mysql_fetch_array($res);
	mysql_query("DELETE FROM harga_menu WHERE id_harga_menu=".$_GET['id_harga_menu']);
	unlink("../upload_foto/".$datapost['file_foto']);

		 echo "<script>alert('Delete'); window.location ='../index.php?p=harga_menu'</script>";
		
		
}	
?>




	 




	 