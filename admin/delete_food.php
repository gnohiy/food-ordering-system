<?php
	include('partial_backend/navbar.php');
	//$conn = mysqli_connect('localhost','root','','food_order') or die('connection failed');

if(isset($_GET['delete']))
{
   $delete_id = $_GET['delete'];
   $sql="DELETE FROM food WHERE id = $delete_id ";
   $delete_query = mysqli_query($conn, $sql) or die('query failed');

   if($delete_query==TRUE)
   {
	   $_SESSION['delete_food'] = ' Product has been deleted.';
     header('location:'.HOMEURL.'admin/food.php');
   }
   else
   {
    $_SESSION['delete_food'] = ' Product has been deleted.';
     header('location:'.HOMEURL.'admin/food.php');
   };
}

?>
   </div>

   <!-- for cancel button: close the pop-up window -->
   <script>
      document.querySelector('#close-edit').onclick = () =>{
      document.querySelector('.edit-form-container').style.display = 'none';
      window.location.href = 'food.php';
   };
   </script>

 </body>
 </html>
