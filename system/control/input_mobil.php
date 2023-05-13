<?php
	 include "../config/config.php";
// Cek username di database
$cek_konsumen=mysql_num_rows(mysql_query
             ("SELECT mobil FROM mobil
               WHERE mobil='$_POST[mobil]'"));
// Kalau username sudah ada yang pakai
if ($cek_konsumen > 0){
echo header('location:../index.php?p=post_mobil&msg=gagal');
}
// Kalau username valid, inputkan data ke tabel users
else{
	
	//menyimpan ke table 
	$sql = "insert into mobil
	(mobil) values 
	('{$_POST['mobil']}')";
	mysql_query($sql) or die('<script type="text/javascript">
           window.location = "../index.php?p=post_mobil&msg=success"
      </script>');
		
		echo header('location:../index.php?p=post_mobil&msg=success');
}
