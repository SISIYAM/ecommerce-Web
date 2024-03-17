<?php
include '../Admin_panel/production/dbcon.php';

$id = $_GET['w_id'];

$deletequery = "DELETE FROM  wishlist  WHERE  w_id=$id";

$query = mysqli_query($con,$deletequery);



?>
        <script>
          location.replace("../home.php");
        </script> 
        <?php 


?>