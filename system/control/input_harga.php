<?php
	 include "../config/config.php";
// Cek username di database
$cek_konsumen=mysql_num_rows(mysql_query
             ("SELECT id_harga FROM harga
               WHERE id_harga='$_POST[id_harga]'"));
// Kalau username sudah ada yang pakai
if ($cek_konsumen > 0){
echo header('location:../index.php?p=post_mobil&msg=ada');
}
// Kalau username valid, inputkan data ke tabel users
else{
	
	$sql="INSERT INTO `harga`(
	`id_mobil`,
	
	`mobil`,
	`type`,
	
	`harga`)
	VALUES 
('$_POST[id_mobil]','$_POST[mobil]','$_POST[type]','$_POST[harga]')";
	mysql_query($sql) or die("Gagal Menyimpan");
 header ("location:../index.php?p=harga&&id_mobil=$_POST[id_mobil]&msg=success");

}	
?>














