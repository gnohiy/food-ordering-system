<?php include('partial_backend/navbar.php');?>

<head>
<title>Add Admin</title>
</head>
<body>
	<br /><br />

	<?php
		if(isset($_SESSION['add']))
			{
				echo $_SESSION['add'];
				unset($_SESSION['add']);
			}
	?>
	<br />
	<form action="" method="POST" class="add_food_form">
	<h3>Add Admin Form</h3>
	<input type="text" name="name" class="box" placeholder="FULL NAME: Samantha Brooke" required>
	<input type="text" name="uname" class="box" placeholder="USER NAME:Sbrooke" required>
	<input type="password" name="pwd" class="box" placeholder="PASSWORD" required>
	<input type="text" name="phone_num" class="box"placeholder="PHONE No:0123456789" required>
	<input type="text" name="ic_num" class="box" placeholder="IC No:000011110000" required>
	<input type="submit" name="submit" value="ADD ADMIN" class="add_button" style="width:100%">
	<input type="reset" value="CANCEL" id="close-edit" class="cancel_button">
	</form>
</body>

<?php
	//process the value from form and save in db
	//only after clicking submit button then submit the form
	if(isset($_POST['submit']))//check if the submit button is set/click
	{
		$name = $_POST['name'];
		$userName=$_POST['uname'];
		$password=md5($_POST['pwd']);//password encryption
		$phoneNumber = $_POST['phone_num'];
		$IcNumber=$_POST['ic_num'];
		//$picture=$_POST['picture'];

		//SQL queries
		$sql = "INSERT INTO admin SET
		admin_name='$name',
		userName='$userName',
		pwd='$password',
		phoneNumber='$phoneNumber',
		IcNumber='$IcNumber'
		";

		$res = mysqli_query($conn,$sql) or die(mysqli_error());//die() means stop the process


		//validation check
		if($res==TRUE)
		{
			$_SESSION['add'] = "Admin added successfully";
			header("location:".HOMEURL.'admin/admin.php');
		}
		else
		{
			$_SESSION['add'] = "Failed to add admin";
			header("location:".HOMEURL.'admin/addAdmin.php');
		}

	}
	else
	{
		echo "";
	}
?>

<script>
	document.querySelector('#close-edit').onclick = () =>{
	window.location.href = 'admin.php';
};
</script>
</body>
</html>
