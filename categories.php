<?php
$conn = mysqli_connect('localhost','root','','food_order') or die('connection failed');
include('partial-front/menu.php');
?>

		<!-- navigation bar -->
		<section class="nav_bar">
			<div class="container">
				<label class="logo">FOOD CATEGORY</label>
				<ul>
					<li><a href="index.php"><i class='fa fa-home' style='color: white'></i> HOME</a></li>

					<?php
						$select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
						$row_count = mysqli_num_rows($select_rows);
					?>

					<li><a href="checkout.php" class="cart"><i class='fa fa-shopping-cart' style='color: white'></i>
						CART | <span><?php echo $row_count; ?></span></a></li>
					<li><a href="aboutus.php"><i class='fa fa-user' style='color: white'></i> ABOUT US</a></li>
				</ul>
		</section>

		<!-- categories display -->
		<section class="categories">
			<div class="container_cat">
			<?php
				$sql="SELECT * FROM category";
				$res=mysqli_query($conn,$sql);
				$count=mysqli_num_rows($res);

				if($count>0)
				{
					while($row=mysqli_fetch_assoc($res))
					{
						$id = $row['id'];
						$title=$row['title'];
						$image_name=$row['imgName'];

						?>
							<a href="menu.php?id=<?php echo $id;?>">
							<div class="box container_cat2">
								<?php
									if($image_name=="")
									{
										echo "Image not available";
									}
									else
									{
										?>
											<img src="<?php echo HOMEURL;?>img/category/<?php echo $image_name;?>" alt="Food" class="img">
										<?php
									}
								?>

								<h3 class="text_cat"><?php echo $title; ?></h3>
							</div>
							</a>
						<?php
					}
				}
			?>

			</div>
		</section>
	</body>
	</html>
