<?php
include "../config/config.php";
$sql="DELETE FROM `video` WHERE `id_video` =
'$_GET[id_video]'";
mysql_query($sql) or die("Gagal Menghapus");
echo header('location:../index.php?p=post_mobil&msg=hapus');
?>