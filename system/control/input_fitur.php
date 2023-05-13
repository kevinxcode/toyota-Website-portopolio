<?php
	 include "../config/config.php";
// Cek username di database
$cek_konsumen=mysql_num_rows(mysql_query
             ("SELECT id_fitur FROM fitur
               WHERE id_fitur='$_POST[id_fitur]'"));
// Kalau username sudah ada yang pakai
if ($cek_konsumen > 0){
echo header('location:../index.php?p=post_mobil&msg=ada');
}
// Kalau username valid, inputkan data ke tabel users
else{
	
	$sql="INSERT INTO `fitur`(
	`id_mobil`,
	
	`mobil`,
	`fitur`,
	
	`jenis_fitur`)
	VALUES 
('$_POST[id_mobil]','$_POST[mobil]','$_POST[fitur]','$_POST[jenis_fitur]')";
	mysql_query($sql) or die("Gagal Menyimpan");
echo header('location:../index.php?p=post_mobil&msg=success');

}	
?>














