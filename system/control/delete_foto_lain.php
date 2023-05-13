

<?php

include_once '../config/config.php';
if(isset($_GET['id_foto_mobil_lain']))
{
	$res=mysql_query("SELECT file_foto FROM mobil_foto_lain WHERE id_foto_mobil_lain=".$_GET['id_foto_mobil_lain']);
	$datapost=mysql_fetch_array($res);
	mysql_query("DELETE FROM mobil_foto_lain WHERE id_foto_mobil_lain=".$_GET['id_foto_mobil_lain']);
	unlink("../upload_foto/".$datapost['file_foto']);

		 echo "<script>alert('Delete'); window.location ='../index.php?p=post_mobil'</script>";
		
		
}	
?>




	 




	 