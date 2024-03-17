<?php include 'includes/header.php'; ?>


<?php 
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  <?php include 'includes/head.php'; ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"
    integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />


  <style>
  .review {
    padding: 15px;
    border-top: 3px solid #E6E6E6;
  }


  .username {
    margin-top: -10px;
    padding-bottom: 3px;
    border-bottom: 3px solid #D6D6D6D6;
    display: flex;
    width: 100%;
  }

  .username span {
    position: absolute;
    color: red;
    right: 2%;
    font-weight: bold;
    color: #0F5A95;
    font-size: 14px;
  }

  .seller_replay {
    margin-top: 30px;
    margin-left: 50px;

  }

  .seller_replay .replay_content {
    text-align: justify;
    padding: 20px;
  }

  .seller_replay .replay_content .top-header {
    display: flex;
    justify-content: space-between;

  }

  .seller_replay .replay_content .top-header header {
    color: #f85606;


  }

  .stars i {
    color: #e6e6e6;
    font-size: 16px;
    cursor: pointer;
  }

  .stars i.active {
    color: #ff9c1a;
  }




  /* pagination /*/
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
date_default_timezone_set('Asia/dhaka');
 
function getDateTimeDiff($date){
    $now_timestamp = strtotime(date('Y-m-d H:i:s'));
    $diff_timestamp = $now_timestamp - strtotime($date);
    
    if($diff_timestamp < 60){
     return 'few seconds ago';
    }
    else if($diff_timestamp>=60 && $diff_timestamp<3600){
     return round($diff_timestamp/60).' mins ago';
    }
    else if($diff_timestamp>=3600 && $diff_timestamp<86400){
     return round($diff_timestamp/3600).' hours ago';
    }
    else if($diff_timestamp>=86400 && $diff_timestamp<(86400*30)){
     return round($diff_timestamp/(86400)).' days ago';
    }
    else if($diff_timestamp>=(86400*30) && $diff_timestamp<(86400*365)){
     return round($diff_timestamp/(86400*30)).' months ago';
    }
    else{
     return round($diff_timestamp/(86400*365)).' years ago';
    }
   }
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
              <strong style="font-size:25px;margin-right:30px; border-bottom: 4px solid #7fad39">History</strong>
              <a class="btn btn-info btn-sm" href="orders.php?my-reviews">To Review</a>
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
products p WHERE o.user_id='$user_id' AND o.id = oi.order_id AND p.id = oi.product_id AND o.status=4 AND oi.review_status=1 ORDER BY o.id DESC";
$order_show_query_run = mysqli_query($con,$order_show_query);
$order_show_query_num = mysqli_num_rows($order_show_query_run);

while($order_show_query_result = mysqli_fetch_array($order_show_query_run))
{
    ?>

              <?php $order_items_id_show = $order_show_query_result['o_id']; ?>



              <article class="card" style="width:100%; margin-bottom:30px;">
                <div class="card-body row">

                  <div class="pt-2 pl-2 pr-5"> <a
                      href="product_details.php?id=<?php echo $order_show_query_result['id'];?>">
                      <img src="Admin_panel/production/<?php echo $order_show_query_result['image'];?>" height=50
                        width=50 alt=""></a> </div>
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


                  <div class=""> <input value="Reviewed !" class="btn btn-success btn-sm"> </div>
                </div>

                <!---Show Review--->
                <?php
            
            $review_show = "SELECT * FROM review WHERE order_items_id='$order_items_id_show'";
            $review_show_query = mysqli_query($con,$review_show);
            $review_show_nums =mysqli_num_rows($review_show_query);

            while($review_show_result = mysqli_fetch_array($review_show_query)){
                $username = $review_show_result['username'];
?>
                <div class="review">
                  <div class="stars">
                    <?php
        if($review_show_result['rating'] == 1){
            ?>
                    <i class="fa-solid fa-star submit_star active" data-rating="1"></i>
                    <i class="fa-solid fa-star submit_star" data-rating="2"></i>
                    <i class="fa-solid fa-star submit_star" data-rating="3"></i>
                    <i class="fa-solid fa-star submit_star" data-rating="4"></i>
                    <i class="fa-solid fa-star submit_star" data-rating="5"></i>
                    <?php
        }elseif($review_show_result['rating'] == 2){
            ?>
                    <i class="fa-solid fa-star submit_star active" data-rating="1"></i>
                    <i class="fa-solid fa-star submit_star active" data-rating="2"></i>
                    <i class="fa-solid fa-star submit_star" data-rating="3"></i>
                    <i class="fa-solid fa-star submit_star" data-rating="4"></i>
                    <i class="fa-solid fa-star submit_star" data-rating="5"></i>
                    <?php
        }elseif($review_show_result['rating'] == 3){
            ?>
                    <i class="fa-solid fa-star submit_star active" data-rating="1"></i>
                    <i class="fa-solid fa-star submit_star active" data-rating="2"></i>
                    <i class="fa-solid fa-star submit_star active" data-rating="3"></i>
                    <i class="fa-solid fa-star submit_star" data-rating="4"></i>
                    <i class="fa-solid fa-star submit_star" data-rating="5"></i>
                    <?php
        }elseif($review_show_result['rating'] == 4){
            ?>
                    <i class="fa-solid fa-star submit_star active" data-rating="1"></i>
                    <i class="fa-solid fa-star submit_star active" data-rating="2"></i>
                    <i class="fa-solid fa-star submit_star active" data-rating="3"></i>
                    <i class="fa-solid fa-star submit_star active" data-rating="4"></i>
                    <i class="fa-solid fa-star submit_star" data-rating="5"></i>
                    <?php
        }elseif($review_show_result['rating'] == 5){
            ?>
                    <i class="fa-solid fa-star submit_star active" data-rating="1"></i>
                    <i class="fa-solid fa-star submit_star active" data-rating="2"></i>
                    <i class="fa-solid fa-star submit_star active" data-rating="3"></i>
                    <i class="fa-solid fa-star submit_star active" data-rating="4"></i>
                    <i class="fa-solid fa-star submit_star active" data-rating="5"></i>
                    <?php
        }else{
            ?>
                    <i class="fa-solid fa-star submit_star" data-rating="1"></i>
                    <i class="fa-solid fa-star submit_star" data-rating="2"></i>
                    <i class="fa-solid fa-star submit_star" data-rating="3"></i>
                    <i class="fa-solid fa-star submit_star" data-rating="4"></i>
                    <i class="fa-solid fa-star submit_star" data-rating="5"></i>
                    <?php
        }
        ?>
                  </div>

                  <div class="review_text">
                    <p><?php echo $review_show_result['review']; ?></p>
                  </div>

                  <div class="review_image">

                    <?php // All img
                if($review_show_result['image_1'] > 0 && $review_show_result['image_2'] > 0 && $review_show_result['image_3'] > 0 && $review_show_result['image_4'] > 0 ){
                    ?>
                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>">
                      <img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                        height=80 width=80 alt=""></a>

                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>">
                      <img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                        height=80 width=80 alt=""></a>

                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>">
                      <img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                        height=80 width=80 alt=""></a>

                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>">
                      <img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                        height=80 width=80 alt=""></a>
                    <?php // 3 img
                }elseif($review_show_result['image_1'] > 0 && $review_show_result['image_2'] > 0 && $review_show_result['image_3'] > 0 && $review_show_result['image_4'] < 1 ){
                    ?>
                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>">
                      <img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                        height=80 width=80 alt=""></a>

                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>">
                      <img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                        height=80 width=80 alt=""></a>

                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>">
                      <img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                        height=80 width=80 alt=""></a>
                    <?php

                }elseif($review_show_result['image_1'] > 0 && $review_show_result['image_2'] > 0 && $review_show_result['image_3'] < 1 && $review_show_result['image_4'] > 0){
?>
                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>">
                      <img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                        height=80 width=80 alt=""></a>

                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>">
                      <img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                        height=80 width=80 alt=""></a>

                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>">
                      <img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                        height=80 width=80 alt=""></a>

                    <?php


                }elseif($review_show_result['image_1'] > 0 && $review_show_result['image_2'] < 1 && $review_show_result['image_3'] > 0 && $review_show_result['image_4'] > 0){
                    ?>
                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>">
                      <img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                        height=80 width=80 alt=""></a>

                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>">
                      <img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                        height=80 width=80 alt=""></a>

                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>">
                      <img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                        height=80 width=80 alt=""></a>

                    <?php
                }elseif($review_show_result['image_1'] < 1 && $review_show_result['image_2'] > 0 && $review_show_result['image_3'] > 0 && $review_show_result['image_4'] > 0){
                    ?>
                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>">
                      <img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                        height=80 width=80 alt=""></a>

                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>">
                      <img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                        height=80 width=80 alt=""></a>

                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>">
                      <img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                        height=80 width=80 alt=""></a>

                    <?php // 2 img
                }elseif($review_show_result['image_1'] > 0 && $review_show_result['image_2'] > 0 && $review_show_result['image_3'] < 1 && $review_show_result['image_4'] < 1){
                    ?>
                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>">
                      <img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                        height=80 width=80 alt=""></a>

                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>">
                      <img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                        height=80 width=80 alt=""></a>
                    <?php

                }elseif($review_show_result['image_1'] < 1 && $review_show_result['image_2'] < 1 && $review_show_result['image_3'] > 0 && $review_show_result['image_4'] > 0){
                    ?>
                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>">
                      <img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                        height=80 width=80 alt=""></a>

                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>">
                      <img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                        height=80 width=80 alt=""></a>
                    <?php
                }elseif($review_show_result['image_1'] > 0 && $review_show_result['image_2'] < 1 && $review_show_result['image_3'] < 1 && $review_show_result['image_4'] > 0){
                    ?>
                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>">
                      <img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                        height=80 width=80 alt=""></a>

                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>">
                      <img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                        height=80 width=80 alt=""></a>
                    <?php
                }elseif($review_show_result['image_1'] > 0 && $review_show_result['image_2'] < 1 && $review_show_result['image_3'] > 0 && $review_show_result['image_4'] < 1){
                    ?>
                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>">
                      <img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                        height=80 width=80 alt=""></a>

                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>">
                      <img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                        height=80 width=80 alt=""></a>
                    <?php
                }elseif($review_show_result['image_1'] < 1 && $review_show_result['image_2'] > 0 && $review_show_result['image_3'] > 0 && $review_show_result['image_4'] < 1){
                    ?>
                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>">
                      <img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                        height=80 width=80 alt=""></a>

                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>">
                      <img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                        height=80 width=80 alt=""></a>
                    <?php 
                }elseif($review_show_result['image_1'] < 1 && $review_show_result['image_2'] > 0 && $review_show_result['image_3'] < 1 && $review_show_result['image_4'] > 0){
                    ?>
                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>">
                      <img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                        height=80 width=80 alt=""></a>

                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>">
                      <img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                        height=80 width=80 alt=""></a>
                    <?php //1 img
                }elseif($review_show_result['image_1'] > 0 && $review_show_result['image_2'] < 1 && $review_show_result['image_3'] < 1 && $review_show_result['image_4'] < 1){
                    ?>
                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"><img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                        height=80 width=80 alt=""></a>

                    <?php

                }elseif($review_show_result['image_1'] < 1 && $review_show_result['image_2'] > 0 && $review_show_result['image_3'] < 1 && $review_show_result['image_4'] < 1){
                    ?>
                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"><img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                        height=80 width=80 alt=""></a>

                    <?php

                }elseif($review_show_result['image_1'] < 1 && $review_show_result['image_2'] < 1 && $review_show_result['image_3'] > 0 && $review_show_result['image_4'] < 1){
                    ?>
                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"><img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                        height=80 width=80 alt=""></a>

                    <?php

                }elseif($review_show_result['image_1'] < 1 && $review_show_result['image_2'] < 1 && $review_show_result['image_3'] < 1 && $review_show_result['image_4'] > 0){
                    ?>
                    <a target="_blank"
                      href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"><img
                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                        height=80 width=80 alt=""></a>

                    <?php

                }else{

                }
             ?>



                    <?php
            $r_id = $review_show_result['r_id'];
          $replay_show = "select * from replay_review where r_id='$r_id'";
          $replay_show_query = mysqli_query($con,$replay_show);
          $replay_num= mysqli_num_rows($replay_show_query);
          while($replay_show_result = mysqli_fetch_array($replay_show_query)){
            ?>

                    <div class="seller_replay bg-light  rounded shadow-sm mb-5">
                      <div class="replay_content">
                        <i class="fa fa-reply" aria-hidden="true"></i>
                        <div class="top-header">

                          <header>Admin Replay To @<?php if($username > 0){
                        echo $username;
            }else{
                echo"Guest";
            } ?></header>


                          <span style=""><?php $replied_at=getDateTimeDiff($replay_show_result['created_at']);
   echo $replied_at; ?>...</span>
                        </div>
                        <p><?php echo $replay_show_result['replay']; ?></p>




                      </div>
                    </div>
                    <?php
          }
            ?>

                  </div>

                </div>





                <?php


            }


            ?>



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



  <script>
  // Pagination

  var order_body = document.querySelector(".order_body");
  var pageUl = document.querySelector(".pagination");
  var itemShow = document.querySelector("#itemperpage");
  var article = order_body.querySelectorAll("article");
  var emptyBox = [];
  var index = 1;
  var itemPerPage = 2;

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




  <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"
    integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  <script>
  $(document).ready(function() {
    $('.review_image').magnificPopup({
      type: 'image',
      delegate: 'a',


    });
  });
  </script>

</body>

</html>