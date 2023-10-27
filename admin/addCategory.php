<?php include('partial_backend/navbar.php')?>

<br><br><br>
<div class="main-content">
	<div class="container">
		<form action="" method="POST" class="add_food_form" enctype="multipart/form-data">
			<h3>Add category</h3>
			<input type="text" name="title" placeholder="e.g: Food" class="box" required>
		   <input type="file" name="image" accept="image/png, image/jpg, image/jpeg" class="box" required>
			<input type="submit" value="ADD CATEGORY" name="submit" class="add_button">
			<input type="reset" value="CANCEL" id="close-edit" class="cancel_button">

		</form>

		<?php
			if(isset($_POST['submit']))
			{
				$title=$_POST['title'];

				//check whether image is selected or not
				//print_r($_FILES['image']); //$_FILE as the input type is file & name is image

				//die();//break the code
				if(isset($_FILES['image']['name']))//Array ( [name] => insider theft.jpg [full_path] => insider theft.jpg [type] => image/jpeg [tmp_name] => D:\xampp2\tmp\php8130.tmp [error] => 0 [size] => 6299 )
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
					}
				}
				else//dont upload image
				{
					$imageName="";
				}
				$sql="INSERT INTO category SET
					title='$title',
					imgName='$image_name'";


				$res=mysqli_query($conn,$sql);

				if($res==true)
				{
					$_SESSION['addCategory']="Category added successfully";
					header('location:'.HOMEURL.'admin/category.php');
				}
				else
				{
					$_SESSION['addCategory']="Failed to add category";
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
