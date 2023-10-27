<?php

	include('connectDB/connect.php');
	//desroy the session_cache_expire
	session_destroy();

	//redirect to login page
	header('location:'.HOMEURL.'admin/login.php');
?>
