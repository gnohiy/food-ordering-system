<?php include('partial_backend/navbar.php'); ?>

<!--main content section-->
<br /><br /><br /><br />
	<div class="main-content" style="background-color:white">
		<div class="container">
			<h1>Category Page</h1>
		</div>

		<div class="container">
			<a href="<?php echo HOMEURL;?>admin/addCategory.php" class="btn-addAdmin" style="width:18%"><i class="fa fa-plus"></i> Add Category</a>
		</div>

		<div class="container">
			<?php
				echo "<div class='popup' style='padding-right:13%'>";
				if(isset($_SESSION['remove']))
				{
					echo $_SESSION['remove'];
					unset($_SESSION['remove']);
				}

				if(isset($_SESSION['delete']))
				{
					echo "<i class='fa fa-trash fa-2x' style='color: red'>";
					echo $_SESSION['delete'];
					echo "</i>";
					unset($_SESSION['delete']);
				}

				if(isset($_SESSION['no-category-found']))
				{
					echo "<i class='fa fa-exclamation-triangle fa-2x' style='color: red'>";
					echo $_SESSION['no-category-found'];
					echo "</i>";
					unset($_SESSION['no-category-found']);
				}

				if(isset($_SESSION['addCategory']))
				{
					echo "<i class='fa fa-check fa-2x' style='color: green'>";
					echo $_SESSION['addCategory'];
					echo "</i> ";
					unset($_SESSION['addCategory']);
				}

				if(isset($_SESSION['upload']))
				{
					echo "<i class='fa fa-check  fa-2x' style='color: green'>";
					echo $_SESSION['upload'];
					echo "</i>";
					unset($_SESSION['upload']);
				}

				if(isset($_SESSION['update-category']))
				{
					echo "<i class='fa fa-check  fa-2x' style='color: green'>";
					echo $_SESSION['update-category'];
					echo "</i>";
					unset($_SESSION['update-category']);
				}

				if(isset($_SESSION['remove-failed']))
				{
					echo "<i class='fa fa-exclamation-triangle fa-2x' style='color: red'>";
					echo $_SESSION['remove-failed'];
					echo "</i>";
					unset($_SESSION['remove-failed']);
				}
				echo "</div>";
			?>
		</div>

		<div class="display_food">
		<table>
			<thead>
				<th>NO</th> <!--table header-->
				<th>TITLE</th>
				<th>CATEGORY IMAGE</th>
				<th>ACTIONS</th>
			</thead>
			<tbody>
			<?php
				$sql="SELECT * FROM category";

				$res=mysqli_query($conn,$sql);

				$count=mysqli_num_rows($res);

				$sn=1;

				if($count>0)
				{
					while($row=mysqli_fetch_assoc($res))
					{
						$id = $row['id'];
						$title = $row['title'];
						$image_name = $row['imgName'];

						?>
							<tr>
								<td><?php echo $sn++;?></td>
								<td><?php echo $title;?></td>

								<td>
									<?php
										//check whether image name is available
										if($image_name!="")
										{
											?>
											<img src="<?php echo HOMEURL;?>img/category/<?php echo $image_name?>" width="100px" height="100px">
											<?php
										}
										else
										{
											echo "<div style='color:red'>Image not added</div>";
										}
									?>
								</td>
								<td style="width:25%">
									<!--pass the variable to another php-->
									<a href="<?php echo HOMEURL;?>admin/updateCategory.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="update_button"> <i class="fas fa-edit"></i>Update</a>
									<a href=" <?php echo HOMEURL;?>admin/deleteCategory.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="del_button"><i class="fas fa-trash"></i> Delete</a>
								</td>
							</tr>
						<?php
					}
				}
				else
				{
					?>
					<tr>
						<td colspan="4">No Categories</td>
					</tr>
					<?php
				}
			?>
		</body>
		</html>
