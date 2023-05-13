<?php
 session_start();
 session_destroy();
	 echo header('location:../login.php?msg=6');
?>
