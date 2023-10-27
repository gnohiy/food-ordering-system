<?php include('partial_backend/navbar.php'); ?>

<html>
<head>
<title>Satu Malaysia Food Ordering System - Admin Page</title>
<link rel="stylesheet" href="../css/admin.css">
</head>

<!--main content section-->
<body>

<br /><br /><br /><br />
	<div class="main-content">
		<div class="container" style="background:white">
			<h1>Dashboard<h1>
			<br/>

			 <div class>
				<?php
				if(isset($_SESSION['login']))
				{
					//!!!HERE NEED TO CHANGE ICON
					echo $_SESSION['login'];
					echo "</i>";
					unset($_SESSION['login']);
				}
				?>
			</div>


		<!-- categories display -->
		<section class="categories">
			<div class="container_cat">

				<a href="<?php echo HOMEURL;?>admin/category.php" style="color:black">
				<div class="col-4" style="text-align:center; font-size: 20px">
					<?php
						$sql="SELECT * FROM category";
						$res=mysqli_query($conn,$sql);
						$count=mysqli_num_rows($res);

					?>
					<h2><?php echo $count;?></h2>
					<br />
					<p2><i class='fas fa-newspaper' style='color: black'></i> Categories</p2>
				</div>
				</a>

				<a href="<?php echo HOMEURL;?>admin/food.php" style="color:black">
				<div class="col-4" style="text-align:center; font-size: 20px">
					<?php
						$sql2="SELECT * FROM food";
						$res2=mysqli_query($conn,$sql2);
						$count2=mysqli_num_rows($res2);

					?>
					<h2><?php echo $count2;?></h2>
					<br />
					<p2><i class='fas fa-boxes' style='color: black'></i> Products</p2>
				</div>
				</a>

				<a href="<?php echo HOMEURL;?>admin/order.php" style="color:black">
				<div class="col-4" style="text-align:center; font-size: 20px">
					<?php
						$sql3="SELECT * FROM `order`";
						$res3=mysqli_query($conn,$sql3);
						$count3=mysqli_num_rows($res3);

					?>
					<h2><?php echo $count3;?></h2>
					<br />
					<p2><i class='fas fa-clipboard-list' style='color: black'></i> Total Orders</p2>
				</div>
				</a>

			</div>
		</section>
    </body>
		</div>
	</div>

</body>
</html>
