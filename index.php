<?php include 'Admin_panel/production/dbcon.php';
?>

<head>
  <?php include 'includes/head.php';?>


</head>

<body>
  <?php include 'Admin_panel/production/dbcon.php'; ?>
  <!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"></div>
  </div>


  <!--======================== Cart Modal===============================-->
  <div class="modal fade bd-example-modal-lg" id="cartmodel" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hello! Are you ready to checkout?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="shopping_cart.php" method="POST">
          <div class="modal-body">


            <b>No items added to your cart yet!</b>


          </div>

          <div class="modal-footer">
            <button class="btn btn-success" type="button" data-dismiss="modal">Continue Shopping</button>



            <button type="submit" name="changePass_btn" class="btn btn-primary">View Cart</button>

        </form>


      </div>
    </div>
  </div>
  </div>
  <!--======================== End Cart Modal===============================-->




  <!--======================== Wishlist Modal===============================-->
  <div class="modal fade bd-example-modal-lg" id="wishlistmodel" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hello! Are you ready to buy? </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="" method="POST">
          <div class="modal-body">

            <b>No items added to your wishlist yet! </b>


          </div>

          <div class="modal-footer">
            <button class="btn btn-success" type="button" data-dismiss="modal">Continue Shopping</button>





        </form>


      </div>
    </div>
  </div>
  </div>
  <!--======================== End Wishlist Modal===============================-->




  <!-------POPUP END_---------->




  <!-- Humberger Begin  mobile-->


  <div class="humberger__menu__overlay"></div>
  <div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
      <a href="#"><img src="img/logo.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
      <ul>
        <li><a href="#"><i class="fa fa-heart"></i> <span>0</span></a></li>
        <li><a href="#"><i class="fa fa-shopping-cart"></i> <span>

              <!-- Show Cart-->
              0


            </span></a></li>
      </ul>
      <div class="header__cart__price">item: <span> &#2547; 0</span></div>
    </div>
    <div class="humberger__menu__widget">
      <div class="header__top__right__language">
        <img src="img/language.png" alt="">
        <div>English</div>
      </div>

      <div class="header__top__right__language">

        <div><i class="fa fa-user"></i> <a href="user_registration.php" style="color:black;margin-left:10px;">Login</a>
        </div>


      </div>


    </div>
    <nav class="humberger__menu__nav mobile-menu">
      <ul>
        <li class="active"><a href="./index.php">Home</a></li>
        <li><a href="shop.php?all-products">Shop</a></li>
        <li><a href="#">Pages</a>
          <ul class="header__menu__dropdown">

            <li><a href="./shopping_cart.php">Shoping Cart</a></li>


          </ul>
        </li>

        <li><a href="./contact.html">Contact</a></li>
      </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
      <a href="#"><i class="fa fa-facebook"></i></a>
      <a href="#"><i class="fa fa-twitter"></i></a>
      <a href="#"><i class="fa fa-linkedin"></i></a>
      <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
      <ul>
        <!-- <li><i class="fa fa-envelope"></i> hello@simovezone.com</li>
                <li>Free Shipping for all Order of $99</li> -->
      </ul>
    </div>
  </div>
  <!-- Humberger mobile End -->


  <!-- Header Section Begin -->
  <header class="header">
    <div class="header__top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="header__top__left">
              <ul>

              </ul>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="header__top__right">
              <div class="header__top__right__social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-pinterest-p"></i></a>
              </div>
              <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>

              </div>

              <div class="header__top__right__language">

                <div><i class="fa fa-user"></i><a href="user_registration.php"
                    style="color:black;margin-left:10px;">Login</a></div>


              </div>

              <div class="header__top__right__auth">

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="header__logo">
            <a href="index.php"><img src="img/logo.png" alt=""></a>
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="header__menu">
            <ul>
              <li class="active"><a href="./index.php">Home</a></li>
              <li><a href="shop.php?all-products">Shop</a></li>
              <li><a href="#">Pages <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                <ul class="header__menu__dropdown">

                  <li><a href="./shopping_cart.php">Shoping Cart</a></li>


                </ul>
              </li>

              <li><a href="./contact.html">Contact</a></li>
            </ul>
          </nav>
        </div>
        <div class="col-lg-3">
          <div class="header__cart">
            <ul>
              <li><a id="wishBtn" href="#"><i class="fa fa-heart"></i> <span>0</span></a></li>
              <li><a id="cartBtn" href="#"><i class="fa fa-shopping-cart"></i> <span>0</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span> &#2547; 0</span></div>
          </div>
        </div>
      </div>
      <div class="humberger__open">
        <i class="fa fa-bars"></i>
      </div>
    </div>
  </header>
  <!-- Header Section End -->
  <?php
  

 ?>

  <style>
  .ShowDrop li {
    cursor: pointer;
  }

  .showHover {
    display: none;


  }

  .ShowDrop li:hover .showHover {
    display: initial;
  }
  </style>

  <!----- nav End----->
  <!-- Hero Section Begin -->
  <section class="hero">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="hero__categories">
            <div class="hero__categories__all">
              <i class="fa fa-bars"></i>
              <span>All departments</span>
            </div>
            <ul class="ShowDrop">

              <?php
$d_querry = "select * from category";
$querry= mysqli_query($con,$d_querry);
$d_nums = mysqli_num_rows($querry);

while($dept= mysqli_fetch_array($querry))
{

 ?>
              <?php $cat_id = $dept['cat_id']; ?>
              <li><a href="shop.php?index-category=<?php echo $dept['cat_id']; ?>"><?php echo $dept['cat_name']; ?></a>

                <?php
      $sub_cat_show = "select * from sub_category where cat_id='$cat_id'";
      $sub_cat_show_query = mysqli_query($con,$sub_cat_show);

      $sub_cat_num = mysqli_num_rows($sub_cat_show_query);

      if($sub_cat_num > 0){
        ?>
                <div class="showHover" style="">
                  <ul
                    Style="width:100%; margin:10px 0;position:relative; background-color:white;box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);">

                    <?php
 while($sub_cat_result = mysqli_fetch_array($sub_cat_show_query)){
    ?>
                    <li><a
                        href="shop.php?index-subCategory=<?= $sub_cat_result['s_id'];?>"><?= $sub_cat_result['s_name'];?></a>
                    </li>
                    <?php
 }
?>


                  </ul>
                </div>
                <?php
      }else{

      }
   ?>


              </li>

              <?php
}



?>



            </ul>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="hero__search">
            <div class="hero__search__form">
              <form action="#">
                <div class="hero__search__categories">
                  All Categories
                  <span class="arrow_carrot-down"></span>
                </div>
                <input type="text" placeholder="What do yo u need?">
                <button type="submit" class="site-btn">SEARCH</button>
              </form>
            </div>
            <div class="hero__search__phone">
              <div class="hero__search__phone__icon">
                <i class="fa fa-phone"></i>
              </div>
              <div class="hero__search__phone__text">
                <h5>+65 11.188.888</h5>
                <span>support 24/7 time</span>
              </div>
            </div>
          </div>
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators" id="imageAppendChild">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>




            </ol>
            <div class="carousel-inner">

              <?php
   $active_banner = mysqli_query($con,"SELECT * FROM banner WHERE status = 1 ORDER BY id DESC LIMIT 1" );
   $active_banner_count = mysqli_num_rows($active_banner);
   if($active_banner_count > 0){
    $active_banner_row = mysqli_fetch_array($active_banner);
    ?>
              <div class="carousel-item active">
                <img class="d-block w-100" height=430 width=982
                  src="Admin_panel/production/<?=$active_banner_row['image']?>" alt="First slide">
              </div>
              <?php
   }
  ?>
              <?php

$banner = "SELECT * FROM banner WHERE status = 1 ORDER BY id DESC LIMIT 10000 OFFSET 1";
$banner_run = mysqli_query($con,$banner);
$banner_count = mysqli_num_rows($banner_run);

if($banner_count > 0){
    while($banner_row = mysqli_fetch_array($banner_run)){
        ?>
              <div class="carousel-item">
                <img class="d-block w-100" height=430 width=982 src="Admin_panel/production/<?=$banner_row['image']?>"
                  alt="First slide">
              </div>
              <?php
    }
}
?>



            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Hero Section End -->

  <!-- Categories Section Begin -->
  <section class="categories">
    <div class="container">
      <div class="row">
        <div class="categories__slider owl-carousel">

          <!---php Code start---->
          <?php

$selectquery = " select * from  category";
$query = mysqli_query($con,$selectquery);
$nums = mysqli_num_rows($query);

while($res= mysqli_fetch_array($query)){
   ?>

          <div class="category" style=" margin:20px 10px; box-shadow: 0 5px 100px rgba(0, 0, 0, 0.1);">
            <div class="col-lg-3" style="padding:10px;">
              <div class="categories__item set-bg" data-setbg="Admin_panel/production/<?php echo $res['cat_image'] ?>">
                <h5><a href="shop.php?index-category=<?php echo $res['cat_id']; ?>"><?php echo $res['cat_name'] ?></a>
                </h5>
              </div>
            </div>
          </div>

          <?php

 
}


?>

        </div>
      </div>
    </div>
  </section>
  <!-- Categories Section End -->

  <!-- Featured Section Begin -->
  <section class="featured spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-title">
            <h2>Featured Product</h2>
          </div>
          <div class="featured__controls">
            <ul>
              <li class="active" data-filter="*">All</li>

            </ul>
          </div>
        </div>
      </div>
      <div class="row featured__filter">

        <?php
            $show_product = "SELECT * FROM products WHERE product_status=1 ORDER BY id DESC LIMIT 40    ";
            $product_query = mysqli_query($con,$show_product);
            $product_num  = mysqli_num_rows($product_query);

            while($product_result = mysqli_fetch_array($product_query))
            {
                $productName=$product_result['name'];
               ?>
        <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
          <div class="featured__item" style="">
            <div style="" class="featured__item__pic set-bg"
              data-setbg="Admin_panel/production/<?php echo $product_result['image'] ?>">
              <ul class="featured__item__pic__hover">
                <div> <a href="product_details.php?product-id=<?php echo $product_result['id']; ?>" style=""><button
                      class="btn btn-secondary">View</button></a> </div> <br><br>
                <li>
                  <!---- Wishlist--->
                  <a href="user_registration.php" style="border:none;" name="wishlist"> <i class="fa fa-heart"></i></a>

                </li>

                <li>

                  <a href="user_registration.php" style="border:none;" name="cart"> <i
                      class="fa fa-shopping-cart"></i></a>

                </li>
              </ul>
            </div>
            <div class="featured__item__text">
              <h6 style="font-weight:bold;"><a
                  href="product_details.php?product-id=<?php echo $product_result['id']; ?>"><?php echo substr($productName,0,60) ?>...</a>
              </h6>
              <h5 style="color:red;">&#2547; <?php echo $product_result['price']; ?></h5>
            </div>
          </div>

        </div>

        <?php 
            }
?>




      </div>
      <a href="shop.php?all-products"><button style="width:100%" class="btn btn-info"> See All</button></a>
    </div>
  </section>
  <!-- Featured Section End -->

  <!-- Banner Begin 
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
     Banner End -->



  <!-- Blog Section Begin 
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-1.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-2.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-3.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    < Blog Section End -->

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

  <script>
  //Code for banner slideshow
  const imageSlider = $('.carousel-item').length;
  let count = 0;

  for (count = 1; count < imageSlider; count++) {
    const l = $('#imageAppendChild').append('<li data-target="#carouselExampleIndicators" data-slide-to=' + count +
      '></li>');

  }
  </script>

</body>

</html>