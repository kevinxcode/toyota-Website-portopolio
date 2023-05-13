

<?php

include_once '../config/config.php';
if(isset($_GET['id_testimoni']))
{
	$res=mysql_query("SELECT file_foto FROM testimoni WHERE id_testimoni=".$_GET['id_testimoni']);
	$datapost=mysql_fetch_array($res);
	mysql_query("DELETE FROM testimoni WHERE id_testimoni=".$_GET['id_testimoni']);
	unlink("../upload_foto/".$datapost['file_foto']);

		 echo "<script>alert('Delete'); window.location ='../index.php?p=testimoni'</script>";
		
		
}	
?>




	 




	 