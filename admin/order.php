<?php include('partial_backend/navbar.php');?>

<div class="main-content" style="background-color:white">
<br><br><BR><BR>
<div class="container">
	<h1>Order Page</h1>
</div>
<div class="container">
<br><br>
</div>
		<div class="display_food">
			<table>
		<thead>
			 <tr>

			<th>NO</th>
			<th>NAME</th>
			<th>PHONE NO</th>
			<th>EMAIL</th>
			<th>ADDRESS</th>
			<th>STATUS</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i = 1;
			$sql="SELECT * FROM `order`";
			$res=mysqli_query($conn,$sql);
			if($res==TRUE)
				{
					$row_count=mysqli_num_rows($res);
					if($row_count>0)
						{
							while($row=mysqli_fetch_assoc($res))
							{
								$id = $row['id'];
								$name = $row['cus_name'];
								$phone = $row['cus_phone'];
								$email = $row['cus_email'];
								$address = $row['cus_add'];

			?>
									<tr>
										<td><?php echo $i++?></td>
										<td><?php echo $name?></td>
										<td><?php echo $phone?></td>
										<td><?php echo $email?></td>
										<td><?php echo $address?></td>
										<td>
								 			<button class="vieworder_button"><a href="viewOrder.php">View Order<a></button>
								 		</td>
									</tr>
								<?php
							}
						}
				}
			?>
		</tbody>
	</table>
	</div>

</div>
</body>
</html>
