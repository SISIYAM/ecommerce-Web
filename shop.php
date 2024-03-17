<?php $_SESSION['after_Cart']= $_SERVER['REQUEST_URI'];?>
<?php
        if(isset($_GET['all'])){
            ?>
<?php include 'includes/header.php'; ?>



<!DOCTYPE html>
<html lang="zxx">

<head>
  <?php include 'includes/head.php'; ?>
</head>

<body>

  <?php include 'includes/nav.php'; ?>


  <!-- Product Section Begin -->
  <section class="product spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-5">
          <div class="sidebar">
            <div class="sidebar__item">
              <h4>Department</h4>
              <ul>
                <?php
                                $selectCategory = mysqli_query($con, "SELECT * FROM category");
                                if(mysqli_num_rows($selectCategory) > 0){
                                    while($selectCategoryRes = mysqli_fetch_array($selectCategory)){
                                        ?>
                <li><a
                    href="shop.php?category=<?=$selectCategoryRes['cat_id']?>"><?=$selectCategoryRes['cat_name']?></a>
                </li>
                <?php
                                    }
                                }
                                ?>

              </ul>
            </div>



          </div>
        </div>


        <div class="col-lg-9 col-md-7">
          <div class="product__discount">
            <div class="section-title product__discount__title">
              <h2>Trending Products</h2>
            </div>
            <div class="row">
              <div class="product__discount__slider owl-carousel">
                <?php
                            $latestProduct = mysqli_query($con, "SELECT * FROM products WHERE trending_status=1 ORDER BY id DESC");
                            if(mysqli_num_rows($latestProduct) > 0){
                                while($latestProductRow = mysqli_fetch_array($latestProduct)){
                                    ?>


                <div class="col-lg-4">
                  <div class="product__discount__item">
                    <div class="product__discount__item__pic set-bg"
                      data-setbg="Admin_panel/production/<?php echo $latestProductRow['image'] ?>">
                      <!-- <div class="product__discount__percent">-20%</div> -->
                      <ul class="product__item__pic__hover">
                        <div> <a href="product_details.php?id=<?php echo $latestProductRow['id']; ?>" style=""><button
                              class="btn btn-secondary">View</button></a> </div> <br><br>
                        <li>
                          <!---- Wishlist--->
                          <form action="includes/code.php" method="post">
                            <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                            <input type="hidden" name="product_id" value="<?php echo $latestProductRow['id'] ?>">
                            <input type="hidden" name="product_name" value="<?php echo $latestProductRow['name'] ?>">
                            <input type="hidden" name="product_image" value="<?php echo $latestProductRow['image'] ?>">
                            <input type="hidden" name="product_price" value="<?php echo $latestProductRow['price'] ?>">
                            <button style="border:none;" name="wishlist"> <i class="fa fa-heart"></i></button>
                          </form>

                        </li>

                        <li>

                          <form action="includes/code.php" method="post">
                            <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                            <input type="hidden" name="product_id" value="<?php echo $latestProductRow['id'] ?>">
                            <input type="hidden" name="product_name" value="<?php echo $latestProductRow['name'] ?>">
                            <input type="hidden" name="product_image" value="<?php echo $latestProductRow['image'] ?>">
                            <input type="hidden" name="product_price" value="<?php echo $latestProductRow['price'] ?>">

                            <input type="hidden" name="product_charge"
                              value="<?php echo $latestProductRow['shipping_charge'] ?>">
                            <button style="border:none;" name="cart"> <i class="fa fa-shopping-cart"></i></button>
                          </form>

                        </li>
                      </ul>
                    </div>
                    <div class="featured__item__text">
                      <h6 style="font-weight:bold;"><a
                          href="product_details.php?id=<?php echo $latestProductRow['id']; ?>"><?php echo substr($latestProductRow['name'],0,60) ?>...</a>
                      </h6>
                      <h5 style="color:red;">&#2547; <?php echo $latestProductRow['price']; ?></h5>
                    </div>
                  </div>
                </div>
                <?php
                                }
                            }
                                ?>
              </div>
            </div>
          </div>


          <div class="filter__item">
            <div class="row">
              <div class="col-lg-4 col-md-5">
                <div class="filter__sort">
                  <span>Sort By</span>
                  <select>
                    <option value="0">Default</option>
                    <option value="0">Default</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-4 col-md-4">
                <div class="filter__found">
                  <h6><span>16</span> Products found</h6>
                </div>
              </div>
              <div class="col-lg-4 col-md-3">
                <div class="filter__option">
                  <span class="icon_grid-2x2"></span>
                  <span class="icon_ul"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <?php 
                        $products = mysqli_query($con, "SELECT * FROM products ORDER BY id DESC");
                        if(mysqli_num_rows($products) > 0){
                            while($product_row = mysqli_fetch_array($products)){
                                ?>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="product__item">
                <div class="product__item__pic set-bg" data-setbg="Admin_panel/production/<?=$product_row['image']?>">
                  <ul class="product__item__pic__hover">
                    <div> <a href="product_details.php?id=<?php echo $product_row['id']; ?>" style=""><button
                          class="btn btn-secondary">View</button></a> </div> <br><br>
                    <li>
                      <!---- Wishlist--->
                      <form action="includes/code.php" method="post">
                        <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                        <input type="hidden" name="product_id" value="<?php echo $product_row['id'] ?>">
                        <input type="hidden" name="product_name" value="<?php echo $product_row['name'] ?>">
                        <input type="hidden" name="product_image" value="<?php echo $product_row['image'] ?>">
                        <input type="hidden" name="product_price" value="<?php echo $product_row['price'] ?>">
                        <button style="border:none;" name="wishlist"> <i class="fa fa-heart"></i></button>
                      </form>

                    </li>

                    <li>

                      <form action="includes/code.php" method="post">
                        <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                        <input type="hidden" name="product_id" value="<?php echo $product_row['id'] ?>">
                        <input type="hidden" name="product_name" value="<?php echo $product_row['name'] ?>">
                        <input type="hidden" name="product_image" value="<?php echo $product_row['image'] ?>">
                        <input type="hidden" name="product_price" value="<?php echo $product_row['price'] ?>">

                        <input type="hidden" name="product_charge"
                          value="<?php echo $product_row['shipping_charge'] ?>">
                        <button style="border:none;" name="cart"> <i class="fa fa-shopping-cart"></i></button>
                      </form>

                    </li>

                  </ul>
                </div>
                <div class="product__item__text">
                  <h6 style="font-weight:bold;"><a
                      href="product_details.php?id=<?php echo $product_row['id']; ?>"><?php echo substr($product_row['name'],0,60) ?>...</a>
                  </h6>
                  <h5 style="color:red;">&#2547; <?php echo $product_row['price']; ?></h5>
                </div>
              </div>
            </div>
            <?php
                            }
                        }
                        ?>

          </div>
          <div class="product__pagination">
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#"><i class="fa fa-long-arrow-right"></i></a>
          </div>
        </div>
        <?php
        }elseif (isset($_GET['category'])) {
            $category_id = $_GET['category'];
            # code...
            ?>

        <?php include 'includes/header.php'; ?>



        <!DOCTYPE html>
        <html lang="zxx">

        <head>
          <?php include 'includes/head.php'; ?>
        </head>

        <body>

          <?php include 'includes/nav.php'; ?>


          <!-- Product Section Begin -->
          <section class="product spad">
            <div class="container">
              <div class="row">
                <div class="col-lg-3 col-md-5">
                  <div class="sidebar">
                    <div class="sidebar__item">
                      <h4>Department</h4>
                      <ul>
                        <?php
                                $selectCategory = mysqli_query($con, "SELECT * FROM category");
                                if(mysqli_num_rows($selectCategory) > 0){
                                    while($selectCategoryRes = mysqli_fetch_array($selectCategory)){
                                        ?>
                        <li><a
                            href="shop.php?category=<?=$selectCategoryRes['cat_id']?>"><?=$selectCategoryRes['cat_name']?></a>
                        </li>
                        <?php
                                    }
                                }
                                ?>

                      </ul>
                    </div>



                  </div>
                </div>

                <div class="col-lg-9 col-md-7">
                  <div class="filter__item">
                    <div class="row">
                      <div class="col-lg-4 col-md-5">
                        <div class="filter__sort">
                          <span>Sort By</span>
                          <select>
                            <option value="0">Default</option>
                            <option value="0">Default</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-4">
                        <div class="filter__found">
                          <h6><span>16</span> Products found</h6>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-3">
                        <div class="filter__option">
                          <span class="icon_grid-2x2"></span>
                          <span class="icon_ul"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <?php 
                        $products = mysqli_query($con, "SELECT * FROM products WHERE category='$category_id' ORDER BY id DESC");
                        if(mysqli_num_rows($products) > 0){
                            while($product_row = mysqli_fetch_array($products)){
                                ?>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                      <div class="product__item">
                        <div class="product__item__pic set-bg"
                          data-setbg="Admin_panel/production/<?=$product_row['image']?>">
                          <ul class="product__item__pic__hover">
                            <div> <a href="product_details.php?id=<?php echo $product_row['id']; ?>" style=""><button
                                  class="btn btn-secondary">View</button></a> </div> <br><br>
                            <li>
                              <!---- Wishlist--->
                              <form action="includes/code.php" method="post">
                                <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                                <input type="hidden" name="product_id" value="<?php echo $product_row['id'] ?>">
                                <input type="hidden" name="product_name" value="<?php echo $product_row['name'] ?>">
                                <input type="hidden" name="product_image" value="<?php echo $product_row['image'] ?>">
                                <input type="hidden" name="product_price" value="<?php echo $product_row['price'] ?>">
                                <button style="border:none;" name="wishlist"> <i class="fa fa-heart"></i></button>
                              </form>

                            </li>

                            <li>

                              <form action="includes/code.php" method="post">
                                <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                                <input type="hidden" name="product_id" value="<?php echo $product_row['id'] ?>">
                                <input type="hidden" name="product_name" value="<?php echo $product_row['name'] ?>">
                                <input type="hidden" name="product_image" value="<?php echo $product_row['image'] ?>">
                                <input type="hidden" name="product_price" value="<?php echo $product_row['price'] ?>">

                                <input type="hidden" name="product_charge"
                                  value="<?php echo $product_row['shipping_charge'] ?>">
                                <button style="border:none;" name="cart"> <i class="fa fa-shopping-cart"></i></button>
                              </form>

                            </li>

                          </ul>
                        </div>
                        <div class="product__item__text">
                          <h6 style="font-weight:bold;"><a
                              href="product_details.php?id=<?php echo $product_row['id']; ?>"><?php echo substr($product_row['name'],0,60) ?>...</a>
                          </h6>
                          <h5 style="color:red;">&#2547; <?php echo $product_row['price']; ?></h5>
                        </div>
                      </div>
                    </div>
                    <?php
                            }
                        }
                        ?>

                  </div>
                  <div class="product__pagination">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                  </div>
                  <?php
        }elseif (isset($_GET['subCategory'])) {
            $subCategory_id = $_GET['subCategory'];
            # code...
            ?>

                  <?php include 'includes/header.php'; ?>



                  <!DOCTYPE html>
                  <html lang="zxx">

                  <head>
                    <?php include 'includes/head.php'; ?>
                  </head>

                  <body>

                    <?php include 'includes/nav.php'; ?>


                    <!-- Product Section Begin -->
                    <section class="product spad">
                      <div class="container">
                        <div class="row">
                          <div class="col-lg-3 col-md-5">
                            <div class="sidebar">
                              <div class="sidebar__item">
                                <h4>Department</h4>
                                <ul>
                                  <?php
                                $selectCategory = mysqli_query($con, "SELECT * FROM category");
                                if(mysqli_num_rows($selectCategory) > 0){
                                    while($selectCategoryRes = mysqli_fetch_array($selectCategory)){
                                        ?>
                                  <li><a
                                      href="shop.php?category=<?=$selectCategoryRes['cat_id']?>"><?=$selectCategoryRes['cat_name']?></a>
                                  </li>
                                  <?php
                                    }
                                }
                                ?>

                                </ul>
                              </div>



                            </div>
                          </div>

                          <div class="col-lg-9 col-md-7">
                            <div class="filter__item">
                              <div class="row">
                                <div class="col-lg-4 col-md-5">
                                  <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                      <option value="0">Default</option>
                                      <option value="0">Default</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                  <div class="filter__found">
                                    <h6><span>16</span> Products found</h6>
                                  </div>
                                </div>
                                <div class="col-lg-4 col-md-3">
                                  <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <?php 
                        $products = mysqli_query($con, "SELECT * FROM products WHERE sub_category='$subCategory_id' ORDER BY id DESC");
                        if(mysqli_num_rows($products) > 0){
                            while($product_row = mysqli_fetch_array($products)){
                                ?>
                              <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                  <div class="product__item__pic set-bg"
                                    data-setbg="Admin_panel/production/<?=$product_row['image']?>">
                                    <ul class="product__item__pic__hover">
                                      <div> <a href="product_details.php?id=<?php echo $product_row['id']; ?>"
                                          style=""><button class="btn btn-secondary">View</button></a> </div> <br><br>
                                      <li>
                                        <!---- Wishlist--->
                                        <form action="includes/code.php" method="post">
                                          <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                                          <input type="hidden" name="product_id"
                                            value="<?php echo $product_row['id'] ?>">
                                          <input type="hidden" name="product_name"
                                            value="<?php echo $product_row['name'] ?>">
                                          <input type="hidden" name="product_image"
                                            value="<?php echo $product_row['image'] ?>">
                                          <input type="hidden" name="product_price"
                                            value="<?php echo $product_row['price'] ?>">
                                          <button style="border:none;" name="wishlist"> <i
                                              class="fa fa-heart"></i></button>
                                        </form>

                                      </li>

                                      <li>

                                        <form action="includes/code.php" method="post">
                                          <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                                          <input type="hidden" name="product_id"
                                            value="<?php echo $product_row['id'] ?>">
                                          <input type="hidden" name="product_name"
                                            value="<?php echo $product_row['name'] ?>">
                                          <input type="hidden" name="product_image"
                                            value="<?php echo $product_row['image'] ?>">
                                          <input type="hidden" name="product_price"
                                            value="<?php echo $product_row['price'] ?>">

                                          <input type="hidden" name="product_charge"
                                            value="<?php echo $product_row['shipping_charge'] ?>">
                                          <button style="border:none;" name="cart"> <i
                                              class="fa fa-shopping-cart"></i></button>
                                        </form>

                                      </li>

                                    </ul>
                                  </div>
                                  <div class="product__item__text">
                                    <h6 style="font-weight:bold;"><a
                                        href="product_details.php?id=<?php echo $product_row['id']; ?>"><?php echo substr($product_row['name'],0,60) ?>...</a>
                                    </h6>
                                    <h5 style="color:red;">&#2547; <?php echo $product_row['price']; ?></h5>
                                  </div>
                                </div>
                              </div>
                              <?php
                            }
                        }
                        ?>

                            </div>
                            <div class="product__pagination">
                              <a href="#">1</a>
                              <a href="#">2</a>
                              <a href="#">3</a>
                              <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                            </div>
                            <?php
        }

   // Code for Without Login

   elseif(isset($_GET['all-products'])){
    ?>

                            <!DOCTYPE html>
                            <html lang="zxx">

                            <head>
                              <?php include 'includes/head.php'; ?>
                            </head>

                            <body>

                              <?php include'includes/index-nav.php'; ?>


                              <!-- Product Section Begin -->
                              <section class="product spad">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-lg-3 col-md-5">
                                      <div class="sidebar">
                                        <div class="sidebar__item">
                                          <h4>Department</h4>
                                          <ul>
                                            <?php
                                $selectCategory = mysqli_query($con, "SELECT * FROM category");
                                if(mysqli_num_rows($selectCategory) > 0){
                                    while($selectCategoryRes = mysqli_fetch_array($selectCategory)){
                                        ?>
                                            <li><a
                                                href="shop.php?index-category=<?=$selectCategoryRes['cat_id']?>"><?=$selectCategoryRes['cat_name']?></a>
                                            </li>
                                            <?php
                                    }
                                }
                                ?>

                                          </ul>
                                        </div>



                                      </div>
                                    </div>


                                    <div class="col-lg-9 col-md-7">
                                      <div class="product__discount">
                                        <div class="section-title product__discount__title">
                                          <h2>Trending Products</h2>
                                        </div>
                                        <div class="row">
                                          <div class="product__discount__slider owl-carousel">
                                            <?php
                            $latestProduct = mysqli_query($con, "SELECT * FROM products WHERE trending_status=1 ORDER BY id DESC");
                            if(mysqli_num_rows($latestProduct) > 0){
                                while($latestProductRow = mysqli_fetch_array($latestProduct)){
                                    ?>


                                            <div class="col-lg-4">
                                              <div class="product__discount__item">
                                                <div class="product__discount__item__pic set-bg"
                                                  data-setbg="Admin_panel/production/<?php echo $latestProductRow['image'] ?>">
                                                  <!-- <div class="product__discount__percent">-20%</div> -->
                                                  <ul class="product__item__pic__hover">
                                                    <div> <a
                                                        href="product_details.php?product-id=<?php echo $latestProductRow['id']; ?>"
                                                        style=""><button class="btn btn-secondary">View</button></a>
                                                    </div> <br><br>
                                                    <li>
                                                      <!---- Wishlist--->
                                                      <a href="user_registration.php" style="border:none;"
                                                        name="wishlist"> <i class="fa fa-heart"></i></a>

                                                    </li>

                                                    <li>

                                                      <a href="user_registration.php" style="border:none;" name="cart">
                                                        <i class="fa fa-shopping-cart"></i></a>

                                                    </li>
                                                  </ul>
                                                </div>
                                                <div class="featured__item__text">
                                                  <h6 style="font-weight:bold;"><a
                                                      href="product_details.php?product-id=<?php echo $latestProductRow['id']; ?>"><?php echo substr($latestProductRow['name'],0,60) ?>...</a>
                                                  </h6>
                                                  <h5 style="color:red;">&#2547;
                                                    <?php echo $latestProductRow['price']; ?></h5>
                                                </div>
                                              </div>
                                            </div>
                                            <?php
                                }
                            }
                                ?>
                                          </div>
                                        </div>
                                      </div>


                                      <div class="filter__item">
                                        <div class="row">
                                          <div class="col-lg-4 col-md-5">
                                            <div class="filter__sort">
                                              <span>Sort By</span>
                                              <select>
                                                <option value="0">Default</option>
                                                <option value="0">Default</option>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="col-lg-4 col-md-4">
                                            <div class="filter__found">
                                              <h6><span>16</span> Products found</h6>
                                            </div>
                                          </div>
                                          <div class="col-lg-4 col-md-3">
                                            <div class="filter__option">
                                              <span class="icon_grid-2x2"></span>
                                              <span class="icon_ul"></span>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <?php 
                        $products = mysqli_query($con, "SELECT * FROM products ORDER BY id DESC");
                        if(mysqli_num_rows($products) > 0){
                            while($product_row = mysqli_fetch_array($products)){
                                ?>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                          <div class="product__item">
                                            <div class="product__item__pic set-bg"
                                              data-setbg="Admin_panel/production/<?=$product_row['image']?>">
                                              <ul class="product__item__pic__hover">
                                                <div> <a
                                                    href="product_details.php?product-id=<?php echo $product_row['id']; ?>"
                                                    style=""><button class="btn btn-secondary">View</button></a> </div>
                                                <br><br>
                                                <li>
                                                  <!---- Wishlist--->
                                                  <a href="user_registration.php" style="border:none;" name="wishlist">
                                                    <i class="fa fa-heart"></i></a>

                                                </li>

                                                <li>

                                                  <a href="user_registration.php" style="border:none;" name="cart"> <i
                                                      class="fa fa-shopping-cart"></i></a>

                                                </li>

                                              </ul>
                                            </div>
                                            <div class="product__item__text">
                                              <h6 style="font-weight:bold;"><a
                                                  href="product_details.php?product-id=<?php echo $product_row['id']; ?>"><?php echo substr($product_row['name'],0,60) ?>...</a>
                                              </h6>
                                              <h5 style="color:red;">&#2547; <?php echo $product_row['price']; ?></h5>
                                            </div>
                                          </div>
                                        </div>
                                        <?php
                            }
                        }
                        ?>

                                      </div>
                                      <div class="product__pagination">
                                        <a href="#">1</a>
                                        <a href="#">2</a>
                                        <a href="#">3</a>
                                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                                      </div>
                                    </div>
                                    <?php
   }elseif(isset($_GET['index-subCategory'])){
  
    $subCategory_id = $_GET['index-subCategory'];
    # code...
  ?>






                                    <!DOCTYPE html>
                                    <html lang="zxx">

                                    <head>
                                      <?php include 'includes/head.php'; ?>
                                    </head>

                                    <body>

                                      <?php include 'includes/index-nav.php'; ?>


                                      <!-- Product Section Begin -->
                                      <section class="product spad">
                                        <div class="container">
                                          <div class="row">
                                            <div class="col-lg-3 col-md-5">
                                              <div class="sidebar">
                                                <div class="sidebar__item">
                                                  <h4>Department</h4>
                                                  <ul>
                                                    <?php
                                $selectCategory = mysqli_query($con, "SELECT * FROM category");
                                if(mysqli_num_rows($selectCategory) > 0){
                                    while($selectCategoryRes = mysqli_fetch_array($selectCategory)){
                                        ?>
                                                    <li><a
                                                        href="shop.php?index-category=<?=$selectCategoryRes['cat_id']?>"><?=$selectCategoryRes['cat_name']?></a>
                                                    </li>
                                                    <?php
                                    }
                                }
                                ?>

                                                  </ul>
                                                </div>



                                              </div>
                                            </div>

                                            <div class="col-lg-9 col-md-7">
                                              <div class="filter__item">
                                                <div class="row">
                                                  <div class="col-lg-4 col-md-5">
                                                    <div class="filter__sort">
                                                      <span>Sort By</span>
                                                      <select>
                                                        <option value="0">Default</option>
                                                        <option value="0">Default</option>
                                                      </select>
                                                    </div>
                                                  </div>
                                                  <div class="col-lg-4 col-md-4">
                                                    <div class="filter__found">
                                                      <h6><span>16</span> Products found</h6>
                                                    </div>
                                                  </div>
                                                  <div class="col-lg-4 col-md-3">
                                                    <div class="filter__option">
                                                      <span class="icon_grid-2x2"></span>
                                                      <span class="icon_ul"></span>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <?php 
                        $products = mysqli_query($con, "SELECT * FROM products WHERE sub_category='$subCategory_id' ORDER BY id DESC");
                        if(mysqli_num_rows($products) > 0){
                            while($product_row = mysqli_fetch_array($products)){
                                ?>
                                                <div class="col-lg-4 col-md-6 col-sm-6">
                                                  <div class="product__item">
                                                    <div class="product__item__pic set-bg"
                                                      data-setbg="Admin_panel/production/<?=$product_row['image']?>">
                                                      <ul class="product__item__pic__hover">
                                                        <div> <a
                                                            href="product_details.php?product-id=<?php echo $product_row['id']; ?>"
                                                            style=""><button class="btn btn-secondary">View</button></a>
                                                        </div> <br><br>
                                                        <li>
                                                          <!---- Wishlist--->
                                                          <a href="user_registration.php" style="border:none;"
                                                            name="wishlist"> <i class="fa fa-heart"></i></a>

                                                        </li>

                                                        <li>

                                                          <a href="user_registration.php" style="border:none;"
                                                            name="wishlist"> <i class="fa fa-shopping-cart"></i></a>

                                                        </li>

                                                      </ul>
                                                    </div>
                                                    <div class="product__item__text">
                                                      <h6 style="font-weight:bold;"><a
                                                          href="product_details.php?id=<?php echo $product_row['id']; ?>"><?php echo substr($product_row['name'],0,60) ?>...</a>
                                                      </h6>
                                                      <h5 style="color:red;">&#2547;
                                                        <?php echo $product_row['price']; ?></h5>
                                                    </div>
                                                  </div>
                                                </div>
                                                <?php
                            }
                        }
                        ?>

                                              </div>
                                              <div class="product__pagination">
                                                <a href="#">1</a>
                                                <a href="#">2</a>
                                                <a href="#">3</a>
                                                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                                              </div>
                                              <?php
   }elseif(isset($_GET['index-category'])){
    $category_id = $_GET['index-category'];
            # code...
            ?>

                                              <!DOCTYPE html>
                                              <html lang="zxx">

                                              <head>
                                                <?php include 'includes/head.php'; ?>
                                              </head>

                                              <body>

                                                <?php include 'includes/index-nav.php'; ?>


                                                <!-- Product Section Begin -->
                                                <section class="product spad">
                                                  <div class="container">
                                                    <div class="row">
                                                      <div class="col-lg-3 col-md-5">
                                                        <div class="sidebar">
                                                          <div class="sidebar__item">
                                                            <h4>Department</h4>
                                                            <ul>
                                                              <?php
                                $selectCategory = mysqli_query($con, "SELECT * FROM category");
                                if(mysqli_num_rows($selectCategory) > 0){
                                    while($selectCategoryRes = mysqli_fetch_array($selectCategory)){
                                        ?>
                                                              <li><a
                                                                  href="shop.php?index-category=<?=$selectCategoryRes['cat_id']?>"><?=$selectCategoryRes['cat_name']?></a>
                                                              </li>
                                                              <?php
                                    }
                                }
                                ?>

                                                            </ul>
                                                          </div>



                                                        </div>
                                                      </div>

                                                      <div class="col-lg-9 col-md-7">
                                                        <div class="filter__item">
                                                          <div class="row">
                                                            <div class="col-lg-4 col-md-5">
                                                              <div class="filter__sort">
                                                                <span>Sort By</span>
                                                                <select>
                                                                  <option value="0">Default</option>
                                                                  <option value="0">Default</option>
                                                                </select>
                                                              </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4">
                                                              <div class="filter__found">
                                                                <h6><span>16</span> Products found</h6>
                                                              </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-3">
                                                              <div class="filter__option">
                                                                <span class="icon_grid-2x2"></span>
                                                                <span class="icon_ul"></span>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="row">
                                                          <?php 
                        $products = mysqli_query($con, "SELECT * FROM products WHERE category='$category_id' ORDER BY id DESC");
                        if(mysqli_num_rows($products) > 0){
                            while($product_row = mysqli_fetch_array($products)){
                                ?>
                                                          <div class="col-lg-4 col-md-6 col-sm-6">
                                                            <div class="product__item">
                                                              <div class="product__item__pic set-bg"
                                                                data-setbg="Admin_panel/production/<?=$product_row['image']?>">
                                                                <ul class="product__item__pic__hover">
                                                                  <div> <a
                                                                      href="product_details.php?product-id=<?php echo $product_row['id']; ?>"
                                                                      style=""><button
                                                                        class="btn btn-secondary">View</button></a>
                                                                  </div> <br><br>
                                                                  <li>
                                                                    <!---- Wishlist--->
                                                                    <a href="user_registration.php" style="border:none;"
                                                                      name="wishlist"> <i class="fa fa-heart"></i></a>

                                                                  </li>

                                                                  <li>

                                                                    <a href="user_registration.php" style="border:none;"
                                                                      name="cart"> <i
                                                                        class="fa fa-shopping-cart"></i></a>

                                                                  </li>

                                                                </ul>
                                                              </div>
                                                              <div class="product__item__text">
                                                                <h6 style="font-weight:bold;"><a
                                                                    href="product_details.php?id=<?php echo $product_row['id']; ?>"><?php echo substr($product_row['name'],0,60) ?>...</a>
                                                                </h6>
                                                                <h5 style="color:red;">&#2547;
                                                                  <?php echo $product_row['price']; ?></h5>
                                                              </div>
                                                            </div>
                                                          </div>
                                                          <?php
                            }
                        }
                        ?>

                                                        </div>
                                                        <div class="product__pagination">
                                                          <a href="#">1</a>
                                                          <a href="#">2</a>
                                                          <a href="#">3</a>
                                                          <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                                                        </div>
                                                        <?php
   }

        ?>



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
                                                  const l = $('#imageAppendChild').append(
                                                    '<li data-target="#carouselExampleIndicators" data-slide-to=' +
                                                    count + '></li>');

                                                }
                                                </script>

                                              </body>