<?php include 'includes/header.php'; ?>

<?php
$user_query = "select * from user where id='$user_id'";
$user_query_run = mysqli_query($con,$user_query);
$user_nums = mysqli_num_rows($user_query_run);

while($user_query_result= mysqli_fetch_array($user_query_run))
{
    ?>

<?php $user_firstname = $user_query_result['first_name']; ?>
<?php $user_lastname = $user_query_result['last_name']; ?>
<?php $user_email = $user_query_result['email']; ?>
<?php $user_mobile = $user_query_result['mobile']; ?>
<?php $user_address = $user_query_result['address']; ?>
<?php $user_city = $user_query_result['city']; ?>
<?php $user_division = $user_query_result['division']; ?>
<?php $user_postal_code = $user_query_result['postal_code']; ?>

<?php
}


?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  <?php include 'includes/head.php';?>


</head>


<body>
  <?php include 'includes/nav.php'; ?>



  <!-- Checkout Section Begin -->
  <section class="checkout spad">
    <div class="container">
      <div class="row">

      </div>
      <div class="checkout__form">
        <h4>Billing Details</h4>


        <form action="includes/code.php" method="post">
          <div class="row">
            <div class="col-lg-8 col-md-6">
              <div class="row">
                <div class="col-lg-6">
                  <div class="checkout__input">
                    <p>Fist Name<span>*</span></p>
                    <input style="color:black;" type="text" name="firstname" value="<?php echo $user_firstname; ?>">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="checkout__input">
                    <p>Last Name<span>*</span></p>
                    <input style="color:black;" type="text" name="lastname" value="<?php echo $user_lastname; ?>">
                  </div>
                </div>
              </div>

              <div class="checkout__input">
                <p>Address<span>*</span></p>
                <input style="color:black;" type="text" name="address" value="<?php echo $user_address; ?>">

              </div>
              <div class="checkout__input">
                <p>District<span>*</span></p>
                <select name="city" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                  <?php if($user_city > 0){
                                    ?>
                  <option selected value="<?php echo $user_city ?>"><?php echo $user_city ?></option>
                  <?php
                                }else{
                                    ?>
                  <option selected>Select District</option>

                  <?php
                                }
                                 ?>

                  <option value="Bagerhat">Bagerhat</option>
                  <option value="Bandarban">Bandarban</option>
                  <option value="Barguna">Barguna</option>
                  <option value="Barishal">Barishal</option>
                  <option value="Bhola">Bhola</option>
                  <option value="Bogura">Bogura</option>
                  <option value="Brahmanbaria">Brahmanbaria</option>
                  <option value="Chandpur">Chandpur</option>
                  <option value="Chattogram">Chattogram</option>
                  <option value="Chuadanga">Chuadanga</option>
                  <option value="Comilla">Comilla</option>
                  <option value="Cox's Bazar">Cox's Bazar</option>
                  <option value="Dhaka">Dhaka</option>
                  <option value="Dinajpur">Dinajpur</option>
                  <option value="Faridpur">Faridpur</option>
                  <option value="Feni">Feni</option>
                  <option value="Gaibandha">Gaibandha</option>
                  <option value="Gazipur">Gazipur</option>
                  <option value="Gopalganj">Gopalganj</option>
                  <option value="Habiganj">Habiganj</option>
                  <option value="Jamalpur">Jamalpur</option>
                  <option value="Jashore">Jashore (Jessore)</option>
                  <option value="Jhalokathi">Jhalokathi</option>
                  <option value="Jhenaidah">Jhenaidah</option>
                  <option value="Joypurhat">Joypurhat</option>
                  <option value="Khagrachari">Khagrachari</option>
                  <option value="Khulna">Khulna</option>
                  <option value="Kishoreganj">Kishoreganj</option>
                  <option value="Kushtia">Kushtia</option>
                  <option value="Lakshmipur">Lakshmipur</option>
                  <option value="Lalmonirhat">Lalmonirhat</option>
                  <option value="Madaripur">Madaripur</option>
                  <option value="Magura">Magura</option>
                  <option value="Manikganj">Manikganj</option>
                  <option value="Meherpur">Meherpur</option>
                  <option value="Moulvibazar">Moulvibazar</option>
                  <option value="Munshiganj">Munshiganj</option>
                  <option value="Mymensingh">Mymensingh</option>
                  <option value="Naogaon">Naogaon</option>
                  <option value="Narail">Narail</option>
                  <option value="Narayanganj">Narayanganj</option>
                  <option value="Narsingdi">Narsingdi</option>
                  <option value="Natore">Natore</option>
                  <option value="Netrokona">Netrokona</option>
                  <option value="Nilphamari">Nilphamari</option>
                  <option value="Noakhali">Noakhali</option>
                  <option value="Pabna">Pabna</option>
                  <option value="Panchagarh">Panchagarh</option>
                  <option value="Patuakhali">Patuakhali</option>
                  <option value="Pirojpur">Pirojpur</option>
                  <option value="Rajbari">Rajbari</option>
                  <option value="Rajshahi">Rajshahi</option>
                  <option value="Rangamati">Rangamati</option>
                  <option value="Rangpur">Rangpur</option>
                  <option value="Satkhira">Satkhira</option>
                  <option value="Shariatpur">Shariatpur</option>
                  <option value="Sherpur">Sherpur</option>
                  <option value="Sirajganj">Sirajganj</option>
                  <option value="Sunamganj">Sunamganj</option>
                  <option value="Sylhet">Sylhet</option>
                  <option value="Tangail">Tangail</option>
                  <option value="Thakurgaon">Thakurgaon</option>


                </select>




              </div> <br> <br> <br>
              <div class="checkout__input">
                <p style="margin-right:50px;">Division<span>*</span></p>
                <select name="division" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                  <?php
                                if($user_division < 0)
                                {
                                    echo"<option selected disabled>Select Division</option>";
                                }else{
                                    echo"<option selected value='$user_division'>$user_division</option>";
                                }
                                ?>

                  <option value='Dhaka'>Dhaka Division</option>
                  <option value='Rajshahi'>Rajshahi Division</option>
                  <option value='Rangpur'>Rangpur Division</option>
                  <option value='Chittagong'>Chittagong Division</option>
                  <option value='Barisal'>Barisal Division</option>
                  <option value='Khulna'>Khulna Division</option>
                  <option value='Sylhet'>Sylhet Division</option>
                </select>

              </div> <br><br><br>
              <div class="checkout__input">
                <p>Postcode / ZIP<span>*</span></p>
                <input style="color:black;" type="text" name="postal_code" value="<?php echo $user_postal_code; ?>">
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="checkout__input">
                    <p>Phone<span>*</span></p>
                    <input style="color:black;" type="text" name="mobile" value="<?php echo $user_mobile; ?>">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="checkout__input">
                    <p>Email<span>*</span></p>
                    <input style="color:black;" type="text" name="email" value="<?php echo $user_email; ?>">
                  </div>
                </div>
              </div>


              <div class="checkout__input">
                <p>Order notes<span>*</span></p>
                <input type="text" name="comment"
                  placeholder="Notes about your order, e.g. special notes for delivery.">
              </div>

            </div>

            <div class="col-lg-4 col-md-6">
              <div class="checkout__order">
                <h4>Your Order</h4>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Product Name</th>
                      <th scope="col">Price</th>
                    </tr>
                  </thead>
                  <tbody>


                    <?php
$product_show_query = "select * from cart where  user_id =$user_id";
$product_show_query_run = mysqli_query($con,$product_show_query);
$product_show_query_num = mysqli_num_rows($product_show_query_run);

while($product_show_query_result = mysqli_fetch_array($product_show_query_run))
{
    ?>

                    <tr>

                      <td style="width:70%"><a
                          href="product_details.php?id=<?php echo $product_show_query_result['product_id'] ?>"
                          style="text-decoration:none; color:black;"><?php echo $product_show_query_result['product_name'] ?></a>
                      </td>
                      <td style="color:black; font-size:14px;">&#2547;
                        <?php echo $product_show_query_result['product_price']?> x
                        <?php echo $product_show_query_result['quantity'] ?></td>

                    </tr>


                    <?php
}
?>

                  </tbody>
                </table>

                <div class="checkout__order__subtotal">Subtotal <span>&#2547; <?php echo $sum ?> </span></div>
                <div class="checkout__order__subtotal">Shipping Charge <span>&#2547; <?php echo $s_charge ?></span>
                </div>
                <div class="checkout__order__total" id="original_total_price">Total <span>&#2547;
                    <?php echo $s_charge + $sum ?></span></div>
                <div class="checkout__order__subtotal" id="coupon_box" style="display:none;">Coupon Discount <span>-
                    &#2547; <span id="discount_price"></span> </span></div>
                <div class="checkout__order__total" id="total_box" style="display:none;">Total <span>&#2547; <span
                      class="pl-1" id="after_total_price"></span> </span></div>

                <input type="hidden" name="total_price" value="<?php echo $s_charge + $sum ?>">

                <div class="mb-3">
                  <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>
                  <div class="alert alert-danger rounded-pill px-4 py-3 mb-5 font-weight-bold" id="order_total_price"
                    style="display:none;"></div>


                  <div class="bg-white rounded-pill px-4 py-2 text-uppercase font-weight-bold"
                    style="margin-top:-20px;">
                    <input type="text" class="form-control border-0 inputCoupon" placeholder="Apply Coupon">
                  </div>
                  <div class="input-group-append border-0">
                    <button id="applyCoupon" type="button" class="btn btn-dark px-4 rounded-pill applyCoupon"><i
                        class="fa fa-gift mr-2"></i>Apply coupon</button>
                  </div>


                </div>
                <div class="checkout__input__checkbox" id="selectBoxPayment">
                  <select required name="payment_method" id="paymentMethodSelect"
                    class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected value="" disabled>Select Payment Method</option>
                    <option value="COD">Cash On Delivery (COD)</option>
                    <option value="Bkash">Bkash Payment</option>
                    <option value="Nagad">Nagad Payment </option>

                  </select>
                </div>

                <!-- Add Payment Details Form -->

                <!-- bKash Form -->
                <div class="bkash_payment" id="bkash_paymentModal" style="margin-top:80px; display:none;">
                  <div class="payment_content">
                    <div class="payment_heading my-3">
                      <span style="font-size:1.5rem; font-weight:700;">Bkash Payment</span> <br>
                      <span>অনুগ্রহ করে প্রথমে সেন্ড মানি করুন, তারপর নিচের ফর্মটি পূরণ করুন। Trx ID বা ট্রান্সেকশন আইডি
                        টাকা পাঠানোর
                        পর ফিরতি মেসেজ এ বিকাশ থেকে পেয়ে যাবেন এসএমএস এ বা এপ ও পাবেন। অবশ্যই সেন্ড মানি করবেন,
                        ফ্লেক্সিলোড করলে
                        এর দায়ভার আমাদের নয়। </span>
                    </div>

                    <div>
                      <label for="mobile">bKash Personal Number:017xxxxxxxx</label>
                    </div>
                    <br>
                    <div class="mb-2">
                      <label for="bKash_mobile">bKash Number <span>*</span></label>
                      <input class="form-control" id="bKash_mobile" name="payment_number" value="" type="text" placeholder="017xxxxxxxx" maxlength="11">
                    </div>

                    <div class="mb-2">
                      <label for="bKash_Transaction">bKash Transaction ID <span>*</span></label>
                      <input class="form-control" id="bKash_Transaction" name="payment_id" value="" type="text" placeholder="8N7A6D5EE7M">
                    </div>
                  </div>

                </div>

                <!-- Nagad form -->
                <div class="nagad_payment" id="nagad_paymentModal" style="margin-top:80px; display:none">
                  <div class="payment_content">
                    <div class="payment_heading my-3">
                      <span style="font-size:1.5rem; font-weight:700;">Nagad Payment</span> <br>
                      <span>অনুগ্রহ করে প্রথমে সেন্ড মানি করুন, তারপর নিচের ফর্মটি পূরণ করুন। Trx ID বা ট্রান্সেকশন আইডি
                        টাকা পাঠানোর
                        পর ফিরতি মেসেজ এ বিকাশ থেকে পেয়ে যাবেন এসএমএস এ বা এপ ও পাবেন। অবশ্যই সেন্ড মানি করবেন,
                        ফ্লেক্সিলোড করলে
                        এর দায়ভার আমাদের নয়। </span>
                    </div>

                    <div>
                      <label for="mobile">Nagad Personal Number:017xxxxxxxx</label>
                    </div>
                    <br>
                    <div class="mb-2">
                      <label for="Nagad_mobile">Nagad Number <span>*</span></label>
                      <input class="form-control" id="Nagad_mobile" name="payment_number" value="" type="text" placeholder="017xxxxxxxx" maxlength="11">
                    </div>

                    <div class="mb-2">
                      <label for="Nagad_Transaction">Nagad Transaction ID <span>*</span></label>
                      <input class="form-control" id="Nagad_Transaction" name="payment_id" value="" type="text" placeholder="8N7A6D5EE7M">
                    </div>
                  </div>

                </div>


                <button type="submit" name="checkout" class="site-btn">PLACE ORDER</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <!-- Checkout Section End -->

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
  <script src="js/applycoupon.js"></script>

  <script>
  // Code for select payment method
  $("#paymentMethodSelect").change(function(e) {
    let paymentMethod = $(this).val();
    if (paymentMethod == "Bkash") {
      jQuery("#nagad_paymentModal").hide(100);
      // add disabled attribute to nagad input field
      $("#Nagad_mobile").attr("disabled", "disabled");
      $("#Nagad_Transaction").attr("disabled", "disabled");
      // remove disabled attribute from bKash input field when bkash selected
      $("#bKash_mobile").removeAttr("disabled");
      $("#bKash_Transaction").removeAttr("disabled");
      // bKash payment modal show
      jQuery("#bkash_paymentModal").show(700);
    }
    if (paymentMethod == "Nagad") {
      jQuery("#bkash_paymentModal").hide(100);
      // add disabled attribute to bkash input field
      $("#bKash_mobile").attr("disabled", "disabled");
      $("#bKash_Transaction").attr("disabled", "disabled");
      // remove disabled attribute from nagad input field when nagad selected
      $("#Nagad_mobile").removeAttr("disabled");
      $("#Nagad_Transaction").removeAttr("disabled");
      // nagad payment modal show
      jQuery("#nagad_paymentModal").show(700);
    }
    if (paymentMethod == "COD") {
      $("#Nagad_mobile").attr("disabled", "disabled");
      $("#Nagad_Transaction").attr("disabled", "disabled");
      jQuery("#bkash_paymentModal").hide(700);
      jQuery("#nagad_paymentModal").hide(700);
    }
  });
  </script>

</body>

</html>


<?php 
   if(isset($_SESSION['coupon_id'])){
    unset($_SESSION['coupon_id']);
    unset($_SESSION['final_price']);
    unset($_SESSION['discount']);
    unset($_SESSION['coupon_code']);
}
?>