<?php
$conn = mysqli_connect('localhost','root','','food_order') or die('connection failed');
include('partial-front/menu.php');
?>

    <!-- navigation bar -->
    <section class="nav_bar">
      <div class="container">
        <label class="logo">ABOUT US</label>
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

      <div class="about_us">
        <h1>About Us</h1>

        <div class="image">
          <img src="img/au.jpg" alt="Malaysia cuisine">
        </div>

        <div class="content">
          <h2>Mission</h2>
          <p>To create an environment where absolute guest satisfaction is
            our highest priority.</p>
          <h2>Vission</h2>
          <p>Through a shared commitment to excellence, we are dedicated to the
            uncompromising quality of our food, service, people and profit,
            while taking exceptional care of our guests and staff. We will
            continuously strive to surpass our own accomplishments and be
            recognized as a leader in our industry.</p>
        </div>
    </body>
</html>
