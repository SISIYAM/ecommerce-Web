<?php
include 'dbcon.php';

//coupon delete
if(isset($_POST['coupon_delete_btn'])){
  $coupon_id = $_POST['delete_id'];

  $delete = mysqli_query($con,"DELETE FROM cupon WHERE cupon_id='$coupon_id'");
  if($delete){
    $_SESSION['error'] = "Deleted Successfully!";
    ?>
     <script>
      location.replace("list.php?coupon-code");
     </script>
    <?php
  }else{
    ?>
    <script>
      alert("Failed");
    </script>
    <?php
  }
}

//Product Delete
if(isset($_POST['product_delete_btn'])){
  $product_id = $_POST['delete_id'];
  $image = $_POST['image'];
  $image_1 = $_POST['image_1'];
  $image_2 = $_POST['image_2'];
  $image_3 = $_POST['image_3'];
  $image_4 = $_POST['image_4'];

  $delete = mysqli_query($con,"DELETE FROM products WHERE id='$product_id'");
  if($delete){
    $_SESSION['error'] = "Deleted Successfully!";
    
    #Start unlink image code

    if($image != ""){
      unlink($image);
    }
    if($image_1 != ""){
      unlink($image_1);
    }
    if($image_2 != ""){
      unlink($image_2);
    }
    if($image_3 != ""){
      unlink($image_3);
    }
    if($image_4 != ""){
      unlink($image_4);
    }
    
    ?>
     <script>
      location.replace("list.php?products");
     </script>
    <?php
  }else{
    ?>
    <script>
      alert("Failed");
    </script>
    <?php
  }
}

//Category Delete

if(isset($_POST['category_delete_btn'])){
  $category_id = $_POST['delete_id'];
  
  // Select Category image for delete from folder also

  $categoryImage = mysqli_query($con, "SELECT * FROM category WHERE cat_id ='$category_id'");
  if(mysqli_num_rows($categoryImage) > 0){
    $imagePath = mysqli_fetch_array($categoryImage)['cat_image'];
  }

  $delete = mysqli_query($con,"DELETE FROM category WHERE cat_id ='$category_id'");
  if($delete){
    
    unlink($imagePath);


    ?>
     <script>
      alert("Deleted Successfully");
      location.replace("list.php?category");
     </script>
    <?php
  }else{
    ?>
    <script>
      alert("Failed");
    </script>
    <?php
  }
}


//SubCategory Delete

if(isset($_POST['subcategory_delete_btn'])){
  $s_id = $_POST['delete_id'];
   // Select SubCategory image for delete from folder also

   $SubcategoryImage = mysqli_query($con, "SELECT * FROM sub_category WHERE s_id ='$s_id'");
   if(mysqli_num_rows($SubcategoryImage) > 0){
     $imagePath = mysqli_fetch_array($SubcategoryImage)['image'];
   }

  $delete = mysqli_query($con,"DELETE FROM sub_category WHERE s_id ='$s_id'");
  if($delete){
    unlink($imagePath);
    ?>
     <script>
       alert("Deleted Successfully");
      location.replace("list.php?subcategory");
     </script>
    <?php
  }else{
    ?>
    <script>
      alert("Failed");
    </script>
    <?php
  }
}

// Delete Banner image

if(isset($_POST['deleteBanner'])){
  $id = $_POST['banner_id'];

  // select banner path
  $banner = mysqli_query($con, "SELECT * FROM banner WHERE id='$id'");
  if(mysqli_num_rows($banner) > 0){
    $bannerPath = mysqli_fetch_array($banner)['image'];
  }else{
    $bannerPath = NULL;
  }

  $delete_query = mysqli_query($con, "DELETE FROM banner WHERE id='$id'");
  if($delete_query){
    if($bannerPath != NULL){
      unlink($bannerPath);
    }
    $_SESSION['error'] = "Deleted successfully!";
    ?>
    <script>
      location.replace("list.php?Banner");
    </script>
    <?php
  }else{
    ?>
    <script>
      alert("Failed");
    </script>
    <?php
  }

}

?>