<?php
	include "../config/config.php";
	if ($_POST['password']=='') {
		$sql="UPDATE `tb_admin` SET
		`username` = '$_POST[username]',
		`nama_admin` = '$_POST[nama_admin]',
		`email_admin` = '$_POST[email_admin]',
		
		`user` = '$_POST[user]' WHERE `id_admin` =
		'$_POST[id_admin]';";
	}else{
		$sql="UPDATE `tb_admin` SET
		`username` = '$_POST[username]',
		`nama_admin` = '$_POST[nama_admin]',
		`email_admin` = '$_POST[email_admin]',
		
		`password` = md5('$_POST[password]'),
		
		`user` = '$_POST[user]' WHERE `id_admin` =
		'$_POST[id_admin]';";
	}
	mysql_query($sql) or die("Gagal Memperbaharui");
	//header ("location:../index.php?p=pengguna");
	echo header('location:../index.php?p=profile&msg=update');
?>