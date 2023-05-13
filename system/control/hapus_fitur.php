<?php
include "../config/config.php";
$sql="DELETE FROM `fitur` WHERE `id_fitur` =
'$_GET[id_fitur]'";
mysql_query($sql) or die("Gagal Menghapus");
echo header('location:../index.php?p=post_mobil&msg=hapus');
?>