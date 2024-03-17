<!-----Update Code start----->

<?php 
include 'dbcon.php';

if(isset($_POST['update'])){
  
$idupdate = $_POST['id'];
$logo = $_POST['logo'];
$logoo = str_replace("'","\'", $logo);
$about = $_POST['about'];
$aboutt = str_replace("'","\'", $about);
$facebook = $_POST['facebook'];
$youtube = $_POST['youtube'];
$telegram = $_POST['telegram'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$youtube_src = $_POST['youtube_src'];



 $q ="UPDATE setting SET logo = '{$logo}',about = '{$aboutt}',facebook = '{$facebook}',telegram = '{$telegram}' 
 ,youtube = '{$youtube}', email = '{$email}', contact = '{$contact}', youtube_src_link = '{$youtube_src}'   WHERE id = {$idupdate} ";
   $querry = mysqli_query($con,$q);


   if($querry){  
      ?>
<script>
alert("Update Successfully");
</script>
<script>
location.replace("setting.php");
</script>
<?php
    
  }else{
    ?>
<script>
alert("Failed ");
</script>
<script>
location.replace("setting.php");
</script>
<?php
  }

}
?>

<!--===================================Update Code End=====================================================------>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Form</title>
  <link rel="stylesheet" href="../../css/update_movie.css">
</head>

<body>



  <?php 
$ret=mysqli_query($con,"select * from setting");
while($row=mysqli_fetch_array($ret))
{

?>


  <div class="wrapper">
    <div class="title">
      <a href="adminhome.php">Customize SiMovieZone</a>
    </div>

    <form action="" method="post" enctype="multipart/form-data">
      <div class="form">
        <input type="hidden" name="id" value="<?php echo htmlentities($row['id']);?>">
        <div class="inputfield">
          <label>Logo*</label>
          <input type="text" class="input" name="logo" value="<?php echo htmlentities($row['logo']);?>">
        </div>

        <div class="inputfield">
          <label>DISCLAIMER*</label>
          <textarea class="textarea" name="about"><?php echo htmlentities($row['about']);?></textarea>
        </div>

        <div class="inputfield">
          <label>Email*</label>
          <input type="text" class="input" name="email" value="<?php echo htmlentities($row['email']);?>">
        </div>

        <div class="inputfield">
          <label>Facebook Link*</label>
          <input type="text" class="input" name="facebook" value="<?php echo  htmlentities($row['facebook']);?>">
        </div>

        <div class="inputfield">
          <label>Youtube Link*</label>
          <input type="text" class="input" name="youtube" value="<?php echo  htmlentities($row['youtube']);?>">
        </div>

        <div class="inputfield">
          <label>Telegram Link*</label>
          <input type="text" class="input" name="telegram" value="<?php echo  htmlentities($row['telegram']);?>">
        </div>


        <div class="inputfield">
          <label>Contact Page Link*</label>
          <input type="text" class="input" name="contact" value="<?php echo  htmlentities($row['contact']);?>">
        </div>


        <div class="inputfield">
          <label>Youtube Iframe Src Link*</label>
          <input type="text" class="input" name="youtube_src"
            value="<?php echo  htmlentities($row['youtube_src_link']);?>">
        </div>


        <div class="inputfield">
          <input type="submit" name="update" value="update" class="btn">
        </div>
    </form>
  </div>

  <div class="inputfield">
    <a href="index.php"><button class="btn_2">Cancel</button></a>
  </div>
  </div>
  <?php
} ?>




</body>

</html>