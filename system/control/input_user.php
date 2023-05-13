<?php
	 include "../config/config.php";
// Cek username di database
$cek_konsumen=mysql_num_rows(mysql_query
             ("SELECT username FROM tb_admin
               WHERE username='$_POST[username]'"));
// Kalau username sudah ada yang pakai
if ($cek_konsumen > 0){
echo header('location:../index.php?p=user&msg=gagal');
}
// Kalau username valid, inputkan data ke tabel users
else{
	
	$sql="INSERT INTO `tb_admin`(
	`nama_admin`,
	`email_admin`,
	`username`,
	`password`,
	`user`)
	VALUES ('$_POST[nama_admin]','$_POST[email_admin]','$_POST[username]',md5('$_POST[password]'),'$_POST[user]')";
	mysql_query($sql) or die("Gagal Menyimpan");
echo header('location:../index.php?p=user&msg=success');

}	
?>