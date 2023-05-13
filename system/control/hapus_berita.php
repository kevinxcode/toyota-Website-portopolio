

<?php

include_once '../config/config.php';
if(isset($_GET['id_berita']))
{
	$res=mysql_query("SELECT file_foto FROM berita WHERE id_berita=".$_GET['id_berita']);
	$datapost=mysql_fetch_array($res);
	mysql_query("DELETE FROM berita WHERE id_berita=".$_GET['id_berita']);
	unlink("../upload_foto/".$datapost['file_foto']);

		 echo "<script>alert('Delete'); window.location ='../index.php?p=berita'</script>";
		
		
}	
?>




	 




	 