<?php

	//include('partial_backend/navbar.php');
	include('connectDB/connect.php');

	if(isset($_GET['id'])&& isset($_GET['image_name']))
	{
		//echo "Get value & delete";
		$id = $_GET['id'];
		$image_name=$_GET['image_name'];

		if($image_name !="")
		{
			//get the path of the image
			$path="../img/category/".$image_name;
			//remove the image
			$remove=unlink($path);

			if($remove==false)//fail to remove
			{
				$_SESSION['remove']="Failed to remove image";
				header('location:'.HOMEURL.'admin/category.php');
				//stop the process
				die();
			}

			$sql="delete FROM category WHERE id=$id";
			$res=mysqli_query($conn,$sql);
			if($res==true)
			{
				$_SESSION['delete']="Category deleted successfully";
				header('location:'.HOMEURL.'admin/category.php');
			}
			else
			{
				$_SESSION['delete']="Failed to delelte category";
				header('location:'.HOMEURL.'admin/category.php');
			}
		}
		else//if image is empty
		{
			$sql="delete FROM category WHERE id=$id";
			$res=mysqli_query($conn,$sql);
			if($res==true)
			{
				$_SESSION['delete']="Category deleted successfully";
				header('location:'.HOMEURL.'admin/category.php');
			}
			else
			{
				$_SESSION['delete']="Failed to delelte category";
				header('location:'.HOMEURL.'admin/category.php');
			}
		}
	}
	else
	{
		header('location:'.HOMEURL.'admin/category.php');
	}

?>
