<?php include('connectDB/connect.php');?>
<html>
	<head>
		<title>Login page - Satu Malaysia</title>
		<link rel="stylesheet" href="../css/admin.css">
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>

	</head>
	<br><br>
	<body>
		<div class="container">
			<div class>
			<?php


			if(isset($_SESSION['login']))
			{
				echo $_SESSION['login'];
				unset($_SESSION['login']);
			}

			echo "<div class='popup' style='font-size:15px; padding-left:40%'>";
			if(isset($_SESSION['no-login-message']))
			{
				echo $_SESSION['no-login-message'];
				unset ($_SESSION['no-login-message']);
			}
			echo "</div>";
			?>
			</div>

			<form action="" method="POST" class="add_food_form">
			<h3>Login</h3>
			<p style="font-size:2em;text-align:center">Username:</p><br>
			<input type="text" name="username"class="box"><br><br>

			<p style="font-size:2em;text-align:center">Password:</p><br>
			<input type="password" name="password" class="box"><br><br>

			<input type="submit" name="submit" value="Login" class="login_button">

			<br><br>
			</form>
		</div>
	</body>
</html>

<?php
	if(isset($_POST['submit']))
	{
		$username=$_POST['username'];
		$pwd=md5($_POST['password']);

		//sql validation check
		$sql="SELECT * FROM admin WHERE username='$username' AND pwd='$pwd'";
		$res=mysqli_query($conn,$sql);

		$count = mysqli_num_rows($res);

		if($count==1)
		{
			$_SESSION['login']="<div class='popup' style='font-size:25px'><i class='fa fa-upload' style='color: green'>Welcome $username</i></div>";

			//to make sure user does not passby the login page, added this isset(session) in navbar.php
			$_SESSION['user'] = $username;

			header('location:'.HOMEURL.'admin/');
		}
		else
		{
			$_SESSION['login']="<div class='center'><i class='fa fa-upload' style='color: red; padding-left:5%'> Username or password does not match</i></div>";
			header('location:'.HOMEURL.'admin/login.php');
		}
	}
?>
</body>
</html>
