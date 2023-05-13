<?php
include "../config/config.php";
$sql="DELETE FROM `mobil_deskripsi` WHERE `id_deskripsi` =
'$_GET[id_deskripsi]'";
mysql_query($sql) or die("Gagal Menghapus");
echo header('location:../index.php?p=post_mobil&msg=hapus');
?>