<?php include('partial_backend/navbar.php'); ?>
<div class="main-content">
	<div class="container">

	</div>

	<div class="container">
		<?php
			if(isset($_GET['id']))
			{
				//echo "getting the data";
				$id = $_GET['id'];
				$sql= "SELECT * FROM category WHERE id=$id";
				$res = mysqli_query($conn,$sql);
				$count = mysqli_num_rows($res);
				if($count==1)
				{
					$row=mysqli_fetch_assoc($res);//get all data from db
					$title = $row['title'];
					$current_image = $row['imgName'];

				}
				else
				{
					$_SESSION['no-category-found']="Category not found";
					header('location:'.HOMEURL.'admin/category.php');
				}
			}
			else
			{
				header('location:'.HOMEURL.'admin/category.php');
			}
		?>

		<form action="" method="POST" class="add_food_form" enctype="multipart/form-data">
			<h3>Update Category</h3>
			<table>
				<tr>
					<td>Title:</td>
					<td>
						<input type="text" name="title" class="box" placeholder="<?php echo $title?>">
					</td>

				</tr>

				<tr>
					<td>Current Image:</td>
					<td>
						<?php
							if($current_image != "")
							{
								?>
								<img src="<?php echo HOMEURL; ?>img/category/<?php echo $current_image;?>" width="35%">
								<?php
							}
							else
							{
								echo "Image not added";
							}
						?>
					</td>
				</tr>

				<tr>
					<td>New Image:</td>
					<td>
						<input type="file" name="image">
					</td>
				</tr>

				<tr>
					<td colspan="2">
						<input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="submit" name="submit" value="UPDATE CATEGORY" class="add_button">
						<input type="reset" value="CANCEL" id="close-edit" class="cancel_button">
					</td>
				</tr>
			</table>
		</form>

		<?php
			if(isset($_POST['submit']))
			{
				$id=$_POST['id'];
				$title=$_POST['title'];
				$current_image=$_POST['current_image'];

				//check if there are image selected
				if(isset($_FILES['image']['name']))
				{
					//need image name& source path &destination path to upload image
					$image_name = $_FILES['image']['name'];

					//only upload image if it is available
					if($image_name != "")
					{

						//get the extension of the image
						$extention = end(explode('.',$image_name));

						//Rename image to Food_Category_001.extension
						$image_name = "Food_Category_".rand(000,999).'.'.$extention;

						$source_path = $_FILES['image']['tmp_name'];
						$destination_path = "../img/category/".$image_name;

						//upload image
						$upload=move_uploaded_file($source_path,$destination_path);

						//check whther image is uploadded or not
						//stop process & redirect if img not uploaded
						if($upload==false)
						{
							$_SESSION['upload']="failed to upload image";
							header('location'.HOMEURL.'admin/category.php');

							//do not upload to db
							die();
						}

						//remove current image
						if($current_image!="")
						{
							$remove_path= "../img/category/".$current_image;
							$remove=unlink($remove_path);
								if($remove==false)
								{
									$_SESSION['remove-failed'] = "Unable to remove image";
									header('location:'.HOMEURL.'admin/category.php');
									die();
								}
						}
					}
					else
					{
						$image_name=$current_image;
					}
				}
				else
				{
					$image_name=$current_image;
				}

				$sql2 = "UPDATE category SET
						title = '$title',
						imgName= '$image_name'
						WHERE id=$id";

				$res2=mysqli_query($conn,$sql2);

				if($res2==true)
				{
					$_SESSION['update-category']="Category updated successfully";
					header('location:'.HOMEURL.'admin/category.php');
				}
				else
				{
					$_SESSION['update-category']="Failed to update category";
					header('location:'.HOMEURL.'admin/category.php');
				}
			}
		?>
	</div>
</div>

<script>
	document.querySelector('#close-edit').onclick = () =>{
	window.location.href = 'category.php';
};
</script>

</body>
</html>
