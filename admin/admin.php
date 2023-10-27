<?php include('partial_backend/navbar.php'); ?>
<br /><br /><br /><br />
<!--main content section-->
	<div class="main-content" style="background-color:white">
		<div class="container">
			<h1>Welcome to Admin Page</h1>
		</div>

		<div class="container">
		<a href="addAdmin.php" class="btn-addAdmin" style="width:18%"><i class="fa fa-plus"></i> Add Admin</a>
		</div>

		<div class="container">
		<?php
			echo "<div class='popup' style='padding-right:13%'>";
			//addAdmin.php
			if(isset($_SESSION['add']))
			{
				echo "<i class='fa fa-check fa-2x' style='color: green'>";
				echo $_SESSION['add'];
				echo "</i> ";
				unset($_SESSION['add']);//message is gone after clicking refresh
			}
			if(isset($_SESSION['delete']))
			{
				echo "<i class='fa fa-trash fa-2x' style='color: red'>";
				echo $_SESSION['delete'];
				echo "</i>";
				unset($_SESSION['delete']);
			}
			if(isset($_SESSION['update']))
			{
				echo "<i class='fa fa-upload fa-2x' style='color: green'>";
				echo $_SESSION['update'];
				echo "</i>";
				unset($_SESSION['update']);
			}
			//addAdmin.php
			if(isset($_SESSION['Admin_not_found']))
			{
				//!!!HERE NEED TO CHANGE ICON
				echo "<i class='fa fa-exclamation-triangle fa-2x' style='color: red'>";
				echo $_SESSION['Admin_not_found'];
				echo "</i>";
				unset($_SESSION['Admin_not_found']);
			}
			//updatePwd.php
			if(isset($_SESSION['Password_not_match']))
			{
				//!!!HERE NEED TO CHANGE ICON
				echo "<i class='fa fa-exclamation-triangle fa-2x' style='color: red'>";
				echo $_SESSION['Password_not_match'];
				echo "</i>";
				unset($_SESSION['Password_not_match']);
			}
			if(isset($_SESSION['update_pwd']))
			{
				//!!!HERE NEED TO CHANGE ICON
				echo "<i class='fa fa-check fa-2x' style='color: green'>";
				echo $_SESSION['update_pwd'];
				echo "</i>";
				unset($_SESSION['update_pwd']);
			}
			if(isset($_SESSION['update_pwd_failed']))
			{
				//!!!HERE NEED TO CHANGE ICON
				echo "<i class='fa fa-exclamation-triangle fa-2x' style='color: red'>";
				echo $_SESSION['update_pwd_failed'];
				echo "</i>";
				unset($_SESSION['update_pwd_failed']);
			}

			echo "</div>";
		?>
		</div>

		<div class="display_food">
		<table>
          <thead>
            <th>NO</th>
            <th>NAME</th>
            <th>USER NAME</th>
            <th>PHONE NO</th>
			<th>IC NO</th>
			<th>ACTIONS</th>
          </thead>
		  <tbody>

			<!--Display database-->
			<?php
				$sql = "SELECT * FROM admin";
				$res = mysqli_query($conn,$sql);

				$sn=1;//

				//validation check
				if($res==TRUE)
				{
					$row_count=mysqli_num_rows($res);//function to check num of rows that have data
					if($row_count>0)
					{
						//display rows
						while($row=mysqli_fetch_assoc($res))
						{
							$id=$row['id'];
							$admin_name=$row['admin_name'];
							$username=$row['username'];
							$pwd=$row['pwd'];
							$phoneNumber=$row['phoneNumber'];
							$IcNumber=$row['IcNumber'];

				?> <!--break the php

							//Display the values in db-->
							<tr>
								<td><?php echo$sn++?></td>
								<td><?php echo$admin_name?></td>
								<td><?php echo$username?></td>
								<td><?php echo$phoneNumber?></td>
								<td><?php echo$IcNumber?></td>
								<!--<td><img src="yhphoto/<php echo $rows['images'];?><BR>"></td>
				havent done this yet, put it as link & when click only open the photo
				using pop up window-->

								<td>
								<a href="<?php echo HOMEURL;?>admin/updatePwd.php?id=<?php echo $id?>" class="change_button" style="font-size:15px"> <i class="fas fa-edit"></i>Change Password</a>
								<a href="<?php echo HOMEURL;?>admin/updateAdmin.php?id=<?php echo $id?>" class="update_button"> <i class="fas fa-edit"></i>Edit Profile</a>
								<a href="<?php echo HOMEURL;?>admin/deleteAdmin.php?id=<?php echo $id?>" class="del_button"><i class="fas fa-trash"></i> Delete Admin</a>
								<!--?id= pass the id to deleteAdmin.php-->
								</td>

							</tr>
							<?php //start the php again
						}

					}
					else
					{
						//display no data in database
					}
				}
				else
				{
				}
			?>
			</tbody>
			</table>


	</div>
	</div>
</body>
</html>
