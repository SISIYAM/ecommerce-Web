<?php
include '../Admin_panel/production/dbcon.php';

$id = $_GET['c_id'];

$deletequery = "DELETE FROM  cart  WHERE  c_id=$id";

$query = mysqli_query($con,$deletequery);



?>
        <script>
          location.replace("../home.php");
        </script> 
        <?php 


?>