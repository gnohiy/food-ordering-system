<?php include('partial_backend/navbar.php'); ?>

<div class="container">
<br>
	<?php
		if (isset($_GET['id']))
		{
			$id=$_GET['id'];
		}
	?>
	<form action="" method="POST" class="add_food_form"><!--action is empty as we no need the link
	of form to update database-->
	<h3>Change Password</h3>
		<input type="password" name="old_pwd" class="box" placeholder="Current Password" required>
		<input type="password" name="new_pwd" class="box" placeholder="New Password"required>
		<input type="password" name="confirm_pwd" class="box" placeholder="Re-type Password" required>
		<input type="hidden" name = "id" value = "<?php echo $id;?>">
		<input type="submit" name="submit" value="CHANGE PASSWORD" class="add_button">
		<input type="reset" value="CANCEL" id="close-edit" class="cancel_button">

	</form>
</div>

<?php
	if(isset($_POST['submit']))
	{
		$id=$_POST['id'];
		$old_pwd=md5($_POST['old_pwd']);
		$new_pwd=md5($_POST['new_pwd']);
		$confirm_pwd=md5($_POST['confirm_pwd']);

		$sql = "SELECT * FROM admin WHERE id=$id AND pwd='$old_pwd'";
		//old+pwd ned '' because it is string while id in interface_exists

		$res=mysqli_query($conn,$sql);

		if($res==TRUE)
		{
			$count=mysqli_num_rows($res);
			if($count==1)
			{
				if($new_pwd==$confirm_pwd)
				{
					$update="UPDATE admin SET
					pwd='$new_pwd'
					WHERE id=$id";

					$res2=mysqli_query($conn,$update);

					if($res2==TRUE)
					{
						$_SESSION['update_pwd'] = "Password successfully updated";
						header("location:".HOMEURL.'admin/admin.php');
					}
					else
					{
						$_SESSION['update_pwd_failed'] = "Failed to update password";
						header("location:".HOMEURL.'admin/admin.php');
					}
				}
				else
				{
					$_SESSION['Password_not_match'] = "Password do not match";
					header("location:".HOMEURL.'admin/admin.php');
				}
			}
			else
			{
				$_SESSION['Admin_not_found'] = "Admin Not Found";
				header("location:".HOMEURL.'admin/admin.php');
			}
		}

	}

?>

<script>
	document.querySelector('#close-edit').onclick = () =>{
	window.location.href = 'admin.php';
};
</script>
</body>
</html>
