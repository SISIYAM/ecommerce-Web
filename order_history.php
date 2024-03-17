<?php include 'includes/header.php'; ?>


<?php 
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
?>

<head>
  <?php include 'includes/head.php';?>


</head>

<body>



  <?php include 'includes/nav.php'; ?>






  <!-------Body------------->



  <div class="px-4 px-lg-0">


    <div class="pb-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 p-4 bg-white rounded shadow-sm mb-5">

            <!-- Shopping cart table -->
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" class="border-0 bg-light">
                      <div class="p-2 px-3 text-uppercase">No.</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="p-2 px-3 text-uppercase">Order ID</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="p-2 px-3 text-uppercase">Name</div>
                    </th>

                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 text-uppercase">Price</div>
                    </th>

                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 text-uppercase">Payment</div>
                    </th>

                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 text-uppercase">Order Placed</div>
            </div>
            </th>
            <th scope="col" class="border-0 bg-light">
              <div class="py-2 text-uppercase">Order Status</div>
          </div>
          </th>
          <th scope="col" class="border-0 bg-light">
            <div class="py-2 text-uppercase">View</div>
          </th>
          </tr>
          </thead>
          <tbody>

            <?php
$no = 1;
$order_show_query = "select * from orders where  user_id =$user_id order by id desc";
$order_show_query_run = mysqli_query($con,$order_show_query);
$order_show_query_num = mysqli_num_rows($order_show_query_run);

while($order_show_query_result = mysqli_fetch_array($order_show_query_run))
{
    ?>

            <tr class="product_data">
              <td class="border-0 align-middle"><strong><?php echo $no; ?></strong></td>
              <td class="border-0 align-middle"><strong><?php echo $order_show_query_result['order_no']; ?></strong>
              </td>
              <td class="border-0 align-middle"><strong><?php echo $order_show_query_result['name']; ?> </strong></td>
              <td class="border-0 align-middle"><strong
                  class="text-danger"><?php echo $order_show_query_result['total_price'] ?> &#2547;</strong></td>
              <td class="border-0 align-middle"><strong><?php echo $order_show_query_result['payment_method']; ?>
                </strong></td>
              <td class="border-0 align-middle">
                <strong><?php echo $order_show_query_result['created_date']." at ".$order_show_query_result['created_time'] ?></strong>
              </td>
              <td class="border-0 align-middle"><strong>

                  <?php
                 if($order_show_query_result['status'] == 0){
                  echo"<span class='badge bg-dark p-1' style='font-weight:500; color:#fff;'>Processing</span>";
                 }elseif($order_show_query_result['status'] == 1){
                  echo"<span class='badge bg-warning p-1' style='font-weight:500; color:#000000'>Order Confirmed</span>";
                 }elseif($order_show_query_result['status'] == 2) {
                  echo"<span class='badge bg-info p-1' style='font-weight:500; color:#fff;'>On the way</span>";
                 }elseif($order_show_query_result['status'] == 3) {
                  echo"<span class='badge bg-primary p-1' style='font-weight:500; color:#fff'>Ready for Delivery</span>";
                 }elseif($order_show_query_result['status'] == 4) {
                  echo"<span class='badge bg-success p-1' style='font-weight:500; color:#fff;'>Delivered</span>";
                 }else{
                  echo"<span class='badge bg-danger p-1' style='font-weight:500; color:#fff;'>Canceled</span>";
                 }
                 ?>

                </strong></td>
              <td class="border-0 align-middle"><a
                  href="order_details.php?order-ID=<?php echo $order_show_query_result['order_no'];?>"
                  class="btn btn-primary" style="font-weight:bold; font-size:20px;" value="">Open</a></td>
            </tr>




            <?php
                 $no++;
}
?>

          </tbody>
          </table>
        </div>
        <!-- End -->
      </div>
    </div>



  </div>
  </div>
  </div>














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



</body>

</html>