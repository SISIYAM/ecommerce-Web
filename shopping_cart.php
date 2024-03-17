<?php include 'includes/header.php'; ?>

<!DOCTYPE html>
<html lang="zxx">

<head>
  <?php include 'includes/head.php'; ?>
  <style>
  .wrapper {

    display: flex;
    align-items: center;
    justify-content: center;
    background: #FFF;
  }

  .wrapper span {
    width: 100%;
    background: #f7f7f7;
    text-align: center;
    font-size: 25px;
    font-weight: 600;
    cursor: pointer;
    user-select: none;
    padding: 0 8px;
  }

  .wrapper span.num {
    font-size: 15px;
    pointer-events: none;
  }
  </style>

</head>

<body>



  <?php include 'includes/nav.php'; ?>



  <!--======================== Delete Modal===============================-->
  <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="delete/shopping_cart_delete.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="delete_id" class="delete_user_id">
            <b>Select "Confirm" below if You are ready to Delete this item from Your cart.</b>
          </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>



            <button type="submit" name="delete_btn" class="btn btn-danger">Confirm</button>

        </form>


      </div>
    </div>
  </div>
  </div>
  <!--======================== End Delete Modal===============================-->


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
                      <div class="p-2 px-3 text-uppercase">Image</div>
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
            <th scope="col" class="border-0 bg-light">
              <div class="py-2 text-uppercase">Remove</div>
            </th>
            </tr>
            </thead>
            <tbody>

              <?php
$product_show_query = "select * from cart where  user_id =$user_id";
$product_show_query_run = mysqli_query($con,$product_show_query);
$product_show_query_num = mysqli_num_rows($product_show_query_run);

 if($product_show_query_num > 0){
        while($product_show_query_result = mysqli_fetch_array($product_show_query_run))
      {
          ?>

              <tr class="product_data">
                <td class="border-0 align-middle"><a
                    href="product_details.php?id=<?php echo $product_show_query_result['product_id'] ?>"><img
                      src="Admin_panel/production/<?php echo $product_show_query_result['product_image'] ?>" alt=""
                      height=50 width="50" class="img-fluid rounded shadow-sm"></a></td>
                <td class="border-0 align-middle"><strong><a style="color:black"
                      href="product_details.php?id=<?php echo $product_show_query_result['product_id'] ?>"><?php echo $product_show_query_result['product_name'] ?></a></strong>
                </td>


                <td class="border-0 align-middle" style="">
                  <input type="hidden" class="prodId" value="<?php echo $product_show_query_result['product_id'];?>">
                  <input type="hidden" class="form-control text-center input-qty bg-light border-0"
                    value="<?php echo $product_show_query_result['quantity'];?>" disabled>

                  <div class="wrapper">
                    <span class="decrement-btn updateQty">-</span>
                    <span class="num"><?php echo $product_show_query_result['quantity'];?></span>
                    <span class="increment-btn updateQty">+</span>
                  </div>


                </td>

                <td class="border-0 align-middle" style="font-size:15px; width:8%;">
                  <strong><?php echo $product_show_query_result['quantity']*$product_show_query_result['product_price'] ?>
                    &#2547;</strong></td>
                <td class="border-0 align-middle"><button class="btn btn-danger deletebtn"
                    style="font-weight:bold; font-size:20px;"
                    value="<?php echo $product_show_query_result['c_id']; ?>">×</button></td>
              </tr>


              <?php
      }
 }else{
  ?>
              <tr class="product_data">
                <td><b>No items added to your cart yet!</b></td>
              </tr>
              <?php
 }
?>

            </tbody>
            </table>
          </div>
          <!-- End -->
        </div>
      </div>

      <div class="row py-5 p-4 bg-white rounded shadow-sm">
        <div class="col-lg-6">

          <div class="p-4">


          </div>

        </div>
        <div class="col-lg-6">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
          <div class="p-4">
            <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have entered.
            </p>
            <ul class="list-unstyled mb-4">
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal
                </strong><strong><?php echo $sum ?> &#2547;</strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping
                  Charge</strong><strong><?php echo $s_charge ?> &#2547;</strong></li>

              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                <h5 class="font-weight-bold"><?php echo $s_charge + $sum ?> &#2547;</h5>
              </li>
            </ul><a href="checkout.php" class="btn btn-dark rounded-pill py-2 btn-block">Procceed to checkout</a>
          </div>
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

  <!--------Delete PopUp------->

  <script>
  $(document).ready(function() {
    $('.deletebtn').click(function(e) {
      e.preventDefault();

      var user_id = $(this).val();
      $('.delete_user_id').val(user_id);
      $('#DeleteModal').modal('show');
    });
  });
  </script>




</body>

</html>