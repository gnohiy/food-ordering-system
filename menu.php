<?php

$conn = mysqli_connect('localhost','root','','food_order') or die('connection failed');
include('partial-front/menu.php');

if(isset($_POST['add_to_cart'])){

   $f_name = $_POST['f_name'];
   $f_price = $_POST['f_price'];
   $f_image = $_POST['f_image'];
   $f_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE food_name = '$f_name'");

   if(mysqli_num_rows($select_cart) > 0)
   {
      $message[] = 'Food already added to cart.';
   }
   else
   {
      $insert_food = mysqli_query($conn, "INSERT INTO `cart`(food_name, price, img_name, qty)
      VALUES('$f_name', '$f_price', '$f_image', '$f_quantity')");
      $message[] = 'Food added to cart successfully.';
   }

}

?>

<!-- navigation bar -->
<section class="nav_bar">
  <div class="container">
    <label class="logo">FOOD MENU</label>
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
<div class="container">
  <a href="categories.php" class="back_button"> <i class="fa fa-arrow-circle-left"></i> Back</a>
</div>
<div class="menu">

<?php
			if(isset($_GET['id']))
			{
				//echo "getting the data";
				$id = $_GET['id'];
				$sql= "SELECT * FROM food WHERE category_id=$id";
				$res = mysqli_query($conn,$sql);
				$count = mysqli_num_rows($res);
				if($count>0){

					while($fetch_food = mysqli_fetch_assoc($res))
					{
						?>
						<form action="" method="post">
						  <div class="food_items">
									<img src="admin/upload_foodimg/<?php echo $fetch_food['img_name']; ?>" alt="">
									<div class="details">
										<div class="details2">
											<h4><?php echo $fetch_food['food_name']; ?></h4>
											<h4 class="price">RM <?php echo $fetch_food['price']; ?></h4>
										</div>
        							  <input type="hidden" name="f_name" value="<?php echo $fetch_food['food_name']; ?>">
        							  <input type="hidden" name="f_price" value="<?php echo $fetch_food['price']; ?>">
        							  <input type="hidden" name="f_image" value="<?php echo $fetch_food['img_name']; ?>">
        							  <input type="submit" value="ADD TO CART" name="add_to_cart" class="cart_button">
									</div>
						  </div>
						</form>
					  <?php
					 };
				};
			}

		?>
    </div>
    </body>
</html>
