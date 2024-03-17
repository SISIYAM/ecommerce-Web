<?php
include '../Admin_panel/production/dbcon.php';

if(isset($_POST['delete_btn'])){
  
$id = $_POST['delete_id'];

$deletequery = "DELETE FROM cart WHERE  c_id=$id";

$query = mysqli_query($con,$deletequery);


?>
<script>
  location.replace("../shopping_cart.php");
</script> 
<?php
}else{

  ?>
  <script>
    alert("Failed");
  </script>
  <?php
}




?>