<?php include 'includes/header.php'; ?>


<?php 
$Review_ID = $_GET['review-id'];
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  <?php include 'includes/head.php'; ?>

  <style>
  .rating-box {
    position: relative;
    background: #fff;
    padding: 25px 50px 35px;

  }

  .rating-box header {
    font-size: 18px;
    color: #dadada;
    font-weight: 500;
    margin-bottom: 20px;
    text-align: center;
  }

  .rating-box .stars {
    display: flex;
    align-items: center;
    gap: 25px;
  }

  .stars i {
    color: #e6e6e6;
    font-size: 25px;
    cursor: pointer;
    transition: color 0.2s ease;
  }

  .stars i.active {
    color: #ff9c1a;
  }
  </style>

  <style>
  /* Google font import link */
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

  .input-box {
    position: relative;
    height: 200px;
    width: 100%;
    background: #fff;
    padding: 0 30px 30px 0;

  }

  .input-box textarea {
    height: 100%;
    width: 100%;
    outline: none;
    border: 2px solid rgba(0, 0, 0, 0.2);
    border-radius: 6px;
    resize: none;
    padding: 25px 15px;
    font-size: 15px;
    font-weight: 500;
    caret-color: #007bff;
  }

  .input-box textarea:focus,
  .input-box textarea:valid {
    border-color: #007bff;
  }

  .input-box.error textarea {
    border-color: red;
  }

  .input-box textarea::placeholder {
    font-size: 15px;
    font-weight: 500;
  }

  .input-box .title {
    position: absolute;
    top: 38px;
    left: 45px;
    color: #007bff;
  }

  .input-box.error .title {
    color: red;
  }

  .input-box .characters {
    position: absolute;
    bottom: 35px;
    right: 45px;
    display: flex;
    align-items: center;
    color: #007bff;
    display: none;
  }

  .input-box.active .characters {
    display: block;
  }

  .input-box.error .characters {
    color: red;
  }
  </style>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
</head>

<body>



  <?php include 'includes/nav.php'; ?>





  <!-------Body------------->
  <!-- Product Section Begin -->
  <section class="product spad d-flex ">
    <div class="container">
      <div class="row">
        <?php include 'includes/manage_nav.php'; ?>

        <div class="col-lg-9 col-md-7">
          <div class="product__discount">
            <div class="section-title product__discount__title">
              <strong style="font-size:25px; border-bottom: 4px solid #7fad39">My Review</strong>
            </div>


            <div>

            </div>



            <?php

$order_show_query = "SELECT o.id as oid, o.order_no,o.status, o.user_id, oi.*,p.* FROM orders o, order_items oi,
products p WHERE o.user_id='$user_id' AND o.id = oi.order_id AND p.id = oi.product_id AND oi.o_id='$Review_ID' AND o.status=4 ORDER BY o.id DESC";
$order_show_query_run = mysqli_query($con,$order_show_query);
$order_show_query_num = mysqli_num_rows($order_show_query_run);

while($order_show_query_result = mysqli_fetch_array($order_show_query_run))
{
    ?>

            <article class="card" style="width:100%;">
              <div class="card-body row">

                <div class="pt-2 pl-2 pr-5"> <a
                    href="product_details.php?id=<?php echo $order_show_query_result['id'];?>">
                    <img src="Admin_panel/production/<?php echo $order_show_query_result['image'];?>" height=50 width=50
                      alt=""></a> </div>
                <div class="pr-5">
                  <p style=" font-size: 12px; color:black"> <a
                      href="product_details.php?id=<?php echo $order_show_query_result['id'];?>"
                      style="color:black; font-weight:bold;"><?php echo $order_show_query_result['name'];?></a>
                    <br>Order ID #: <span style="color:#1a9cb7;">
                      <?php echo $order_show_query_result['order_no'];?></span><br> Placed On:
                    <?php echo $order_show_query_result['created_date'];?> at
                    <?php echo $order_show_query_result['created_time'];?>
                  </p>
                </div>

                <div class="pr-5">Qty: <?php echo $order_show_query_result['qty']?></div>






              </div>

              <div style="margin:10px;">
                <form style="padding:30px;" action="includes/code.php" method="post" enctype="multipart/form-data">


                  <div class="form-group">
                    <label for="exampleFormControlFile1">Select Product Rating</label>
                    <div class="stars">
                      <i class="fa-solid fa-star submit_star" data-rating="1"></i>
                      <i class="fa-solid fa-star submit_star" data-rating="2"></i>
                      <i class="fa-solid fa-star submit_star" data-rating="3"></i>
                      <i class="fa-solid fa-star submit_star" data-rating="4"></i>
                      <i class="fa-solid fa-star submit_star" data-rating="5"></i>
                    </div>
                  </div>

                  <input type="hidden" class="star_rating" name="rating">
                  <input type="hidden" value="<?php echo $order_show_query_result['order_no'];?>" name="order_no">
                  <input type="hidden" value="<?php echo $order_show_query_result['id'];?>" name="product_id">
                  <input type="hidden" value="<?php echo $order_show_query_result['o_id'];?>" name="order_items_id">

                  <div class="form-group">
                    <label for="exampleFormControlFile1">Add Photos</label>
                    <input type="file" name="image_1" class="form-control-file" id="exampleFormControlFile1"
                      style="padding-bottom:10px;">
                    <input type="file" name="image_2" class="form-control-file" id="exampleFormControlFile1"
                      style="padding-bottom:10px;">
                    <input type="file" name="image_3" class="form-control-file" id="exampleFormControlFile1"
                      style="padding-bottom:10px;">
                    <input type="file" name="image_4" class="form-control-file" id="exampleFormControlFile1"
                      style="padding-bottom:10px;">
                  </div>
                  <label for="exampleFormControlFile1">Add Written Review*</label>
                  <div class="input-box">

                    <textarea placeholder="Write Review" name="review" maxlength="510"></textarea>

                    <div class="characters">
                      <span class="signal_num">0</span>
                      <span class="limit_num">/500</span>
                    </div>
                  </div>

                  <!----USername Value-->
                  <input type="hidden" name="user_name" value="<?php echo $_SESSION['username']; ?>" id="usernameOutput"
                    class="ShowUserName">

                  <div class="form-check">
                    <input class="form-check-input submit_username" type="checkbox"
                      value="<?php echo $_SESSION['username']; ?>" id="checkUsername" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Show Username
                    </label>
                  </div> <br>
                  <button type="submit" name="add_review" class="btn"
                    style="color:#fff;background-color: #f85606;">Submit Review</button>

                </form>
              </div>
            </article>











            <?php
               
}
?>


            <!-----Table---==-->



            <!--------End--------->


          </div>
        </div>

  </section>
  <!-- Product Section End -->










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


  <!--------Change Password PopUp------->

  <script>
  $(document).ready(function() {
    $('.changeBtn').click(function(e) {
      e.preventDefault();


      $('#PassChangeModel').modal('show');
    });
  });
  </script>

  <!--------Username Checkbox------->

  <script>
  //Username Checkbox

  $('#checkUsername').change(function() {
    var username = $(this).val();
    if ($(this).is(':checked')) {
      $('#usernameOutput').val(username);
    };
    if ($(this).is(':checked') == false) {
      $('#usernameOutput').val('');
    };
  });
  </script>


  <script>
  // Select all elements with the "i" tag and store them in a NodeList called "stars"
  const stars = document.querySelectorAll(".stars i");

  // Loop through the "stars" NodeList
  stars.forEach((star, index1) => {
    // Add an event listener that runs a function when the "click" event is triggered
    star.addEventListener("click", () => {
      // Loop through the "stars" NodeList Again
      stars.forEach((star, index2) => {
        // Add the "active" class to the clicked star and any stars with a lower index
        // and remove the "active" class from any stars with a higher index
        index1 >= index2 ? star.classList.add("active") : star.classList.remove("active");
      });
    });
  });

  $(document).ready(function() {
    var rating_date = 0;


    $(document).on('click', '.submit_star', function() {

      rating_date = $(this).data('rating');

      $('.star_rating').val(rating_date);

    });


  });
  </script>


  <script>
  let inputBox = document.querySelector(".input-box"),
    textarea = inputBox.querySelector("textarea"),
    signalNum = inputBox.querySelector(".signal_num");
  textarea.addEventListener("keyup", () => {
    let valLenght = textarea.value.length; //stored textarea value length into valLength
    signalNum.innerText = valLenght; //converted signalNum innerText by valLength
    valLenght > 0 ? inputBox.classList.add("active") : inputBox.classList.remove(
    "active"); // if valLength is greater than 0 than add active class if not than remove active class
    valLenght > 500 ? inputBox.classList.add("error") : inputBox.classList.remove(
    "error"); // if valLength is greater than 100 than add error class if not than remove error class
    console.log(valLenght);
  });
  </script>


</body>

</html>