<?php include('connectDB/connect.php')?>
<?php
	//get ID wish to be deleted
	$id=$_GET['id'];

	//SQL
	$sql="DELETE FROM admin WHERE id=$id";
	$res = mysqli_query($conn,$sql);


	//validation check
	if($res==TRUE)
	{
		$_SESSION['delete'] = "Admin successfully deleted.";
		header("location:".HOMEURL.'admin/admin.php');
	}
	else
	{
		$_SESSION['delete'] = "Failed to delete admin.";
		header("location:".HOMEURL.'admin/admin.php');
	}


?>
