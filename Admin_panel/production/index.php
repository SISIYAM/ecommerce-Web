<?php

include "dbcon.php";
session_start();
session_regenerate_id();

 if(!isset($_SESSION['username'])){

 
   header('location:admin_login.php');
  
 }
 $current_time= time();
 include 'php/auto.php';

include 'includes/head.php';
?>




<body class="nav-md">
  <?php include "includes/nav.php"?>
  <!-- /top navigation -->

  <!-- page content -->
  <div class="right_col" role="main">
    <!-- top tiles -->
    <div class="" style="float:right; margin-right:50px; color:#070707;">
      <h2 style="font-weight:bolder;">Date: <?php
// Set the new timezone
date_default_timezone_set('Asia/Kolkata');
$date = date('d/m/Y');
echo $date;
?></h2>
      <h2 style="font-weight:bolder;">Time: <?php date_default_timezone_set('Asia/dhaka');
$time = date('h:i A');
echo $time;
?></h2>
      <br>
      <br>


    </div>




    <div class="row" style="display: inline-block;width:350px">
      <div style="padding:30px; margin:30px; background:#0097A7;" class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="admin.php"
                  style="color:#fff;">Total Admins</a></div>
              <div class="h2 mb-0 ml-2 font-weight-bold text-gray-800">
                <a href="admin.php" style="color:#fff;"><?php
                
                $query = "SELECT id FROM  `admin` ORDER BY id";  
                $query_run = mysqli_query($con, $query);
                $row = mysqli_num_rows($query_run);
                echo ''.$row.'';
            ?> </a>
              </div>

            </div>
            <div class="col-auto mt-3" style="color:#fff; font-size:20px;">
              <i class="fa fa-users" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row" style="display: inline-block;width:350px; ">
      <div style="padding:30px; margin:30px; background:#51069D;" class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs text-uppercase font-weight-bold mb-1"><a href="orders.php" style="color:#fff;">Total
                  Orders</a></div>
              <div class="h2 mb-0 ml-2 font-weight-bold text-gray-800">
                <a href="orders.php" style="color:#fff"><?php
                
                $query = "SELECT id FROM  `orders` ORDER BY id";  
                $query_run = mysqli_query($con, $query);
                $row = mysqli_num_rows($query_run);
                echo ''.$row.'';
            ?> </a>
              </div>

            </div>
            <div class="col-auto mt-3" style="color:#fff; font-size:20px;">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row" style="display: inline-block;width:350px">
      <div style="padding:30px; margin:30px; background:#12CA12;" class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="admin.php"
                  style="color:#fff;">Total Sell</a></div>
              <div class="h2 mb-0 ml-2 font-weight-bold text-gray-800">
                <a style="color:#fff;"><?php
                
                $total_sell = 0;
                $query = "SELECT * FROM  `orders` WHERE status=4";  
                $query_run = mysqli_query($con, $query);
                $row = mysqli_num_rows($query_run);
                while($sell = mysqli_fetch_array($query_run)){
                  $total_sell = $total_sell + $sell['total_price'];
                }

                echo $total_sell."	&#2547;";

            ?> </a>
              </div>

            </div>
            <div class="col-auto mt-3" style="color:#fff; font-size:20px;">
              <i class="fa fa-money" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row" style="display: inline-block;width:350px">
      <div style="padding:30px; margin:30px; background:#6610f2;" class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="orders.php?pending"
                  style="color:#fff;">Pending Orders</a></div>
              <div class="h2 mb-0 ml-2 font-weight-bold text-gray-800">
                <a href="orders.php?pending" style="color:#fff"><?php
                
                $query = "SELECT id FROM  `orders` WHERE status=0 ORDER BY id";  
                $query_run = mysqli_query($con, $query);
                $row = mysqli_num_rows($query_run);
                echo ''.$row.'';
            ?> </a>
              </div>

            </div>
            <div class="col-auto mt-3" style="color:#fff;font-size:20px;">
              <i class="fa fa-spinner" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row" style="display: inline-block;width:350px">
      <div style="padding:30px; margin:30px; background:#EC0E0E" class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="orders.php?canceled"
                  style="color:#fff;;">Canceled Orders</a></div>
              <div class="h2 mb-0 ml-2 font-weight-bold text-gray-800">
                <a href="orders.php?canceled" style="color:#fff;"><?php
                
                $query = "SELECT id FROM  `orders` WHERE status=5 ORDER BY id";  
                $query_run = mysqli_query($con, $query);
                $row = mysqli_num_rows($query_run);
                echo ''.$row.'';
            ?> </a>
              </div>

            </div>
            <div class="col-auto mt-3" style="color:#fff;font-size:20px;">
              <i class="fa fa-times" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row" style="display: inline-block;width:350px">
      <div style="padding:30px; margin:30px; background:#1A237E;" class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a
                  href="orders.php?Ready-for-delivery"" style=" color:#fff;">Ready For Delivery</a></div>
              <div class="h2 mb-0 ml-2 font-weight-bold text-gray-800">
                <a href="orders.php?Ready-for-delivery" style="color:#fff;"><?php
                
                $query = "SELECT id FROM  `orders` WHERE status=3 ORDER BY id";  
                $query_run = mysqli_query($con, $query);
                $row = mysqli_num_rows($query_run);
                echo ''.$row.'';
            ?> </a>
              </div>

            </div>
            <div class="col-auto mt-3" style="color:#fff; font-size:20px;">
              <i class="fa fa-truck" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row" style="display: inline-block;width:350px">
      <div style="padding:30px; margin:30px; background:#31B43F;" class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="orders.php?delivered"
                  style="color:#fff;">Delivered Orders</a></div>
              <div class="h2 mb-0 ml-2 font-weight-bold text-gray-800">
                <a href="orders.php?delivered" style="color:#fff;"><?php
                
                $query = "SELECT id FROM  `orders` WHERE status=4 ORDER BY id";  
                $query_run = mysqli_query($con, $query);
                $row = mysqli_num_rows($query_run);
                echo ''.$row.'';
            ?> </a>
              </div>

            </div>
            <div class="col-auto mt-3" style="color:#fff;font-size:20px;">
              <i class="fa fa-check" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row" style="display: inline-block;width:350px">
      <div style="padding:30px; margin:30px; background: #ffc107;" class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="list.php?products"
                  style="color:#000000;">Total Products</a></div>
              <div class="h2 mb-0 ml-2 font-weight-bold text-gray-800">
                <a href="list.php?products" style="color:#000000;"><?php
                
                $query = "SELECT id FROM  `products` ORDER BY id";  
                $query_run = mysqli_query($con, $query);
                $row = mysqli_num_rows($query_run);
                echo ''.$row.'';
            ?> </a>
              </div>

            </div>
            <div class="col-auto mt-3" style="color:#000000;font-size:20px;">
              <i class="fa fa-cubes" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>





    <div class="row" style="display: inline-block;width:350px">
      <div style="padding:30px; margin:30px; background:#F5521E;" class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="admin.php"
                  style="color:#fff;">Total Users</a></div>
              <div class="h2 mb-0 ml-2 font-weight-bold text-gray-800">
                <a href="admin.php" style="color:#fff;"><?php
                
                $query = "SELECT id FROM  `user` ORDER BY id";  
                $query_run = mysqli_query($con, $query);
                $row = mysqli_num_rows($query_run);
                echo ''.$row.'';
            ?> </a>
              </div>

            </div>
            <div class="col-auto mt-3" style="color:#fff; font-size:20px;">
              <i class="fa fa-users" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row" style="display: inline-block;width:350px">
      <div style="padding:30px; margin:30px; background:#351DFF;" class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="list.php?Review"
                  style="color:#fff;">Reviews</a></div>
              <div class="h2 mb-0 ml-2 font-weight-bold text-gray-800">
                <a href="list.php?Review" style="color:#fff;"><?php
                
                $query = "SELECT r_id FROM  `review` ORDER BY r_id";  
                $query_run = mysqli_query($con, $query);
                $row = mysqli_num_rows($query_run);
                echo ''.$row.'';
            ?> </a>
              </div>

            </div>
            <div class="col-auto mt-3" style="color:#fff; font-size:20px;">
              <i class="fa fa-star" aria-hidden="true"></i>

            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row" style="display: inline-block;width:350px">
      <div style="padding:30px; margin:30px; background:#d63384;" class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="list.php?coupon-code"
                  style="color:#fff;">Total Coupons</a></div>
              <div class="h2 mb-0 ml-2 font-weight-bold text-gray-800">
                <a href="list.php?coupon-code" style="color:#fff;"><?php
                
                $query = "SELECT cupon_id FROM  `cupon` ORDER BY cupon_id";  
                $query_run = mysqli_query($con, $query);
                $row = mysqli_num_rows($query_run);
                echo ''.$row.'';
            ?> </a>
              </div>

            </div>
            <div class="col-auto mt-3" style="color:#fff; font-size:20px;">
              <i class="fa fa-gift" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>




    <div style="padding:50px 0;">

      <table class="table shadow h-100 py-2">
        <thead class="thead-white shadow h-100 py-2">
          <tr>
            <th scope="col">Recent Orders</th>

          </tr>
        </thead>
        <thead class="thead-dark">
          <tr>
            <th scope="col">Order ID</th>
            <th scope="col">Price</th>
            <th scope="col">Payment</th>
            <th scope="col">Order Placed</th>
            <th scope="col">Order Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php

$order_recent = "SELECT * FROM orders ORDER BY id DESC LIMIT 5 ";
$order_recent_query = mysqli_query($con,$order_recent);
$order_recent_nums = mysqli_num_rows($order_recent_query);

while($recent_orders = mysqli_fetch_array($order_recent_query)){
  ?>
          <tr>
            <td style="color:black; font-weight:bold;"><?=$recent_orders['order_no'];?></td>
            <td><?=$recent_orders['total_price'];?> &#2547;</td>
            <td><?=$recent_orders['payment_method'];?></td>
            <td><?=$recent_orders['created_date']." at ".$recent_orders['created_time'];?></td>
            <td><?php
  if($recent_orders['status'] == 0){
    ?>
              <span class="badge bg-dark text-white p-1 fw-bold">Processing</span>
              <?php
  }elseif($recent_orders['status'] == 1){
    ?>
              <span class="badge bg-warning text-dark p-1 fw-bold">Order Confirmed</span>
              <?php
  }elseif($recent_orders['status'] == 2){
    ?>
              <span class="badge bg-info text-white p-1 fw-bold">On the way</span>
              <?php
  }elseif($recent_orders['status'] == 3){
    ?>
              <span class="badge bg-light text-dark p-1 fw-bold">Ready for Delivery</span>
              <?php
  }elseif($recent_orders['status'] == 4){
    ?>
              <span class="badge bg-success text-white p-1 fw-bold">Delivered</span>
              <?php
  }else{
    ?>
              <span class="badge bg-danger text-white p-1 fw-bold">Canceled</span>
              <?php
  }
  ?>
            </td>
            <td><a href="details.php?Order-ID=<?=$recent_orders['order_no']?>"><button
                  class="btn btn-primary btn-sm">Open</button></a></td>
          </tr>
          <?php
}

?>








        </tbody>
      </table>
    </div>







  </div>
  <br />






  <!-- /page content -->

  <!-- footer content -->
  <?php include "includes/footer.php" ?>

</body>

</html>


<?php include 'includes/js.php'; ?>