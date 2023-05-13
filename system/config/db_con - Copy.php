<?php

// konfigurasi database
$db_host = 'localhost';
$db_user = 'u2895797_db_toyota321';
$db_pass = 'HG7tihdoiu237943jdsldjlasjYYUIIOI';
$db_base = 'u2895797_db_toyota';

// koneksi database
@mysql_connect($db_host, $db_user, $db_pass) or die('Tidak terhubung ke MySQL : ' . mysql_error());
@mysql_select_db($db_base) or die('Tidak terhubung ke Database : ' . mysql_error());


?>
