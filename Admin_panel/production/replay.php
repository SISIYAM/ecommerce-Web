<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['username'])){


  header('location:admin_login.php');
  

}
include 'php/auto.php';

$_SESSION['replay_url'] = $_SERVER['REQUEST_URI'];

?>

<?php
include 'dbcon.php';
include 'includes/head.php';

if(isset($_POST['replay_btn'])){
  $r_id = $_POST['r_id'];
  $product_id = $_POST['product_id'];
  $replay_text = $_POST['replay'];
  $replay_text_t = str_replace("'","\'", $replay_text);
  $author = $_SESSION['username'];

  $insert_replay = mysqli_query($con,"INSERT INTO replay_review (`r_id`, `product_id`, `replay`, `author`) VALUES ('$r_id','$product_id','$replay_text_t','$author')");

  if($insert_replay){
    $_SESSION['message'] = "Submit Successfully";

    ?>
<script>
location.replace("<?=$_SESSION['replay_url']?>");
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


if(isset($_POST['update_replay'])){
  $replay_id = $_POST['replay_id'];
  $replay_textt = $_POST['replay'];
  $replay_text = str_replace("'","\'", $replay_textt);
  

  $replay_update = mysqli_query($con,"UPDATE replay_review SET replay='$replay_text' WHERE replay_id ='$replay_id'");

  if($replay_update){
    ?>
<script>
location.replace("<?=$_SESSION['replay_url']?>");
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

<?php


if(isset($_GET['review-id'])){

$review_id = $_GET['review-id'];

?>


<body class="nav-md">
  <?php include "includes/nav.php" ?>
  <!-- /top navigation -->

  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">

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

      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Review</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>

              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />

              <?php

                $review = "SELECT * FROM review WHERE r_id='$review_id'";
                $review_query = mysqli_query($con,$review);
                $review_count = mysqli_num_rows($review_query);
                
                if($review_count){
                  $result = mysqli_fetch_array($review_query);
                  $pid = $result['product_id']; 
                  
                  ?>

              <section style="background-color: #eee;">
                <div class="container my-5 py-5">
                  <div class="row d-flex justify-content-center">
                    <div class="col-md-12 col-lg-10 col-xl-8">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex flex-start align-items-center">
                            <div>
                              <h6 class="fw-bold text-primary mb-1"><?php if($result['username'] > 0){
                  echo $result['username'];}else{echo "Guest";}?></h6>
                              <p class="text-muted small mb-0">
                                <?php
 $created_at=getDateTimeDiff($result['created_at']);
   echo $created_at;
?>...
                              </p>

                              <div class="stars">
                                <?php
        if($result['rating'] == 1){
            ?>
                                <i class="fa fa-star submit_star active" data-rating="1"></i>
                                <i class="fa fa-star submit_star" data-rating="2"></i>
                                <i class="fa fa-star submit_star" data-rating="3"></i>
                                <i class="fa fa-star submit_star" data-rating="4"></i>
                                <i class="fa fa-star submit_star" data-rating="5"></i>
                                <?php
        }elseif($result['rating'] == 2){
            ?>
                                <i class="fa fa-star submit_star active" data-rating="1"></i>
                                <i class="fa fa-star submit_star active" data-rating="2"></i>
                                <i class="fa fa-star submit_star" data-rating="3"></i>
                                <i class="fa fa-star submit_star" data-rating="4"></i>
                                <i class="fa fa-star submit_star" data-rating="5"></i>
                                <?php
        }elseif($result['rating'] == 3){
            ?>
                                <i class="fa fa-star submit_star active" data-rating="1"></i>
                                <i class="fa fa-star submit_star active" data-rating="2"></i>
                                <i class="fa fa-star submit_star active" data-rating="3"></i>
                                <i class="fa fa-star submit_star" data-rating="4"></i>
                                <i class="fa fa-star submit_star" data-rating="5"></i>
                                <?php
        }elseif($result['rating'] == 4){
            ?>
                                <i class="fa fa-star submit_star active" data-rating="1"></i>
                                <i class="fa fa-star submit_star active" data-rating="2"></i>
                                <i class="fa fa-star submit_star active" data-rating="3"></i>
                                <i class="fa fa-star submit_star active" data-rating="4"></i>
                                <i class="fa fa-star submit_star" data-rating="5"></i>
                                <?php
        }elseif($result['rating'] == 5){
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
                            </div>
                          </div>

                          <p class="mt-3 mb-4 pb-2">
                            <?=$result['review']?>
                          </p>

                          <div class="product">
                            <p>
                              <?php
              echo mysqli_fetch_array(mysqli_query($con,"select * from products where id='$pid'"))['name'];
              ?>

                            </p>
                          </div>

                          <div class="review_image">

                            <?php // All img
              if($result['image_1'] > 0 && $result['image_2'] > 0 && $result['image_3'] > 0 && $result['image_4'] > 0 ){
                  ?>
                            <a href="images/Review_images/<?php echo $result['image_1'] ?>" target="_blank">
                              <img src="images/Review_images/<?php echo $result['image_1'] ?>" target="_blank"
                                height=100 width=100 alt=""></a>

                            <a href="images/Review_images/<?php echo $result['image_2'] ?>" target="_blank">
                              <img src="images/Review_images/<?php echo $result['image_2'] ?>" target="_blank"
                                height=100 width=100 alt=""></a>

                            <a href="images/Review_images/<?php echo $result['image_3'] ?>" target="_blank">
                              <img src="images/Review_images/<?php echo $result['image_3'] ?>" target="_blank"
                                height=100 width=100 alt=""></a>

                            <a href="images/Review_images/<?php echo $result['image_4'] ?>" target="_blank">
                              <img src="images/Review_images/<?php echo $result['image_4'] ?>" target="_blank"
                                height=100 width=100 alt=""></a>
                            <?php // 3 img
              }elseif($result['image_1'] > 0 && $result['image_2'] > 0 && $result['image_3'] > 0 && $result['image_4'] < 1 ){
                  ?>
                            <a href="images/Review_images/<?php echo $result['image_1'] ?>" target="_blank">
                              <img src="images/Review_images/<?php echo $result['image_1'] ?>" target="_blank"
                                height=100 width=100 alt=""></a>

                            <a href="images/Review_images/<?php echo $result['image_2'] ?>" target="_blank">
                              <img src="images/Review_images/<?php echo $result['image_2'] ?>" target="_blank"
                                height=100 width=100 alt=""></a>

                            <a href="images/Review_images/<?php echo $result['image_3'] ?>" target="_blank">
                              <img src="images/Review_images/<?php echo $result['image_3'] ?>" target="_blank"
                                height=100 width=100 alt=""></a>
                            <?php

              }elseif($result['image_1'] > 0 && $result['image_2'] > 0 && $result['image_3'] < 1 && $result['image_4'] > 0){
?>
                            <a href="images/Review_images/<?php echo $result['image_1'] ?>" target="_blank">
                              <img src="images/Review_images/<?php echo $result['image_1'] ?>" target="_blank"
                                height=100 width=100 alt=""></a>

                            <a href="images/Review_images/<?php echo $result['image_2'] ?>" target="_blank">
                              <img src="images/Review_images/<?php echo $result['image_2'] ?>" target="_blank"
                                height=100 width=100 alt=""></a>

                            <a href="images/Review_images/<?php echo $result['image_4'] ?>" target="_blank">
                              <img src="images/Review_images/<?php echo $result['image_4'] ?>" target="_blank"
                                height=100 width=100 alt=""></a>

                            <?php


              }elseif($result['image_1'] > 0 && $result['image_2'] < 1 && $result['image_3'] > 0 && $result['image_4'] > 0){
                  ?>
                            <a href="images/Review_images/<?php echo $result['image_1'] ?>" target="_blank">
                              <img src="images/Review_images/<?php echo $result['image_1'] ?>" target="_blank"
                                height=100 width=100 alt=""></a>

                            <a href="images/Review_images/<?php echo $result['image_3'] ?>" target="_blank">
                              <img src="images/Review_images/<?php echo $result['image_3'] ?>" target="_blank"
                                height=100 width=100 alt=""></a>

                            <a href="images/Review_images/<?php echo $result['image_4'] ?>" target="_blank">
                              <img src="images/Review_images/<?php echo $result['image_4'] ?>" target="_blank"
                                height=100 width=100 alt=""></a>

                            <?php
              }elseif($result['image_1'] < 1 && $result['image_2'] > 0 && $result['image_3'] > 0 && $result['image_4'] > 0){
                  ?>
                            <a href="images/Review_images/<?php echo $result['image_2'] ?>" target="_blank">
                              <img src="images/Review_images/<?php echo $result['image_2'] ?>" target="_blank"
                                height=100 width=100 alt=""></a>

                            <a href="images/Review_images/<?php echo $result['image_3'] ?>" target="_blank">
                              <img src="images/Review_images/<?php echo $result['image_3'] ?>" target="_blank"
                                height=100 width=100 alt=""></a>

                            <a href="images/Review_images/<?php echo $result['image_4'] ?>" target="_blank">
                              <img src="images/Review_images/<?php echo $result['image_4'] ?>" target="_blank"
                                height=100 width=100 alt=""></a>

                            <?php // 2 img
              }elseif($result['image_1'] > 0 && $result['image_2'] > 0 && $result['image_3'] < 1 && $result['image_4'] < 1){
                  ?>
                            <a href="images/Review_images/<?php echo $result['image_1'] ?>" target="_blank">
                              <img src="images/Review_images/<?php echo $result['image_1'] ?>" target="_blank"
                                height=100 width=100 alt=""></a>

                            <a href="images/Review_images/<?php echo $result['image_2'] ?>" target="_blank">
                              <img src="images/Review_images/<?php echo $result['image_2'] ?>" target="_blank"
                                height=100 width=100 alt=""></a>
                            <?php

              }elseif($result['image_1'] < 1 && $result['image_2'] < 1 && $result['image_3'] > 0 && $result['image_4'] > 0){
                  ?>
                            <a href="images/Review_images/<?php echo $result['image_3'] ?>" target="_blank">
                              <img src="images/Review_images/<?php echo $result['image_3'] ?>" target="_blank"
                                height=100 width=100 alt=""></a>

                            <a href="images/Review_images/<?php echo $result['image_4'] ?>" target="_blank">
                              <img src="images/Review_images/<?php echo $result['image_4'] ?>" target="_blank"
                                height=100 width=100 alt=""></a>
                            <?php
              }elseif($result['image_1'] > 0 && $result['image_2'] < 1 && $result['image_3'] < 1 && $result['image_4'] > 0){
                  ?>
                            <a href="images/Review_images/<?php echo $result['image_1'] ?>" target="_blank">
                              <img src="images/Review_images/<?php echo $result['image_1'] ?>" target="_blank"
                                height=100 width=100 alt=""></a>

                            <a href="images/Review_images/<?php echo $result['image_4'] ?>" target="_blank">
                              <img src="images/Review_images/<?php echo $result['image_4'] ?>" target="_blank"
                                height=100 width=100 alt=""></a>
                            <?php
              }elseif($result['image_1'] > 0 && $result['image_2'] < 1 && $result['image_3'] > 0 && $result['image_4'] < 1){
                  ?>
                            <a href="images/Review_images/<?php echo $result['image_1'] ?>" target="_blank">
                              <img src="images/Review_images/<?php echo $result['image_1'] ?>" target="_blank"
                                height=100 width=100 alt=""></a>

                            <a href="images/Review_images/<?php echo $result['image_3'] ?>" target="_blank">
                              <img src="images/Review_images/<?php echo $result['image_3'] ?>" target="_blank"
                                height=100 width=100 alt=""></a>
                            <?php
              }elseif($result['image_1'] < 1 && $result['image_2'] > 0 && $result['image_3'] > 0 && $result['image_4'] < 1){
                  ?>
                            <a href="images/Review_images/<?php echo $result['image_3'] ?>" target="_blank">
                              <img src="images/Review_images/<?php echo $result['image_3'] ?>" target="_blank"
                                height=100 width=100 alt=""></a>

                            <a href="images/Review_images/<?php echo $result['image_2'] ?>" target="_blank">
                              <img src="images/Review_images/<?php echo $result['image_2'] ?>" target="_blank"
                                height=100 width=100 alt=""></a>
                            <?php 
              }elseif($result['image_1'] < 1 && $result['image_2'] > 0 && $result['image_3'] < 1 && $result['image_4'] > 0){
                  ?>
                            <a href="images/Review_images/<?php echo $result['image_4'] ?>" target="_blank">
                              <img src="images/Review_images/<?php echo $result['image_4'] ?>" target="_blank"
                                height=100 width=100 alt=""></a>

                            <a href="images/Review_images/<?php echo $result['image_2'] ?>" target="_blank">
                              <img src="images/Review_images/<?php echo $result['image_2'] ?>" target="_blank"
                                height=100 width=100 alt=""></a>
                            <?php //1 img
              }elseif($result['image_1'] > 0 && $result['image_2'] < 1 && $result['image_3'] < 1 && $result['image_4'] < 1){
                  ?>
                            <a href="images/Review_images/<?php echo $result['image_1'] ?>" target="_blank"><img
                                src="images/Review_images/<?php echo $result['image_1'] ?>" target="_blank" height=100
                                width=100 alt=""></a>

                            <?php

              }elseif($result['image_1'] < 1 && $result['image_2'] > 0 && $result['image_3'] < 1 && $result['image_4'] < 1){
                  ?>
                            <a href="images/Review_images/<?php echo $result['image_2'] ?>" target="_blank"><img
                                src="images/Review_images/<?php echo $result['image_2'] ?>" target="_blank" height=100
                                width=100 alt=""></a>

                            <?php

              }elseif($result['image_1'] < 1 && $result['image_2'] < 1 && $result['image_3'] > 0 && $result['image_4'] < 1){
                  ?>
                            <a href="images/Review_images/<?php echo $result['image_3'] ?>" target="_blank"><img
                                src="images/Review_images/<?php echo $result['image_3'] ?>" target="_blank" height=100
                                width=100 alt=""></a>

                            <?php

              }elseif($result['image_1'] < 1 && $result['image_2'] < 1 && $result['image_3'] < 1 && $result['image_4'] > 0){
                  ?>
                            <a href="images/Review_images/<?php echo $result['image_4'] ?>" target="_blank"><img
                                src="images/Review_images/<?php echo $result['image_4'] ?>" target="_blank" height=100
                                width=100 alt=""></a>

                            <?php

              }else{

              }
           ?>
                          </div>
                        </div>
                      </div>

                      <?php
        $replay = "SELECT * FROM replay_review WHERE r_id='$review_id'";
        $replay_query = mysqli_query($con,$replay);

        if(mysqli_num_rows($replay_query)){
          $replay_result = mysqli_fetch_array($replay_query);
          $replay_id = $replay_result['replay_id'];
          ?>
                      <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                        <span style="color:#3A237E"><b><?=$replay_result['author']?></b> replied,</span>
                        <p> <?php
 $created_at=getDateTimeDiff($replay_result['created_at']);
   echo $created_at;
?>...</p>

                        <form action="" method="post">
                          <div class="d-flex flex-start w-100">

                            <div class="form-outline w-100 mt-3">
                              <p syle=""><?=$replay_result['replay']?></p>
                              <input type="hidden" id="replayValue" value="<?=$replay_result['replay']?>">
                              <input type="hidden" name="replay_id" value="<?=$replay_id?>">
                              <textarea style="display:none;" name="replay" class="form-control showTextArea"
                                id="textAreaExample" rows="4" style="background: #fff;"></textarea>
                            </div>
                          </div>
                          <div class="float-end mt-2 pt-1">
                            <button type="button" class="btn btn-primary btn-sm editReplayBtn">Edit Replay</button>
                            <button type="submit" style="display:none;" name="update_replay"
                              class="btn btn-primary btn-sm update_edit_replay">Update Replay</button>
                            <button type="button" onclick="history.back()"
                              class="btn btn-outline-primary btn-sm">Cancel</button>
                          </div>
                      </div>
                      </form>
                      <?php
        }else{
          ?>

                      <form action="" method="post">
                        <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                          <div class="d-flex flex-start w-100">

                            <div class="form-outline w-100">
                              <input type="hidden" name="r_id" value="<?=$review_id?>">
                              <input type="hidden" name="product_id" value="<?=$result['product_id']?>">
                              <textarea name="replay" class="form-control" id="textAreaExample" rows="4"
                                style="background: #fff;"></textarea>
                              <label class="form-label" for="textAreaExample">Replay Message</label>
                            </div>
                          </div>
                          <div class="float-end mt-2 pt-1">
                            <button type="submit" name="replay_btn" class="btn btn-primary btn-sm">Post Replay</button>
                            <button type="button" onclick="history.back()"
                              class="btn btn-outline-primary btn-sm">Cancel</button>
                          </div>
                        </div>
                      </form>
                      <?php
        }

?>



                    </div>
                  </div>
                </div>
            </div>
            </section>

            <?php

                }
            


              ?>





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










        <!-- Footer Section start -->



        <div style="padding:20px;">
          <div class="pull-right">
            <a href="#"><b>Developed By MD SAYMUM ISLAM SIYAM <br>
                Contact: si31siyam@gmail.com</b></a>
          </div>
          <div class="clearfix"></div>
        </div>

        <!-- /footer content -->


        <!-- jQuery -->
        <script src="../vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- FastClick -->
        <script src="../vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="../vendors/nprogress/nprogress.js"></script>
        <!-- Chart.js -->
        <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
        <!-- gauge.js -->
        <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="../vendors/iCheck/icheck.min.js"></script>
        <!-- Skycons -->
        <script src="../vendors/skycons/skycons.js"></script>
        <!-- Flot -->
        <script src="../vendors/Flot/jquery.flot.js"></script>
        <script src="../vendors/Flot/jquery.flot.pie.js"></script>
        <script src="../vendors/Flot/jquery.flot.time.js"></script>
        <script src="../vendors/Flot/jquery.flot.stack.js"></script>
        <script src="../vendors/Flot/jquery.flot.resize.js"></script>
        <!-- Flot plugins -->
        <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
        <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
        <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
        <!-- DateJS -->
        <script src="../vendors/DateJS/build/date.js"></script>
        <!-- JQVMap -->
        <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
        <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
        <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="../vendors/moment/min/moment.min.js"></script>
        <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

        <!-- Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>
      </div>
    </div>


</body>

</html>

<?php include 'includes/js.php'; ?>



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


<script>
$('.editReplayBtn').on('click', function() {

  var textarea_value = $('#replayValue').val();
  $('.showTextArea').val(textarea_value);

  jQuery('.showTextArea').show(300);
  jQuery('.editReplayBtn').hide();
  jQuery('.update_edit_replay').show();

});
</script>