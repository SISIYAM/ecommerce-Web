
 <!-- Page Preloder -->
 <div id="preloder">
        <div class="loader"></div>
    </div>
<!----POP UP MODELS---------- Start----------->

<!--======================== Cart Modal===============================-->
<div class="modal fade bd-example-modal-lg" id="cartmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hello <?php echo $name ?>! Are you ready to checkout?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="shopping_cart.php" method="POST"> 
        <div class="modal-body">
          
                    
         
        <table class="table table-striped">
  <tbody>
  
<?php
$product_show_query = "select * from cart where  user_id =$user_id";
$product_show_query_run = mysqli_query($con,$product_show_query);
$product_show_query_num = mysqli_num_rows($product_show_query_run);

while($product_show_query_result = mysqli_fetch_array($product_show_query_run))
{
    $proName= $product_show_query_result['product_name'];
    ?>

<tr>
<td><a href="product_details.php?id=<?php echo $product_show_query_result['product_id'] ?>"> 
<img src="Admin_panel/production/<?php echo $product_show_query_result['product_image']; ?>" height=60 width=60 alt=""></a></td>
<td style=" width:40%;"><a href="product_details.php?id=<?php echo $product_show_query_result['product_id'] ?>" style="color:black; font-size:15px;">
<?php echo substr($product_show_query_result['product_name'],0,40) ?>...</a></td>
<td>Quantity: <?php echo $product_show_query_result['quantity'] ?></td>
<td style="color:red; font-weight:600;"> &#2547; <?php echo $product_show_query_result['quantity']*$product_show_query_result['product_price']; ?></td>
<td>
<a href="delete/cart_delete.php?c_id=<?php echo $product_show_query_result['c_id']; ?>" class="" style="color:black; "><i class="fa fa-times"></i></a></td>
</tr>


    <?php
}



?>



   
  </tbody>
</table>             
       
<div style="">
    <span>
    <p style="border-bottom: 1px solid grey; padding:5px 0; font-weight:bold; color:black;">Shipping Charge: <strong style="color:red;">&#2547; <?php echo $s_charge ?> </strong> </p>
    
    <p style="font-weight: bolder;color:black;">Total: <strong style="color:red;">&#2547; <?php echo $sum + $s_charge ?></strong></p></span>
</div>  
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
<div class="modal fade bd-example-modal-lg" id="wishlistmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hello <?php echo $name ?>! Are you ready to buy? </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="" method="POST"> 
        <div class="modal-body">
          
        <table class="table table-striped">
  <tbody>
  
<?php
$product_show_query = "select * from wishlist where  user_id =$user_id";
$product_show_query_run = mysqli_query($con,$product_show_query);
$product_show_query_num = mysqli_num_rows($product_show_query_run);

while($product_show_query_result = mysqli_fetch_array($product_show_query_run))
{
    ?>

<tr>
<td><a href="product_details.php?id=<?php echo $product_show_query_result['product_id'] ?>">
<img src="Admin_panel/production/<?php echo $product_show_query_result['product_image']; ?>" height=60 width=60 alt=""></a></td>
<td style=" width:40%;"><a href="product_details.php?id=<?php echo $product_show_query_result['product_id'] ?>" style="color:black; font-size:15px;">
<?php echo substr($product_show_query_result['product_name'],0,40); ?>...</a></td>
    
<td style="color:red; font-weight:600;"> &#2547; <?php echo $product_show_query_result['product_price']; ?></td>
<td><a href="delete/wishlist_delete.php?w_id=<?php echo $product_show_query_result['w_id']; ?>" class="" style="color:black; "><i class="fa fa-times"></i></a></td>

</tr>

    <?php
}



?>

   
  </tbody>
</table>             
       
        
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
 <?php
   $user_query = "select * from user where id=$user_id"; 
   $user_query_run = mysqli_query($con,$user_query); 
   $user_num = mysqli_num_rows($user_query_run);

   while($user_result = mysqli_fetch_array($user_query_run))
   {
    ?>

   <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="home.php"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span><?php echo $wish_row ?></span></a></li>
                <li><a href="#"><i class="fa fa-shopping-cart"></i> <span>

                <!-- Show Cart-->
                <?php echo $cart_row?>


                </span></a></li>
            </ul>
            <div class="header__cart__price">item: <span> &#2547; <?php echo $sum ?></span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>        
            </div>
            <div class="header__top__right__language">
                                
                                <div><i class="fa fa-user"></i> <?php echo $user_result['username']; ?></div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                  
                                    <li><a href="profile.php">Profile</a></li>
                                    <li><a href="order_history.php">My Orders</a></li>
                                    <li><a href="orders.php?my-reviews">My Reviews</a></li>
                                    
                                    <li><a href="includes/logout.php">Log Out</a></li>
                                </ul>
                            </div>

        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="home.php">Home</a></li>
                <li><a href="shop.php?all">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                       
                        <li><a href="./shopping_cart.php">Shoping Cart</a></li>
                        <li><a href="order_history.php">Orders History</a></li>
                        
                       
                    </ul>
                </li>
              
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
       
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@simovezone.com</li>
                <li>Free Shipping for all Order of $99</li>
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
                                <li><i class="fa fa-envelope"></i> <?php echo $user_result['email']; ?></li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                           
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>                               
                            </div>
                            <div class="header__top__right__language">
                                
                                <div><i class="fa fa-user"></i> <?php echo $user_result['username']; ?></div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                  
                                    <li><a href="profile.php">Profile</a></li>
                                    <li><a href="order_history.php">My Orders</a></li>
                                    <li><a href="orders.php?my-reviews">My Reviews</a></li>
                                    
                                    <li><a href="includes/logout.php">Log Out</a></li>
                                </ul>
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
                        <a href="home.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./home.php">Home</a></li>
                            <li><a href="shop.php?all">Shop</a></li>
                            <li><a href="#">Pages <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="header__menu__dropdown">
                                   
                                    <li><a href="./shopping_cart.php">Shoping Cart</a></li>
                                    <li><a href="order_history.php">Orders History</a></li>
                                    
                                   
                                </ul>
                            </li>
                            
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a id="wishBtn" href="#"><i class="fa fa-heart"></i> <span>
                                 <!-- Show wishlist-->
                <?php echo $wish_row ?>
                            </span></a></li>
                            <li><a id="cartBtn" href="#"><i class="fa fa-shopping-cart"></i> <span>
                                <!-- Show Cart-->
              <?php echo $cart_row ?>
            </span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span> &#2547; <?php echo $sum ?></span></div>
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
   }

 ?>

<style>
.ShowDrop li{
    cursor:pointer;
}

.showHover{
    display:none;
    

}

.ShowDrop li:hover .showHover{
    display: initial;
}


</style>

        <!-- Hero Section Begin -->
        <section class="hero hero-normal">
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
     <li><a href="shop.php?category=<?php echo $dept['cat_id']; ?>"><?php echo $dept['cat_name']; ?></a>
 
    <?php
       $sub_cat_show = "select * from sub_category where cat_id='$cat_id'";
       $sub_cat_show_query = mysqli_query($con,$sub_cat_show);
 
       $sub_cat_num = mysqli_num_rows($sub_cat_show_query);
 
       if($sub_cat_num > 0){
         ?>
             <div class="showHover" style="">
 <ul Style="width:100%; margin-top:-40px;margin-bottom:50px;position:relative; background-color:white;box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);"> 
   
 <?php
  while($sub_cat_result = mysqli_fetch_array($sub_cat_show_query)){
     ?>
     <li><a href="shop.php?subCategory=<?= $sub_cat_result['s_id'];?>"><?= $sub_cat_result['s_name'];?></a></li>
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
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->