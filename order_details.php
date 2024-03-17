<?php include 'includes/header.php'; 

    $order_ID = $_GET['order-ID'];

    

?>

<!DOCTYPE html>
<html lang="zxx">

<head>

  <?php include 'includes/head.php';?>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
  @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');




  .card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 0.10rem;
    box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    margin: 30px 0;

  }

  .card-header:first-child {
    border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
  }

  .card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1)
  }

  .track {
    position: relative;
    background-color: #ddd;
    height: 7px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-bottom: 60px;
    margin-top: 50px
  }

  .track .step {
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    width: 25%;
    margin-top: -18px;
    text-align: center;
    position: relative
  }

  .track .step.active:before {
    background: #FF5722
  }

  .track .step::before {
    height: 7px;
    position: absolute;
    content: "";
    width: 100%;
    left: 0;
    top: 18px
  }

  .track .step.active .icon {
    background: #ee5435;
    color: #fff
  }

  .track .icon {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    position: relative;
    border-radius: 100%;
    background: #ddd
  }

  .track .step.active .text {
    font-weight: 400;
    color: #000
  }

  .track .text {
    display: block;
    margin-top: 7px
  }

  .itemside {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    width: 100%
  }

  .itemside .aside {
    position: relative;
    -ms-flex-negative: 0;
    flex-shrink: 0
  }

  .img-sm {
    width: 80px;
    height: 80px;
    padding: 7px
  }

  ul.row,
  ul.row-sm {
    list-style: none;
    padding: 0
  }

  .itemside .info {
    padding-left: 15px;
    padding-right: 7px
  }

  .itemside .title {
    display: block;
    margin-bottom: 5px;
    color: #212529
  }

  p {
    margin-top: 0;
    margin-bottom: 1rem
  }

  .btn-warning {
    color: #ffffff;
    background-color: #ee5435;
    border-color: #ee5435;
    border-radius: 1px
  }

  .btn-warning:hover {
    color: #ffffff;
    background-color: #ff2b00;
    border-color: #ff2b00;
    border-radius: 1px
  }

  .delivery_details {
    display: flex;

  }

  .delivery_details label {
    padding: 5px;
    font-weight: bold;
  }

  .delivery_details p {
    padding: 5px;
    color: #000000;
    font-weight: 600;
  }
  </style>



</head>

<body>



  <?php include 'includes/nav.php'; ?>



  <!--========================Cancel Confirm Modal===============================-->
  <div class="modal fade" id="CancelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Cancel Your Order?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="includes/code.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="order_no" class="cancel_order_no">
            <b>Select "Confirm" below if You are ready to Cancel this order.</b>
          </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>



            <button type="submit" name="cancelBtn" class="btn btn-danger">Confirm</button>

        </form>


      </div>
    </div>
  </div>
  </div>
  <!--======================== End Cancel  Modal===============================-->


  <!-------Body------------->

  <?php
$orders = "SELECT * FROM orders WHERE user_id='$user_id' AND order_no='$order_ID'";
$order_query = mysqli_query($con,$orders);

if(mysqli_num_rows($order_query) > 0){
?>

  <?php while($order_result= mysqli_fetch_array($order_query)){
    
    //Get Details From Order Table
    $customer_order_no= $order_result['order_no'];
    $customer_name= $order_result['name'];
    $customer_mobile= $order_result['mobile'];
    $customer_email= $order_result['email'];
    $customer_address= $order_result['address'];
    $order_status= $order_result['status'];
    $comment= $order_result['comment'];
    $payment_method= $order_result['payment_method'];
    $cancellation_time= $order_result['cancellation_time'];

    $coupon_discount= $order_result['coupon_discount'];
    $total_price= $order_result['total_price'];
    $estimate_delivery = $order_result['estimate_delivery'];
    $created_date = $order_result['created_date'];
    $created_time = $order_result['created_time'];
}



?>

  <div class="container">
    <article class="card">
      <header class=" btn btn-success"> <b>Order ID: #<?php echo $customer_order_no; ?></b></header>
      <div class="card-body">
        <h4 style="font-weight:bold;">Delivery Details </h4>
        <div class="delivery_details">

          <label for="name">Order ID :</label>
          <p style="color:black; font-weight:bold;">#<?php echo $customer_order_no; ?></p>

        </div>

        <div class="delivery_details">
          <label for="name">Name :</label>
          <p><?php echo $customer_name; ?></p>
        </div>

        <div class="delivery_details">
          <label for="name">Mobile :</label>
          <p><?php echo $customer_mobile; ?></p>
        </div>

        <div class="delivery_details">
          <label for="name">Email :</label>
          <p><?php echo $customer_email; ?></p>
        </div>


        <?php
$user_data = "SELECT * FROM user WHERE id='$user_id'";
$user_data_query= mysqli_query($con,$user_data);

if(mysqli_num_rows($user_data_query) > 0){

  while($user_result = mysqli_fetch_array($user_data_query)){
    $postal_code = $user_result['postal_code'];
    $city = $user_result['city'];
    $division = $user_result['division'];
  }

    

}
?>





        <div class="delivery_details">
          <label for="name">Address :</label>
          <p><?php echo $customer_address; ?>, Postal Code: <?php echo $postal_code; ?>,
            City: <?php echo $city; ?>, Division: <?php echo $division; ?></p>
        </div>




        <?php


// Set the new timezone
date_default_timezone_set('Asia/Kolkata');
$current_date = $created_date;

 date_default_timezone_set('Asia/dhaka');
$current_time = date('h:i A');

$yearData= strtotime($current_date);
$date= date('d M Y', $yearData);




    $Estimated = date('d M Y',strtotime("+$estimate_delivery days", strtotime($current_date)));




?>

        <article class="card">
          <div class="card-body row">

            <div class="col"> <strong>Estimated Delivery time:</strong> <br><?php echo $Estimated;   ?> <br>
              <p>placed on: <?php echo $created_date." at ".$created_time?> </p>
            </div>

            <?php
/// Condition For Status
if($order_status == 0){

    ?>

            <div class="col"> <strong>Status:</strong> <br>
              <p class="badge bg-dark p-1" style="color:#fff; font-weight:500""> Order Processing</p> </div>
                <div class=" col"> <strong>Tracking #:</strong> <br> <b
                  style="color:#1a9cb7;"><?php echo $order_ID; ?></b>
            </div>
          </div>
        </article>
        <div class="track">
          <div class="step active"> <span class="icon"> <i class="fa fa-spinner"></i> </span> <span class="text">Order
              Processing</span> </div>

          <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way
            </span> </div>
          <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for
              Delivery</span> </div>
          <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered</span>
          </div>
        </div>

        <?php


}elseif($order_status == 1){
    ?>

        <div class="col"> <strong>Status:</strong> <br>
          <p class="badge bg-warning p-1" style="color:#000000; font-weight:500"> Order Confirmed</p>
        </div>
        <div class="col"> <strong>Tracking #:</strong> <br> <b style="color:#1a9cb7;"><?php echo $order_ID; ?></b>
        </div>
      </div>
    </article>
    <div class="track">
      <div class="step active"> <span class="icon"> <i class="fa fa-spinner"></i> </span> <span class="text">Order
          Processing</span> </div>

      <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order
          Confirmed</span> </div>

      <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span>
      </div>
      <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for
          Delivery</span> </div>
      <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered</span>
      </div>

    </div>

    <?php
}elseif($order_status == 2){
    ?>

    <div class="col"> <strong>Status:</strong> <br>
      <p class="badge bg-info p-1" style="color:#fff; font-weight:500"> On the way</p>
    </div>
    <div class="col"> <strong>Tracking #:</strong> <br> <b style="color:#1a9cb7;"><?php echo $order_ID; ?></b> </div>
  </div>
  </article>
  <div class="track">
    <div class="step active"> <span class="icon"> <i class="fa fa-spinner"></i> </span> <span class="text">Order
        Processing</span> </div>

    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order
        Confirmed</span> </div>

    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way
      </span> </div>
    <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for
        Delivery</span> </div>
    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered</span>
    </div>
  </div>

  <?php
}elseif($order_status == 3){
    ?>

  <div class="col"> <strong>Status:</strong> <br>
    <p class="badge bg-primary p-1" style="color:#fff; font-weight:500"">Ready for Delivery</p> </div>
    <div class=" col"> <strong>Tracking #:</strong> <br> <b style="color:#1a9cb7;"><?php echo $order_ID; ?></b>
  </div>
  </div>
  </article>
  <div class="track">
    <div class="step active"> <span class="icon"> <i class="fa fa-spinner"></i> </span> <span class="text">Order
        Processing</span> </div>

    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order
        Confirmed</span> </div>

    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way
      </span> </div>
    <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for
        Delivery</span> </div>
    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered</span>
    </div>
  </div>

  <?php
}elseif($order_status == 4){
    ?>

  <div class="col"> <strong>Status:</strong> <br>
    <p class="badge bg-success p-1" style="color:#fff; font-weight:500">Delivered</p>
  </div>
  <div class="col"> <strong>Tracking #:</strong> <br> <b style="color:#1a9cb7;"><?php echo $order_ID; ?></b> </div>
  </div>
  </article>
  <div class="track">
    <div class="step active"> <span class="icon"> <i class="fa fa-spinner"></i> </span> <span class="text">Order
        Processing</span> </div>

    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order
        Confirmed</span> </div>

    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way
      </span> </div>
    <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Ready for
        Delivery</span> </div>
    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span
        class="text">Delivered</span> </div>
  </div>

  <?php
}else{
    ?>

  <div class="col"> <strong>Status:</strong> <br>
    <p class="badge bg-danger p-1" style="color:#fff; font-weight:500">Canceled</p>
  </div>
  <div class="col"> <strong>Tracking #:</strong> <br> <b style="color:#1a9cb7;"><?php echo $order_ID; ?></b> </div>
  </div>
  </article>
  <div class="track">
    <div class="step active"> <span class="icon"> <i class="fa fa-spinner"></i> </span> <span class="text">Order
        Processing</span> </div>
    <div class="step active"> <span class="icon"> <i class="fa fa-spinner"></i> </span> <span class="text">Order
        Processing</span> </div>

    <div class="step active"> <span class="icon"> <i class="fa fa-times"></i> </span> <span class="text">Order
        Canceled</span> </div>
  </div>


  <?php
}

    ?>
  <hr>
  <div class="row py-5 p-4 bg-white rounded shadow-sm">
    <div class="col-lg-6">
      <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order Details</div>
      <div class="p-4">
        <!----->


        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" class="border-0 bg-light">
                  <div class="p-2 px-3 text-uppercase"></div>
                </th>
                <th scope="col" class="border-0 bg-light">
                  <div class="p-2 px-3 text-uppercase">Product</div>
                </th>

                <th scope="col" class="border-0 bg-light">
                  <div class="py-2 text-uppercase">Quantity</div>
                </th>
                <th scope="col" class="border-0 bg-light">
                  <div class="py-2 text-uppercase">Price</div>
        </div>
        </th>

        </tr>
        </thead>
        <tbody>


          <?php
$order_subtotal = 0;
$total_shipping_charge =0;



$order_details_show_query = "SELECT o.id as oid, o.order_no, o.user_id, oi.*,p.* FROM orders o, order_items oi,
products p WHERE o.user_id='$user_id' AND o.id = oi.order_id AND p.id = oi.product_id AND o.order_no = '$order_ID'";
$order_details_show_query_run = mysqli_query($con,$order_details_show_query);
$order_details_show_query_num = mysqli_num_rows($order_details_show_query_run);

while($order_details_show_query_result = mysqli_fetch_array($order_details_show_query_run))
{
    ?>


          <?php $total_shipping_charge = $total_shipping_charge + $order_details_show_query_result['shipping_charge'];?>

          <?php $order_subtotal = $order_subtotal + $order_details_show_query_result['qty'] * $order_details_show_query_result['price'] ?>




          <tr class="product_data">

            <td class="border-0 align-middle" style=""><img
                src="Admin_panel/production/<?php echo $order_details_show_query_result['image'];?>" alt="" height=30
                width="30" class="img-fluid rounded shadow-sm"> </td>
            <td class="border-0 align-middle" style="font-size:14px; ">
              <strong><?php echo $order_details_show_query_result['name'];?></strong> </td>
            <td class="border-0 align-middle"><strong><?php echo $order_details_show_query_result['qty'];?></strong>
            </td>

            <td class="border-0 align-middle">
              <strong><?php echo $order_details_show_query_result['qty'] * $order_details_show_query_result['price'];?>
                &#2547; </strong> <br>
              (<?php echo $order_details_show_query_result['qty']; ?> x
              <?php echo $order_details_show_query_result['price'];?>+<?php echo $order_details_show_query_result['shipping_charge'];?>)&#2547;
            </td>
          </tr>

          <?php

}
?>


        </tbody>
        </table>
      </div>



    </div>
    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions for seller</div>
    <div class="p-4">
      <?php
            if($comment > 0){
                ?>
      <p class="font-italic mb-4 alert alert-success"><?php echo $comment; ?></p>
      <?php
            }
            ?>

    </div>
  </div>
  <div class="col-lg-6">
    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
    <div class="p-4">
      <p class="font-italic mb-4">Shipping and additional costs are calculated based on your cart.</p>
      <ul class="list-unstyled mb-4">
        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal
          </strong>
          <h5><?php echo $order_subtotal ?> &#2547;</h5>
        </li>
        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping
            Charge</strong>
          <h5><?php echo $total_shipping_charge ?> &#2547;</h5>
        </li>
        <?php 
                if($coupon_discount > 0){
                    ?>
        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Coupon
            Discount</strong>
          <h5>- <?php echo $coupon_discount ?> &#2547;</h5>
        </li>

        <?php
                }
              ?>
        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
          <h5 class="font-weight-bold"><?php echo $total_price ?> &#2547;</h5>
        </li>
      </ul>

      <span class="btn btn-dark px-4 rounded-pill ">Payment Method : <?php echo $payment_method ?></span>


      <?php
          // condition for cancel orders
        if(time() - $cancellation_time < 3600 && $order_status == 0){
            ?>

      <button type="submit" id="cancelBtn" class="btn btn-danger" value="<?php echo $order_ID; ?>" style="float:right">
        Cancel Order</button>


      <?php
          }
          ?>


    </div>
  </div>
  </div>
  <hr>
  <a href="<?php echo $_SESSION['url']; ?>" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i>
    Back to orders</a>
  </div>
  </article>
  </div>

  <?php

}else{
    
    ?>

  <div class="container">
    <article class="card" style="margin:30px 0;">
      <header class=" btn btn-success"> <b>Order ID: <?php echo $order_ID; ?></b></header>
      <div class="card-body">

        <h1 class="alert alert-danger">Invalid Order ID (<?php echo $order_ID; ?>).</h1>

      </div>
  </div>

  <?php


}

               
?>



















  <!-- Footer Section Begin -->
  <?php include'includes/footer.php' ?>
  <!-- Footer Section End -->

  <!-- Js Plugins -->
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/jquery.slicknav.js"></script>
  <script src="js/mixitup.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/custom.js"></script>


  <!-------- PopUp------->

  <script>
  $(document).ready(function() {
    $('#cartBtn').click(function(e) {
      e.preventDefault();
      $('#cartmodel').modal('show');
    });
  });


  $(document).ready(function() {
    $('#wishBtn').click(function(e) {
      e.preventDefault();
      $('#wishlistmodel').modal('show');
    });
  });
  </script>

  <!--------Delete PopUp------->

  <script>
  $(document).ready(function() {
    $('#cancelBtn').click(function(e) {
      e.preventDefault();

      var order_no = $(this).val();
      $('.cancel_order_no').val(order_no);
      $('#CancelModal').modal('show');
    });
  });
  </script>


</body>

</html>