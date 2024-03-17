<?php 

session_start();
include '../Admin_panel/production/dbcon.php';
?>

<?php
$user_id= $_SESSION['id'];

date_default_timezone_set('Asia/dhaka');
$last_logout = date('Y-m-d H:i:s');

$q ="UPDATE user SET last_logout = '{$last_logout}' WHERE id = {$user_id}";
$querry = mysqli_query($con,$q);

if($querry){
   

   
  session_destroy();
  
  ?>
  <script>
            location.replace("../user_registration.php");
          </script> 
          <?php 
  
  
          
  
    }

?>