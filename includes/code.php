<?php
include '../Admin_panel/production/dbcon.php';

session_start();


// Set the new timezone
date_default_timezone_set('Asia/Kolkata');
$current_date = date('d-m-Y');

 date_default_timezone_set('Asia/dhaka');
$current_time = date('h:i A');

$yearData= strtotime($current_date);
$date= date('d M Y', $yearData);



//Wishlist code start

if(isset($_POST['wishlist']))
{
    $u_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_image = $_POST['product_image'];
    $product_price = $_POST['product_price'];
   

    $product_search = "select * from wishlist where user_id=$u_id and product_id=$product_id";
    $product_search_query = mysqli_query($con,$product_search);
    $product_id_count = mysqli_num_rows($product_search_query);

    if($product_id_count < 1)
    {

 
    $insert = "INSERT INTO `wishlist`(`user_id`, `product_id`,`product_name`,`product_image`,`product_price`) VALUES ('$u_id','$product_id','$product_name','$product_image','$product_price')";

    $insert_query = mysqli_query($con,$insert);

    if($insert_query)
    {
     
?>
<script>
location.replace("../home.php");
</script>
<?php
    }else{
        ?>
<script>
alert("Failed")
</script>
<?php
        ?>
<script>
location.replace("../home.php");
</script>
<?php
    }
}else{

    ?>
<script>
alert("This Product Already Added In Your Wishlist");
</script>
<?php
?>
<script>
location.replace("../home.php");
</script>
<?php

}

}


//Add to cart


if(isset($_POST['cart']))
{
    $u_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_image = $_POST['product_image'];
    $product_price = $_POST['product_price'];
    $product_charge = $_POST['product_charge'];
    
    # Check Product Status
    $product_status = mysqli_query($con, "SELECT * FROM products WHERE product_status= 1 AND id='$product_id'");
    if(mysqli_num_rows($product_status) > 0){
        $product_search = "select * from cart where user_id=$u_id and product_id=$product_id";
        $product_search_query = mysqli_query($con,$product_search);
        $product_id_count = mysqli_num_rows($product_search_query);
    
        if($product_id_count < 1)
        {
    
     
        $insert = "INSERT INTO `cart`(`user_id`, `product_id`,`product_name`,`product_image`,`product_price`,`shipping_charge`)
         VALUES ('$u_id','$product_id','$product_name','$product_image','$product_price','$product_charge')";
    
        $insert_query = mysqli_query($con,$insert);
    
        if($insert_query)
        {
            
    ?>
<script>
location.replace("../shopping_cart.php");
</script>
<?php
        }else{
            ?>
<script>
alert("Failed")
</script>
<?php
            ?>
<script>
location.replace("../home.php");
</script>
<?php
        }
    }else{
    
        ?>
<script>
alert("This Product Already Added In Your Cart");
</script>
<?php
    ?>
<script>
location.replace("../home.php");
</script>
<?php
    
    }
  }else{
    ?>
<script>
alert("This Product Out of Stock!");
location.replace("<?=$_SESSION['after_Cart']?>")
</script>
<?php
  }

    

}



/// add to cart from product details page

if(isset($_POST['scope']))
{

    $scope = $_POST['scope'];
    switch($scope)
    {
        case "add":
            $prod_id = $_POST['prod_id'];
            $prod_name = $_POST['prod_name'];
            $prod_image = $_POST['prod_image'];
            $prod_price = $_POST['prod_price'];
            $prod_charge = $_POST['prod_charge'];
            $prod_qty = $_POST['prod_qty'];
            $user_id = $_SESSION['id'];

            $product_search = "select * from cart where user_id=$user_id and product_id=$prod_id";
            $product_search_query = mysqli_query($con,$product_search);
            $product_id_count = mysqli_num_rows($product_search_query);
        
            if($product_id_count < 1)
            {
        
         
            $insert = "INSERT INTO `cart`(`user_id`, `product_id`,`product_name`,`product_image`,`product_price`,`quantity`,`shipping_charge`)
             VALUES ('$user_id','$prod_id','$prod_name','$prod_image','$prod_price','$prod_qty','$prod_charge')";
        
            $insert_query = mysqli_query($con,$insert);
        
            if($insert_query)
            {
                echo 0;
   
            }else{
                echo 1;
               
            }
        }else{
        
            echo 2;
        
        
        }


       break;
//// Update quantity
       case "update":
        $prod_id = $_POST['prod_id'];
        $prod_qty = $_POST['prod_qty'];
        $user_id = $_SESSION['id'];

     
        $insert = "UPDATE `cart` SET quantity = '$prod_qty' WHERE product_id = '$prod_id' AND user_id= '$user_id' ";
    
        $insert_query = mysqli_query($con,$insert);
    
        if($insert_query)
        {
         echo 0;

        }else{
            echo 1;
           
        }
 
break;




       default:



    }

}








//CheckOut


if(isset($_POST['checkout']))
{

    
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $user_id = $_SESSION['id'];
    $name = $_POST['firstname']. " ". $_POST['lastname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $postal_code = $_POST['postal_code'];
    $city = $_POST['city'];
    $division = $_POST['division'];
    $payment_method = $_POST['payment_method'];
    $comment = $_POST['comment'];
    $order_no = "SI".rand(9999, 1111).rand(22,77).rand(88,31).rand(5675,1234);
    $cancellation_time = time();

    // Check Is Online Payment Or Not
    
    if(isset($_POST['payment_number'])){
        $payment_number = $_POST['payment_number'];
        $payment_id = $_POST['payment_id'];
    }else{
        $payment_number = "";
        $payment_id = "";
    }

    
    // Add Coupon Value to orders

    if(isset($_SESSION['coupon_id'])){
        $coupon_id = $_SESSION['coupon_id'];
        $total_price = $_SESSION['final_price'];
        $coupon_discount = $_SESSION['discount'];
        $coupon_code = $_SESSION['coupon_code'];
//// Insert Coupon Use data .
        $coupon_use_query = "INSERT INTO `coupon_used_user`(`user_id`, `coupon_code`) VALUES ('$user_id','$coupon_code')";
        $coupon_use_query_run = mysqli_query($con,$coupon_use_query);

        unset($_SESSION['coupon_id']);
        unset($_SESSION['final_price']);
        unset($_SESSION['discount']);
        unset($_SESSION['coupon_code']);
    }else{
        $coupon_id = '';
        $total_price = $_POST['total_price'];
        $coupon_discount = '';
        $coupon_code = '';
    }

                



    $insert = "INSERT INTO `orders`(order_no, user_id, coupon_id, coupon_code, coupon_discount, name, email, mobile, address, postal_code,payment_method,payment_number,payment_id,total_price,comment, created_time, created_date,cancellation_time) 
    VALUES ('$order_no','$user_id','$coupon_id','$coupon_code','$coupon_discount','$name','$email','$mobile','$address','$postal_code','$payment_method','$payment_number','$payment_id','$total_price','$comment','$current_time','$date','$cancellation_time')";
    
    $insert_query = mysqli_query($con,$insert);

    if($insert_query)
    {
 
    

       
        $order_id = mysqli_insert_id($con); // Getting Order Id from Recently Added Order
        $product_show_query = "select * from cart where  user_id =$user_id";
        $product_show_query_run = mysqli_query($con,$product_show_query);
        $product_show_query_num = mysqli_num_rows($product_show_query_run);

        while($product_show_query_result = mysqli_fetch_array($product_show_query_run))
        {
            
            $cart_id = $product_show_query_result['c_id'];
            $prod_id = $product_show_query_result['product_id'];
            $qty = $product_show_query_result['quantity'];
            $price = $product_show_query_result['product_price'];

            $insert_items = "INSERT INTO `order_items`(`order_id`, `product_id`,`orderNo`, `qty`, `price`,`created_time`,`created_date`) 
            VALUES ('$order_id','$prod_id','$order_no','$qty','$price','$current_time','$date')";

            $insert_items_query = mysqli_query($con,$insert_items);

             // Delete cart items after Order

           $delete_Cart = "DELETE FROM cart WHERE c_id='$cart_id' AND user_id='$user_id'";
           $delete_Cart_query = mysqli_query($con,$delete_Cart);
           

          
        } 
        

        
        if($insert_items_query){
 
                //Update User Table
        
        $user_update = "UPDATE `user` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`mobile`='$mobile',
        `address`='$address',`city`='$city',`division`='$division',`postal_code`='$postal_code' WHERE id='$user_id'";

        $user_update_run = mysqli_query($con,$user_update);


      

                
            //End
            ?>
<script>
alert("Order Placed Successfully");
</script>
<?php
            
                        ?>
<script>
location.replace("../order_history.php");
</script>
<?php

        
         

        }


                        
}else{
                            ?>
<script>
alert("Failed");
</script>
<?php
 }




}



// Change user Personal information

$message=0;

if(isset($_POST['profile_saveBtn'])){
    
$usernamee = $_POST['username'];
$username = str_replace("'","\'", $usernamee);

$first_namee = $_POST['first_name'];
$first_name = str_replace("'","\'", $first_namee);

$last_namee = $_POST['last_name'];
$last_name = str_replace("'","\'", $last_namee);

$mobile = $_POST['mobile'];

$email = $_POST['email'];

$addresss = $_POST['address'];
$address = str_replace("'","\'", $addresss);

$postal_code = $_POST['postal_code'];

$cityy = $_POST['city'];
$city = str_replace("'","\'", $cityy);

$division = $_POST['division'];
$user_id = $_SESSION['id'];

$update_user_information = "UPDATE user SET username='$username', first_name='$first_name', last_name='$last_name', 
email='$email', mobile='$mobile', address='$address', postal_code='$postal_code', city='$city', division='$division' WHERE id='$user_id' ";

$update_user_information_query = mysqli_query($con,$update_user_information);

if($update_user_information_query){
   
   

    ?>
<script>
location.replace("../profile.php");
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



// Change User Password


if(isset($_POST['passChangeBtn'])){


    $username= $_SESSION['username'];
    $reciver_email= $_SESSION['email'];
    $user_id= $_SESSION['id'];

    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $c_password = $_POST['c_password'];

    $new_pass = password_hash($new_password,  PASSWORD_BCRYPT);
    $c_pass = password_hash($c_password, PASSWORD_BCRYPT);

    $password_search = " select * from user where id='$user_id'";
    $query = mysqli_query($con,$password_search);

    $password_count = mysqli_num_rows($query);

    if($password_count){
         $password_pass = mysqli_fetch_assoc($query);

        $db_pass = $password_pass['password'];

        $pass_decode = password_verify($old_password, $db_pass);

        if($pass_decode){
         
            if($new_password === $c_password){



                $q ="UPDATE user SET password = '{$new_pass}',cpassword = '{$c_pass}' WHERE id = {$user_id}";
                  $querry = mysqli_query($con,$q);

                  if($querry){


                 ?>
<script>
alert("Your Password has been changed successfully ");
</script>
<?php
                ?>
<script>
location.replace("../profile.php");
</script>
<?php
                  }else{
                    ?>
<script>
alert("Password changing Failed ");
</script>
<?php
                ?>
<script>
location.replace("../profile.php");
</script>
<?php
                  }
               

            }else{

            ?>
<script>
alert("Password and Confirm Password do not match, Please try again!");
</script>
<?php     
            ?>
<script>
location.replace("../profile.php");
</script>
<?php           
      
            }

         }else{
               ?>
<script>
alert("Old Password Is Incorrect, Please Try Again!");
</script>
<?php
               ?>
<script>
location.replace("../profile.php");
</script>
<?php
         }

     }else{
               ?>
<script>
alert("Invalid password ");
</script>
<?php?>
<script>
location.replace("../profile.php");
</script>
<?php
     }

}


// Cancel Order

if(isset($_POST['cancelBtn'])){
    $order_no = $_POST['order_no'];
    $cancel = "UPDATE orders SET status = 5 WHERE order_no='$order_no'";
    $cancel_query = mysqli_query($con,$cancel);

    $cancel_order_items = "UPDATE order_items SET order_status = 5 WHERE orderNo='$order_no'";
    $cancel_order_items_query = mysqli_query($con,$cancel_order_items);

    if($cancel_query){
        ?>
<script>
location.replace("../order_history.php");
</script>
<?php
    }
    else{
        ?>
<script>
alert("Failed");
</script>
<?php
    }

}


//Add Review

if(isset($_POST['add_review'])){
    

    $rating = $_POST['rating'];
    
    
    $reviews = $_POST['review'];
    $review = str_replace("'","\'", $reviews);

    $user_name = $_POST['user_name'];
    $order_no = $_POST['order_no'];
    $product_id = $_POST['product_id'];
    $order_items_id = $_POST['order_items_id'];


         
     //Get Images Name

     $image_1  = $_FILES['image_1']['name'];
     $image_2 = $_FILES['image_2']['name'];
     $image_3 = $_FILES['image_3']['name'];
     $image_4 = $_FILES['image_4']['name'];
     $target_dir = "../Admin_panel/production/images/Review_images/";
     $target_file = $target_dir . basename($image_1);
     $target_file1 = $target_dir . basename($image_2);
     $target_file2 = $target_dir . basename($image_3);
     $target_file3 = $target_dir . basename($image_4);

     $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
     $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
     $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
     $imageFileType3 = strtolower(pathinfo($target_file3, PATHINFO_EXTENSION));

     $extension = substr($image_1, strlen($image_1)-4,strlen($image_1));
     $extension1 = substr($image_2, strlen($image_2)-4,strlen($image_2));
     $extension2 = substr($image_3, strlen($image_3)-4,strlen($image_3));
     $extension3 = substr($image_4, strlen($image_4)-4,strlen($image_4));

     $allowed_extension = array(".jpg", ".png", ".jpeg", ".gif");
     $review_query = "INSERT INTO `review`(`order_no`, `product_id`,`order_items_id`, `username`, `rating`,
     `review`, `image_1`, `image_2`, `image_3`, `image_4`) VALUES ('$order_no','$product_id','$order_items_id','$user_name','$rating','$review',
     '$image_1','$image_2','$image_3','$image_4')";

     $review_query_run= mysqli_query($con,$review_query);

     if($review_query_run){
        move_uploaded_file($_FILES["image_1"]["tmp_name"], $target_file);
        move_uploaded_file($_FILES["image_2"]["tmp_name"], $target_file1);
        move_uploaded_file($_FILES["image_3"]["tmp_name"], $target_file2);
        move_uploaded_file($_FILES["image_4"]["tmp_name"], $target_file3);



        $review_status = "UPDATE order_items SET review_status=1 WHERE o_id='$order_items_id'";
        $review_status_query = mysqli_query($con,$review_status);



            ?>

<script>
location.replace("../review_History.php");
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