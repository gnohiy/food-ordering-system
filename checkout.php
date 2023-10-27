<?php
$conn = mysqli_connect('localhost','root','','food_order') or die('connection failed');
include('partial-front/menu.php');

  if(isset($_POST['update_qty_btn']))
  {
     $update_value = $_POST['update_qty'];
     $update_id = $_POST['update_qty_id'];
     $update_qty_query = mysqli_query($conn, "UPDATE `cart`
       SET qty = '$update_value' WHERE id = '$update_id'");

     if($update_qty_query)
     {
        header('location:checkout.php');
     };
  };

    if(isset($_GET['remove']))
    {
       $remove_id = $_GET['remove'];
       mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
    };

    if(isset($_GET['delete_all']))
    {
       mysqli_query($conn, "DELETE FROM `cart`");
    }

?>
    <!-- navigation bar -->
    <section class="nav_bar">
      <div class="container">
        <label class="logo">MY CART</label>
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

		<!--cart list display-->
		<section id="cart_display" class="container my=5"> <!-- my = margin between margin from top and from bottom-->
			<table>
				<thead>
					<tr>
						<td>Remove</td>
						<td>Image</td>
						<td>Product</td>
						<td>Unit Price</td>
						<td>Quantity</td>
						<td>Total</td>
					</tr>
				</thead>

				<tbody>

      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
       ?>

					<tr>
            <td><a href="checkout.php?remove=<?php echo $fetch_cart['id']; ?>"
              onclick="return confirm('DO you confirm to remove the item from cart?')" class="del_button">delete
              </a></td>

						<td><img src="admin/upload_foodimg/<?php echo $fetch_cart['img_name']; ?>" height="100%" alt=""></td>
						<td><p><?php echo $fetch_cart['food_name']; ?></p></td>
						<td><p>RM <?php echo number_format($fetch_cart['price'],2); ?></p></td>

            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_qty_id"  value="<?php echo $fetch_cart['id']; ?>" >
                  <input type="number" name="update_qty" min="1"  value="<?php echo $fetch_cart['qty']; ?>" >
                  <input type="submit" value="update" name="update_qty_btn">
               </form>
            </td>
            <td><p>RM <?php echo $subtotal = number_format($fetch_cart['price'],2) * $fetch_cart['qty']; ?></p></td>
					</tr>
          <?php
            $total += $subtotal;
             };
          };
          ?>
          <td><a href="checkout.php?delete_all" onclick="return confirm('are you sure you want to delete all?');"
            class="del_button">delete all</a></td>
            <td><a href="categories.php" class="ctn_button" style="margin-top: 0;">continue ordering</a></td>
          <td colspan="3">Total Price</td>
          <td>RM <?php echo $total; ?></td>
      </tbody>
			</table>
		</section>

		<!-- checkout and calculate total -->
		<section id="cart_checkout" class="container"> <!--container used to have some space from left and right-->
			<div class="row">
				<div class="total col-lg-6 col-md-6 col-12">
					<h5>CART TOTAL</h5>
					<div class="details3">
						<h6>Total</h6>
						<p>RM <?php echo $total; ?></p>
					</div>
					<button><a href="confirm.php">CHECKOUT</a></button>
				</div>
			</div>
		</section>
  </body>
  </html>
