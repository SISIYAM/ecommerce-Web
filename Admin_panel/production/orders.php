<?php
session_start();
session_regenerate_id();


include 'php/auto.php';
?>
<?php 
include 'dbcon.php' ;
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
include 'includes/head.php';
?>


<body class="nav-md">

  <?php include "includes/nav.php" ?>





  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">

      <?php
if(isset($_GET['pending'])){



 ?>

      <!---start---->


      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">



            <h2>Orders List<small></small></h2>
            <ul class="nav navbar-right panel_toolbox">



              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>


            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">

                  <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Order ID</th>
                        <th>Price</th>
                        <th>Payment</th>
                        <th>Order Placed</th>
                        <th>Order Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>

                      <!---php Code start---->
                      <?php
$no = 1 ;
$selectquery = "select * from  orders where status=0 order by id desc";
$query = mysqli_query($con,$selectquery);
$nums = mysqli_num_rows($query);

while($res= mysqli_fetch_array($query)){
   ?>

                      <!----Exra---->

                      <?php $idst = $res['id'];?>


                      <!----End---->
                      <?php $name= $res['name']; ?>


                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $res['order_no']; ?></td>
                        <td><?php echo $res['total_price']; ?> &#2547;</td>
                        <td><?php echo $res['payment_method']; ?></td>
                        <td><?php echo $res['created_date']." at ".$res['created_time'] ?></td>
                        <td>
                          <?php
      if($res['status'] == 0){
        ?>
                          <span class="badge bg-secondary text-white p-1 fw-bold">Processing</span>
                          <?php
      }elseif($res['status'] == 1){
        ?>
                          <span class="btn btn-warning btn-sm">Order Confirmed</span>
                          <?php
      }elseif($res['status'] == 2){
        ?>
                          <span class="btn btn-info btn-sm">On the way</span>
                          <?php
      }elseif($res['status'] == 3){
        ?>
                          <span class="btn btn-light btn-sm">Ready for Delivery</span>
                          <?php
      }elseif($res['status'] == 4){
        ?>
                          <span class="btn btn-success btn-sm">Delivered</span>
                          <?php
      }else{
        ?>
                          <span class="btn btn-danger btn-sm">Canceled</span>
                          <?php
      }
      ?>
                        </td>

                        <td>
                          <a href="details.php?Order-ID=<?php echo $res['order_no'] ?>"><input type="submit"
                              value="Open" class="btn btn-primary btn-sm"> </a>

                        </td>



                      </tr>
                      <?php

  $no++ ; 
}


?>



                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!----END---->

      <?php
}elseif(isset($_GET['canceled'])){


  ?>
      <!---start---->


      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">



            <h2>Orders List<small></small></h2>
            <ul class="nav navbar-right panel_toolbox">



              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>


            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">

                  <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Order ID</th>
                        <th>Price</th>
                        <th>Payment</th>
                        <th>Order Placed</th>
                        <th>Order Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>

                      <!---php Code start---->
                      <?php
$no = 1 ;
$selectquery = "select * from  orders where status=5 order by id desc";
$query = mysqli_query($con,$selectquery);
$nums = mysqli_num_rows($query);

while($res= mysqli_fetch_array($query)){
   ?>

                      <!----Exra---->

                      <?php $idst = $res['id'];?>


                      <!----End---->
                      <?php $name= $res['name']; ?>


                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $res['order_no']; ?></td>
                        <td><?php echo $res['total_price']; ?> &#2547;</td>
                        <td><?php echo $res['payment_method']; ?></td>
                        <td><?php echo $res['created_date']." at ".$res['created_time'] ?></td>
                        <td>
                          <?php
      if($res['status'] == 0){
        ?>
                          <span class="btn btn-secondary btn-sm">Processing</span>
                          <?php
      }elseif($res['status'] == 1){
        ?>
                          <span class="btn btn-warning btn-sm">Order Confirmed</span>
                          <?php
      }elseif($res['status'] == 2){
        ?>
                          <span class="btn btn-info btn-sm">On the way</span>
                          <?php
      }elseif($res['status'] == 3){
        ?>
                          <span class="btn btn-light btn-sm">Ready for Delivery</span>
                          <?php
      }elseif($res['status'] == 4){
        ?>
                          <span class="btn btn-success btn-sm">Delivered</span>
                          <?php
      }else{
        ?>
                          <span class="badge bg-danger text-white p-1 fw-bold">Canceled</span>
                          <?php
      }
      ?>
                        </td>

                        <td>
                          <a href="details.php?Order-ID=<?php echo $res['order_no'] ?>"><input type="submit"
                              value="Open" class="btn btn-primary btn-sm"> </a>

                        </td>



                      </tr>
                      <?php

  $no++ ; 
}


?>



                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!----END---->
      <?php
}elseif(isset($_GET['delivered'])){


 
?>
      <!---start---->


      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">



            <h2>Orders List<small></small></h2>
            <ul class="nav navbar-right panel_toolbox">



              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>


            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">

                  <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Order ID</th>
                        <th>Price</th>
                        <th>Payment</th>
                        <th>Order Placed</th>
                        <th>Order Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>

                      <!---php Code start---->
                      <?php
$no = 1 ;
$selectquery = "select * from  orders where status=4 order by id desc";
$query = mysqli_query($con,$selectquery);
$nums = mysqli_num_rows($query);

while($res= mysqli_fetch_array($query)){
   ?>

                      <!----Exra---->

                      <?php $idst = $res['id'];?>


                      <!----End---->
                      <?php $name= $res['name']; ?>


                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $res['order_no']; ?></td>
                        <td><?php echo $res['total_price']; ?> &#2547;</td>
                        <td><?php echo $res['payment_method']; ?></td>
                        <td><?php echo $res['created_date']." at ".$res['created_time'] ?></td>
                        <td>
                          <?php
      if($res['status'] == 0){
        ?>
                          <span class="btn btn-secondary btn-sm">Processing</span>
                          <?php
      }elseif($res['status'] == 1){
        ?>
                          <span class="btn btn-warning btn-sm">Order Confirmed</span>
                          <?php
      }elseif($res['status'] == 2){
        ?>
                          <span class="btn btn-info btn-sm">On the way</span>
                          <?php
      }elseif($res['status'] == 3){
        ?>
                          <span class="btn btn-light btn-sm">Ready for Delivery</span>
                          <?php
      }elseif($res['status'] == 4){
        ?>
                          <span class="badge bg-success text-white p-1 fw-bold">Delivered</span>
                          <?php
      }else{
        ?>
                          <span class="btn btn-danger btn-sm">Canceled</span>
                          <?php
      }
      ?>
                        </td>

                        <td>
                          <a href="details.php?Order-ID=<?php echo $res['order_no'] ?>"><input type="submit"
                              value="Open" class="btn btn-primary btn-sm"> </a>

                        </td>



                      </tr>
                      <?php

  $no++ ; 
}


?>



                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!----END---->
      <?php
  
}elseif(isset($_GET['Ready-for-delivery'])){
  ?>
      <!---start---->


      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">



            <h2>Orders List<small></small></h2>
            <ul class="nav navbar-right panel_toolbox">



              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>


            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">

                  <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Order ID</th>
                        <th>Price</th>
                        <th>Payment</th>
                        <th>Order Placed</th>
                        <th>Order Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>

                      <!---php Code start---->
                      <?php
$no = 1 ;
$selectquery = "select * from  orders where status=3 order by id desc";
$query = mysqli_query($con,$selectquery);
$nums = mysqli_num_rows($query);

while($res= mysqli_fetch_array($query)){
   ?>

                      <!----Exra---->

                      <?php $idst = $res['id'];?>


                      <!----End---->
                      <?php $name= $res['name']; ?>


                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $res['order_no']; ?></td>
                        <td><?php echo $res['total_price']; ?> &#2547;</td>
                        <td><?php echo $res['payment_method']; ?></td>
                        <td><?php echo $res['created_date']." at ".$res['created_time'] ?></td>
                        <td>
                          <?php
      if($res['status'] == 0){
        ?>
                          <span class="btn btn-secondary btn-sm">Processing</span>
                          <?php
      }elseif($res['status'] == 1){
        ?>
                          <span class="btn btn-warning btn-sm">Order Confirmed</span>
                          <?php
      }elseif($res['status'] == 2){
        ?>
                          <span class="btn btn-info btn-sm">On the way</span>
                          <?php
      }elseif($res['status'] == 3){
        ?>
                          <span class="badge bg-light text-dark p-1 fw-bold">Ready for Delivery</span>
                          <?php
      }elseif($res['status'] == 4){
        ?>
                          <span class="badge bg-success text-white p-1 fw-bold">Delivered</span>
                          <?php
      }else{
        ?>
                          <span class="btn btn-danger btn-sm">Canceled</span>
                          <?php
      }
      ?>
                        </td>

                        <td>
                          <a href="details.php?Order-ID=<?php echo $res['order_no'] ?>"><input type="submit"
                              value="Open" class="btn btn-primary btn-sm"> </a>

                        </td>



                      </tr>
                      <?php

  $no++ ; 
}


?>



                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!----END---->
      <?php
}elseif(isset($_GET['all-seals'])){

  $all_seals = $_GET['all-seals'];

?>
      <!---start---->


      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">



            <h2>Orders List<small></small></h2>
            <ul class="nav navbar-right panel_toolbox">



              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>


            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">

                  <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Order ID</th>

                        <th>Order Placed</th>
                        <th>Order Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>

                      <!---php Code start---->
                      <?php
$no = 1 ;
$selectquery = "select * from  order_items where product_id='$all_seals' and order_status=4 order by o_id desc";
$query = mysqli_query($con,$selectquery);
$nums = mysqli_num_rows($query);

while($res= mysqli_fetch_array($query)){
   ?>

                      <!----Exra---->




                      <!----End---->



                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $res['orderNo']; ?></td>
                        <td><?php echo $res['created_date']." at ".$res['created_time'] ?></td>


                        <td>
                          <?php
      if($res['order_status'] == 0){
        ?>
                          <span class="badge bg-secondary text-white p-1 fw-bold">Processing</span>
                          <?php
      }elseif($res['order_status'] == 1){
        ?>
                          <span class="badge bg-warning text-dark p-1 fw-bold">Order Confirmed</span>
                          <?php
      }elseif($res['order_status'] == 2){
        ?>
                          <span class="badge bg-info text-white p-1 fw-bold">On the way</span>
                          <?php
      }elseif($res['order_status'] == 3){
        ?>
                          <span class="badge bg-light text-dark p-1 fw-bold">Ready for Delivery</span>
                          <?php
      }elseif($res['order_status'] == 4){
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

                        <td>
                          <a href="details.php?Order-ID=<?php echo $res['orderNo'] ?>"><input type="submit" value="Open"
                              class="btn btn-primary btn-sm"> </a>

                        </td>



                      </tr>
                      <?php

  $no++ ; 
}


?>



                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!----END---->
      <?php

}else{
  ?>
      <!---start---->


      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">



            <h2>Orders List<small></small></h2>
            <ul class="nav navbar-right panel_toolbox">



              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>


            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">

                  <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Order ID</th>
                        <th>Price</th>
                        <th>Payment</th>
                        <th>Order Placed</th>
                        <th>Order Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>

                      <!---php Code start---->
                      <?php
$no = 1 ;
$selectquery = "select * from  orders order by id desc";
$query = mysqli_query($con,$selectquery);
$nums = mysqli_num_rows($query);

while($res= mysqli_fetch_array($query)){
   ?>

                      <!----Exra---->

                      <?php $idst = $res['id'];?>


                      <!----End---->
                      <?php $name= $res['name']; ?>


                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $res['order_no']; ?></td>
                        <td><?php echo $res['total_price']; ?> &#2547;</td>
                        <td><?php echo $res['payment_method']; ?></td>
                        <td><?php echo $res['created_date']." at ".$res['created_time'] ?></td>
                        <td>
                          <?php
      if($res['status'] == 0){
        ?>
                          <span class="badge bg-secondary text-white p-1 fw-bold">Processing</span>
                          <?php
      }elseif($res['status'] == 1){
        ?>
                          <span class="badge bg-warning text-dark p-1 fw-bold">Order Confirmed</span>
                          <?php
      }elseif($res['status'] == 2){
        ?>
                          <span class="badge bg-info text-white p-1 fw-bold">On the way</span>
                          <?php
      }elseif($res['status'] == 3){
        ?>
                          <span class="badge bg-light text-dark p-1 fw-bold">Ready for Delivery</span>
                          <?php
      }elseif($res['status'] == 4){
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

                        <td>
                          <a href="details.php?Order-ID=<?php echo $res['order_no'] ?>"><input type="submit"
                              value="Open" class="btn btn-primary btn-sm"> </a>

                        </td>



                      </tr>
                      <?php

  $no++ ; 
}


?>



                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!----END---->
      <?php
}
  
?>




      <!-- /page content -->

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          <a href="#"><b>Developed By MD SAYMUM ISLAM SIYAM <br>
              Contact:si31siyam@gmail.com</b></a>
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="../vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="../vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="../vendors/nprogress/nprogress.js"></script>
  <!-- iCheck -->
  <script src="../vendors/iCheck/icheck.min.js"></script>
  <!-- Datatables -->
  <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  <script src="../vendors/jszip/dist/jszip.min.js"></script>
  <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
  <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="../build/js/custom.min.js"></script>


  <!-- AlertyFy js -->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>


  <script>
  <?php 
          if(isset($_SESSION['message'])){
          ?>

  alertify.set('notifier', 'position', 'top-right');
  alertify.success('<?= $_SESSION['message']; ?>');
  <?php

          unset($_SESSION['message']);

          }
            ?>
  </script>

  <script>
  <?php 
          if(isset($_SESSION['error'])){
          ?>

  alertify.set('notifier', 'position', 'top-right');
  alertify.error('<?= $_SESSION['error']; ?>');
  <?php

          unset($_SESSION['error']);

          }
            ?>
  </script>
</body>

</html>

<?php include 'includes/js.php'; ?>