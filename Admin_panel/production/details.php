<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['username'])){


  header('location:admin_login.php');
  

}
include 'php/auto.php';
?>

<?php
include 'dbcon.php';
include 'includes/head.php';
include 'delete/delete.php';

$_SESSION['order_url'] = $_SERVER['REQUEST_URI'];
?>




<?php

if(isset($_GET['pid'])){
	?>
<?php $pid=$_GET['pid']; ?>

<body class="nav-md">
  <?php include "includes/nav.php" ?>
  <!-- /top navigation -->

  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">

        <?php 
            $ret=mysqli_query($con,"select * from products where id='$pid'");
            while($row=mysqli_fetch_array($ret))
            {

            ?>

      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2><?php echo htmlentities($row['name']);?></h2>

              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>

              </ul>
              <div class="clearfix"></div>
              <div style=" ">
                <p style="color:#000000; font-size:15px; padding-top: 10px;">Total sales : <?php
     // counting total sales
     $count_sold = "select product_id from order_items where product_id='$pid' and order_status=4";
     $count_sold_query = mysqli_query($con,$count_sold);
     $count_query_num = mysqli_num_rows($count_sold_query);
      
     $sold =  $count_query_num;
     // convert format
     if($sold > 1000000000000){
      echo round(($sold/1000000000000), 2).'T';
     }elseif($sold > 1000000000){
       echo round(($sold/1000000000), 2).'B';
     }elseif($sold > 1000000){
       echo round (($sold/1000000), 2).'M';
     }elseif($sold > 1000){
       echo round(($sold/1000), 2).'K';
     }else{
       echo $sold;
     }



    ?> sold</p>
                <a href="orders.php?all-seals=<?=$row['id']?>"><button class="btn btn-info">View All Seals</button></a>
              </div>
            </div>
            <div class="x_content">
              <br />



              <form method="post" action="" id="demo-form2" data-parsley-validate
                class="form-horizontal form-label-left">


                <input type="hidden" name="id" value="<?php echo htmlentities($row['id']);?>">


                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name<span
                      class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <input readonly type="text" name="name" value="<?php echo htmlentities($row['name']);?>"
                      required="required" class="form-control ">
                  </div>
                </div>

                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Key Points<span
                      class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <textarea readonly class="form-control" rows="8" cols="60"
                      name="description"><?php echo htmlentities($row['description']);?></textarea>


                  </div>
                </div>

                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Product Information<span
                      class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <textarea readonly class="form-control" rows="8" cols="60"
                      name="description"><?php echo htmlentities($row['information']);?></textarea>


                  </div>
                </div>

                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Availability<span
                      class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <?php if($row['product_status'] == 1){
											?>
                    <input type="submit" class="btn btn-success" value="In Stock">
                    <?php
										}else{
											?>
                    <input type="submit" class="btn btn-danger" value="Out of Stock">
                    <?php
										} ?>


                  </div>
                </div>


                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Original Price<span
                      class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <input readonly type="text" name="name" value="<?php echo htmlentities($row['original_price']);?>"
                      required="required" class="form-control ">
                  </div>
                </div>

                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Price<span
                      class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <input readonly type="text" name="name" value="<?php echo htmlentities($row['price']);?>"
                      required="required" class="form-control ">
                  </div>
                </div>


                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Shipping Charge<span
                      class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <input readonly type="text" name="name" value="<?php echo htmlentities($row['shipping_charge']);?>"
                      required="required" class="form-control ">
                  </div>
                </div>

                <!-- Show category and subcategory name -->
                <?php $cat_id = $row['category'];
										$s_id = $row['sub_category'];

									if(mysqli_num_rows(mysqli_query($con,"select * from category where cat_id='$cat_id'"))){
										$category_select = mysqli_fetch_array(mysqli_query($con,"select * from category where cat_id='$cat_id'"));
										$cat_name = $category_select['cat_name'];
									}else{
										$cat_name = "A Category has not been added yet!";
									}

									if(mysqli_num_rows(mysqli_query($con,"select * from sub_category where s_id='$s_id'"))){
										$sub_category_select = mysqli_fetch_array(mysqli_query($con,"select * from sub_category where s_id='$s_id'"));
										$sub_cat_name = $sub_category_select['s_name'];
										
									}else{
										$sub_cat_name = "A subcategory has not been added yet!";
									}
										

                     
                   

										?>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Category<span
                      class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <input readonly type="text" name="name" value="<?= $cat_name;?>" required="required"
                      class="form-control ">
                  </div>
                </div>

                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Sub Category<span
                      class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <input readonly type="text" name="name" value="<?= $sub_cat_name; ?>" required="required"
                      class="form-control ">
                  </div>
                </div>

                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Thumbnail Image<span
                      class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <a href="<?php echo  htmlentities($row['image']);?>" target="_blank"><img
                        src="<?php echo  htmlentities($row['image']);?>" height="100" width="100" alt=""></a>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Image 1<span
                      class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <a href="<?php echo  htmlentities($row['image_1']);?>" target="_blank"><img
                        src="<?php echo  htmlentities($row['image_1']);?>" height="100" width="100" alt=""></a>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Image 2<span
                      class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <a href="<?php echo  htmlentities($row['image_2']);?>" target="_blank"><img
                        src="<?php echo  htmlentities($row['image_2']);?>" height="100" width="100" alt=""></a>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Image 3<span
                      class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <a href="<?php echo  htmlentities($row['image_3']);?>" target="_blank"><img
                        src="<?php echo  htmlentities($row['image_3']);?>" height="100" width="100" alt=""></a>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Image 4<span
                      class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <a href="<?php echo  htmlentities($row['image_4']);?>" target="_blank"><img
                        src="<?php echo  htmlentities($row['image_4']);?>" height="100" width="100" alt=""></a>
                  </div>
                </div>

                <div class="ln_solid"></div>

                <!--Collect Image paths For delete from folder -->
                <?php
                    if($row['image'] == NULL){
                      ?>
                <input type="hidden" class="DeleteImage" value="">
                <?php
                    }else{
                      ?>
                <input type="hidden" class="DeleteImage" value="<?=$row['image']?>">
                <?php
                    }

                    if($row['image_1'] == NULL){
                      ?>
                <input type="hidden" class="DeleteImage_1" value="">
                <?php
                    }else{
                      ?>
                <input type="hidden" class="DeleteImage_1" value="<?=$row['image_1']?>">
                <?php
                    }

                    if($row['image_2'] == NULL){
                      ?>
                <input type="hidden" class="DeleteImage_2" value="">
                <?php
                    }else{
                      ?>
                <input type="hidden" class="DeleteImage_2" value="<?=$row['image_2']?>">
                <?php
                    }

                    if($row['image_3'] == NULL){
                      ?>
                <input type="hidden" class="DeleteImage_3" value="">
                <?php
                    }else{
                      ?>
                <input type="hidden" class="DeleteImage_3" value="<?=$row['image_3']?>">
                <?php
                    }

                    if($row['image_4'] == NULL){
                      ?>
                <input type="hidden" class="DeleteImage_4" value="">
                <?php
                    }else{
                      ?>
                <input type="hidden" class="DeleteImage_4" value="<?=$row['image_4']?>">
                <?php
                    }
                    
             
                     ?>



              </form>
              <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-3">
                  <button class="btn btn-success" type="button" onclick="history.back()">Back</button>
                  <button type='button' id="ProductDeleteBtn" value='<?php echo $row['id']; ?>'
                    class='btn btn-danger'>Delete</button>
                  <a href="update.php?pid=<?php echo $row['id'] ?>"> <input type="submit" value="Edit"
                      class="btn btn-primary"> </a>

                </div>
              </div>
              <?php
} ?>


            </div>
          </div>
        </div>
      </div>



      <?php
}elseif(isset($_GET['Order-ID'])){

?>
      <?php $oid=$_GET['Order-ID']; ?>

      <?php
$orders = "SELECT * FROM orders WHERE order_no='$oid'";
$order_query = mysqli_query($con,$orders);

if(mysqli_num_rows($order_query) > 0){
?>

      <?php while($order_result= mysqli_fetch_array($order_query)){
    
    //Get Details From Order Table
  
    $customer_order_no= $order_result['order_no'];
    $customer_id= $order_result['user_id'];
    $customer_name= $order_result['name'];
    $customer_mobile= $order_result['mobile'];
    $customer_email= $order_result['email'];
    $customer_address= $order_result['address'];
    $order_status= $order_result['status'];
    $comment= $order_result['comment'];
    $payment_method= $order_result['payment_method'];
    $payment_number= $order_result['payment_number'];
    $payment_id= $order_result['payment_id'];
    $cancellation_time= $order_result['cancellation_time'];

    $coupon_code= $order_result['coupon_code'];
    $coupon_discount= $order_result['coupon_discount'];
    $total_price= $order_result['total_price'];
    $estimate_delivery = $order_result['estimate_delivery'];
    $created_date = $order_result['created_date'];
    $created_time = $order_result['created_time'];
}



?>
      <?php
}

if(isset($_POST['update_order'])){
	$update_status = $_POST['status'];
	$update_estimate_delivery = $_POST['estimate_delivery'];

	if(mysqli_query($con,"UPDATE orders SET status='$update_status',estimate_delivery='$update_estimate_delivery' WHERE order_no='$oid'")){
		$order_items_Status = mysqli_query($con,"UPDATE order_items SET order_status='$update_status' WHERE orderNo='$customer_order_no'");

		$location = $_SESSION['order_url'];
		$_SESSION['message'] = "Update Successfully";
		?>

      <script>
      location.replace("<?=$location?>");
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






      <body class="nav-md">
        <?php include "includes/nav.php" ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">



            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Order ID <b>#<?php if(mysqli_num_rows(mysqli_query($con,"select * from orders where order_no='$oid'"))){
										$order_id = mysqli_fetch_array(mysqli_query($con,"select * from orders where order_no='$oid'"))['order_no'];
										echo $order_id;
									}
										?></b>

                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="card">
                      <div class="card-body">
                        <div class="container mb-5 mt-3">
                          <div class="row d-flex align-items-baseline">
                            <div class="col-xl-9">
                              <p style="color: #7e8d9f;font-size: 20px;">Order >> <strong>ID:
                                  #<?= $customer_order_no;?></strong></p>
                            </div>
                            <div class="col-xl-3 float-end">
                              <a class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
                                  class="fa fa-print text-primary"></i> Print</a>
                              <a class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i
                                  class="far fa-file-pdf text-danger"></i> Export</a>
                            </div>
                            <hr>
                          </div>

                          <div class="container">



                            <div class="row">
                              <div class="col-xl-8">
                                <p style="font-size:20px; color:#5d9fc5; font-weight:600;">Customer Details:</p>
                                <ul class="list-unstyled">
                                  <li class="text-muted"><span style="font-size:15px;">Customer ID: </span><span
                                      style="color:#000000; font-weight:600"><?=$customer_id?></span></li>
                                  <li class="text-muted"><span style="font-size:15px;">Name: </span><span
                                      style="color:#000000; font-weight:600"><?=$customer_name?></span></li>
                                  <li class="text-muted"><span style="font-size:15px;">Address: </span><span
                                      style="color:#000000; font-weight:600"><?=$customer_address?></span></li>
                                  <li class="text-muted"><span style="font-size:15px;">Email: </span><span
                                      style="color:#000000; font-weight:600"><?=$customer_email?></span></li>
                                  <li class="text-muted"><span style="font-size:15px;">Phone: </span><span
                                      style="color:#000000; font-weight:600"><?=$customer_mobile?></span></li>


                                </ul>
                              </div>
                              <div class="col-xl-4">
                                <p class="text" style="font-weight:bold;color:#000000;">Order Details:</p>
                                <ul class="list-unstyled">
                                  <li class="text-muted"><i class="fa fa-circle" style="color:#0947CC	 ;"></i> <span
                                      class="fw-bold">Order Placed</span><b>: <?=$created_date?> at
                                      <?=$created_time?></b></li>
                                  <li class="text-muted"><i class="fa fa-circle" style="color:#0947CC ;"></i> <span
                                      class="fw-bold">Payment Method</span> <b>: <?=$payment_method?></b></li>
                                  <!-- Condition for payment method bkash & nagad -->
                                  <?php if($payment_method == "COD"){
                                    // For Cash on delivery there have no payment number and transaction number
                                  }else{
                                    ?>
                                    <li class="text-muted"><i class="fa fa-circle" style="color:#0947CC ;"></i> <span
                                      class="fw-bold">Payment Number</span> <b>: <?=$payment_number?></b></li>
                                  <li class="text-muted"><i class="fa fa-circle" style="color:#0947CC ;"></i> <span
                                      class="fw-bold">Transaction ID</span> <b>: <?=$payment_id?></b></li>
                                    <?php
                                  } ?>
                                  <li class="text-muted"><i class="fa fa-circle" style="color:#0947CC	 ;"></i> <span
                                      class="me-1 fw-bold">Status:</span>
                                    <?php 
									if($order_status == 0){
										?>
                                    <span class="badge bg-dark text-white p-1 fw-bold">
                                      Processing</span><?php
									}elseif($order_status == 1){
										?>
                                    <span class="badge bg-warning text-dark p-1 fw-bold">
                                      Order Confirmed</span><?php
									}elseif($order_status == 2){
										?>
                                    <span class="badge bg-info text-white p-1 fw-bold">
                                      On the way</span><?php
									}elseif($order_status == 3){
										?>
                                    <span class="badge bg-primary text-white p-1 fw-bold">
                                      Ready for Delivery</span><?php
									}elseif($order_status == 4 ){
										?>
                                    <span class="badge bg-success text-white p-1 fw-bold">
                                      Delivered</span><?php
									}else{
										?>
                                    <span class="badge bg-danger text-white p-1 fw-bold">
                                      Canceled</span><?php
									}
									?>
                                  </li>
                                </ul>
                              </div>
                            </div>




                            <div class="row my-2 mx-1 justify-content-center">
                              <table class="table table-striped table-borderless">
                                <thead style="background-color:#261F5D ;" class="text-white">
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Amount</th>
                                  </tr>
                                </thead>
                                <tbody>

                                  <?php
$order_subtotal = 0;
$total_shipping_charge =0;



$order_details_show_query = "SELECT o.id as oid, o.order_no, o.user_id, oi.*,p.* FROM orders o, order_items oi,
products p WHERE o.id = oi.order_id AND p.id = oi.product_id AND o.order_no = '$oid'";
$order_details_show_query_run = mysqli_query($con,$order_details_show_query);
$order_details_show_query_num = mysqli_num_rows($order_details_show_query_run);

while($order_details_show_query_result = mysqli_fetch_array($order_details_show_query_run))
{
    ?>


                                  <?php $total_shipping_charge = $total_shipping_charge + $order_details_show_query_result['shipping_charge'];?>

                                  <?php $order_subtotal = $order_subtotal + $order_details_show_query_result['qty'] * $order_details_show_query_result['price'] ?>




                                  <tr style="border-bottom:1px solid #E7E7E7;">
                                    <th scope="row">1</th>

                                    <td><a style="color:#000000"
                                        href="details.php?pid=<?=$order_details_show_query_result['id']?>"><?=$order_details_show_query_result['name']?></a>
                                    </td>
                                    <td><?=$order_details_show_query_result['qty']?></td>
                                    <td><?=$order_details_show_query_result['price']?> &#2547;</td>
                                    <td>
                                      <?=$order_details_show_query_result['qty'] * $order_details_show_query_result['price']?>&#2547;
                                    </td>
                                  </tr>
                                  <?php


}

               
?>


                                </tbody>

                              </table>
                            </div>
                            <div class="row">
                              <div class="col-lg-4 col-sm-5 ml-auto p-3">
                                <table class="table">
                                  <tbody>
                                    <tr>
                                      <td class="left"><strong>Subtotal</strong></td>
                                      <td class="right"><?=$order_subtotal?> &#2547;</td>
                                    </tr>
                                    <tr>
                                      <td class="left"><strong>Shipping Charge</strong></td>
                                      <td class="right"><?=$total_shipping_charge?> &#2547;</td>
                                    </tr>

                                    <?php
if($coupon_code > 0){
	?>

                                    <tr>
                                      <td class="left"><strong>Coupon Code</strong></td>
                                      <td class="right"><?=$coupon_code?></td>
                                    </tr>
                                    <tr>
                                      <td class="left"><strong>Coupon Discount</strong></td>
                                      <td class="right text-danger">- <?=$coupon_discount?> &#2547;</td>
                                    </tr>
                                    <?php
}
?>

                                    <tr>
                                      <td class="left"><strong>Total</strong></td>
                                      <td class="right"><strong><?=$total_price?> &#2547;</strong></td>
                                    </tr>
                                  </tbody>
                                </table>





                              </div>
                            </div>

                            <hr>
                            <div class="row">
                              <div class="col-xl-10">
                                <form action="" method="post">

                                  <label class="col-form-label abel-align" for="mobile"><b style="color:#000000;">Order
                                      Status
                                    </b><span class="required">*</span>
                                  </label>
                                  <div class="item form-group">

                                    <div class="col-md-6 col-sm-6 ">
                                      <select name="status" class="form-control" required>
                                        <?php
                          if($order_status == 0){
														?>
                                        <option selected value="0">Processing</option>
                                        <option value="1">Order Confirmed</option>
                                        <option value="2">On the way</option>
                                        <option value="3">Ready for Delivery</option>
                                        <option value="4">Delivered</option>
                                        <option value="5">Canceled</option>
                                        <?php
													}elseif($order_status == 1){
														?>
                                        <option value="0">Processing</option>
                                        <option selected value="1">Order Confirmed</option>
                                        <option value="2">On the way</option>
                                        <option value="3">Ready for Delivery</option>
                                        <option value="4">Delivered</option>
                                        <option value="5">Canceled</option>
                                        <?php
													}elseif($order_status == 2){
														?>
                                        <option value="0">Processing</option>
                                        <option value="1">Order Confirmed</option>
                                        <option selected value="2">On the way</option>
                                        <option value="3">Ready for Delivery</option>
                                        <option value="4">Delivered</option>
                                        <option value="5">Canceled</option>
                                        <?php
													}elseif($order_status == 3){
														?>
                                        <option value="0">Processing</option>
                                        <option value="1">Order Confirmed</option>
                                        <option value="2">On the way</option>
                                        <option selected value="3">Ready for Delivery</option>
                                        <option value="4">Delivered</option>
                                        <option value="5">Canceled</option>
                                        <?php
													}elseif($order_status == 4){
														?>
                                        <option value="0">Processing</option>
                                        <option value="1">Order Confirmed</option>
                                        <option value="2">On the way</option>
                                        <option value="3">Ready for Delivery</option>
                                        <option selected value="4">Delivered</option>
                                        <option value="5">Canceled</option>
                                        <?php
													}else{
														?>
                                        <option value="0">Processing</option>
                                        <option value="1">Order Confirmed</option>
                                        <option value="2">On the way</option>
                                        <option value="3">Ready for Delivery</option>
                                        <option value="4">Delivered</option>
                                        <option selected value="5">Canceled</option>
                                        <?php
													}
											?>
                                      </select>
                                    </div>

                                  </div>
                                  <label class="col-form-label label-align" for="name"><b
                                      style="color:#000000;">Estimate Delivery Time
                                    </b><span class="required">*</span>
                                  </label>
                                  <div class="item form-group">

                                    <div class="col-md-6 col-sm-6 ">
                                      <select name="estimate_delivery" class="form-control" required>
                                        <option value="<?=$estimate_delivery?>"><?=$estimate_delivery?> Days</option>
                                        <option value="1">1 Day</option>
                                        <option value="2">2 Days</option>
                                        <option value="3">3 Days</option>
                                        <option value="4">4 Days</option>
                                        <option value="5">5 Days</option>
                                        <option value="6">6 Days</option>
                                        <option value="7">7 Days</option>
                                        <option value="8">8 Days</option>
                                        <option value="9">9 Days</option>
                                        <option value="10">10 Days</option>
                                        <option value="11">11 Days</option>
                                        <option value="12">12 Days</option>
                                        <option value="13">13 Days</option>
                                        <option value="14">14 Days</option>
                                        <option value="15">15 Days</option>
                                        <option value="16">16 Days</option>
                                        <option value="17">17 Days</option>
                                        <option value="18">18 Days</option>
                                        <option value="19">19 Days</option>
                                        <option value="20">20 Days</option>
                                        <option value="21">21 Days</option>
                                        <option value="22">22 Days</option>
                                        <option value="23">23 Days</option>
                                        <option value="24">24 Days</option>
                                        <option value="25">25 Days</option>
                                        <option value="26">26 Days</option>
                                        <option value="27">27 Days</option>
                                        <option value="28">28 Days</option>
                                        <option value="29">29 Days</option>
                                        <option value="30">30 Days</option>
                                        <option value="31">31 Days</option>
                                        <option value="32">32 Days</option>
                                        <option value="33">33 Days</option>
                                        <option value="34">34 Days</option>
                                        <option value="35">35 Days</option>
                                        <option value="36">36 Days</option>
                                        <option value="37">37 Days</option>
                                        <option value="38">38 Days</option>
                                        <option value="39">39 Days</option>
                                        <option value="40">40 Days</option>
                                        <option value="41">41 Days</option>
                                        <option value="42">42 Days</option>
                                        <option value="43">43 Days</option>
                                        <option value="44">44 Days</option>
                                        <option value="45">45 Days</option>
                                        <option value="46">46 Days</option>
                                        <option value="47">47 Days</option>
                                        <option value="48">48 Days</option>
                                        <option value="49">49 Days</option>
                                        <option value="50">50 Days</option>
                                        <option value="51">51 Days</option>
                                        <option value="52">52 Days</option>
                                        <option value="53">53 Days</option>
                                        <option value="54">54 Days</option>
                                        <option value="55">55 Days</option>
                                        <option value="56">56 Days</option>
                                        <option value="57">57 Days</option>
                                        <option value="58">58 Days</option>
                                        <option value="59">59 Days</option>
                                        <option value="60">60 Days</option>
                                      </select>
                                    </div>
                                  </div>

                                  <div class="item form-group">
                                    <div class="col-form-label abel-align">
                                      <button class="btn btn-danger" type="button"
                                        onclick="history.back()">Back</button>

                                      <input type="submit" name="update_order" value="Update" class="btn btn-primary">

                                    </div>
                                  </div>

                                </form>
                              </div>

                            </div>

                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <?php
}elseif(isset($_GET['coupon-code'])){

	$cupon_code = $_GET['coupon-code'];

?>


            <body class="nav-md">
              <?php include "includes/nav.php" ?>
              <!-- /top navigation -->

              <!-- page content -->
              <div class="right_col" role="main">
                <div class="">
                  <div class="page-title">



                  </div>
                  <div class="clearfix"></div>
                  <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2>Coupon Details</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <br />


                          <?php 
            $ret=mysqli_query($con,"select * from cupon where cupon_id='$cupon_code'");
            while($row=mysqli_fetch_array($ret))
            {

            ?>
                          <form method="post" action="" id="demo-form2" data-parsley-validate
                            class="form-horizontal form-label-left">


                            <input type="hidden" name="id" value="<?php echo htmlentities($row['cupon_id']);?>">


                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Coupon Code<span
                                  class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input readonly type="text" value="<?=$row['cupon_code']?>" required="required"
                                  class="form-control ">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Coupon Type<span
                                  class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input readonly type="text" name="name" value="<?=$row['cupon_type']?>"
                                  required="required" class="form-control ">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Coupon
                                Discount<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input readonly type="text" name="name" value="<?php if($row['cupon_type'] == "Percent"){
													echo $row['cupon_value']."%";
												}else{echo $row['cupon_value']."&#2547;";}?>" required="required" class="form-control ">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Minimum Order
                                Amount<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input readonly type="text" name="name" value="<?=$row['cupon_min_value']?> &#2547;"
                                  required="required" class="form-control ">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Maximum Discount
                                Amount<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input readonly type="text" name="name" value="<?=$row['max_ammount']?> &#2547;"
                                  required="required" class="form-control ">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Coupon Expire Time
                                (In seconds)<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input readonly type="text" name="name" value="<?=$row['expired']?> Sec"
                                  required="required" class="form-control ">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">No. Of Repeat
                                Usages<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input readonly type="text" name="name" value="<?=$row['repeat_use']?>"
                                  required="required" class="form-control ">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">No. Of Users<span
                                  class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input readonly type="text" name="name" value="<?=$row['max_users']?>"
                                  required="required" class="form-control ">
                              </div>
                            </div>



                            <div class="ln_solid"></div>


                          </form>
                          <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                              <button class="btn btn-success" type="button" onclick="history.back()">Back</button>
                              <button type='button' id="deleteCoupon" value="<?=$row['cupon_id']?>"
                                class='btn btn-danger'>Delete</button>
                              <a href="update.php?coupon-code=<?=$row['cupon_id']?>"> <input type="submit" value="Edit"
                                  class="btn btn-primary"> </a>

                            </div>
                          </div>
                          <?php
} ?>


                        </div>
                      </div>
                    </div>
                  </div>



                  <?php
}else{
	?>

                  <style>
                  * {
                    font-family: 'PT Sans Caption', sans-serif, 'arial', 'Times New Roman';
                  }

                  /* Error Page */
                  .error .clip .shadow {
                    height: 180px;
                    /*Contrall*/
                  }

                  .error .clip:nth-of-type(2) .shadow {
                    width: 130px;
                    /*Contrall play with javascript*/
                  }

                  .error .clip:nth-of-type(1) .shadow,
                  .error .clip:nth-of-type(3) .shadow {
                    width: 250px;
                    /*Contrall*/
                  }

                  .error .digit {
                    width: 150px;
                    /*Contrall*/
                    height: 150px;
                    /*Contrall*/
                    line-height: 150px;
                    /*Contrall*/
                    font-size: 120px;
                    font-weight: bold;
                  }

                  .error h2

                  /*Contrall*/
                    {
                    font-size: 32px;
                  }

                  .error .msg

                  /*Contrall*/
                    {
                    top: -190px;
                    left: 30%;
                    width: 80px;
                    height: 80px;
                    line-height: 80px;
                    font-size: 32px;
                  }

                  .error span.triangle

                  /*Contrall*/
                    {
                    top: 70%;
                    right: 0%;
                    border-left: 20px solid #535353;
                    border-top: 15px solid transparent;
                    border-bottom: 15px solid transparent;
                  }


                  .error .container-error-404 {
                    margin-top: 10%;
                    position: relative;
                    height: 250px;
                    padding-top: 40px;
                  }

                  .error .container-error-404 .clip {
                    display: inline-block;
                    transform: skew(-45deg);
                  }

                  .error .clip .shadow {

                    overflow: hidden;
                  }

                  .error .clip:nth-of-type(2) .shadow {
                    overflow: hidden;
                    position: relative;
                    box-shadow: inset 20px 0px 20px -15px rgba(150, 150, 150, 0.8), 20px 0px 20px -15px rgba(150, 150, 150, 0.8);
                  }

                  .error .clip:nth-of-type(3) .shadow:after,
                  .error .clip:nth-of-type(1) .shadow:after {
                    content: "";
                    position: absolute;
                    right: -8px;
                    bottom: 0px;
                    z-index: 9999;
                    height: 100%;
                    width: 10px;
                    background: linear-gradient(90deg, transparent, rgba(173, 173, 173, 0.8), transparent);
                    border-radius: 50%;
                  }

                  .error .clip:nth-of-type(3) .shadow:after {
                    left: -8px;
                  }

                  .error .digit {
                    position: relative;
                    top: 8%;
                    color: white;
                    background: #2E0963;
                    border-radius: 50%;
                    display: inline-block;
                    transform: skew(45deg);
                  }

                  .error .clip:nth-of-type(2) .digit {
                    left: -10%;
                  }

                  .error .clip:nth-of-type(1) .digit {
                    right: -20%;
                  }

                  .error .clip:nth-of-type(3) .digit {
                    left: -20%;
                  }

                  .error h2 {
                    color: #A2A2A2;
                    font-weight: bold;
                    padding-bottom: 20px;
                  }

                  .error .msg {
                    position: relative;
                    z-index: 9999;
                    display: block;
                    background: #535353;
                    color: #A2A2A2;
                    border-radius: 50%;
                    font-style: italic;
                  }

                  .error .triangle {
                    position: absolute;
                    z-index: 999;
                    transform: rotate(45deg);
                    content: "";
                    width: 0;
                    height: 0;
                  }

                  /* Error Page */
                  @media(max-width: 767px) {

                    /* Error Page */
                    .error .clip .shadow {
                      height: 100px;
                      /*Contrall*/
                    }

                    .error .clip:nth-of-type(2) .shadow {
                      width: 80px;
                      /*Contrall play with javascript*/
                    }

                    .error .clip:nth-of-type(1) .shadow,
                    .error .clip:nth-of-type(3) .shadow {
                      width: 100px;
                      /*Contrall*/
                    }

                    .error .digit {
                      width: 80px;
                      /*Contrall*/
                      height: 80px;
                      /*Contrall*/
                      line-height: 80px;
                      /*Contrall*/
                      font-size: 52px;
                    }

                    .error h2

                    /*Contrall*/
                      {
                      font-size: 24px;
                    }

                    .error .msg

                    /*Contrall*/
                      {
                      top: -110px;
                      left: 15%;
                      width: 40px;
                      height: 40px;
                      line-height: 40px;
                      font-size: 18px;
                    }

                    .error span.triangle

                    /*Contrall*/
                      {
                      top: 70%;
                      right: -3%;
                      border-left: 10px solid #535353;
                      border-top: 8px solid transparent;
                      border-bottom: 8px solid transparent;
                    }

                    .error .container-error-404 {
                      height: 150px;
                    }

                    /* Error Page */
                  }

                  /*--------------------------------------------Framework --------------------------------*/

                  .overlay {
                    position: relative;
                    z-index: 20;
                  }

                  /*done*/
                  .ground-color {
                    background: white;
                  }

                  /*done*/
                  .item-bg-color {
                    background: #EAEAEA
                  }

                  /*done*/

                  /* Padding Section*/
                  .padding-top {
                    padding-top: 10px;
                  }

                  /*done*/
                  .padding-bottom {
                    padding-bottom: 10px;
                  }

                  /*done*/
                  .padding-vertical {
                    padding-top: 10px;
                    padding-bottom: 10px;
                  }

                  .padding-horizontal {
                    padding-left: 10px;
                    padding-right: 10px;
                  }

                  .padding-all {
                    padding: 10px;
                  }

                  /*done*/

                  .no-padding-left {
                    padding-left: 0px;
                  }

                  /*done*/
                  .no-padding-right {
                    padding-right: 0px;
                  }

                  /*done*/
                  .no-vertical-padding {
                    padding-top: 0px;
                    padding-bottom: 0px;
                  }

                  .no-horizontal-padding {
                    padding-left: 0px;
                    padding-right: 0px;
                  }

                  .no-padding {
                    padding: 0px;
                  }

                  /*done*/
                  /* Padding Section*/

                  /* Margin section */
                  .margin-top {
                    margin-top: 10px;
                  }

                  /*done*/
                  .margin-bottom {
                    margin-bottom: 10px;
                  }

                  /*done*/
                  .margin-right {
                    margin-right: 10px;
                  }

                  /*done*/
                  .margin-left {
                    margin-left: 10px;
                  }

                  /*done*/
                  .margin-horizontal {
                    margin-left: 10px;
                    margin-right: 10px;
                  }

                  /*done*/
                  .margin-vertical {
                    margin-top: 10px;
                    margin-bottom: 10px;
                  }

                  /*done*/
                  .margin-all {
                    margin: 10px;
                  }

                  /*done*/
                  .no-margin {
                    margin: 0px;
                  }

                  /*done*/

                  .no-vertical-margin {
                    margin-top: 0px;
                    margin-bottom: 0px;
                  }

                  .no-horizontal-margin {
                    margin-left: 0px;
                    margin-right: 0px;
                  }

                  .inside-col-shrink {
                    margin: 0px 20px;
                  }

                  /*done - For the inside sections that has also Title section*/
                  /* Margin section */

                  hr {
                    margin: 0px;
                    padding: 0px;
                    border-top: 1px dashed #999;
                  }

                  /*--------------------------------------------FrameWork------------------------*/
                  </style>
                  <!-- page content -->
                  <div class="right_col" role="main">
                    <div class="">
                      <div class="page-title">



                      </div>
                      <div class="clearfix"></div>
                      <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                          <div class="x_panel">

                            <div class="x_content">
                              <br />
                              <!-- Error Page -->
                              <div class="error">
                                <div class="container-floud">
                                  <div class="col-xs ground-color text-center">
                                    <div class="container-error-404">
                                      <div class="clip">
                                        <div class="shadow"><span class="digit thirdDigit"></span></div>
                                      </div>
                                      <div class="clip">
                                        <div class="shadow"><span class="digit secondDigit"></span></div>
                                      </div>
                                      <div class="clip">
                                        <div class="shadow"><span class="digit firstDigit"></span></div>
                                      </div>
                                      <div class="msg">OH!<span class="triangle"></span></div>
                                    </div>
                                    <h2 class="h1">Sorry! Page not found</h2>
                                    <button class="btn btn-dark" onclick="history.back()">Go Home</button>
                                  </div>
                                </div>
                              </div>
                              <!-- Error Page -->
                            </div>
                          </div>
                        </div>
                      </div>

                      <script>
                      function randomNum() {
                        "use strict";
                        return Math.floor(Math.random() * 9) + 1;
                      }
                      var loop1, loop2, loop3, time = 30,
                        i = 0,
                        number, selector3 = document.querySelector('.thirdDigit'),
                        selector2 = document.querySelector('.secondDigit'),
                        selector1 = document.querySelector('.firstDigit');
                      loop3 = setInterval(function() {
                        "use strict";
                        if (i > 40) {
                          clearInterval(loop3);
                          selector3.textContent = 4;
                        } else {
                          selector3.textContent = randomNum();
                          i++;
                        }
                      }, time);
                      loop2 = setInterval(function() {
                        "use strict";
                        if (i > 80) {
                          clearInterval(loop2);
                          selector2.textContent = 0;
                        } else {
                          selector2.textContent = randomNum();
                          i++;
                        }
                      }, time);
                      loop1 = setInterval(function() {
                        "use strict";
                        if (i > 100) {
                          clearInterval(loop1);
                          selector1.textContent = 4;
                        } else {
                          selector1.textContent = randomNum();
                          i++;
                        }
                      }, time);
                      </script>
                      <?php
}




?>










                      <!-- Footer Section start -->



                      <div style="padding:20px;">
                        <div class="pull-right">
                          <a href="#"><b>Developed By MD SAYMUM ISLAM SIYAM <br>
                              Contact: si31siyam@gmail.com</b></a>
                        </div>
                        <div class="clearfix"></div>
                      </div>

                      <!-- /footer content -->


                      <!-- jQuery -->
                      <script src="../vendors/jquery/dist/jquery.min.js"></script>
                      <!-- Bootstrap -->
                      <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
                      <!-- FastClick -->
                      <script src="../vendors/fastclick/lib/fastclick.js"></script>
                      <!-- NProgress -->
                      <script src="../vendors/nprogress/nprogress.js"></script>
                      <!-- Chart.js -->
                      <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
                      <!-- gauge.js -->
                      <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
                      <!-- bootstrap-progressbar -->
                      <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
                      <!-- iCheck -->
                      <script src="../vendors/iCheck/icheck.min.js"></script>
                      <!-- Skycons -->
                      <script src="../vendors/skycons/skycons.js"></script>
                      <!-- Flot -->
                      <script src="../vendors/Flot/jquery.flot.js"></script>
                      <script src="../vendors/Flot/jquery.flot.pie.js"></script>
                      <script src="../vendors/Flot/jquery.flot.time.js"></script>
                      <script src="../vendors/Flot/jquery.flot.stack.js"></script>
                      <script src="../vendors/Flot/jquery.flot.resize.js"></script>
                      <!-- Flot plugins -->
                      <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
                      <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
                      <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
                      <!-- DateJS -->
                      <script src="../vendors/DateJS/build/date.js"></script>
                      <!-- JQVMap -->
                      <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
                      <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
                      <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
                      <!-- bootstrap-daterangepicker -->
                      <script src="../vendors/moment/min/moment.min.js"></script>
                      <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

                      <!-- Custom Theme Scripts -->
                      <script src="../build/js/custom.min.js"></script>
                    </div>
                  </div>

            </body>

            </html>

            <?php include 'includes/js.php'; ?>