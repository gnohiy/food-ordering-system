<?php include('connectDB/connect.php')?>
<?php include('login_check.php')?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>Admin Page - MY Kopitiam Food Ordering System</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/admin.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    </head>
    <body>
        <!-- navigation bar -->
		<section class="nav_bar">
			<div class="container">
					<ul>
						<li><a href="index.php"><i class='fa fa-home' style='color: white'></i> HOME</a></li>
						<li><a href="admin.php"><i class='fa fa-user' style='color: white'></i> ADMIN</a></li>
						<li><a href="category.php"><i class='fas fa-newspaper' style='color: white'></i> CATEGORY</a></li>
						<li><a href="food.php"><i class='fas fa-boxes' style='color: white'></i> PRODUCT</a></li>
						<li><a href="order.php"><i class='fas fa-clipboard-list' style='color: white'></i> ORDER</a></li>
						<li><a href="logout.php"><i class='fa fa-power-off' style='color: white'></i> LOGOUT</a></li>
					</ul>
        </section>
