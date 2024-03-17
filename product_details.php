<?php
   if(isset($_GET['id'])){
    ?>
<?php include 'includes/header.php'; ?>

<?php  

$id = $_GET['id'];

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

    margin: 0 15px;
    width: 100%;

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



  .stars {
    margin-top: 10px;
  }

  .stars i {
    color: #e6e6e6;
    font-size: 16px;
    cursor: pointer;
  }

  .stars i.active {
    color: #ff9c1a;
  }


  /* Pagination /*/

  .pagination {
    display: flex;
    justify-content: left;
    align-items: left;

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




  .wrapper {

    display: flex;
    padding: 10px 0;
    background: #FFF;
  }

  .wrapper span {
    background: #f7f7f7;
    text-align: center;
    font-size: 25px;
    font-weight: 600;
    cursor: pointer;
    user-select: none;
    padding: 5px 10px;
  }

  .wrapper span.num {
    font-size: 20px;
    pointer-events: none;
  }
  </style>
</head>

<body>
  <?php include 'includes/nav.php'; ?>

  <!----------POP UP ________------>

  <div class="modal fade" id="popupResponseModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="alert alert-success rounded-pill px-4 py-3 text-center " id="addToCartMsg"
            style="font-size:30px; font-weight:bold; display:none;">Added To Cart!</div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Continue Shopping</button>
          <a href="shopping_cart.php" class="btn btn-dark">View Cart</a>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="popupResponseMode2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


          <div class="alert alert-danger rounded-pill px-4 py-3 text-center " id="failedToCartMsg"
            style="font-size:30px; font-weight:bold; display:none;">Failed!</div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Continue Shopping</button>
          <a href="shopping_cart.php" class="btn btn-dark">View Cart</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="popupResponseMode3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


          <div class="alert alert-primary rounded-pill px-4 py-3 text-center " id="existCartMsg"
            style="font-size:20px; font-weight:bold; display:none">This product is already in your cart.</div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Continue Shopping</button>
          <a href="shopping_cart.php" class="btn btn-dark">View Cart</a>
        </div>
      </div>
    </div>
  </div>




  <!-- Product Details Section Begin -->

  <?php

$selectquery = " select * from  products where id=$id";
$query = mysqli_query($con,$selectquery);
$nums = mysqli_num_rows($query);

while($res= mysqli_fetch_array($query)){
    $category = $res['category'];
    $sub_category = $res['sub_category'];
   ?>


  <section class="product-details spad">
    <div class="container product_data">
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <div class="product__details__pic">
            <div class="product__details__pic__item">
              <img class="product__details__pic__item--large" src="Admin_panel/production/<?php echo $res['image'] ?>"
                alt="">
            </div>
            <div class="product__details__pic__slider owl-carousel">


              <img data-imgbigurl="Admin_panel/production/<?php echo $res['image'] ?>"
                src="Admin_panel/production/<?php echo $res['image'] ?>" alt="">

              <img data-imgbigurl="Admin_panel/production/<?php echo $res['image_1'] ?>"
                src="Admin_panel/production/<?php echo $res['image_1'] ?>" alt="">

              <img data-imgbigurl="Admin_panel/production/<?php echo $res['image_2'] ?>"
                src="Admin_panel/production/<?php echo $res['image_2'] ?>" alt="">

              <img data-imgbigurl="Admin_panel/production/<?php echo $res['image_3'] ?>"
                src="Admin_panel/production/<?php echo $res['image_3'] ?>" alt="">

              <img data-imgbigurl="Admin_panel/production/<?php echo $res['image_4'] ?>"
                src="Admin_panel/production/<?php echo $res['image_4'] ?>" alt="">


            </div>
          </div>
        </div>

        <?php
                $average_rating = 0;
                $count_query = "SELECT r_id,rating FROM  `review` WHERE product_id='$id'";  
                $count_query_run = mysqli_query($con, $count_query);
                $count_row = mysqli_num_rows($count_query_run);
                $total_Review = $count_row;
                

          if($count_row > 0){
            while($rating_res = mysqli_fetch_array($count_query_run)){
                ?>
        <?php $average_rating = $average_rating + $rating_res['rating'];?>

        <?php
            }
?>
        <?php $result_avg =  $average_rating/$count_row; ?>
        <?php

          }else{
            $result_avg=0;
            $count_row =1;
          }

                
            ?>







        <div class="col-lg-6 col-md-6">
          <div class="product__details__text">
            <h2 style="color:#3749bb; font-weight:600; font-size:30px; margin-bottom:15px;"><?php echo $res['name']; ?>
            </h2>
            <span class="">
              <?php
     
      $count_sold = "select product_id from order_items where product_id='$id' and order_status=4";
      $count_sold_query = mysqli_query($con,$count_sold);
      $count_query_num = mysqli_num_rows($count_sold_query);
       
      $sold =  $count_query_num;

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



     ?> sold</span>
            <div class="product__details__rating" style="font-size:20px;">
              <i class="fa fa-star"></i>
              <strong><?php 
                           
                           echo round($result_avg, 1);

                           ?>/5</strong>
              <span>(<?php echo $total_Review ?> reviews)</span>
            </div>
            <div class=""><del>&#2547; <?php echo $res['original_price']; ?></del> </div>
            <div class="product__details__price">&#2547; <?php echo $res['price']; ?> </div>

            <?php if($res['description'] > 0){
                            ?>
            <div style="line-height:40px;"><span
                style="font-size:23px; font-weight:600; border-bottom:3px solid green;">Key Features</span>
              <p style="padding-top:20px;color:black; font-weight:600;"><?= $res['description'] ?></p>

            </div>
            <?php
                        } ?>

            <ul style="margin-bottom:-50px;">
              <li><b>Availability</b> <span>
                  <?php
                                if($res['product_status'] == 1 )
                                {
                                    echo "In Stock";
                                }else{
                                    echo "<strong style='color:red;'>Out Of Stock</strong>";
                                }
                                ?>
                </span></li>
              <?php $category_name =$res['category']?>
              <?php $subCategory_name =$res['sub_category']?>
              <li><b>Category</b> <span></span>
                <?php if($category_name != NULL){
                                $category_query = mysqli_query($con, "SELECT * FROM category WHERE cat_id='$category_name'");
                                if(mysqli_num_rows($category_query) > 0){
                                    echo mysqli_fetch_array($category_query)['cat_name'];
                                }
                             }else{
                                echo "Category not added yet!";
                             } ?>
              </li>
              <li><b>Subcategory</b> <span>
                  <?php if($subCategory_name != NULL){
                                $subCategory_query = mysqli_query($con, "SELECT * FROM sub_category WHERE s_id='$subCategory_name'");
                                if(mysqli_num_rows($subCategory_query) > 0){
                                    echo mysqli_fetch_array($subCategory_query)['s_name'];
                                }
                             }else{
                                echo "Subcategory not added yet!";
                             } ?>
                </span></li>
              <li><b>Shipping</b> <span>4 to 7 day shipping.</span></li>
              <li><b>Total Sales</b><span class="">
                  <?php
     
      $count_sold = "select product_id from order_items where product_id='$id' and order_status=4";
      $count_sold_query = mysqli_query($con,$count_sold);
      $count_query_num = mysqli_num_rows($count_sold_query);
       
      $sold =  $count_query_num;

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



     ?> sold</span></li>


            </ul>



            <?php
    if($res['product_status'] == 1){
        ?>
            <div style="padding-top:50px;">
              <div class="wrapper">
                <span class="decrement-btn">-</span>
                <span class="num"><input type="text" class="form-control text-center input-qty border-0"
                    style="font-size:20px;background-color:#f7f7f7;width:80px;" value="1" disabled></span>
                <span class="increment-btn">+</span>
              </div>






              <!---Find Product Details for cart ----->
              <input type="hidden" class="prodId" value="<?php echo $res['id']; ?>">
              <input type="hidden" class="prodName" value="<?php echo $res['name']; ?>">
              <input type="hidden" class="prodImage" value="<?php echo $res['image']; ?>">
              <input type="hidden" class="prodPrice" value="<?php echo $res['price']; ?>">
              <input type="hidden" class="prodCharge" value="<?php echo $res['shipping_charge']; ?>">

              <a href="#" class="primary-btn addToCartBtn">ADD TO CARD</a>
              <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
            </div>
            <?php
    }else{
        ?>
            <div style="padding-top:70px;">









              <button class="btn btn-danger btn-lg mx-3">Out of stock</button>
              <button class="heart-icon border-0"><span class="icon_heart_alt"></span></button>
            </div>
            <?php
    }
    ?>


          </div>
        </div>
        <div class="col-lg-12">
          <div class="product__details__tab">
            <ul class="nav nav-tabs" role="tablist">

              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tabs-2" role="tab"
                  aria-selected="false">Information</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">Reviews <span>(<?php
                
                $count_query = "SELECT r_id FROM  `review` WHERE product_id='$id' ORDER BY r_id";  
                $count_query_run = mysqli_query($con, $count_query);
                $count_row = mysqli_num_rows($count_query_run);
                echo ''.$count_row.'';
            ?> )</span></a>
              </li>
            </ul>
            <div class="tab-content" style="width:100%">

              <div class="tab-pane active" id="tabs-2" role="tabpanel">
                <div class="product__details__tab__desc">
                  <h6>Product Infomation</h6>
                  <p"><?php echo $res['information']; ?></p>
                </div>
              </div>
              <div class="tab-pane " id="tabs-3" role="tabpanel">
                <div class="product__details__tab__desc">
                  <h6>Reviews</h6>




                  <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" id="itemperpage">
                    <option value="3" selected>3 per page</option>
                    <option value="5">5 per page</option>
                    <option value="10">10 per page</option>
                    <option value="15">15 per page</option>
                    <option value="20">20 per page</option>
                    <option value="50">50 per page</option>
                    <option value="80">80 per page</option>
                    <option value="100">100 per page</option>
                  </select>


                  <div class="order_body">
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

                    <!---Show Review--->
                    <?php
            
            $review_show = "SELECT * FROM review WHERE product_id='$id'";
            $review_show_query = mysqli_query($con,$review_show);
            $review_show_nums =mysqli_num_rows($review_show_query);

            while($review_show_result = mysqli_fetch_array($review_show_query)){

?>


                    <?php $username = $review_show_result['username'];  ?>


                    <article class="card" style="width:100%; margin-bottom:30px;">
                      <div class="card-body row">

                        <div class="review">
                          <div class="username">
                            <b style="color:#000000; ">
                              <div><?php if($review_show_result['username'] > 0){
                        echo $review_show_result['username'];
            }else{
                echo"Guest";
            } ?></div>
                            </b>

                            <span>

                              <!---php Code start---->



                              <?php
 $created_at=getDateTimeDiff($review_show_result['created_at']);
   echo $created_at;
?>...

                            </span>

                          </div>
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
                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                              target="_blank">
                              <img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>

                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                              target="_blank">
                              <img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>

                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                              target="_blank">
                              <img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>

                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                              target="_blank">
                              <img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>
                            <?php // 3 img
                }elseif($review_show_result['image_1'] > 0 && $review_show_result['image_2'] > 0 && $review_show_result['image_3'] > 0 && $review_show_result['image_4'] < 1 ){
                    ?>
                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                              target="_blank">
                              <img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>

                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                              target="_blank">
                              <img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>

                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                              target="_blank">
                              <img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>
                            <?php

                }elseif($review_show_result['image_1'] > 0 && $review_show_result['image_2'] > 0 && $review_show_result['image_3'] < 1 && $review_show_result['image_4'] > 0){
?>
                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                              target="_blank">
                              <img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>

                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                              target="_blank">
                              <img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>

                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                              target="_blank">
                              <img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>

                            <?php


                }elseif($review_show_result['image_1'] > 0 && $review_show_result['image_2'] < 1 && $review_show_result['image_3'] > 0 && $review_show_result['image_4'] > 0){
                    ?>
                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                              target="_blank">
                              <img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>

                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                              target="_blank">
                              <img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>

                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                              target="_blank">
                              <img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>

                            <?php
                }elseif($review_show_result['image_1'] < 1 && $review_show_result['image_2'] > 0 && $review_show_result['image_3'] > 0 && $review_show_result['image_4'] > 0){
                    ?>
                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                              target="_blank">
                              <img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>

                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                              target="_blank">
                              <img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>

                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                              target="_blank">
                              <img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>

                            <?php // 2 img
                }elseif($review_show_result['image_1'] > 0 && $review_show_result['image_2'] > 0 && $review_show_result['image_3'] < 1 && $review_show_result['image_4'] < 1){
                    ?>
                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                              target="_blank">
                              <img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>

                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                              target="_blank">
                              <img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>
                            <?php

                }elseif($review_show_result['image_1'] < 1 && $review_show_result['image_2'] < 1 && $review_show_result['image_3'] > 0 && $review_show_result['image_4'] > 0){
                    ?>
                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                              target="_blank">
                              <img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>

                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                              target="_blank">
                              <img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>
                            <?php
                }elseif($review_show_result['image_1'] > 0 && $review_show_result['image_2'] < 1 && $review_show_result['image_3'] < 1 && $review_show_result['image_4'] > 0){
                    ?>
                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                              target="_blank">
                              <img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>

                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                              target="_blank">
                              <img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>
                            <?php
                }elseif($review_show_result['image_1'] > 0 && $review_show_result['image_2'] < 1 && $review_show_result['image_3'] > 0 && $review_show_result['image_4'] < 1){
                    ?>
                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                              target="_blank">
                              <img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>

                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                              target="_blank">
                              <img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>
                            <?php
                }elseif($review_show_result['image_1'] < 1 && $review_show_result['image_2'] > 0 && $review_show_result['image_3'] > 0 && $review_show_result['image_4'] < 1){
                    ?>
                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                              target="_blank">
                              <img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>

                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                              target="_blank">
                              <img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>
                            <?php 
                }elseif($review_show_result['image_1'] < 1 && $review_show_result['image_2'] > 0 && $review_show_result['image_3'] < 1 && $review_show_result['image_4'] > 0){
                    ?>
                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                              target="_blank">
                              <img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>

                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                              target="_blank">
                              <img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>
                            <?php //1 img
                }elseif($review_show_result['image_1'] > 0 && $review_show_result['image_2'] < 1 && $review_show_result['image_3'] < 1 && $review_show_result['image_4'] < 1){
                    ?>
                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                              target="_blank"><img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>

                            <?php

                }elseif($review_show_result['image_1'] < 1 && $review_show_result['image_2'] > 0 && $review_show_result['image_3'] < 1 && $review_show_result['image_4'] < 1){
                    ?>
                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                              target="_blank"><img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>

                            <?php

                }elseif($review_show_result['image_1'] < 1 && $review_show_result['image_2'] < 1 && $review_show_result['image_3'] > 0 && $review_show_result['image_4'] < 1){
                    ?>
                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                              target="_blank"><img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>

                            <?php

                }elseif($review_show_result['image_1'] < 1 && $review_show_result['image_2'] < 1 && $review_show_result['image_3'] < 1 && $review_show_result['image_4'] > 0){
                    ?>
                            <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                              target="_blank"><img
                                src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                                target="_blank" height=100 width=100 alt=""></a>

                            <?php

                }else{

                }
             ?>

                            <?php
            $r_id = $review_show_result['r_id'];
          $replay_show = "select * from replay_review where r_id='$r_id' and product_id='$id'";
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
                            <!----- End replay--->

                          </div>

                        </div>

                    </article>



                    <?php


            }


            ?>

                  </div>

                  <ul class="pagination">
                    <li class="prev"><a href="#" id="prev"><i class="fa fa-angle-left"></i></a></li>
                    <!-- page number here -->
                    <li class="next"><a href="#" id="next"><i class="fa fa-angle-right"></i></a></li>
                  </ul>










                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
}
?>

  <!-- Product Details Section End -->

  <!-- Related Product Section Begin -->
  <section class="related-product">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-title related__product__title">
            <h2>Related Product</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <?php
                $relatedProduct = mysqli_query($con, "SELECT * FROM products WHERE id!='$id' AND category='$category' OR id!='$id' AND sub_category='$sub_category' ORDER BY id DESC LIMIT 10");
                if(mysqli_num_rows($relatedProduct) > 0){
                    while($relatedProduct_res = mysqli_fetch_array($relatedProduct)){
                        ?>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="product__item">
            <div class="product__item__pic set-bg"
              data-setbg="Admin_panel/production/<?=$relatedProduct_res['image']?>">
              <ul class="product__item__pic__hover">
                </li>
                <div> <a href="product_details.php?id=<?php echo $relatedProduct_res['id']; ?>" style=""><button
                      class="btn btn-secondary">View</button></a> </div> <br><br>
                <li>
                  <!---- Wishlist--->
                  <form action="includes/code.php" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                    <input type="hidden" name="product_id" value="<?php echo $relatedProduct_res['id'] ?>">
                    <input type="hidden" name="product_name" value="<?php echo $relatedProduct_res['name'] ?>">
                    <input type="hidden" name="product_image" value="<?php echo $relatedProduct_res['image'] ?>">
                    <input type="hidden" name="product_price" value="<?php echo $relatedProduct_res['price'] ?>">
                    <button style="border:none;" name="wishlist"> <i class="fa fa-heart"></i></button>
                  </form>

                </li>

                <li>

                  <form action="includes/code.php" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                    <input type="hidden" name="product_id" value="<?php echo $relatedProduct_res['id'] ?>">
                    <input type="hidden" name="product_name" value="<?php echo $relatedProduct_res['name'] ?>">
                    <input type="hidden" name="product_image" value="<?php echo $relatedProduct_res['image'] ?>">
                    <input type="hidden" name="product_price" value="<?php echo $relatedProduct_res['price'] ?>">

                    <input type="hidden" name="product_charge"
                      value="<?php echo $relatedProduct_res['shipping_charge'] ?>">
                    <button style="border:none;" name="cart"> <i class="fa fa-shopping-cart"></i></button>
                  </form>

                </li>
              </ul>
            </div>
            <div class="product__item__text">
              <h6 style="font-weight:bold;"><a
                  href="product_details.php?product-id=<?php echo $relatedProduct_res['id']; ?>"><?php echo substr($relatedProduct_res['name'],0,60) ?>...</a>
              </h6>
              <h5 style="color:red;">&#2547; <?php echo $relatedProduct_res['price']; ?></h5>
            </div>
          </div>
        </div>

        <?php
                    }
                }
                
                ?>
        <?php
   }elseif(isset($_GET['product-id'])){
    ?>
        <?php  

$id = $_GET['product-id'];

?>

        <!DOCTYPE html>
        <html lang="zxx">

        <head>
          <meta charset="UTF-8">
          <meta name="description" content="Ogani Template">
          <meta name="keywords" content="Ogani, unica, creative, html">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta http-equiv="X-UA-Compatible" content="ie=edge">
          <title>Ogani | Template</title>

          <!-- Google Font -->
          <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap"
            rel="stylesheet">

          <!-- Css Styles -->
          <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
          <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
          <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
          <link rel="stylesheet" href="css/nice-select.css" type="text/css">
          <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
          <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
          <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
          <link rel="stylesheet" href="css/style.css" type="text/css">
          <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"
            integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />


          <style>
          .review {

            margin: 0 15px;
            width: 100%;

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



          .stars {
            margin-top: 10px;
          }

          .stars i {
            color: #e6e6e6;
            font-size: 16px;
            cursor: pointer;
          }

          .stars i.active {
            color: #ff9c1a;
          }


          /* Pagination /*/

          .pagination {
            display: flex;
            justify-content: left;
            align-items: left;

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




          .wrapper {

            display: flex;
            padding: 10px 0;
            background: #FFF;
          }

          .wrapper span {
            background: #f7f7f7;
            text-align: center;
            font-size: 25px;
            font-weight: 600;
            cursor: pointer;
            user-select: none;
            padding: 5px 10px;
          }

          .wrapper span.num {
            font-size: 20px;
            pointer-events: none;
          }
          </style>
        </head>

        <body>
          <?php include 'includes/index-nav.php'; ?>





          <!-- Product Details Section Begin -->

          <?php

$selectquery = " select * from  products where id=$id";
$query = mysqli_query($con,$selectquery);
$nums = mysqli_num_rows($query);

while($res= mysqli_fetch_array($query)){
    $category = $res['category'];
    $sub_category = $res['sub_category'];
   ?>


          <section class="product-details spad">
            <div class="container product_data">
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="product__details__pic">
                    <div class="product__details__pic__item">
                      <img class="product__details__pic__item--large"
                        src="Admin_panel/production/<?php echo $res['image'] ?>" alt="">
                    </div>
                    <div class="product__details__pic__slider owl-carousel">


                      <img data-imgbigurl="Admin_panel/production/<?php echo $res['image'] ?>"
                        src="Admin_panel/production/<?php echo $res['image'] ?>" alt="">

                      <img data-imgbigurl="Admin_panel/production/<?php echo $res['image_1'] ?>"
                        src="Admin_panel/production/<?php echo $res['image_1'] ?>" alt="">

                      <img data-imgbigurl="Admin_panel/production/<?php echo $res['image_2'] ?>"
                        src="Admin_panel/production/<?php echo $res['image_2'] ?>" alt="">

                      <img data-imgbigurl="Admin_panel/production/<?php echo $res['image_3'] ?>"
                        src="Admin_panel/production/<?php echo $res['image_3'] ?>" alt="">

                      <img data-imgbigurl="Admin_panel/production/<?php echo $res['image_4'] ?>"
                        src="Admin_panel/production/<?php echo $res['image_4'] ?>" alt="">


                    </div>
                  </div>
                </div>

                <?php
                $average_rating = 0;
                $count_query = "SELECT r_id,rating FROM  `review` WHERE product_id='$id'";  
                $count_query_run = mysqli_query($con, $count_query);
                $count_row = mysqli_num_rows($count_query_run);
                $total_Review = $count_row;
                

          if($count_row > 0){
            while($rating_res = mysqli_fetch_array($count_query_run)){
                ?>
                <?php $average_rating = $average_rating + $rating_res['rating'];?>

                <?php
            }
?>
                <?php $result_avg =  $average_rating/$count_row; ?>
                <?php

          }else{
            $result_avg=0;
            $count_row =1;
          }

                
            ?>







                <div class="col-lg-6 col-md-6">
                  <div class="product__details__text">
                    <h2 style="color:#3749bb; font-weight:600; font-size:30px; margin-bottom:15px;">
                      <?php echo $res['name']; ?></h2>
                    <span class="">
                      <?php
     
      $count_sold = "select product_id from order_items where product_id='$id' and order_status=4";
      $count_sold_query = mysqli_query($con,$count_sold);
      $count_query_num = mysqli_num_rows($count_sold_query);
       
      $sold =  $count_query_num;

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



     ?> sold</span>
                    <div class="product__details__rating" style="font-size:20px;">
                      <i class="fa fa-star"></i>
                      <strong><?php 
                           
                           echo round($result_avg, 1);

                           ?>/5</strong>
                      <span>(<?php echo $total_Review ?> reviews)</span>
                    </div>
                    <div class=""><del>&#2547; <?php echo $res['original_price']; ?></del> </div>
                    <div class="product__details__price">&#2547; <?php echo $res['price']; ?> </div>

                    <?php if($res['description'] > 0){
                            ?>
                    <div style="line-height:40px;"><span
                        style="font-size:23px; font-weight:600; border-bottom:3px solid green;">Key Features</span>
                      <p style="padding-top:20px;color:black; font-weight:600;"><?= $res['description'] ?></p>

                    </div>
                    <?php
                        } ?>

                    <ul style="margin-bottom:-50px;">
                      <li><b>Availability</b> <span>
                          <?php
                                if($res['product_status'] == 1 )
                                {
                                    echo "In Stock";
                                }else{
                                    echo "<strong style='color:red;'>Out Of Stock</strong>";
                                }
                                ?>
                        </span></li>
                      <li><b>Shipping</b> <span>4 to 7 day shipping.</span></li>
                      <li><b>Total Sales</b><span class="">
                          <?php
     
      $count_sold = "select product_id from order_items where product_id='$id' and order_status=4";
      $count_sold_query = mysqli_query($con,$count_sold);
      $count_query_num = mysqli_num_rows($count_sold_query);
       
      $sold =  $count_query_num;

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



     ?> sold</span></li>


                    </ul>



                    <?php
    if($res['product_status'] == 1){
        ?>
                    <div style="padding-top:50px;">
                      <div class="wrapper">
                        <span class="decrement-btn">-</span>
                        <span class="num"><input type="text" class="form-control text-center input-qty border-0"
                            style="font-size:20px;background-color:#f7f7f7;width:80px;" value="1" disabled></span>
                        <span class="increment-btn">+</span>
                      </div>






                      <!---Find Product Details for cart ----->
                      <input type="hidden" class="prodId" value="<?php echo $res['id']; ?>">
                      <input type="hidden" class="prodName" value="<?php echo $res['name']; ?>">
                      <input type="hidden" class="prodImage" value="<?php echo $res['image']; ?>">
                      <input type="hidden" class="prodPrice" value="<?php echo $res['price']; ?>">
                      <input type="hidden" class="prodCharge" value="<?php echo $res['shipping_charge']; ?>">

                      <a href="user_registration.php" class="primary-btn">ADD TO CARD</a>
                      <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                    </div>
                    <?php
    }else{
        ?>
                    <div style="padding-top:70px;">









                      <button class="btn btn-danger btn-lg mx-3">Out of stock</button>
                      <button class="heart-icon border-0"><span class="icon_heart_alt"></span></button>
                    </div>
                    <?php
    }
    ?>


                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">

                      <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tabs-2" role="tab"
                          aria-selected="false">Information</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">Reviews
                          <span>(<?php
                
                $count_query = "SELECT r_id FROM  `review` WHERE product_id='$id' ORDER BY r_id";  
                $count_query_run = mysqli_query($con, $count_query);
                $count_row = mysqli_num_rows($count_query_run);
                echo ''.$count_row.'';
            ?> )</span></a>
                      </li>
                    </ul>
                    <div class="tab-content">

                      <div class="tab-pane active" id="tabs-2" role="tabpanel">
                        <div class="product__details__tab__desc">
                          <h6>Product Infomation</h6>
                          <p><?php echo $res['information']; ?></p>
                        </div>
                      </div>
                      <div class="tab-pane " id="tabs-3" role="tabpanel">
                        <div class="product__details__tab__desc">
                          <h6>Reviews</h6>




                          <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example"
                            id="itemperpage">
                            <option value="3" selected>3 per page</option>
                            <option value="5">5 per page</option>
                            <option value="10">10 per page</option>
                            <option value="15">15 per page</option>
                            <option value="20">20 per page</option>
                            <option value="50">50 per page</option>
                            <option value="80">80 per page</option>
                            <option value="100">100 per page</option>
                          </select>


                          <div class="order_body">
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

                            <!---Show Review--->
                            <?php
            
            $review_show = "SELECT * FROM review WHERE product_id='$id'";
            $review_show_query = mysqli_query($con,$review_show);
            $review_show_nums =mysqli_num_rows($review_show_query);

            while($review_show_result = mysqli_fetch_array($review_show_query)){

?>


                            <?php $username = $review_show_result['username'];  ?>


                            <article class="card" style="width:100%; margin-bottom:30px;">
                              <div class="card-body row">

                                <div class="review">
                                  <div class="username">
                                    <b style="color:#000000; ">
                                      <div><?php if($review_show_result['username'] > 0){
                        echo $review_show_result['username'];
            }else{
                echo"Guest";
            } ?></div>
                                    </b>

                                    <span>

                                      <!---php Code start---->



                                      <?php
 $created_at=getDateTimeDiff($review_show_result['created_at']);
   echo $created_at;
?>...

                                    </span>

                                  </div>
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
                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                                      target="_blank">
                                      <img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>

                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                                      target="_blank">
                                      <img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>

                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                                      target="_blank">
                                      <img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>

                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                                      target="_blank">
                                      <img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>
                                    <?php // 3 img
                }elseif($review_show_result['image_1'] > 0 && $review_show_result['image_2'] > 0 && $review_show_result['image_3'] > 0 && $review_show_result['image_4'] < 1 ){
                    ?>
                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                                      target="_blank">
                                      <img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>

                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                                      target="_blank">
                                      <img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>

                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                                      target="_blank">
                                      <img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>
                                    <?php

                }elseif($review_show_result['image_1'] > 0 && $review_show_result['image_2'] > 0 && $review_show_result['image_3'] < 1 && $review_show_result['image_4'] > 0){
?>
                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                                      target="_blank">
                                      <img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>

                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                                      target="_blank">
                                      <img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>

                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                                      target="_blank">
                                      <img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>

                                    <?php


                }elseif($review_show_result['image_1'] > 0 && $review_show_result['image_2'] < 1 && $review_show_result['image_3'] > 0 && $review_show_result['image_4'] > 0){
                    ?>
                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                                      target="_blank">
                                      <img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>

                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                                      target="_blank">
                                      <img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>

                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                                      target="_blank">
                                      <img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>

                                    <?php
                }elseif($review_show_result['image_1'] < 1 && $review_show_result['image_2'] > 0 && $review_show_result['image_3'] > 0 && $review_show_result['image_4'] > 0){
                    ?>
                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                                      target="_blank">
                                      <img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>

                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                                      target="_blank">
                                      <img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>

                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                                      target="_blank">
                                      <img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>

                                    <?php // 2 img
                }elseif($review_show_result['image_1'] > 0 && $review_show_result['image_2'] > 0 && $review_show_result['image_3'] < 1 && $review_show_result['image_4'] < 1){
                    ?>
                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                                      target="_blank">
                                      <img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>

                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                                      target="_blank">
                                      <img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>
                                    <?php

                }elseif($review_show_result['image_1'] < 1 && $review_show_result['image_2'] < 1 && $review_show_result['image_3'] > 0 && $review_show_result['image_4'] > 0){
                    ?>
                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                                      target="_blank">
                                      <img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>

                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                                      target="_blank">
                                      <img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>
                                    <?php
                }elseif($review_show_result['image_1'] > 0 && $review_show_result['image_2'] < 1 && $review_show_result['image_3'] < 1 && $review_show_result['image_4'] > 0){
                    ?>
                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                                      target="_blank">
                                      <img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>

                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                                      target="_blank">
                                      <img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>
                                    <?php
                }elseif($review_show_result['image_1'] > 0 && $review_show_result['image_2'] < 1 && $review_show_result['image_3'] > 0 && $review_show_result['image_4'] < 1){
                    ?>
                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                                      target="_blank">
                                      <img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>

                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                                      target="_blank">
                                      <img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>
                                    <?php
                }elseif($review_show_result['image_1'] < 1 && $review_show_result['image_2'] > 0 && $review_show_result['image_3'] > 0 && $review_show_result['image_4'] < 1){
                    ?>
                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                                      target="_blank">
                                      <img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>

                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                                      target="_blank">
                                      <img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>
                                    <?php 
                }elseif($review_show_result['image_1'] < 1 && $review_show_result['image_2'] > 0 && $review_show_result['image_3'] < 1 && $review_show_result['image_4'] > 0){
                    ?>
                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                                      target="_blank">
                                      <img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>

                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                                      target="_blank">
                                      <img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>
                                    <?php //1 img
                }elseif($review_show_result['image_1'] > 0 && $review_show_result['image_2'] < 1 && $review_show_result['image_3'] < 1 && $review_show_result['image_4'] < 1){
                    ?>
                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                                      target="_blank"><img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_1'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>

                                    <?php

                }elseif($review_show_result['image_1'] < 1 && $review_show_result['image_2'] > 0 && $review_show_result['image_3'] < 1 && $review_show_result['image_4'] < 1){
                    ?>
                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                                      target="_blank"><img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_2'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>

                                    <?php

                }elseif($review_show_result['image_1'] < 1 && $review_show_result['image_2'] < 1 && $review_show_result['image_3'] > 0 && $review_show_result['image_4'] < 1){
                    ?>
                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                                      target="_blank"><img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_3'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>

                                    <?php

                }elseif($review_show_result['image_1'] < 1 && $review_show_result['image_2'] < 1 && $review_show_result['image_3'] < 1 && $review_show_result['image_4'] > 0){
                    ?>
                                    <a href="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                                      target="_blank"><img
                                        src="Admin_panel/production/images/Review_images/<?php echo $review_show_result['image_4'] ?>"
                                        target="_blank" height=100 width=100 alt=""></a>

                                    <?php

                }else{

                }
             ?>

                                    <?php
            $r_id = $review_show_result['r_id'];
          $replay_show = "select * from replay_review where r_id='$r_id' and product_id='$id'";
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
                                    <!----- End replay--->

                                  </div>

                                </div>

                            </article>



                            <?php


            }


            ?>

                          </div>

                          <ul class="pagination">
                            <li class="prev"><a href="#" id="prev"><i class="fa fa-angle-left"></i></a></li>
                            <!-- page number here -->
                            <li class="next"><a href="#" id="next"><i class="fa fa-angle-right"></i></a></li>
                          </ul>










                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <?php
}
?>

          <!-- Product Details Section End -->

          <!-- Related Product Section Begin -->
          <section class="related-product">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="section-title related__product__title">
                    <h2>Related Product</h2>
                  </div>
                </div>
              </div>
              <div class="row">
                <?php
                $relatedProduct = mysqli_query($con, "SELECT * FROM products WHERE id!='$id' AND category='$category' OR id!='$id' AND sub_category='$sub_category' ORDER BY id DESC LIMIT 10");
                if(mysqli_num_rows($relatedProduct) > 0){
                    while($relatedProduct_res = mysqli_fetch_array($relatedProduct)){
                        ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="product__item">
                    <div class="product__item__pic set-bg"
                      data-setbg="Admin_panel/production/<?=$relatedProduct_res['image']?>">
                      <ul class="product__item__pic__hover">
                        </li>
                        <div> <a href="product_details.php?product-id=<?php echo $relatedProduct_res['id']; ?>"
                            style=""><button class="btn btn-secondary">View</button></a> </div> <br><br>
                        <li>
                          <!---- Wishlist--->
                          <a href="user_registration.php" style="border:none;" name="wishlist"> <i
                              class="fa fa-heart"></i></a>

                        </li>

                        <li>

                          <a href="user_registration.php" style="border:none;" name="cart"> <i
                              class="fa fa-shopping-cart"></i></a>

                        </li>
                      </ul>
                    </div>
                    <div class="product__item__text">
                      <h6 style="font-weight:bold;"><a
                          href="product_details.php?product-id=<?php echo $relatedProduct_res['id']; ?>"><?php echo substr($relatedProduct_res['name'],0,60) ?>...</a>
                      </h6>
                      <h5 style="color:red;">&#2547; <?php echo $relatedProduct_res['price']; ?></h5>
                    </div>
                  </div>
                </div>

                <?php
                    }
                }
                
                ?>
                <?php
   }
   ?>




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



                <!---------Pagination---->

                <script>
                // Pagination

                var order_body = document.querySelector(".order_body");
                var pageUl = document.querySelector(".pagination");
                var itemShow = document.querySelector("#itemperpage");
                var article = order_body.querySelectorAll("article");
                var emptyBox = [];
                var index = 1;
                var itemPerPage = 5;

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

                <script
                  src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"
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