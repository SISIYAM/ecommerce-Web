<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['username'])){


  header('location:admin_login.php');
  

}
include 'php/auto.php';
?>
<?php 
include 'dbcon.php' ;

include 'includes/head.php';  
include 'includes/code.php';  
include 'delete/delete.php';  
?>


<body class="nav-md">

  <?php include "includes/nav.php" ?>


  <?php
        if(isset($_GET['category'])){
?>

  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">


      <!---start---->

      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Category<small></small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <a href="add.php?add-category"><input type="submit" value="Add New Category" class="btn btn-primary"
                  style="margin-right:20px;"></a>
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>


            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">

                  <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>

                      <!---php Code start---->
                      <?php
$no = 1 ;
$selectquery = " select * from  category";
$query = mysqli_query($con,$selectquery);
$nums = mysqli_num_rows($query);

while($res= mysqli_fetch_array($query)){
   ?>





                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><img src="<?php echo $res['cat_image']?>" height=50 width=50 alt=""></td>
                        <td><?php echo $res['cat_name'] ?></td>
                        <td>
                          <div style="display:flex;">
                            <a href="update.php?cid=<?php echo $res['cat_id'] ?>" data-toggle="tooltip"
                              data-placement="top" title="Edit"><input type="submit" value="Edit"
                                class="btn btn-info btn-sm"> </a>



                            <button value="<?php echo $res['cat_id'] ?>" id=""
                              class="btn btn-danger btn-sm CategoryDeleteBtn" data-toggle="modal"
                              data-target="#CategoryDeleteModal">Delete</button>

                          </div>
                        </td>



                      </tr>
                      <?php

  $no++ ; 
}


?>



                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!----END---->


      <!-- /page content -->

      <?php
        }elseif(isset($_GET['subcategory'])){
          ?>
      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">


          <!---start---->

          <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Sub Category<small></small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <a href="add.php?add-subcategory"><button type="button" class="btn btn-info" data-toggle="modal"
                      data-target="#subcategoryModal ">Add Sub Category</button></a>
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>


                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card-box table-responsive">

                      <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Action</th>
                          </tr>
                        </thead>

                        <tbody>

                          <!---php Code start---->


                          <?php
$no = 1 ;
$selectquery = " select * from  sub_category";
$query = mysqli_query($con,$selectquery);
$nums = mysqli_num_rows($query);

while($res= mysqli_fetch_array($query)){
   ?>


                          <?php $cat_id=  $res['cat_id'];?>


                          <tr>
                            <td><?php echo $no; ?></td>
                            <td>

                              <?php
                            $d_querry = "select * from category where cat_id='$cat_id'";
                            $querry= mysqli_query($con,$d_querry);
                            $d_nums = mysqli_num_rows($querry);

                            while($dept= mysqli_fetch_array($querry))
                            {
                                ?>
                              <?php echo $dept['cat_name']; ?>

                              <?php
                            }



                            ?>


                            </td>
                            <td><img src="<?php echo $res['image']?>" height=50 width=50 alt=""></td>
                            <td><?php echo $res['s_name'] ?></td>
                            <td>
                              <div style="display:flex;">
                                <a href="update.php?sid=<?php echo $res['s_id'] ?>" data-toggle="tooltip"
                                  data-placement="top" title="Edit"><input type="submit" value="Edit"
                                    class="btn btn-info btn-sm"> </a>


                                <button class="btn btn-danger btn-sm deleteSubCategoryBtn"
                                  value="<?=$res['s_id']?>">Delete</button>


                              </div>
                            </td>



                          </tr>
                          <?php

  $no++ ; 
}


?>



                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!----END---->


          <!-- /page content -->
          <?php
        }elseif(isset($_GET['coupon-code'])){
          ?>
          <!-- page content -->
          <div class="right_col" role="main">
            <div class="">


              <!---start---->

              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Coupon Code<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <a href="add.php?add-coupon-code"><button type="button" class="btn btn-info" data-toggle="modal"
                          data-target="#subcategoryModal ">Add New Coupon</button></a>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>


                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="card-box table-responsive">

                          <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Coupon Code</th>
                                <th>Discount Type</th>
                                <th>Discount</th>

                                <th>Expire Date</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>

                            <tbody>

                              <!---php Code start---->


                              <?php
$no = 1 ;
$selectquery = " select * from  cupon order by cupon_id desc";
$query = mysqli_query($con,$selectquery);
$nums = mysqli_num_rows($query);

while($res= mysqli_fetch_array($query)){
   ?>


                              <?php
        $coupon_id=  $res['cupon_id'];
        $time_elapsed= (time()- $res['cupon_created_at']);
        $seconds    = $time_elapsed ;
        $minutes    = round($time_elapsed / 60 );
        $hours      = round($time_elapsed / 3600);
        $days       = round($time_elapsed / 86400 );
        $weeks      = round($time_elapsed / 604800);
        $months     = round($time_elapsed / 2600640 );
        $years      = round($time_elapsed / 31207680 );
    ?>


                              <tr>
                                <td><?php echo $no; ?>
                                <td><b style="color:#1E013B"><?=$res['cupon_code']?></b></td>
                                <td><?=$res['cupon_type']?></td>
                                <td><?php if($res['cupon_type'] == "Percent"){
      echo $res['cupon_value']." %";
      }else{
          echo $res['cupon_value']." &#2547;";
      }?>
                                </td>

                                <td><?php if((time()-$res['cupon_created_at']) > $res['expired']){
     ?> <div style=''><span class='badge bg-danger text-white p-1 fw-bold'>Expired</span>
                                    <b class='text-dark' style='float:right'>
                                      <?php 
          // Seconds
          if($seconds <= 60){
            echo "just now";
          } //Minutes
          else if($minutes <=60){
              if($minutes==1){
                  echo "one minute ago";
              }
              else{
                  echo "$minutes minutes ago";
              }
          }//Hours
        else if($hours <=24){
          if($hours==1){
              echo "an hour ago";
          }else{
              echo "$hours hrs ago";
          }
        }//Days
        else if($days <= 7){
          if($days==1){
              echo "yesterday";
          }else{  
              echo "$days days ago";
          }
      }
      //Weeks
      else if($weeks <= 4.3){
          if($weeks==1){
              echo "a week ago";
          }else{
              echo "$weeks weeks ago";
          }
      } //Months
      else if($months <=12){
          if($months==1){
              echo "a month ago";
          }else{
              echo "$months months ago";
          }
      } //Years
      else{
          if($years==1){
              echo "one year ago";
          }else{
              echo "$years years ago";
          }
      }
        ?>
                                    </b>
                                  </div><?php
    }else{
      ?> <div style=''><span class='badge bg-success text-white p-1 fw-bold'>Available</span>
                                    <b class='text-danger' style='float:right'>
                                      <?php // Seconds
              if($seconds <= 60){
                echo "just now";
              } //Minutes
              else if($minutes <=60){
                  if($minutes==1){
                      echo "one minute left";
                  }
                  else{
                      echo "$minutes minutes left";
                  }
              }//Hours
            else if($hours <=24){
              if($hours==1){
                  echo "an hour left";
              }else{
                  echo "$hours hrs left";
              }
            }//Days
            else if($days >= 1){
              if($days==1){
                  echo "yesterday";
              }else{  
                  echo "$days days left";
              }
          }
          ?>
                                    </b> <?php
    } ?></td>
                                <td><?php if($res['cupon_status'] == 1){
      echo "<span class='badge bg-success text-white p-1 fw-bold'>Active</span>";
    }else{
      echo "<span class='badge bg-danger text-white p-1 fw-bold'>Inactive</span>";
    }
    
    ?></td>

                                <td><a href="details.php?coupon-code=<?=$res['cupon_id']?>"><button
                                      class="btn btn-primary btn-sm">Open</button></a></td>



                              </tr>
                              <?php

  $no++ ; 
}


?>



                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!----END---->


              <!-- /page content -->
              <?php
        }elseif(isset($_GET['products'])){
          ?>

              <!--  Code End -->




              <!-- page content -->
              <div class="right_col" role="main">
                <div class="">


                  <!---start---->

                  <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                      <div class="x_title">



                        <h2>products List<small></small></h2>
                        <ul class="nav navbar-right panel_toolbox">

                          <a href="add.php?add-product" style="margin-right:30px;"> <input type="submit"
                              value="Add New product" class="btn btn-success"></a>

                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>


                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">

                              <table id="datatable-buttons" class="table table-striped table-bordered"
                                style="width:100%">
                                <thead>
                                  <tr>
                                    <th>No.</th>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Total sales</th>
                                    <th>Status</th>
                                    <th>Trending Status</th>
                                    <th>Date</th>
                                    <th>Author</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>

                                <tbody>

                                  <!---php Code start---->
                                  <?php
$no = 1 ;
$selectquery = " select * from  products order by id desc";
$query = mysqli_query($con,$selectquery);
$nums = mysqli_num_rows($query);

while($res= mysqli_fetch_array($query)){
   ?>

                                  <!----Exra---->

                                  <?php $idst = $res['id'];?>


                                  <!----End---->
                                  <?php $name= $res['name']; ?>


                                  <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><img src="<?php echo $res['image'] ?>" height=50 width=50 alt=""> </td>
                                    <td><?php echo $res['name'] ?></td>
                                    <td> <?php
     
     $count_sold = "select product_id from order_items where product_id='$idst' and order_status=4";
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



    ?> sold</td>

                                    <td><?php
                  if($res['product_status']==1){
                   ?>
                                      <span class="badge bg-success text-white p-1 fw-bold">
                                        In Stock</span>
                                      <?php
                  }else{
                                    ?>
                                      <span class="badge bg-danger text-white p-1 fw-bold">
                                        Out Of Stock</span>
                                      <?php
                  }
                  ?>
                                    </td>
                                    <td><?php
               if($res['trending_status'] == 0){
                ?>
                                      <span class="badge bg-warning text-dark p-1 fw-bold">
                                        Not Trending</span>


                                      <?php
               }else{
                ?>
                                      <span class="badge bg-dark text-white p-1 fw-bold">
                                        On Trending</span>
                                      <?php
               }
               ?>
                                    </td>
                                    <td><?php echo $res['added_at']; ?></td>

                                    <td><?php echo $res['author']; ?></td>

                                    <td>
                                      <a href="details.php?pid=<?php echo $res['id'] ?>"><input type="submit"
                                          value="Open" class="btn btn-primary btn-sm"> </a>

                                    </td>



                                  </tr>
                                  <?php

  $no++ ; 
}


?>



                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!----END---->


                  <!-- /page content -->

                  <?php
        }elseif(isset($_GET['Review'])){
          ?>

                  <style>
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
                  </style>

                  <!-- page content -->
                  <div class="right_col" role="main">
                    <div class="">


                      <!---start---->

                      <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Reviews<small></small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <a href="add.php?add-coupon-code"><button type="button" class="btn btn-info"
                                  data-toggle="modal" data-target="#subcategoryModal ">Add New Coupon</button></a>
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>


                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="card-box table-responsive">

                                  <table id="datatable-buttons" class="table table-striped table-bordered"
                                    style="width:100%">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>Order No</th>
                                        <th>User Name</th>
                                        <th>Rating</th>
                                        <th>Review</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>

                                    <tbody>

                                      <!---php Code start---->


                                      <?php
$no = 1 ;
$selectquery = " select * from review order by r_id desc";
$query = mysqli_query($con,$selectquery);
$nums = mysqli_num_rows($query);

while($res= mysqli_fetch_array($query)){
   ?>


                                      <?php $review_id=  $res['r_id'];?>


                                      <tr>
                                        <td><?php echo $no; ?>
                                        <td><b style="color:#1E013B"><?=$res['order_no']?></b></td>
                                        <td><?=$res['username']?></td>
                                        <td>
                                          <div class="stars">
                                            <?php
        if($res['rating'] == 1){
            ?>
                                            <i class="fa fa-star submit_star active" data-rating="1"></i>
                                            <i class="fa fa-star submit_star" data-rating="2"></i>
                                            <i class="fa fa-star submit_star" data-rating="3"></i>
                                            <i class="fa fa-star submit_star" data-rating="4"></i>
                                            <i class="fa fa-star submit_star" data-rating="5"></i>
                                            <?php
        }elseif($res['rating'] == 2){
            ?>
                                            <i class="fa fa-star submit_star active" data-rating="1"></i>
                                            <i class="fa fa-star submit_star active" data-rating="2"></i>
                                            <i class="fa fa-star submit_star" data-rating="3"></i>
                                            <i class="fa fa-star submit_star" data-rating="4"></i>
                                            <i class="fa fa-star submit_star" data-rating="5"></i>
                                            <?php
        }elseif($res['rating'] == 3){
            ?>
                                            <i class="fa fa-star submit_star active" data-rating="1"></i>
                                            <i class="fa fa-star submit_star active" data-rating="2"></i>
                                            <i class="fa fa-star submit_star active" data-rating="3"></i>
                                            <i class="fa fa-star submit_star" data-rating="4"></i>
                                            <i class="fa fa-star submit_star" data-rating="5"></i>
                                            <?php
        }elseif($res['rating'] == 4){
            ?>
                                            <i class="fa fa-star submit_star active" data-rating="1"></i>
                                            <i class="fa fa-star submit_star active" data-rating="2"></i>
                                            <i class="fa fa-star submit_star active" data-rating="3"></i>
                                            <i class="fa fa-star submit_star active" data-rating="4"></i>
                                            <i class="fa fa-star submit_star" data-rating="5"></i>
                                            <?php
        }elseif($res['rating'] == 5){
            ?>
                                            <i class="fa fa-star submit_star active" data-rating="1"></i>
                                            <i class="fa fa-star submit_star active" data-rating="2"></i>
                                            <i class="fa fa-star submit_star active" data-rating="3"></i>
                                            <i class="fa fa-star submit_star active" data-rating="4"></i>
                                            <i class="fa fa-star submit_star active" data-rating="5"></i>
                                            <?php
        }else{
            ?>
                                            <i class="fa fa-star submit_star" data-rating="1"></i>
                                            <i class="fa fa-star submit_star" data-rating="2"></i>
                                            <i class="fa fa-star submit_star" data-rating="3"></i>
                                            <i class="fa fa-star submit_star" data-rating="4"></i>
                                            <i class="fa fa-star submit_star" data-rating="5"></i>
                                            <?php
        }
        ?>
                                          </div>
                                        </td>

                                        <td><?=$res['review']?></td>

                                        <td>
                                          <?php
      if(mysqli_num_rows(mysqli_query($con,"select r_id from replay_review where r_id='$review_id'"))){
        ?>
                                          <span class="badge bg-success text-white p-1 fw-bold">Replied</span>
                                          <?php
      }else{
        ?>
                                          <span class="badge bg-danger text-white p-1 fw-bold">Not Replied</span>
                                          <?php
      }

      ?>
                                        </td>
                                        <td><a href="replay.php?review-id=<?=$res['r_id']?>"><button
                                              class="btn btn-primary btn-sm">Open</button></a></td>



                                      </tr>
                                      <?php

  $no++ ; 
}


?>



                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!----END---->


                      <!-- /page content -->
                      <?php
        }elseif(isset($_GET['Banner'])){
          ?>
                      <!-- page content -->
                      <div class="right_col" role="main">
                        <div class="">


                          <!---start---->

                          <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                              <div class="x_title">
                                <h2>Home Slider Images<small></small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                  <a href="add.php?add-Banner"><button type="button" class="btn btn-info"
                                      data-toggle="modal" data-target="#subcategoryModal ">Add Images</button></a>
                                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                  </li>


                                </ul>
                                <div class="clearfix"></div>
                              </div>
                              <div class="x_content">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="card-box table-responsive">

                                      <table id="datatable-buttons" class="table table-striped table-bordered"
                                        style="width:100%">
                                        <thead>
                                          <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>

                                        <tbody>

                                          <!---php Code start---->


                                          <?php
$no = 1 ;
$selectquery = " select * from  banner order by id desc";
$query = mysqli_query($con,$selectquery);
$nums = mysqli_num_rows($query);

while($res= mysqli_fetch_array($query)){
   ?>


                                          <?php $img_id=  $res['id'];?>


                                          <tr>
                                            <td><?php echo $no; ?>
                                            <td><b style="color:#1E013B"><?=$res['id']?></b></td>
                                            <td><img src="<?=$res['image']?>" height=60 width=60 alt=""></td>
                                            <td><?php if($res['status'] == 1){
      echo "<form action='' method='POST'>
      <input type='hidden' name='status' value='0'>
      <input type='hidden' name='id' value='$img_id'>
      <button name='statusBtn' class='btn btn-success btn-sm' data-toggle='tooltip' data-placement='top' title='Make Inactive'>Active</button>
      </form>";
    }else{
      echo "
      <form action='' method='POST'>
      <input type='hidden' name='status' value='1'>
      <input type='hidden' name='id' value='$img_id'>
      <button name='statusBtn' class='btn btn-warning btn-sm' data-toggle='tooltip' data-placement='top' title='Make Active'>Inactive</button>
      </form>";
    }
    
    ?></td>

                                            <td><button class="btn btn-danger btn-sm bannerDeleteBtn"
                                                data-toggle="modal" data-target="#BannerDeleteModal"
                                                value="<?=$res['id']?>">Delete</button></td>



                                          </tr>
                                          <?php

  $no++ ; 
}


?>



                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!----END---->


                          <!-- /page content -->
                          <?php
        }else{
          ?>

                          <style>
                          * {
                            font-family: 'PT Sans Caption', sans-serif, 'arial', 'Times New Roman';
                          }

                          /* Error Page */
                          .error .clip .shadow {
                            height: 180px;
                            /*Contrall*/
                          }

                          .error .clip:nth-of-type(2) .shadow {
                            width: 130px;
                            /*Contrall play with javascript*/
                          }

                          .error .clip:nth-of-type(1) .shadow,
                          .error .clip:nth-of-type(3) .shadow {
                            width: 250px;
                            /*Contrall*/
                          }

                          .error .digit {
                            width: 150px;
                            /*Contrall*/
                            height: 150px;
                            /*Contrall*/
                            line-height: 150px;
                            /*Contrall*/
                            font-size: 120px;
                            font-weight: bold;
                          }

                          .error h2

                          /*Contrall*/
                            {
                            font-size: 32px;
                          }

                          .error .msg

                          /*Contrall*/
                            {
                            top: -190px;
                            left: 30%;
                            width: 80px;
                            height: 80px;
                            line-height: 80px;
                            font-size: 32px;
                          }

                          .error span.triangle

                          /*Contrall*/
                            {
                            top: 70%;
                            right: 0%;
                            border-left: 20px solid #535353;
                            border-top: 15px solid transparent;
                            border-bottom: 15px solid transparent;
                          }


                          .error .container-error-404 {
                            margin-top: 10%;
                            position: relative;
                            height: 250px;
                            padding-top: 40px;
                          }

                          .error .container-error-404 .clip {
                            display: inline-block;
                            transform: skew(-45deg);
                          }

                          .error .clip .shadow {

                            overflow: hidden;
                          }

                          .error .clip:nth-of-type(2) .shadow {
                            overflow: hidden;
                            position: relative;
                            box-shadow: inset 20px 0px 20px -15px rgba(150, 150, 150, 0.8), 20px 0px 20px -15px rgba(150, 150, 150, 0.8);
                          }

                          .error .clip:nth-of-type(3) .shadow:after,
                          .error .clip:nth-of-type(1) .shadow:after {
                            content: "";
                            position: absolute;
                            right: -8px;
                            bottom: 0px;
                            z-index: 9999;
                            height: 100%;
                            width: 10px;
                            background: linear-gradient(90deg, transparent, rgba(173, 173, 173, 0.8), transparent);
                            border-radius: 50%;
                          }

                          .error .clip:nth-of-type(3) .shadow:after {
                            left: -8px;
                          }

                          .error .digit {
                            position: relative;
                            top: 8%;
                            color: white;
                            background: #2E0963;
                            border-radius: 50%;
                            display: inline-block;
                            transform: skew(45deg);
                          }

                          .error .clip:nth-of-type(2) .digit {
                            left: -10%;
                          }

                          .error .clip:nth-of-type(1) .digit {
                            right: -20%;
                          }

                          .error .clip:nth-of-type(3) .digit {
                            left: -20%;
                          }

                          .error h2 {
                            color: #A2A2A2;
                            font-weight: bold;
                            padding-bottom: 20px;
                          }

                          .error .msg {
                            position: relative;
                            z-index: 9999;
                            display: block;
                            background: #535353;
                            color: #A2A2A2;
                            border-radius: 50%;
                            font-style: italic;
                          }

                          .error .triangle {
                            position: absolute;
                            z-index: 999;
                            transform: rotate(45deg);
                            content: "";
                            width: 0;
                            height: 0;
                          }

                          /* Error Page */
                          @media(max-width: 767px) {

                            /* Error Page */
                            .error .clip .shadow {
                              height: 100px;
                              /*Contrall*/
                            }

                            .error .clip:nth-of-type(2) .shadow {
                              width: 80px;
                              /*Contrall play with javascript*/
                            }

                            .error .clip:nth-of-type(1) .shadow,
                            .error .clip:nth-of-type(3) .shadow {
                              width: 100px;
                              /*Contrall*/
                            }

                            .error .digit {
                              width: 80px;
                              /*Contrall*/
                              height: 80px;
                              /*Contrall*/
                              line-height: 80px;
                              /*Contrall*/
                              font-size: 52px;
                            }

                            .error h2

                            /*Contrall*/
                              {
                              font-size: 24px;
                            }

                            .error .msg

                            /*Contrall*/
                              {
                              top: -110px;
                              left: 15%;
                              width: 40px;
                              height: 40px;
                              line-height: 40px;
                              font-size: 18px;
                            }

                            .error span.triangle

                            /*Contrall*/
                              {
                              top: 70%;
                              right: -3%;
                              border-left: 10px solid #535353;
                              border-top: 8px solid transparent;
                              border-bottom: 8px solid transparent;
                            }

                            .error .container-error-404 {
                              height: 150px;
                            }

                            /* Error Page */
                          }

                          /*--------------------------------------------Framework --------------------------------*/

                          .overlay {
                            position: relative;
                            z-index: 20;
                          }

                          /*done*/
                          .ground-color {
                            background: white;
                          }

                          /*done*/
                          .item-bg-color {
                            background: #EAEAEA
                          }

                          /*done*/

                          /* Padding Section*/
                          .padding-top {
                            padding-top: 10px;
                          }

                          /*done*/
                          .padding-bottom {
                            padding-bottom: 10px;
                          }

                          /*done*/
                          .padding-vertical {
                            padding-top: 10px;
                            padding-bottom: 10px;
                          }

                          .padding-horizontal {
                            padding-left: 10px;
                            padding-right: 10px;
                          }

                          .padding-all {
                            padding: 10px;
                          }

                          /*done*/

                          .no-padding-left {
                            padding-left: 0px;
                          }

                          /*done*/
                          .no-padding-right {
                            padding-right: 0px;
                          }

                          /*done*/
                          .no-vertical-padding {
                            padding-top: 0px;
                            padding-bottom: 0px;
                          }

                          .no-horizontal-padding {
                            padding-left: 0px;
                            padding-right: 0px;
                          }

                          .no-padding {
                            padding: 0px;
                          }

                          /*done*/
                          /* Padding Section*/

                          /* Margin section */
                          .margin-top {
                            margin-top: 10px;
                          }

                          /*done*/
                          .margin-bottom {
                            margin-bottom: 10px;
                          }

                          /*done*/
                          .margin-right {
                            margin-right: 10px;
                          }

                          /*done*/
                          .margin-left {
                            margin-left: 10px;
                          }

                          /*done*/
                          .margin-horizontal {
                            margin-left: 10px;
                            margin-right: 10px;
                          }

                          /*done*/
                          .margin-vertical {
                            margin-top: 10px;
                            margin-bottom: 10px;
                          }

                          /*done*/
                          .margin-all {
                            margin: 10px;
                          }

                          /*done*/
                          .no-margin {
                            margin: 0px;
                          }

                          /*done*/

                          .no-vertical-margin {
                            margin-top: 0px;
                            margin-bottom: 0px;
                          }

                          .no-horizontal-margin {
                            margin-left: 0px;
                            margin-right: 0px;
                          }

                          .inside-col-shrink {
                            margin: 0px 20px;
                          }

                          /*done - For the inside sections that has also Title section*/
                          /* Margin section */

                          hr {
                            margin: 0px;
                            padding: 0px;
                            border-top: 1px dashed #999;
                          }

                          /*--------------------------------------------FrameWork------------------------*/
                          </style>
                          <!-- page content -->
                          <div class="right_col" role="main">
                            <div class="">
                              <div class="page-title">



                              </div>
                              <div class="clearfix"></div>
                              <div class="row">
                                <div class="col-md-12 col-sm-12 ">
                                  <div class="x_panel">

                                    <div class="x_content">
                                      <br />
                                      <!-- Error Page -->
                                      <div class="error">
                                        <div class="container-floud">
                                          <div class="col-xs ground-color text-center">
                                            <div class="container-error-404">
                                              <div class="clip">
                                                <div class="shadow"><span class="digit thirdDigit"></span></div>
                                              </div>
                                              <div class="clip">
                                                <div class="shadow"><span class="digit secondDigit"></span></div>
                                              </div>
                                              <div class="clip">
                                                <div class="shadow"><span class="digit firstDigit"></span></div>
                                              </div>
                                              <div class="msg">OH!<span class="triangle"></span></div>
                                            </div>
                                            <h2 class="h1">Sorry! Page not found</h2>
                                            <button class="btn btn-dark" onclick="history.back()">Go Home</button>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- Error Page -->
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <script>
                              function randomNum() {
                                "use strict";
                                return Math.floor(Math.random() * 9) + 1;
                              }
                              var loop1, loop2, loop3, time = 30,
                                i = 0,
                                number, selector3 = document.querySelector('.thirdDigit'),
                                selector2 = document.querySelector('.secondDigit'),
                                selector1 = document.querySelector('.firstDigit');
                              loop3 = setInterval(function() {
                                "use strict";
                                if (i > 40) {
                                  clearInterval(loop3);
                                  selector3.textContent = 4;
                                } else {
                                  selector3.textContent = randomNum();
                                  i++;
                                }
                              }, time);
                              loop2 = setInterval(function() {
                                "use strict";
                                if (i > 80) {
                                  clearInterval(loop2);
                                  selector2.textContent = 0;
                                } else {
                                  selector2.textContent = randomNum();
                                  i++;
                                }
                              }, time);
                              loop1 = setInterval(function() {
                                "use strict";
                                if (i > 100) {
                                  clearInterval(loop1);
                                  selector1.textContent = 4;
                                } else {
                                  selector1.textContent = randomNum();
                                  i++;
                                }
                              }, time);
                              </script>
                              <?php
        }
       ?>




                              <!-- footer content -->
                              <footer>
                                <div class="pull-right">
                                  <a href="#"><b>Developed By MD SAYMUM ISLAM SIYAM</b></a>
                                </div>
                                <div class="clearfix"></div>
                              </footer>
                              <!-- /footer content -->
                            </div>
                          </div>

                          <!-- jQuery -->
                          <script src="../vendors/jquery/dist/jquery.min.js"></script>
                          <!-- Bootstrap -->
                          <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
                          <!-- FastClick -->
                          <script src="../vendors/fastclick/lib/fastclick.js"></script>
                          <!-- NProgress -->
                          <script src="../vendors/nprogress/nprogress.js"></script>
                          <!-- iCheck -->
                          <script src="../vendors/iCheck/icheck.min.js"></script>
                          <!-- Datatables -->
                          <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
                          <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
                          <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
                          <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
                          <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
                          <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
                          <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
                          <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
                          <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
                          <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
                          <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
                          <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
                          <script src="../vendors/jszip/dist/jszip.min.js"></script>
                          <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
                          <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

                          <!-- Custom Theme Scripts -->
                          <script src="../build/js/custom.min.js"></script>

                          <!-- AlertyFy js -->
                          <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>


                          <script>
                          <?php 
          if(isset($_SESSION['message'])){
          ?>

                          alertify.set('notifier', 'position', 'top-right');
                          alertify.success('<?= $_SESSION['message']; ?>');
                          <?php

          unset($_SESSION['message']);

          }
            ?>
                          </script>

                          <script>
                          <?php 
          if(isset($_SESSION['error'])){
          ?>

                          alertify.set('notifier', 'position', 'top-right');
                          alertify.error('<?= $_SESSION['error']; ?>');
                          <?php

          unset($_SESSION['error']);

          }
            ?>
                          </script>



                          <!-- AlertyFy js -->
                          <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>


                          <script>
                          <?php 
          if(isset($_SESSION['message'])){
          ?>

                          alertify.set('notifier', 'position', 'top-right');
                          alertify.success('<?= $_SESSION['message']; ?>');
                          <?php

          unset($_SESSION['message']);

          }
            ?>
                          </script>

                          <script>
                          <?php 
          if(isset($_SESSION['error'])){
          ?>

                          alertify.set('notifier', 'position', 'top-right');
                          alertify.error('<?= $_SESSION['error']; ?>');
                          <?php

          unset($_SESSION['error']);

          }
            ?>
                          </script>
</body>

</html>

<?php include 'includes/js.php'; ?>