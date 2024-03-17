<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['username'])){


  header('location:admin_login.php');
  

}
include 'php/auto.php';





	?>





<?php
include 'dbcon.php';
 

include 'includes/head.php';
include 'includes/code.php';
?>


<!-- /top navigation -->





<?php
if(isset($_GET['cid'])){	
?>
<?php

$cid=intval($_GET['cid']);

?>

<body class="nav-md">
  <?php include "includes/nav.php" ?>
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">



      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Update Category</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>

              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />


              <?php 
            $ret=mysqli_query($con,"select * from category where cat_id='$cid'");
            while($row=mysqli_fetch_array($ret))
            {

            ?>


              <form method="post" enctype="multipart/form-data" action="" id="demo-form2" data-parsley-validate
                class="form-horizontal form-label-left">


                <input type="hidden" name="c_id" value="<?php echo htmlentities($row['cat_id']);?>">


                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Full Name<span
                      class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <input type="text" name="category_name" value="<?php echo htmlentities($row['cat_name']);?>"
                      class="form-control ">
                  </div>
                </div>
                <!---THumbnail Images--->
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="file"><b
                      style="color:#000000;">Thumbnail Image</b><span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <input type="file" class="input" name="img" class="form-control"
                      value="<?php echo  htmlentities($row['cat_image']);?>">
                  </div>
                </div>

                <div class="ln_solid"></div>
                <div class="item form-group">
                  <div class="col-md-6 col-sm-6 offset-md-3">
                    <button class="btn btn-danger" onclick="history.back()" type="button">Cancel</button>
                    <button class="btn btn-primary" type="reset">Reset</button>
                    <button type="submit" name="category_update" class="btn btn-success">Update</button>
                  </div>
                </div>

              </form>
              <?php
} ?>


            </div>
          </div>
        </div>
      </div>

      <?php


}elseif(isset($_GET['sid'])){

?>

      <?php

$sid=intval($_GET['sid']);

?>

      <body class="nav-md">
        <?php include "includes/nav.php" ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">



            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Update Sub Category</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />


                    <?php 
            $ret=mysqli_query($con,"select * from sub_category where s_id='$sid'");
            while($row=mysqli_fetch_array($ret))
            {

            ?>


                    <?php $cat_id = $row['cat_id']; ?>


                    <form method="post" enctype="multipart/form-data" action="" id="demo-form2" data-parsley-validate
                      class="form-horizontal form-label-left">


                      <input type="hidden" name="s_id" value="<?php echo htmlentities($row['s_id']);?>">



                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Select Category<span
                            class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select name="cat_id" class="form-select" aria-label="Default select example">

                            <option value="<?php echo $row['cat_id'] ?>" selected>
                              <!-- Show category name -->
                              <?php
     $show_category = "select * from category where cat_id = '$cat_id'";
		 $show_category_query = mysqli_query($con,$show_category);
    
		 $show_category_result = mysqli_fetch_array($show_category_query);
		 
		 echo $show_category_result['cat_name'];



?>


                            </option>




                            <?php
                            $d_querry = "select * from category";
                            $querry= mysqli_query($con,$d_querry);
                            $d_nums = mysqli_num_rows($querry);

                            while($dept= mysqli_fetch_array($querry))
                            {
                                ?>
                            <option value="<?php echo $dept['cat_id']; ?>"><?php echo $dept['cat_name']; ?></option>

                            <?php
                            }



                            ?>
                          </select>
                        </div>
                      </div>


                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Sub Category Name<span
                            class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" name="s_name" value="<?php echo htmlentities($row['s_name']);?>"
                            class="form-control ">
                        </div>
                      </div>
                      <!---THumbnail Images--->
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="file"><b
                            style="color:#000000;">Thumbnail Image</b><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="file" class="input" name="image" class="form-control"
                            value="<?php echo  htmlentities($row['image']);?>">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <button class="btn btn-danger" onclick="history.back()" type="button">Cancel</button>
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" name="sub_category_update" class="btn btn-success">Update</button>
                        </div>
                      </div>

                    </form>
                    <?php
} ?>


                  </div>
                </div>
              </div>
            </div>

            <?php


}elseif(isset($_GET['pid'])){
	?>
            <?php $pid = $_GET['pid'] ?>



            <body class="nav-md">
              <?php include "includes/nav.php" ?>
              <!-- /top navigation -->

              <!-- page content -->
              <div class="right_col" role="main">
                <div class="">
                  <div class="page-title">



                  </div>
                  <div class="clearfix"></div>
                  <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2>Product Details</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <br />


                          <?php 
            $ret=mysqli_query($con,"select * from products where id='$pid'");
            while($row=mysqli_fetch_array($ret))
            {

            ?>
                          <form method="post" action="" enctype="multipart/form-data" id="demo-form2"
                            data-parsley-validate class="form-horizontal form-label-left">


                            <input type="hidden" name="id" value="<?php echo htmlentities($row['id']);?>">


                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name<span
                                  class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="name" value="<?php echo htmlentities($row['name']);?>"
                                  class="form-control ">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">key Features<span
                                  class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <textarea class="form-control" rows="8" cols="60"
                                  name="description"><?php echo htmlentities($row['description']);?></textarea>


                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Product
                                Information<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <textarea class="form-control" rows="8" cols="60"
                                  name="information"><?php echo htmlentities($row['information']);?></textarea>


                              </div>
                            </div>

                            <?php $cat_id = $row['category'];?>
                            <?php $s_id = $row['sub_category'];?>


                            <?php
										if(mysqli_num_rows(mysqli_query($con,"select * from category where cat_id='$cat_id'"))){
											$category_select = mysqli_fetch_array(mysqli_query($con,"select * from category where cat_id='$cat_id'"));
											$cat_name = $category_select['cat_name'];
										}else{
											$cat_name = "Select Category";
										}
	
										if(mysqli_num_rows(mysqli_query($con,"select * from sub_category where s_id='$s_id'"))){
											$sub_category_select = mysqli_fetch_array(mysqli_query($con,"select * from sub_category where s_id='$s_id'"));
											$sub_cat_name = $sub_category_select['s_name'];
											
										}else{
											$sub_cat_name = "Select Subcategory";
										}
											
										?>


                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile"><b
                                  style="color:#000000;">Category
                                </b><span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <select name="category" class="form-control">
                                  <option selected value="<?=$cat_id?>"><?=$cat_name?></option>

                                  <?php
            include 'dbcon.php' ;
            $ret=mysqli_query($con,"select * from category");
            while ($res=mysqli_fetch_array($ret)) 
            {
             
            
            ?>
                                  <option value="<?php echo htmlentities($res['cat_id']);?>">
                                    <?php echo htmlentities($res['cat_name']);?></option>
                                  <?php } ?>

                                </select>
                              </div>

                            </div>



                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile"><b
                                  style="color:#000000;">Sub Category
                                </b><span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <select name="sub_category" class="form-control">
                                  <option value="<?=$s_id?>"><?=$sub_cat_name?></option>

                                  <?php
            include 'dbcon.php' ;
            $ret=mysqli_query($con,"select * from sub_category");
            while ($res=mysqli_fetch_array($ret)) 
            {
             
            
            ?>
                                  <option value="<?php echo htmlentities($res['s_id']);?>">
                                    <?php echo htmlentities($res['s_name']);?></option>
                                  <?php } ?>

                                </select>
                              </div>

                            </div>


                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="name"><b
                                  style="color:#000000;">Original Price</b><span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="original_price" value="<?=$row['original_price'];?>"
                                  class="form-control ">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="name"><b
                                  style="color:#000000;">Product Price</b><span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="price" value="<?=$row['price'];?>" class="form-control ">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="name"><b
                                  style="color:#000000;">Shipping Charge</b><span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="shipping_charge" value="<?=$row['shipping_charge'];?>"
                                  class="form-control ">
                              </div>
                            </div>


                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile"><b
                                  style="color:#000000;">Product Status
                                </b><span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <select name="product_status" class="form-control">
                                  <?php
												if($row['product_status'] == 1){
													?>
                                  <option selected value="1">In Stock</option>
                                  <option value="0">Out Of Stock</option>
                                  <?php
												}else{
													?>
                                  <option value="1">In Stock</option>
                                  <option selected value="0">Out Of Stock</option>
                                  <?php
												}
												?>


                                </select>
                              </div>
                            </div>


                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile"><b
                                  style="color:#000000;">Add Trending
                                </b><span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <select name="trending_status" class="form-control">
                                  <?php
												if($row['trending_status'] == 1){
													?>
                                  <option selected value="1">On Trending</option>
                                  <option value="0">Not Trending</option>
                                  <?php
												}else{
													?>
                                  <option value="1">On Trending</option>
                                  <option selected value="0">Not Trending</option>
                                  <?php
												}
												?>


                                </select>
                              </div>
                            </div>



                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Thumbnail<span
                                  class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="file" class="input" name="img" class="form-control"
                                  value="<?php echo  htmlentities($row['image']);?>">
                                <a href="<?php echo  htmlentities($row['image']);?>" target="_blank"><img
                                    src="<?php echo  htmlentities($row['image']);?>" height="100" width="100"
                                    alt=""></a>
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Image 1<span
                                  class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="file" class="input" name="img1"
                                  value="<?php echo  htmlentities($row['image_1']);?>">
                                <a href="<?php echo  htmlentities($row['image_1']);?>" target="_blank"><img
                                    src="<?php echo  htmlentities($row['image_1']);?>" height="100" width="100"
                                    alt=""></a>
                              </div>
                            </div>
                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Image 2<span
                                  class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="file" class="input" name="img2"
                                  value="<?php echo  htmlentities($row['image_2']);?>">
                                <a href="<?php echo  htmlentities($row['image_2']);?>" target="_blank"><img
                                    src="<?php echo  htmlentities($row['image_2']);?>" height="100" width="100"
                                    alt=""></a>
                              </div>
                            </div>
                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Image 3<span
                                  class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="file" class="input" name="img3"
                                  value="<?php echo  htmlentities($row['image_3']);?>">
                                <a href="<?php echo  htmlentities($row['image_3']);?>" target="_blank"><img
                                    src="<?php echo  htmlentities($row['image_3']);?>" height="100" width="100"
                                    alt=""></a>
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Image 4<span
                                  class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="file" class="input" name="img4"
                                  value="<?php echo  htmlentities($row['image_4']);?>">
                                <a href="<?php echo  htmlentities($row['image_4']);?>" target="_blank"><img
                                    src="<?php echo  htmlentities($row['image_4']);?>" height="100" width="100"
                                    alt=""></a>
                              </div>
                            </div>






                            <div class="ln_solid"></div>



                            <div class="item form-group">
                              <div class="col-md-6 col-sm-6 offset-md-3">
                                <button class="btn btn-danger" onclick="history.back()" type="button">Back</button>

                                <input type="submit" name="update_product" value="Update" class="btn btn-primary">

                              </div>
                            </div>
                          </form>
                          <?php
} ?>


                        </div>
                      </div>
                    </div>
                  </div>


                  <?php
}elseif(isset($_GET['coupon-code'])){

	$cupon_code = $_GET['coupon-code'];


	if(isset($_POST['update_coupon'])){
		$coupon_code = $_POST['cupon_code'];
		$cupon_type = $_POST['cupon_type'];
		$cupon_value = $_POST['cupon_value'];
		$cupon_min_value = $_POST['cupon_min_value'];
		$max_ammount = $_POST['max_ammount'];
		$expired = $_POST['expired'];
		$repeat_use = $_POST['repeat_use'];
		$max_users = $_POST['max_users'];
		$status = $_POST['status'];

		$coupon_update = mysqli_query($con,"UPDATE cupon SET cupon_code='$coupon_code',cupon_type='$cupon_type',cupon_value='$cupon_value',cupon_min_value='$cupon_min_value',cupon_status='$status',expired='$expired',repeat_use='$repeat_use',max_ammount='$max_ammount',max_users='$max_users' WHERE cupon_id='$cupon_code'");

		if($coupon_update){
			$_SESSION['message'] = "$coupon_code Update Successfully!";
			?>
                  <script>
                  location.replace("list.php?coupon-code");
                  </script>
                  <?php
		}else{
			?>
                  <script>
                  alert("Failed");
                  </script>
                  <?php
		}
	}




	?>






                  <body class="nav-md">
                    <?php include "includes/nav.php" ?>
                    <!-- /top navigation -->

                    <!-- page content -->
                    <div class="right_col" role="main">
                      <div class="">
                        <div class="page-title">



                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                          <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                              <div class="x_title">
                                <h2>Coupon Details</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                  </li>

                                </ul>
                                <div class="clearfix"></div>
                              </div>
                              <div class="x_content">
                                <br />


                                <?php 
            $ret=mysqli_query($con,"select * from cupon where cupon_id='$cupon_code'");
            while($row=mysqli_fetch_array($ret))
            {

            ?>
                                <form method="post" action="" id="demo-form2" data-parsley-validate
                                  class="form-horizontal form-label-left">


                                  <input type="hidden" name="id" value="<?php echo htmlentities($row['cupon_id']);?>">


                                  <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Coupon
                                      Code<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                      <input name="cupon_code" type="text" value="<?=$row['cupon_code']?>"
                                        required="required" class="form-control ">
                                    </div>
                                  </div>

                                  <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Coupon
                                      Type<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                      <select name="cupon_type" class="form-control" required>

                                        <?php
if($row['cupon_type'] == "Percent"){
	?>
                                        <option selected value="Percent">Percent</option>
                                        <option value="Taka">Taka</option>
                                        <?php
}else{
	?>
                                        <option selected value="Taka">Taka</option>
                                        <option value="Percent">Percent</option>
                                        <?php
}
?>
                                      </select>
                                    </div>
                                  </div>

                                  <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Coupon
                                      Discount<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                      <input type="text" name="cupon_value" value="<?=$row['cupon_value']?>"
                                        class="form-control ">
                                    </div>
                                  </div>

                                  <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Minimum Order
                                      Amount<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                      <input type="text" name="cupon_min_value" value="<?=$row['cupon_min_value']?>"
                                        class="form-control ">
                                    </div>
                                  </div>

                                  <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Maximum
                                      Discount Amount<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                      <input type="text" name="max_ammount" value="<?=$row['max_ammount']?>"
                                        class="form-control ">
                                    </div>
                                  </div>

                                  <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Coupon Expire
                                      Time (In seconds)<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                      <input type="text" name="expired" value="<?=$row['expired']?>"
                                        class="form-control ">
                                    </div>
                                  </div>

                                  <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">No. Of Repeat
                                      Usages<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                      <input type="text" name="repeat_use" value="<?=$row['repeat_use']?>"
                                        class="form-control ">
                                    </div>
                                  </div>

                                  <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">No. Of
                                      Users<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                      <input type="text" name="max_users" value="<?=$row['max_users']?>"
                                        class="form-control ">
                                    </div>
                                  </div>



                                  <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Status<span
                                        class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                      <select name="status" class="form-control" required>

                                        <?php
											if($row['cupon_status'] == 1){
												?>
                                        <option selected value="1">Active</option>
                                        <option value="0">Inactive</option>
                                        <?php
											}else{
												?>
                                        <option value="1">Active</option>
                                        <option selected value="0">Inactive</option>
                                        <?php
											}
											?>
                                      </select>
                                    </div>

                                  </div>



                                  <div class="ln_solid"></div>



                                  <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                      <button class="btn btn-success" type="button"
                                        onclick="history.back()">Back</button>

                                      <input type="submit" name="update_coupon" value="Update" class="btn btn-primary">
                                </form>
                              </div>
                            </div>
                            <?php
} ?>


                          </div>
                        </div>
                      </div>
                    </div>


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







                        <?php include "includes/footer.php"?>

                  </body>

                  </html>

                  <?php include 'includes/js.php'; ?>