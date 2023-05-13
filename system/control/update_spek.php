<?php
	include "../config/config.php";
	
		$sql="UPDATE `mobil_spek` SET
		`id_mobil` = '$_POST[id_mobil]',
		`mobil` = '$_POST[mobil]',
		`tipe` = '$_POST[tipe]',
		`kapasitas` = '$_POST[kapasitas]',
		`power` = '$_POST[power]',
		`torsi` = '$_POST[torsi]',
		`transmisi` = '$_POST[transmisi]',
		`body_size` = '$_POST[body_size]',
		`berat` = '$_POST[berat]',
		`turning` = '$_POST[turning]',
		`wheelbase` = '$_POST[wheelbase]',
		`ground` = '$_POST[ground]',
		`tangki` = '$_POST[tangki]',
		`suspensi_depan` = '$_POST[suspensi_depan]',
		`suspensi_belakang` = '$_POST[suspensi_belakang]',
		`ban` = '$_POST[ban]',
		`rem_depan` = '$_POST[rem_depan]',
	

		`rem_belakang` = '$_POST[rem_belakang]' WHERE `id_mobil` =
		'$_POST[id_mobil]';";
	
	mysql_query($sql) or die("Gagal Memperbaharui");
	//header ("location:../index.php?p=pengguna");
	echo header('location:../index.php?p=post_mobil&msg=update');
?>

