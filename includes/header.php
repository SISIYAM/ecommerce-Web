<?php
//Auto Log Out Code
session_start();
session_regenerate_id();
if(!isset($_SESSION['id'])){
?>
<script>
  location.replace("user_registration.php");
</script>
<?php
}
include 'includes/auto.php';
// End Auto Log Out Code
include 'Admin_panel/production/dbcon.php';


$user_id= $_SESSION['id']; 
$name = $_SESSION['username'];


      // Wish list count           
                $wish_query = "SELECT w_id FROM  `wishlist` WHERE user_id=$user_id ORDER BY w_id";  
                $wish_query_run = mysqli_query($con, $wish_query);
                $wish_row = mysqli_num_rows($wish_query_run);
                

          // Cart Count      
                $cart_query = "SELECT c_id FROM  `cart` WHERE user_id=$user_id ORDER BY c_id";  
                $cart_query_run = mysqli_query($con, $cart_query);
                $cart_row = mysqli_num_rows($cart_query_run);

        //Sum Cart Price
        $sum=0;
        $s_charge =0;
        $sum_query = "SELECT * FROM  `cart` WHERE user_id=$user_id";  
        $sum_query_run = mysqli_query($con, $sum_query);
        $sum_row = mysqli_num_rows($sum_query_run);

        while($sum_result= mysqli_fetch_array($sum_query_run))
        {
            ?>
           <?php 
           $s_charge = $s_charge + $sum_result['shipping_charge'];
           $sum = $sum + ($sum_result['quantity']*$sum_result['product_price']);
           ?>
           
            <?php
        }
               
            ?>