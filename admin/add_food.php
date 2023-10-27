<?php include('partial_backend/navbar.php');
$conn = mysqli_connect('localhost','root','','food_order') or die('connection failed');

if(isset($_POST['add_food']))
{
   $f_name = $_POST['f_name'];
   $f_price = $_POST['f_price'];
   $f_category=$_POST['f_category'];
    if(isset($_FILES['f_image']['name']))//Array ( [name] => insider theft.jpg [full_path] => insider theft.jpg [type] => image/jpeg [tmp_name] => D:\xampp2\tmp\php8130.tmp [error] => 0 [size] => 6299 )
	{
		//need image name& source path &destination path to upload image
		$image_name = $_FILES['f_image']['name'];

		//only upload image if it is available
		if($image_name != "")
		{

			//get the extension of the image
			$extention = end(explode('.',$image_name));

			//Rename image to Food_Category_001.extension
			$image_name = "Food_Category_".rand(000,999).'.'.$extention;

			$source_path = $_FILES['f_image']['tmp_name'];
			$destination_path = "upload_foodimg/".$image_name;

			//upload image
			$upload=move_uploaded_file($source_path,$destination_path);

			//check whther image is uploadded or not
			//stop process & redirect if img not uploaded
			if($upload==false)
			{
				$_SESSION['upload']="failed to upload image";
				header('location'.HOMEURL.'admin/food.php');

				//do not upload to db
				die();
			}
		}
	}
	else//dont upload image
	{
		echo "error";
	}


   $insert_query = mysqli_query($conn, "INSERT INTO `food`(food_name, price, img_name,category_id) VALUES
   ('$f_name', '$f_price', '$image_name','$f_category')") or die('query failed');

   if($insert_query==true)
   {
      $_SESSION['add'] = "Product added successfully";
		header("location:".HOMEURL.'admin/food.php');
   }
   else
   {
      $_SESSION['add'] = "Failed to add Product";
	header("location:".HOMEURL.'admin/add_food.php');
   }

};

?>
    <div class="container">
        <section>
        <form action="" method="post" class="add_food_form" enctype="multipart/form-data">
           <h3>ADD A NEW PRODUCT</h3>
           <input type="text" name="f_name" placeholder="e.g: Nasi Lemak" class="box" required>
           <input type="text" name="f_price" min="0" placeholder="e.g: 3.50" class="box" required>
           <select name="f_category" style="width:35%;height:30px;background-color:white;border:1px solid grey;margin-left:19px" required>
			<?php
				$sql2="SELECT * FROM category";
				$res2=mysqli_query($conn,$sql2);
				$count=mysqli_num_rows($res2);

				if($count>0)
				{
					while($row=mysqli_fetch_assoc($res2))
					{

						$id=$row['id'];
						$title=$row['title'];
						echo $title;
						?>
							<option value="<?php echo $id;?>"><?php echo $title;?></option>
						<?php
					}
				}
				else
				{
					?>
					<option value="0">No Category Found</option>
					<?php
				}
			?>
			</select>
		   <input type="file" name="f_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
			<input type="submit" value="ADD PRODUCT" name="add_food" class="add_button">
      <input type="reset" value="CANCEL" id="close-edit" class="cancel_button">
		</form>
        </section>
    </div>

</body>
</html>

<script>
	document.querySelector('#close-edit').onclick = () =>{
	window.location.href = 'food.php';
};
</script>
