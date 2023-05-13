                <!--  Notif -->	
							  		<?php 
//kode php ini kita gunakan untuk menampilkan pesan eror
if (!empty($_GET['msg'])) {
	if ($_GET['msg'] == regsuccess) {
		echo '<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Register Berhasil Silakan Login</strong>.. !
</div>';
} else if ($_GET['msg'] == regemaail) {
		echo ' <div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Register Gagal Email sudah terdaftar</strong> ...!
</div>';
	} else if ($_GET['msg'] == login_gagal) {
		echo ' <div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Login Gagal</strong> ...!
</div>';
	} else if ($_GET['msg'] == keluar) {
		echo '<div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Anda Telah Keluar</strong> 
</div>';
	} else if ($_GET['msg'] == updateprofile) {
		echo '  <div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>ubah data User Berhasil</strong>
</div>';
} else if ($_GET['msg'] == simpan) {
		echo '  <div class="alert alert-info" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Data Tersimpan</strong>.. !
</div>';
	} else if ($_GET['msg'] == update) {
		echo '  <div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Data DIupdate</strong>.. !
</div>';
} else if ($_GET['msg'] == gagal) {
		echo '  <div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Gagal disimpan</strong> 
</div>';
} else if ($_GET['msg'] == hapus) {
		echo '  <div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>data dihapus</strong>.. !
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