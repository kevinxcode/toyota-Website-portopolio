<?php
include "../config/config.php";
$sql="DELETE FROM `harga` WHERE `id_harga` =
'$_POST[id_harga]'";
mysql_query($sql) or die("Gagal Menghapus");
 header ("location:../index.php?p=harga&&id_mobil=$_POST[id_mobil]&msg=hapus");
?>