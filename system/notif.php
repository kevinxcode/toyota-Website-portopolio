                <!--  Notif -->	
							  		<?php 
//kode php ini kita gunakan untuk menampilkan pesan eror
if (!empty($_GET['msg'])) {
	if ($_GET['msg'] == success) {
		echo '<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Data Disimpan</strong>.. !
</div>';
} else if ($_GET['msg'] == gagal) {
		echo ' <div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Data Gagal Disimpan</strong> ...!
</div>';
	} else if ($_GET['msg'] == hapus) {
		echo ' <div class="alert alert-warning" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Data DIhapus...</strong> ...!
</div>';
	} else if ($_GET['msg'] == update) {
		echo '<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Data Berhasil Diubah..</strong> 
</div>';
} else if ($_GET['msg'] == dibeli) {
		echo '<div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Buku sudah dibeli</strong> 
</div>';
	} else if ($_GET['msg'] == siswa) {
		echo '  <div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Pendaftaran User Berhasil</strong> Username dan Password ( Nomor NISN Siswa )
</div>';
} else if ($_GET['msg'] == ada) {
		echo '  <div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Data nis Siswa Sudah ada </strong>.. !
</div>';
} else if ($_GET['msg'] == ada2) {
		echo '  <div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Data peserta sudah ada di hasil seleksi</strong>.. !
</div>';
	} else if ($_GET['msg'] == ada_guru) {
		echo '  <div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Data Guru Sudah Terdaftar di user login</strong>.. !
</div>';
} else if ($_GET['msg'] == guru) {
		echo '  <div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Pendaftaran User Berhasil</strong> Username dan Password ( Nomor NIP Guru )
</div>';
} else if ($_GET['msg'] == usergagal) {
		echo '  <div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>username / password salah</strong>.. !
</div>';
} else if ($_GET['msg'] == 7) {
		echo '  <div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Profile Berhasil Dubah Silakan Login</strong>.. !
</div>';
	} else if ($_GET['msg'] == 8) {
		echo '  Reset Pasword Berhasil';
	}
	
}
?>

		 <!-- end Notif -->