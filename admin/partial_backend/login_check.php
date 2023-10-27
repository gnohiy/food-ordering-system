
	<?php
		echo "<div class='popup' style='padding-right:35%'>";
		if(!isset($_SESSION['user']))//this session means user does not login the website using login.php
		{
			$_SESSION['no-login-message'] = "<i class='fa fa-exclamation-triangle fa-2x' style='color: red'></i>Please log in to access Admin Panel</i>";
			header('location:'.HOMEURL.'admin/login.php');
		}
		echo "</div>"
	?>