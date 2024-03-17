<div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
          
              <a href="index.php" class="site_title"><span>SI</span></a>
            </div>

            <div class="clearfix"></div>
            <?php
 include 'dbcon.php';

$admin_id= $_SESSION['id'];

$query = " select * from  admin where id='$admin_id' ";
$query_run = mysqli_query($con,$query);
$nums = mysqli_num_rows($query_run);

while($result= mysqli_fetch_array($query_run)){
?> 
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php 
                if($result['image'] > 0){
                  echo $result['image'];
                }else{
                echo "images/user.png";
                }
                ?>" alt="..." height="70" width="70" style="margin:10px; box-shadow: 0px 0px 5px rgba(0, 0,0,0.5); border: 1px solid #ddd; border-radius:50%;" >
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>


<?php echo $result['username']; ?>

<?php
}
?>
                </h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home</a>
                  </li>
                
                  <li><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i>Manage Categories<span class="fa fa-chevron-down"></span></a> 
                    <ul class="nav child_menu"> 
                    
        
              


                <li><a href="add.php?add-category"><i class="fa fa-plus"></i>Add Category</a></li>
                <li><a href="list.php?category"><i class="fa fa-dot-circle-o"></i>Category List</a></li>
                <li><a href="add.php?add-subcategory"><i class="fa fa-plus"></i>Add Sub Category</a></li>
                <li><a href="list.php?subcategory"><i class="fa fa-dot-circle-o"></i>Sub Category List</a></li>
                
               
                
            
                  
                </ul> </li>
                <li><a><i class="fa fa-cog" aria-hidden="true"></i>Manage Products<span class="fa fa-chevron-down"></span></a> 
                    <ul class="nav child_menu"> 
                 
                  <li><a href="add.php?add-product"><i class="fa fa-pencil-square-o"></i>Add Products</a>   
                <li><a href="list.php?products"><i class="fa fa-cubes"></i>Products List</a>
                
               
                </ul> </li>
            
                  
               


                  <li><a><i class="fa fa-gears"></i>Manage Orders<span class="fa fa-chevron-down"></span></a> 
                    <ul class="nav child_menu"> 
                    
        
              


                <li><a href="orders.php"><i class="fa fa-shopping-cart"></i>All Orders</a></li>
                <li><a href="orders.php?pending"><i class="fa fa-spinner"></i>Pending Orders</a></li>
                <li><a href="orders.php?canceled"><i class="fa fa-times"></i>Canceled Orders</a></li>
                <li><a href="orders.php?delivered"><i class="fa fa-check"></i>Delivered Orders</a>
               
                
            
                  
                </ul> </li>

                <li><a href="list.php?coupon-code"><i class="fa fa-gift"></i>Coupon Code</a></li>
                <li><a href="list.php?Review"><i class="fa fa-commenting-o"></i>Reviews</a></li>
                <li><a href="list.php?Banner"><i class="fa fa-picture-o"></i>Home Slider Images</a></li>
                
             
              </div>
              

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a href="change.php" data-toggle="tooltip" data-placement="top" title="Profile">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" id="logoutBtn2"  href="#">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <?php
 include 'dbcon.php';

$admin_id= $_SESSION['id'];

$queryy = " select * from  admin where id='$admin_id' ";
$queryy_run = mysqli_query($con,$queryy);
$nums = mysqli_num_rows($queryy_run);

while($result= mysqli_fetch_array($queryy_run)){
?>  
 <img src="<?php 
                if($result['image'] > 0){
                  echo $result['image'];
                }else{
                echo "images/user.png";
                }
                ?>" alt="..."  style=" border-radius:50%;" ><b>
                
<?php echo $result['username']; ?>

<?php
}
?></b>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="change.php"> Profile
                      <span class="badge pull-right"><i class="fa fa-user"></i></span></a>
                      <a class="dropdown-item"  href="change.php">Change Password
                    <span class="badge pull-right"><i class="fa fa-key"></i></span>
                    </a>
                      <a class="dropdown-item" id="logoutBtn"  href="#"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
  
                 
                </ul>
              </nav>
            </div>
          </div>












            
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

          <form action="php/logout.php" method="POST"> 
          
            <button type="submit"  class="btn btn-primary">Logout</button>

          </form>


        </div>
      </div>
    </div>
  </div>

