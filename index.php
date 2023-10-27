<?php
$conn = mysqli_connect('localhost','root','','food_order') or die('connection failed');
include('partial-front/menu.php');
?>

    <!-- navigation bar -->
    <section class="nav_bar">
      <div class="container">
        <label class="logo">MY Kopitiam</label>
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

    <h1>
        Welcome to <br><img src="img/food-delivery.png" height="50px" alt"kopitiam"> MY Kopitiam
    </h1>

    <img src = "img/backg3.jpg" alt"background image" id="slideImg">
    <div class="center">
      <button class="ordernow_button"> <a href="<?php echo HOMEURL; ?>categories.php"> Order Now</a></button>
    </div>
  </body>
  </html>
