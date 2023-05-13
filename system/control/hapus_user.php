<?php
include "../config/config.php";
$sql="DELETE FROM `tb_admin` WHERE `id_admin` =
'$_GET[id_admin]'";
mysql_query($sql) or die("Gagal Menghapus");
echo header('location:../index.php?p=user&msg=hapus');
?>