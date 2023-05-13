<?php
	 include "../config/config.php";
// Cek username di database
$cek_konsumen=mysql_num_rows(mysql_query
             ("SELECT id_video FROM video
               WHERE id_video='$_POST[id_video]'"));
// Kalau username sudah ada yang pakai
if ($cek_konsumen > 0){
echo header('location:../index.php?p=post_mobil&msg=ada');
}
// Kalau username valid, inputkan data ke tabel users
else{
	
	$sql="INSERT INTO `video`(
	`id_mobil`,
	
	`mobil`,
	
	`link`)
	VALUES 
('$_POST[id_mobil]','$_POST[mobil]','$_POST[link]')";
	mysql_query($sql) or die("Gagal Menyimpan");
echo header('location:../index.php?p=post_mobil&msg=success');

}	
?>














