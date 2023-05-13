<?php
	include "../config/config.php";
// Fungsi SQL Injection
	function antiinjection($data){
	 $filter_sql =
	mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars
	($data,ENT_QUOTES))));
	 return $filter_sql;
	}
	$username = antiinjection($_POST['username']);
	$password = antiinjection(md5($_POST['password']));
	$sql="SELECT * FROM tb_admin WHERE username='$username' AND password='$password' ";
	$tampil=mysql_query($sql);
	$jumlah=mysql_num_rows($tampil);
	$data=mysql_fetch_array($tampil);
	if ($jumlah > 0){
	 session_start();
	// Inisialisasi data pada session
	$_SESSION[username] = $data['username'];
	$_SESSION[password] = $data['password'];

	$_SESSION[email_admin] = $data['email_admin'];
	$_SESSION[nama_admin] = $data['nama_admin'];

	$_SESSION[id_admin] = $data['id_admin'];

	
	$_SESSION[user] = $data['user'];
	
	
	header('location:../index.php');
	}
	// Apabila login gagal
	else{
	 
	 echo header('location:../login.php?msg=usergagal');
	}
?>