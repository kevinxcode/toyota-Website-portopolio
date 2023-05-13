<?php
include "../config/config.php";
$sql="DELETE FROM `mobil` WHERE `id_mobil` =
'$_GET[id_mobil]'";
mysql_query($sql) or die("Gagal Menghapus");
echo header('location:../index.php?p=post_mobil&msg=hapus');
?>