<?php

include 'dbcon.php';


// Set the new timezone
date_default_timezone_set('Asia/Kolkata');
$current_date = date('d-m-Y');

date_default_timezone_set('Asia/dhaka');
$current_time = date('h:i A');

$yearData = strtotime($current_date);
$date = date('d M Y', $yearData);



// Add Products


if (isset($_POST['add_product'])) {



  $name = $_POST['name'];
  $title = str_replace("'", "\'", $name);
  $description = $_POST['description'];
  $description_2 = str_replace("'", "\'", $description);
  $informatione = $_POST['information'];
  $information = str_replace("'", "\'", $informatione);

  $price = $_POST['price'];
  $shipping_charge = $_POST['shipping_charge'];
  $original_price = $_POST['original_price'];
  $categoryy = $_POST['category'];
  $category = str_replace("'", "\'", $categoryy);
  $sub_categoryy = $_POST['sub_category'];
  $sub_category = str_replace("'", "\'", $sub_categoryy);


  $author = $_SESSION['username'];


  $img = $_FILES['img']['name'];
  $img1 = $_FILES['img1']['name'];
  $img2 = $_FILES['img2']['name'];
  $img3 = $_FILES['img3']['name'];
  $img4 = $_FILES['img4']['name'];

  /** 
       renaming the image name with 
       with random string
      **/
  $new_img_name = uniqid('IMG-', true);
  $target_dir = "images/" . $new_img_name;

  // Condition For upload images
  if ($img == NULL) {
    $target_file = "";
  } else {
    $target_file = $target_dir . basename($img);
  }

  if ($img1 == NULL) {
    $target_file1 = "";
  } else {
    $target_file1 = $target_dir . basename($img1);
  }

  if ($img2 == NULL) {
    $target_file2 = "";
  } else {
    $target_file2 = $target_dir . basename($img2);
  }

  if ($img3 == NULL) {
    $target_file3 = "";
  } else {
    $target_file3 = $target_dir . basename($img3);
  }

  if ($img4 == NULL) {
    $target_file4 = "";
  } else {
    $target_file4 = $target_dir . basename($img4);
  }




  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
  $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
  $imageFileType3 = strtolower(pathinfo($target_file3, PATHINFO_EXTENSION));
  $imageFileType4 = strtolower(pathinfo($target_file4, PATHINFO_EXTENSION));

  $extension = substr($img, strlen($img) - 4, strlen($img));
  $extension1 = substr($img1, strlen($img1) - 4, strlen($img1));
  $extension2 = substr($img2, strlen($img2) - 4, strlen($img2));
  $extension3 = substr($img3, strlen($img3) - 4, strlen($img3));
  $extension4 = substr($img4, strlen($img4) - 4, strlen($img4));

  $allowed_extension = array(".jpg", ".png", ".jpeg", ".gif");


  $sql = "INSERT INTO `products`(`name`,`price`, `description`,`information`, `image`, `image_1`, `image_2`,`image_3`,`image_4`,`shipping_charge`, `author`,`added_at`,`original_price`, `category`, `sub_category`) 
VALUES ('$title','$price','$description_2','$information','$target_file','$target_file1','$target_file2','$target_file3','$target_file4','$shipping_charge','$author','$date','$original_price','$category','$sub_category')";
  $querry = mysqli_query($con, $sql);


  if ($querry) {


    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
    move_uploaded_file($_FILES["img1"]["tmp_name"], $target_file1);
    move_uploaded_file($_FILES["img2"]["tmp_name"], $target_file2);
    move_uploaded_file($_FILES["img3"]["tmp_name"], $target_file3);
    move_uploaded_file($_FILES["img4"]["tmp_name"], $target_file4);

    $_SESSION['message'] = "Product Added Successfully";

    ?>
<script>
location.replace("list.php?products");
</script>
<?php



  } else {
    ?>
<script>
alert("failed");
</script>
<?php
  }


}





//Add Category

if (isset($_POST['add_category'])) {



  $category_name = $_POST['category_name'];
  $img = $_FILES['img']['name'];

  /** 
           renaming the image name with 
           with random string
          **/
  $new_img_name = uniqid('IMG-', true);

  $target_dir = "images/Category/" . $new_img_name;

  if ($img == NULL) {
    $target_file = "";
  } else {
    $target_file = $target_dir . basename($img);
  }



  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


  $extension = substr($img, strlen($img) - 4, strlen($img));


  $allowed_extension = array(".jpg", ".png", ".jpeg", ".gif");
  $q = "INSERT INTO `category`(`cat_name`,`cat_image`) VALUES ('$category_name','$target_file')";
  $querry = mysqli_query($con, $q);

  if ($querry) {


    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);

    $_SESSION['message'] = "Added Successfully !";


    ?>
<script>
location.replace("list.php?category");
</script>
<?php


  } else {

    $_SESSION['error'] = "Something Went Wrong!";

    ?>
<script>
location.replace("add.php?add-category");
</script>
<?php
  }


}



//Add sub Category

if (isset($_POST['add_Sub_categoryBtn'])) {


  $s_name = $_POST['s_name'];
  $cat_id = $_POST['cat_id'];
  $image = $_FILES['image']['name'];

  /** 
         renaming the image name with 
         with random string
        **/
  $new_img_name = uniqid('IMG-', true);

  # crating upload path on root directory
  $target_dir = "images/Sub_Category/" . $new_img_name;

  if ($image == NULL) {
    $target_file = "";
  } else {
    $target_file = $target_dir . basename($image);
  }



  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


  $extension = substr($image, strlen($image) - 4, strlen($image));


  $allowed_extension = array(".jpg", ".png", ".jpeg", ".gif");
  $q = "INSERT INTO `sub_category`(`cat_id`, `s_name`, `image`) VALUES ('$cat_id','$s_name','$target_file')";
  $querry = mysqli_query($con, $q);

  if ($querry) {


    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $_SESSION['message'] = "Added Successfully!";
    ?>
<script>
location.replace("list.php?subcategory");
</script>
<?php


  } else {

    $_SESSION['error'] = "Something Went Wrong!";

  ?>
<?php
  }


}



/// Update Category

if (isset($_POST['category_update'])) {

  $idupdate = $_POST['c_id'];
  $category_name = $_POST['category_name'];
  $category_name_1 = str_replace("'", "\'", $category_name);

  $img = $_FILES['img']['name'];

  /** 
           renaming the image name with 
           with random string
          **/
  $new_img_name = uniqid('IMG-', true);

  $target_dir = "images/Category/" . $new_img_name;
  $target_file = $target_dir . basename($img);
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $extension = substr($img, strlen($img) - 4, strlen($img));
  $allowed_extension = array(".jpg", ".png", ".jpeg", ".gif");

  $image_querry = "SELECT * FROM category WHERE cat_id='$idupdate' ";
  $image_querry_run = mysqli_query($con, $image_querry);
  foreach ($image_querry_run as $fa_row) {
    $oldImagePath = $fa_row['cat_image'];
    if ($img == NULL) {
      $image_data = $fa_row['cat_image'];

    } else {
      if ($oldImagePath != NULL) {
        unlink($oldImagePath);
      }
      $image_data = $target_file;
    }
  }

  $q = "UPDATE category SET cat_name = '{$category_name_1}',cat_image = '{$image_data}'   WHERE cat_id = {$idupdate}";
  $querry = mysqli_query($con, $q);



  if ($querry) {
    //image 1
    if ($img == NULL) {

      $_SESSION['message'] = "Update Successfully.";

      ?>
<script>
location.replace("list.php?category");
</script>
<?php
    } else {

      move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
      $_SESSION['message'] = "Update Successfully.";
      ?>

<script>
location.replace("list.php?category");
</script>
<?php
    }

  } else {

    $_SESSION['error'] = "Failed.";

  }


}




/// Update Sub Category

if (isset($_POST['sub_category_update'])) {

  $idupdate = $_POST['s_id'];
  $category_name = $_POST['s_name'];
  $category_name_1 = str_replace("'", "\'", $category_name);
  $cat_id = $_POST['cat_id'];
  $image = $_FILES['image']['name'];

  /** 
       renaming the image name with 
       with random string
      **/
  $new_img_name = uniqid('IMG-', true);

  $target_dir = "images/Sub_Category/" . $new_img_name;
  $target_file = $target_dir . basename($image);
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $extension = substr($image, strlen($image) - 4, strlen($image));
  $allowed_extension = array(".jpg", ".png", ".jpeg", ".gif");

  $image_querry = "SELECT * FROM sub_category WHERE s_id='$idupdate' ";
  $image_querry_run = mysqli_query($con, $image_querry);
  foreach ($image_querry_run as $fa_row) {
    $oldImagePath = $fa_row['image'];
    if ($image == NULL) {
      $image_data = $fa_row['image'];

    } else {
      if ($oldImagePath != NULL) {
        unlink($oldImagePath);
      }
      $image_data = $target_file;
    }
  }

  $q = "UPDATE sub_category SET s_name = '{$category_name_1}',image = '{$image_data}', cat_id = '{$cat_id}'   WHERE s_id = {$idupdate}";
  $querry = mysqli_query($con, $q);



  if ($querry) {
    //image 1
    if ($image == NULL) {

      $_SESSION['message'] = "Update Successfully.";

      ?>

<script>
location.replace("list.php?subcategory");
</script>
<?php
    } else {

      move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

      $_SESSION['message'] = "Update Successfully.";
      ?>

<script>
location.replace("list.php?subcategory");
</script>
<?php
    }

  } else {

    $_SESSION['error'] = "Failed.";

  }


}



// update_product

if (isset($_POST['update_product'])) {

  $idupdate = $_POST['id'];

  $name = $_POST['name'];
  $title = str_replace("'", "\'", $name);
  $description = $_POST['description'];
  $description_2 = str_replace("'", "\'", $description);
  $informatione = $_POST['information'];
  $information = str_replace("'", "\'", $informatione);

  $price = $_POST['price'];
  $shipping_charge = $_POST['shipping_charge'];
  $original_price = $_POST['original_price'];
  $categoryy = $_POST['category'];
  $category = str_replace("'", "\'", $categoryy);
  $sub_categoryy = $_POST['sub_category'];
  $sub_category = str_replace("'", "\'", $sub_categoryy);

  $product_status = $_POST['product_status'];
  $trending_status = $_POST['trending_status'];


  $img = $_FILES['img']['name'];
  $img1 = $_FILES['img1']['name'];
  $img2 = $_FILES['img2']['name'];
  $img3 = $_FILES['img3']['name'];
  $img4 = $_FILES['img4']['name'];

  /** 
         renaming the image name with 
         with random string
        **/
  $new_img_name = uniqid('IMG-', true);

  $target_dir = "images/" . $new_img_name;
  $target_file = $target_dir . basename($img);
  $target_file1 = $target_dir . basename($img1);
  $target_file2 = $target_dir . basename($img2);
  $target_file3 = $target_dir . basename($img3);
  $target_file4 = $target_dir . basename($img4);

  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
  $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
  $imageFileType3 = strtolower(pathinfo($target_file3, PATHINFO_EXTENSION));
  $imageFileType4 = strtolower(pathinfo($target_file4, PATHINFO_EXTENSION));

  $extension = substr($img, strlen($img) - 4, strlen($img));
  $extension1 = substr($img1, strlen($img1) - 4, strlen($img1));
  $extension2 = substr($img2, strlen($img2) - 4, strlen($img2));
  $extension3 = substr($img3, strlen($img3) - 4, strlen($img3));
  $extension4 = substr($img4, strlen($img4) - 4, strlen($img4));

  $allowed_extension = array(".jpg", ".png", ".jpeg", ".gif");

  $image_querry = "SELECT * FROM products WHERE id='$idupdate' ";
  $image_querry_run = mysqli_query($con, $image_querry);
  foreach ($image_querry_run as $fa_row) {


    if ($img == NULL) {
      $image_data = $fa_row['image'];

    } else {
      if ($fa_row['image'] != NULL) {
        $oldImagePath = $fa_row['image'];
        unlink($oldImagePath);
      }
      $image_data = $target_file;
    }
    //image 2
    if ($img1 == NULL) {
      $img1_data = $fa_row['image_1'];
    } else {
      if ($fa_row['image_1'] != NULL) {
        $oldImagePath = $fa_row['image_1'];
        unlink($oldImagePath);
      }
      $img1_data = $target_file1;
    }
    //image 3
    if ($img2 == NULL) {
      $img2_data = $fa_row['image_2'];
    } else {
      if ($fa_row['image_2'] != NULL) {
        $oldImagePath = $fa_row['image_2'];
        unlink($oldImagePath);
      }
      $img2_data = $target_file2;
    }
    //image 4
    if ($img3 == NULL) {
      $img3_data = $fa_row['image_3'];

    } else {
      if ($fa_row['image_3'] != NULL) {
        $oldImagePath = $fa_row['image_3'];
        unlink($oldImagePath);
      }
      $img3_data = $target_file3;
    }
    //image 5
    if ($img4 == NULL) {
      $img4_data = $fa_row['image_4'];

    } else {
      if ($fa_row['image_4'] != NULL) {
        $oldImagePath = $fa_row['image_4'];
        unlink($oldImagePath);
      }
      $img4_data = $target_file4;
    }
  }


  $q = "UPDATE `products` SET `name`='$title',`price`='$price',`description`='$description_2',`information`='$information',`image`='$image_data',`image_1`='$img1_data',
   `image_2`='$img2_data',`image_3`='$img3_data',`image_4`='$img4_data',`shipping_charge`='$shipping_charge',`original_price`='$original_price',`category`='$category',`sub_category`='$sub_category',product_status='$product_status',trending_status='$trending_status' WHERE id='$idupdate'";
  $querry = mysqli_query($con, $q);


  if ($querry) {
    //image 1
    if ($img == NULL) {

      $_SESSION['message'] = "Update Successfully!";

      ?>

<script>
location.replace("list.php?products");
</script>
<?php
    } else {

      move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
      $_SESSION['message'] = "Update Successfully!";
      ?>

<script>
location.replace("list.php?products");
</script>
<?php
    }
    ///image2
    if ($img1 == NULL) {
      $_SESSION['message'] = "Update Successfully!";
      ?>

<script>
location.replace("list.php?products");
</script>
<?php
    } else {

      move_uploaded_file($_FILES["img1"]["tmp_name"], $target_file1);
      $_SESSION['message'] = "Update Successfully!";
      ?>

<script>
location.replace("list.php?products");
</script>
<?php
    }
    //image 3

    if ($img2 == NULL) {
      $_SESSION['message'] = "Update Successfully!";
      ?>

<script>
location.replace("list.php?products");
</script>
<?php
    } else {

      move_uploaded_file($_FILES["img2"]["tmp_name"], $target_file2);
      $_SESSION['message'] = "Update Successfully!";
      ?>

<script>
location.replace("list.php?products");
</script>
<?php
    }
    ////image 4
    if ($img3 == NULL) {
      $_SESSION['message'] = "Update Successfully!";
      ?>

<script>
location.replace("list.php?products");
</script>
<?php
    } else {

      move_uploaded_file($_FILES["img3"]["tmp_name"], $target_file3);
      $_SESSION['message'] = "Update Successfully!";
      ?>

<script>
location.replace("list.php?products");
</script>
<?php
    }
    ////image 5
    if ($img4 == NULL) {
      $_SESSION['message'] = "Update Successfully!";
      ?>

<script>
location.replace("list.php?products");
</script>
<?php
    } else {

      move_uploaded_file($_FILES["img4"]["tmp_name"], $target_file4);
      $_SESSION['message'] = "Update Successfully!";
      ?>

<script>
location.replace("list.php?products");
</script>
<?php
    }

  } else {
    $_SESSION['error'] = "Failed!";
    ?>
<script>
location.replace("list.php?products");
</script>

<?php
  }

}


if (isset($_POST['add_coupon'])) {

  $cupon_code = $_POST['cupon_code'];
  $cupon_type = $_POST['cupon_type'];
  $cupon_value = $_POST['cupon_value'];
  $cupon_min_value = $_POST['cupon_min_value'];
  $max_ammount = $_POST['max_ammount'];
  $expired = $_POST['expired'];
  $repeat_use = $_POST['repeat_use'];
  $max_users = $_POST['max_users'];
  $created_at = time();

  $coupon_insert = mysqli_query($con, "INSERT INTO cupon (`cupon_code`, `cupon_type`, `cupon_value`, `cupon_min_value`, `cupon_created_at`, `expired`, `repeat_use`, `max_ammount`, `max_users`) 
    VALUES('$cupon_code','$cupon_type','$cupon_value','$cupon_min_value','$created_at','$expired','$repeat_use','$max_ammount','$max_users')");

  if ($coupon_insert) {
    $_SESSION['message'] = "$cupon_code Added Successfully!";

    ?>
<script>
location.replace("list.php?coupon-code");
</script>
<?php
  } else {
    ?>
<script>
alert("Failed");
</script>
<?php
  }

}



// Upload multiple home banner images

if (isset($_POST['upload_Banner'])) {
  $images = $_FILES['images'];
  $imagesLength = count($images['name']);

  for ($i = 0; $i < $imagesLength; $i++) {

    # get the image info and store them in var
    $image_name = $images['name'][$i];
    $tmp_name = $images['tmp_name'][$i];
    $error = $images['error'][$i];

    # if there is not error occurred while uploading
    if ($error === 0) {

      # get image extension store it in var
      $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);

      /** 
      convert the image extension into lower case 
      and store it in var 
      **/
      $img_ex_lc = strtolower($img_ex);

      /** 
crating array that stores allowed
to upload image extensions.
**/
      $allowed_exs = array('jpg', 'jpeg', 'png', 'webp', 'gif');


      /** 
         check if the the image extension 
         is present in $allowed_exs array
         **/

      if (in_array($img_ex_lc, $allowed_exs)) {
        /** 
             renaming the image name with 
             with random string
            **/
        $new_img_name = uniqid('IMG-', true) . '.' . $img_ex_lc;

        # crating upload path on root directory
        $img_upload_path = 'images/banner/' . $new_img_name;

        # inserting imge name into database

        $ql = "INSERT INTO `banner`(`image`) VALUES ('$img_upload_path')";
        $sql = mysqli_query($con, $ql);

        if ($sql) {
          # move uploaded image to 'uploads' folder
          move_uploaded_file($tmp_name, $img_upload_path);

          # redirect to 'index.php'
          $_SESSION['message'] = "Images Added Successfully!";

          ?>
<script>
location.replace("list.php?Banner");
</script>
<?php

        } else {
          ?>
<script>
alert("Failed");
</script>
<?php
        }

      } else {
        # error message
        $_SESSION['error'] = "You can't upload files of this type";

        /*
           redirect to 'index.php' and 
           passing the error message
             */

        ?>
<script>
location.replace("list.php?Banner");
</script>
<?php

      }


    } else {
      # error message
      $_SESSION['error'] = "Unknown Error Occurred while uploading";

      /*
        redirect to 'index.php' and 
        passing the error message
          */

      ?>
<script>
location.replace("list.php?Banner");
</script>
<?php

    }
  }
}



/// Update banner Status

if (isset($_POST['statusBtn'])) {
  $id = $_POST['id'];
  $status = $_POST['status'];

  $sql = mysqli_query($con, "UPDATE banner SET status='$status' WHERE id='$id'");
  if ($sql) {
    ?>
<script>
location.replace("list.php?Banner");
</script>
<?php
  } else {
    ?>
<script>
alert("Failed");
</script>
<?php
  }
}


?>