<?php include 'includes/header.php'; ?>


<?php 
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="zxx">

<head>

  <?php include 'includes/head.php';?>


  <style>
  .pagination {
    display: flex;
    justify-content: left;
    align-items: left;
    margin-top: -30px;
  }

  .pagination li {
    list-style: none;
    flex-shrink: 0;
    text-align: center;
    border-radius: 5px;
    border: 2px solid #999;
    color: #999;
    margin-right: 11px;
  }

  .pagination li.active {
    background-color: #ffffff;
    border-color: #f85606;

    color: #000000;


  }

  .pagination li a {
    text-decoration: none;
    padding: 3px 15px;
    color: inherit;
    display: block;
    font-family: sans-serif;
    font-size: 19px;
  }

  .pagination .prev:hover,
  .next:hover {
    background-color: #F3F3F3;
    border-color: #000000;

    color: #000000;
  }
  </style>

</head>

<body>



  <?php include 'includes/nav.php'; ?>



  <?php
        if(isset($_GET['my-orders'])){
            ?>

  <!-------Body------------->
  <!-- Product Section Begin -->
  <section class="product spad d-flex ">
    <div class="container">
      <div class="row">
        <?php include 'includes/manage_nav.php'; ?>

        <div class="col-lg-9 col-md-7">
          <div class="product__discount">
            <div class="section-title product__discount__title">
              <strong style="font-size:25px; border-bottom: 4px solid #7fad39">My Orders</strong>






            </div>
            <ul class="pagination">
              <li class="prev"><a href="#" id="prev"><i class="fa fa-angle-left"></i></a></li>
              <!-- page number here -->
              <li class="next"><a href="#" id="next"><i class="fa fa-angle-right"></i></a></li>
            </ul>

            <div>

            </div>


            <p name="" id="itemperpage"></p>


            <div class="order_body">
              <?php

$order_show_query = "SELECT o.id as oid, o.order_no,o.status, o.user_id, oi.*,p.* FROM orders o, order_items oi,
products p WHERE o.user_id='$user_id' AND o.id = oi.order_id AND p.id = oi.product_id ORDER BY o.id DESC";
$order_show_query_run = mysqli_query($con,$order_show_query);
$order_show_query_num = mysqli_num_rows($order_show_query_run);

while($order_show_query_result = mysqli_fetch_array($order_show_query_run))
{
    ?>

              <article class="card" style="width:100%;">
                <div class="card-body row">

                  <div class="pt-2 pl-2 pr-5"> <a
                      href="product_details.php?id=<?php echo $order_show_query_result['id'];?>">
                      <img src="Admin_panel/production/<?php echo $order_show_query_result['image'];?>" height=50
                        width=50 alt=""></a> </div>
                  <div class="pr-5" style=" width:50%;">
                    <p style=" font-size: 12px; color:black">
                      <a href="product_details.php?id=<?php echo $order_show_query_result['id'];?>"
                        style="color:black;font-weight:bold;">
                        <?php echo $order_show_query_result['name'];?></a>
                      <br>Order ID #: <span style="color:#1a9cb7;">
                        <?php echo $order_show_query_result['order_no'];?></span><br> Placed On:
                      <?php echo $order_show_query_result['created_date'];?> at
                      <?php echo $order_show_query_result['created_time'];?>
                    </p>
                  </div>

                  <div class="pr-5">Qty: <?php echo $order_show_query_result['qty']?></div>

                  <?php
                 if($order_show_query_result['status'] == 0){
                  echo"<div class='pr-5'><p style=' font-size: 12px;padding: 4px 9px;
                  display: inline-block;border-radius: 24px;background-color: #eff0f5;max-width: 150px;'>Processing</p> </div>";
                 }elseif($order_show_query_result['status'] == 1){
                  echo"<div class='pr-5'><p style=' font-size: 12px;padding: 4px 9px;
                  display: inline-block;border-radius: 24px;background-color: #eff0f5;max-width: 150px;'>Picked</p> </div>";
                 }elseif($order_show_query_result['status'] == 2) {
                  echo"<div class='pr-5'><p style=' font-size: 12px;padding: 4px 9px;
                  display: inline-block;border-radius: 24px;background-color: #eff0f5;max-width: 150px;'>In Transit</p> </div>";
                 }elseif($order_show_query_result['status'] == 3) {
                  echo"<div class='pr-5'><p style=' font-size: 12px;padding: 4px 9px;
                  display: inline-block;border-radius: 24px;background-color: #eff0f5;max-width: 150px;'> Ready for Delivery</p> </div>";
                 }elseif($order_show_query_result['status'] == 4){
                  echo"<div class='pr-5'><p style=' font-size: 12px;padding: 4px 9px;
                  display: inline-block;border-radius: 24px;background-color: #eff0f5;max-width: 150px;'>Delivered</p> </div>";
                 }else{
                    echo"<div class='pr-5'><p style=' font-size: 12px;padding: 4px 9px;
                    display: inline-block;border-radius: 24px;background-color: #eff0f5;max-width: 150px;'>Canceled</p> </div>";
                 }
                 ?>

                  <div class=""> <a href="order_details.php?order-ID=<?php echo $order_show_query_result['order_no'];?>"
                      class="btn btn-primary btn-sm">Manage</a> </div>
                </div>
              </article>








              <?php
               
}
?>
            </div>



            <!-----Table---==-->



            <!--------End--------->


          </div>
        </div>

  </section>
  <!-- Product Section End -->



  <?php
        }elseif(isset($_GET['my-cancellation'])){
            ?>


  <!-------Body------------->
  <!-- Product Section Begin -->
  <section class="product spad d-flex ">
    <div class="container">
      <div class="row">
        <?php include 'includes/manage_nav.php'; ?>

        <div class="col-lg-9 col-md-7">
          <div class="product__discount">
            <div class="section-title product__discount__title">
              <strong style="font-size:25px; border-bottom: 4px solid #7fad39">My Cancellations</strong>
            </div>

            <ul class="pagination">
              <li class="prev"><a href="#" id="prev"><i class="fa fa-angle-left"></i></a></li>
              <!-- page number here -->
              <li class="next"><a href="#" id="next"><i class="fa fa-angle-right"></i></a></li>
            </ul>

            <div>

            </div>


            <p name="" id="itemperpage"></p>


            <div class="order_body">
              <?php

$order_show_query = "SELECT o.id as oid, o.order_no,o.status, o.user_id, oi.*,p.* FROM orders o, order_items oi,
products p WHERE o.user_id='$user_id' AND o.id = oi.order_id AND p.id = oi.product_id AND o.status=5 ORDER BY o.id DESC";
$order_show_query_run = mysqli_query($con,$order_show_query);
$order_show_query_num = mysqli_num_rows($order_show_query_run);

while($order_show_query_result = mysqli_fetch_array($order_show_query_run))
{
    ?>

              <article class="card" style="width:100%;">
                <div class="card-body row">

                  <div class="pt-2 pl-2 pr-5"> <a
                      href="product_details.php?id=<?php echo $order_show_query_result['id'];?>">
                      <img src="Admin_panel/production/<?php echo $order_show_query_result['image'];?>" height=50
                        width=50 alt=""></a> </div>
                  <div class="pr-5" style=" width:50%;">
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

                  <?php
                 if($order_show_query_result['status'] == 0){
                  echo"<div class='pr-5'><p style=' font-size: 12px;padding: 4px 9px;
                  display: inline-block;border-radius: 24px;background-color: #eff0f5;max-width: 150px;'>Processing</p> </div>";
                 }elseif($order_show_query_result['status'] == 1){
                  echo"<div class='pr-5'><p style=' font-size: 12px;padding: 4px 9px;
                  display: inline-block;border-radius: 24px;background-color: #eff0f5;max-width: 150px;'>Picked</p> </div>";
                 }elseif($order_show_query_result['status'] == 2) {
                  echo"<div class='pr-5'><p style=' font-size: 12px;padding: 4px 9px;
                  display: inline-block;border-radius: 24px;background-color: #eff0f5;max-width: 150px;'>In Transit</p> </div>";
                 }elseif($order_show_query_result['status'] == 3) {
                  echo"<div class='pr-5'><p style=' font-size: 12px;padding: 4px 9px;
                  display: inline-block;border-radius: 24px;background-color: #eff0f5;max-width: 150px;'> Ready for Delivery</p> </div>";
                 }elseif($order_show_query_result['status'] == 4){
                  echo"<div class='pr-5'><p style=' font-size: 12px;padding: 4px 9px;
                  display: inline-block;border-radius: 24px;background-color: #eff0f5;max-width: 150px;'>Delivered</p> </div>";
                 }else{
                    echo"<div class='pr-5'><p style=' font-size: 12px;padding: 4px 9px;
                    display: inline-block;border-radius: 24px;background-color: #eff0f5;max-width: 150px;'>Canceled</p> </div>";
                 }
                 ?>

                  <div class=""> <a href="order_details.php?order-ID=<?php echo $order_show_query_result['order_no'];?>"
                      class="btn btn-primary btn-sm">Manage</a> </div>
                </div>
              </article>








              <?php
               
}
?>


            </div>

            <!-----Table---==-->



            <!--------End--------->


          </div>
        </div>

  </section>
  <!-- Product Section End -->





  <?php
        }elseif(isset($_GET['my-reviews'])){
            ?>

  <!-------Body------------->
  <!-- Product Section Begin -->
  <section class="product spad d-flex ">
    <div class="container">
      <div class="row">
        <?php include 'includes/manage_nav.php'; ?>

        <div class="col-lg-9 col-md-7">
          <div class="product__discount">
            <div class="section-title product__discount__title">
              <strong style="font-size:25px;margin-right:30px; border-bottom: 4px solid #7fad39">To Review</strong>
              <a class="btn btn-info btn-sm" href="review_History.php">History</a>
            </div>


            <ul class="pagination">
              <li class="prev"><a href="#" id="prev"><i class="fa fa-angle-left"></i></a></li>
              <!-- page number here -->
              <li class="next"><a href="#" id="next"><i class="fa fa-angle-right"></i></a></li>
            </ul>

            <div>

            </div>


            <p name="" id="itemperpage"></p>


            <div class="order_body">

              <?php

$order_show_query = "SELECT o.id as oid, o.order_no,o.status, o.user_id, oi.*,p.* FROM orders o, order_items oi,
products p WHERE o.user_id='$user_id' AND o.id = oi.order_id AND p.id = oi.product_id AND o.status=4 AND oi.review_status=0 ORDER BY o.id DESC";
$order_show_query_run = mysqli_query($con,$order_show_query);
$order_show_query_num = mysqli_num_rows($order_show_query_run);

while($order_show_query_result = mysqli_fetch_array($order_show_query_run))
{
    ?>

              <article class="card" style="width:100%;">
                <div class="card-body row">

                  <div class="pt-2 pl-2 pr-5"> <a
                      href="product_details.php?id=<?php echo $order_show_query_result['id'];?>">
                      <img src="Admin_panel/production/<?php echo $order_show_query_result['image'];?>" height=50
                        width=50 alt=""></a> </div>
                  <div class="pr-5" style=" width:50%;">
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

                  <?php
                 if($order_show_query_result['status'] == 0){
                  echo"<div class='pr-5'><p style=' font-size: 12px;padding: 4px 9px;
                  display: inline-block;border-radius: 24px;background-color: #eff0f5;max-width: 150px;'>Processing</p> </div>";
                 }elseif($order_show_query_result['status'] == 1){
                  echo"<div class='pr-5'><p style=' font-size: 12px;padding: 4px 9px;
                  display: inline-block;border-radius: 24px;background-color: #eff0f5;max-width: 150px;'>Picked</p> </div>";
                 }elseif($order_show_query_result['status'] == 2) {
                  echo"<div class='pr-5'><p style=' font-size: 12px;padding: 4px 9px;
                  display: inline-block;border-radius: 24px;background-color: #eff0f5;max-width: 150px;'>In Transit</p> </div>";
                 }elseif($order_show_query_result['status'] == 3) {
                  echo"<div class='pr-5'><p style=' font-size: 12px;padding: 4px 9px;
                  display: inline-block;border-radius: 24px;background-color: #eff0f5;max-width: 150px;'> Ready for Delivery</p> </div>";
                 }elseif($order_show_query_result['status'] == 4){
                  echo"<div class='pr-5'><p style=' font-size: 12px;padding: 4px 9px;
                  display: inline-block;border-radius: 24px;background-color: #eff0f5;max-width: 150px;'>Delivered</p> </div>";
                 }else{
                    echo"<div class='pr-5'><p style=' font-size: 12px;padding: 4px 9px;
                    display: inline-block;border-radius: 24px;background-color: #eff0f5;max-width: 150px;'>Canceled</p> </div>";
                 }
                 ?>


                  <div class=""> <a href="write_review.php?review-id=<?php echo $order_show_query_result['o_id']; ?>"
                      class="reviewBtn btn btn-sm" style="color:#fff;background-color: #f85606;">Review</a> </div>
                </div>
              </article>








              <?php
               
}
?>

            </div>
            <!-----Table---==-->



            <!--------End--------->


          </div>
        </div>

  </section>
  <!-- Product Section End -->

  <?php
        }else{
            
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


  <!--------Change Password PopUp------->

  <script>
  $(document).ready(function() {
    $('.changeBtn').click(function(e) {
      e.preventDefault();


      $('#PassChangeModel').modal('show');
    });
  });
  </script>



  <script>
  // Pagination

  var order_body = document.querySelector(".order_body");
  var pageUl = document.querySelector(".pagination");
  var itemShow = document.querySelector("#itemperpage");
  var article = order_body.querySelectorAll("article");
  var emptyBox = [];
  var index = 1;
  var itemPerPage = 4;

  for (let i = 0; i < article.length; i++) {
    emptyBox.push(article[i]);
  }

  itemShow.onchange = giveTrPerPage;

  function giveTrPerPage() {
    itemPerPage = Number(this.value);
    // console.log(itemPerPage);
    displayPage(itemPerPage);
    pageGenerator(itemPerPage);
    getpagElement(itemPerPage);
  }

  function displayPage(limit) {
    order_body.innerHTML = '';
    for (let i = 0; i < limit; i++) {
      order_body.appendChild(emptyBox[i]);
    }
    const pageNum = pageUl.querySelectorAll('.list');
    pageNum.forEach(n => n.remove());
  }
  displayPage(itemPerPage);

  function pageGenerator(getem) {
    const num_of_tr = emptyBox.length;
    if (num_of_tr <= getem) {
      pageUl.style.display = 'none';
    } else {
      pageUl.style.display = 'flex';
      const num_Of_Page = Math.ceil(num_of_tr / getem);
      for (i = 1; i <= num_Of_Page; i++) {
        const li = document.createElement('li');
        li.className = 'list';
        const a = document.createElement('a');
        a.href = '#';
        a.innerText = i;
        a.setAttribute('data-page', i);
        li.appendChild(a);
        pageUl.insertBefore(li, pageUl.querySelector('.next'));
      }
    }
  }
  pageGenerator(itemPerPage);
  let pageLink = pageUl.querySelectorAll("a");
  let lastPage = pageLink.length - 2;

  function pageRunner(page, items, lastPage, active) {
    for (button of page) {
      button.onclick = e => {
        const page_num = e.target.getAttribute('data-page');
        const page_mover = e.target.getAttribute('id');
        if (page_num != null) {
          index = page_num;

        } else {
          if (page_mover === "next") {
            index++;
            if (index >= lastPage) {
              index = lastPage;
            }
          } else {
            index--;
            if (index <= 1) {
              index = 1;
            }
          }
        }
        pageMaker(index, items, active);
      }
    }

  }
  var pageLi = pageUl.querySelectorAll('.list');
  pageLi[0].classList.add("active");
  pageRunner(pageLink, itemPerPage, lastPage, pageLi);

  function getpagElement(val) {
    let pagelink = pageUl.querySelectorAll("a");
    let lastpage = pagelink.length - 2;
    let pageli = pageUl.querySelectorAll('.list');
    pageli[0].classList.add("active");
    pageRunner(pagelink, val, lastpage, pageli);

  }



  function pageMaker(index, item_per_page, activePage) {
    const start = item_per_page * index;
    const end = start + item_per_page;
    const current_page = emptyBox.slice((start - item_per_page), (end - item_per_page));
    order_body.innerHTML = "";
    for (let j = 0; j < current_page.length; j++) {
      let item = current_page[j];
      order_body.appendChild(item);
    }
    Array.from(activePage).forEach((e) => {
      e.classList.remove("active");
    });
    activePage[index - 1].classList.add("active");
  }
  </script>

</body>

</html>