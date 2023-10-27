<?php include('partial_backend/navbar.php'); ?>

<div class="container">
	<h1>Update Admin Page</h1>

	<br><br>

	<?php
	$id=$_GET['id'];
	$sql="SELECT * FROM admin WHERE id=$id";

	$res=mysqli_query($conn,$sql);

	if($res==TRUE)
	{
		$count = mysqli_num_rows($res);
		if($count==1)
		{
			$row=mysqli_fetch_assoc($res);
			$admin_name = $row['admin_name'];
			$username = $row['username'];
			$phoneNum = $row['phoneNumber'];
			$IcNum = $row['IcNumber'];
		}
		else
		{
			header('location:'.HOMEURL.'admin/admin.php');

		}
	}
	?>
	<form action="" method="POST" class="add_food_form"> <!--POST when have sentitive data-->
	<h3>Update Admin</h3>
	<input type="text" name="update_admin_name" class="box" placeholder="FULL NAME :<?php echo $admin_name;?>">
	<input type="text" name="update_username" class="box" placeholder="USER NAME :<?php echo $username;?>">
	<input type="text" name="update_phoneNum" class="box" placeholder="PHONE NO :<?php echo $phoneNum;?>">
	<input type="text" name="update_ICNum" class="box" placeholder="IC NO :<?php echo $IcNum;?>">
	<input type="hidden" name = "id" value = "<?php echo $id;?>">
	<input type="submit" value="SUBMIT" name="submit" class="add_button">
	<input type="reset" value="CANCEL" id="close-edit" class="cancel_button">
	</form>
</div>

<?php
	if(isset($_POST['submit']))
	{
		$id = $_POST['id'];
		$update_admin_name = $_POST['update_admin_name'];
		$update_username = $_POST['update_username'];
		$update_phoneNum = $_POST['update_phoneNum'];
		$update_IcNum = $_POST['update_ICNum'];

		$sql = "UPDATE `admin` SET `admin_name` = '$update_admin_name',
		`username`  = '$update_username',
		`phoneNumber` = '$update_phoneNum',
		`IcNumber`  = '$update_IcNum'
		WHERE `id` = '$id'";
		
		$res = mysqli_query($conn,$sql);

		if($res==TRUE)
		{
			$_SESSION['update'] = "Admin updated successfully";
			header("location:".HOMEURL.'admin/admin.php');
		}
		else
		{
			$_SESSION['update'] = "Failed to update";
			header("location:".HOMEURL.'admin/admin.php');
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
