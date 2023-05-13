<?php

	$DB_HOST = 'localhost';
	$DB_USER = 'u2895797_db_toyota321';
	$DB_PASS = 'HG7tihdoiu237943jdsldjlasjYYUIIOI';
	$DB_NAME = 'u2895797_db_toyota';
	
	try{
		$DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
		$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
	
