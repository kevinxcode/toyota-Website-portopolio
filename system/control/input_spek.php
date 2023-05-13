<?php
	 include "../config/config.php";
// Cek username di database
$cek_konsumen=mysql_num_rows(mysql_query
             ("SELECT id_spek FROM mobil_spek
               WHERE id_spek='$_POST[id_spek]'"));
// Kalau username sudah ada yang pakai
if ($cek_konsumen > 0){
echo header('location:../index.php?p=post_mobil&error=4');
}
// Kalau username valid, inputkan data ke tabel users
else{
	
	//menyimpan ke table 
	$sql = "insert into mobil_spek
	(id_mobil,mobil,spek,kapasitas,power,torsi,transmisi,body_size,berat,turning,wheelbase,ground,tangki,suspensi_depan,suspensi_belakang,ban,rem_depan,rem_belakang) values 
	('{$_POST['id_mobil']}',
	'{$_POST['mobil']}',
	'{$_POST['spek']}',
    '{$_POST['kapasitas']}',
	'{$_POST['power']}',
	'{$_POST['torsi']}',
	'{$_POST['transmisi']}',
	'{$_POST['body_size']}',
	'{$_POST['berat']}',
	'{$_POST['turning']}',
	'{$_POST['wheelbase']}',
	'{$_POST['ground']}',
	'{$_POST['tangki']}',
	'{$_POST['suspensi_depan']}',
	'{$_POST['suspensi_belakang']}',
	'{$_POST['ban']}',
	'{$_POST['rem_depan']}',
	'{$_POST['rem_belakang']}')";
	mysql_query($sql) or die('<script type="text/javascript">
           window.location = "../index.php?p=post_mobil&error=3"
      </script>');
		
		echo header('location:../index.php?p=post_mobil&msg=success');
}
