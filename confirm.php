<?php
$conn = mysqli_connect('localhost','root','','food_order') or die('connection failed');
include('partial-front/menu.php');

if(isset($_POST['order_button'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $address = $_POST['address'];

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($f_item = mysqli_fetch_assoc($cart_query)){
         $f_name[] = $f_item['food_name'] .' ('. $f_item['qty'] .') ';
         $f_price = number_format($f_item['price'],2) * $f_item['qty'];
         $price_total += $f_price;
      };
   };

   $total_f = implode(', ',$f_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `order`(cus_name, cus_phone, cus_email, cus_add)
   VALUES('$name','$number','$email','$address')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order_container'>
      <div class='msg_container'>
         <h3>Thank you for your order.</h3>
         <div class='order_detail'>
            <span>".$total_f."</span>
            <span class='price_total'> total : RM".$price_total."</span>
         </div>
         <div class='cus_detail'>
            <p> Name : <span>".$name."</span> </p>
            <p> Phone number : <span>".$number."</span> </p>
            <p> Email : <span>".$email."</span> </p>
            <p> Address : <span>".$address."</span> </p>
         </div>
            <a href='index.php' class='ctn_button'>continue ordering</a>
         </div>
      </div>
      ";
   }

}

?>

    <!-- navigation bar -->
    <section class="nav_bar">
      <div class="container">
        <label class="logo">ORDER CONFIRM</label>
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

    <!-- order confirmation -->
            <div class="center">
                <div class="container3">
                    <form action="" method="post">
                      <p class="title_login1">order confirmation</p>

                      <div class="display_order">
                        <?php
                           $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
                           $total = 0;
                           $total2 = 0;
                           if(mysqli_num_rows($select_cart) > 0)
                           {
                              while($fetch_cart = mysqli_fetch_assoc($select_cart))
                              {
                                $total_price = number_format($fetch_cart['price'], 2) * $fetch_cart['qty'];
                                $total = $total2 += $total_price;
                        ?>
                        <span><?= $fetch_cart['food_name']; ?> (<?= $fetch_cart['qty']; ?>)</span>
                        <?php
                              }
                          }
                        else
                        {
                           echo "<div class='display_order'><span>Sorry, your cart is empty.</span></div>";
                        }
                        ?>
                        <span class="total"> Total : RM<?= $total; ?></span>
                     </div>

                     <div class="data">
                        <label>Name</label><input type="text" placeholder="Wong Yi Jun" name="name" required> <!-- must fill in -->
                      </div>
                      <div class="data">
                        <label>Phone Number</label><input type="text" placeholder="XXXXXXXXXXX" name="number" required>
                      </div>
                      <div class="data">
                        <label>Email</label><input type="text" placeholder="yijun@gmail.com" name="email" required>
                      </div>
                      <div class="data">
                        <label>Address</label><input type="text" placeholder="No 1, Jalan Durian, Taman Bunga" name="address" required>
                      </div>
                        <div class="inner"></div>
                        <input type="submit" value="PLACE ORDER" name="order_button" class="ctn_button">

                    </form>
                </div>
            </div>
    </body>
</html>
