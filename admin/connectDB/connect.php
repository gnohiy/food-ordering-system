<?php
	session_start();

	//define() is usedd to create constant, to replace the
	//specific name with customized name we create
	define('HOMEURL','http://localhost/foodordering/');
	define('LHOST','localhost');
	define('DB_UNAME','root');
	define('DB_PWD','');
	define('DB_NAME','food_order');

	//save data in Database
	$conn = mysqli_connect(LHOST,DB_UNAME,DB_PWD) or die(mysqli_error());
	$db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());
?>
