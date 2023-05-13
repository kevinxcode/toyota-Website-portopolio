<?php
	 include "../config/config.php";
// Cek username di database
$cek_konsumen=mysql_num_rows(mysql_query
             ("SELECT id_deskripsi FROM mobil_deskripsi
               WHERE id_deskripsi='$_POST[id_deskripsi]'"));
// Kalau username sudah ada yang pakai
if ($cek_konsumen > 0){
echo header('location:../index.php?p=data_siswa&msg=ada');
}
// Kalau username valid, inputkan data ke tabel users
else{
	
	$sql="INSERT INTO `mobil_deskripsi`(
	`id_mobil`,
	
	`mobil`,
	
	`deskripsi`)
	VALUES 
('$_POST[id_mobil]','$_POST[mobil]','$_POST[deskripsi]')";
	mysql_query($sql) or die("Gagal Menyimpan");
echo header('location:../index.php?p=post_mobil&msg=success');

}	
?>














