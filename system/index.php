<?php
	session_start();
		if (empty($_SESSION['username']) AND
			empty($_SESSION['password'])){
		 	header('location:login.php');
			
			}
			else{
				if ($_SESSION['user']=='admin'){
					include 'view/head.php';
					include 'view/menu_admin.php';
					include 'view/footer.php';
					
				}else
				if ($_SESSION['user']=='Siswa'){
					include 'view/head.php';
					include 'view/menu_siswa.php';
					include 'view/footer.php';
				
				}else
				if ($_SESSION['user']=='Guru'){
					include 'view/head.php';
					include 'view/menu_guru.php';
					include 'view/footer.php';
				
				
				}else { echo "<script>alert('Anda Tidak Memiliki Akses'); window.location ='login.php'</script>"; }
			}

	
?>
