<?php include('connectDB/connect.php');?>

<?php

$conn = mysqli_connect('localhost','root','','food_order') or die('connection failed');

if(isset($_GET['delete']))
{
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `food` WHERE id = $delete_id ") or die('query failed');

   if($delete_query)
   {
    //  header('location:food.php');
      $message[] = 'Food has been deleted.';
   }
   else
   {
    //  header('location:food.php');
      $message[] = 'Food is failed to deleted.';
   };
};

if(isset($_POST['update_food'])){
   $update_f_id = $_POST['update_f_id'];
   $update_f_name = $_POST['update_f_name'];
   $update_f_price = $_POST['update_f_price'];
   $update_f_image = $_FILES['update_f_image']['name'];
   $update_f_image_tmp_name = $_FILES['update_f_image']['tmp_name'];
   $update_f_image_folder = 'upload_foodimg/'.$update_f_image;

   $update_query = mysqli_query($conn, "UPDATE `food` SET food_name = '$update_f_name',
     price = '$update_f_price', img_name = '$update_f_image' WHERE id = '$update_f_id'");

   if($update_query)
   {
      move_uploaded_file($update_f_image_tmp_name, $update_f_image_folder);
    //  header('location:food.php');
      $message[] = 'Food updated successfully';
   }
   else
   {
    //  header('location:food.php');
      $message[] = 'Food updated unsuccessfully';
   }

}

?>

<?php include('partial_backend/navbar.php'); ?>

    <!-- display added food -->
    <section class="display_food">
       <table>
          <thead>
            <th>FOOD NAME</th>
            <th>FOOD PRICE</th>
            <th>FOOD IMAGE</th>
            <th>ACTIONS</th>
          </thead>
          <tbody>
             <?php
                $select_products = mysqli_query($conn, "SELECT * FROM `food`");
                if(mysqli_num_rows($select_products) > 0){
                   while($row = mysqli_fetch_assoc($select_products)){
             ?>

                     <tr>
                        <td><?php echo $row['food_name']; ?></td>
                        <td>RM <?php echo $row['price']; ?></td>
                        <td><img src="upload_foodimg/<?php echo $row['img_name']; ?>" height="100" alt=""></td>
                        <td>
                           <a href="food.php?delete=<?php echo $row['id']; ?>" class="del_button"
                             onclick="return confirm('Are your sure you want to delete this item?');"> <i class="fas fa-trash"></i> delete</a>
                           <a href="food.php?update=<?php echo $row['id']; ?>" class="update_button"> <i class="fas fa-edit"></i> update</a>
                           <a href="add_food.php" class="button"> <i class="fa fa-plus"></i> add a new product</a>
                        </td>
                     </tr>
                     <?php
                  };
              }
              else
              {
                   echo "<div class='empty'>No food added.</div>";
              };
             ?>
          </tbody>
       </table>
    </section>

  </section>

  <!-- update function: edit previous added food -->
  <section class="edit-form-container">
   <?php
     if(isset($_GET['update']))
     {
        $edit_id = $_GET['update'];
        $edit_query = mysqli_query($conn, "SELECT * FROM `food` WHERE id = $edit_id");
        if(mysqli_num_rows($edit_query) > 0){
           while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>
             <form action="" method="post" enctype="multipart/form-data">
                <img src="upload_foodimg/<?php echo $fetch_edit['img_name']; ?>" height="200" alt="">
                <input type="hidden" name="update_f_id" value="<?php echo $fetch_edit['id']; ?>">
                <input type="text" class="box" required name="update_f_name" value="<?php echo $fetch_edit['food_name']; ?>">
                <input type="number" min="0" class="box" required name="update_f_price" value="<?php echo $fetch_edit['price']; ?>">
                <input type="file" class="box" required name="update_f_image" accept="image/png, image/jpg, image/jpeg">
                <input type="submit" value="UPDATE FOOD" name="update_food" class="add_button">
                <input type="reset" value="CANCEL" id="close-edit" class="update_button">
             </form>

   <?php
          };
        };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>

   </section>
   </div>

   <!-- for cancel button: close the pop-up window -->
   <script>
      document.querySelector('#close-edit').onclick = () =>{
      document.querySelector('.edit-form-container').style.display = 'none';
      window.location.href = 'product.php';
   };
   </script>
