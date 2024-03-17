<?php include 'includes/header.php'; ?>

<?php
$user_query = "select * from user where id='$user_id'";
$user_query_run = mysqli_query($con,$user_query);
$user_nums = mysqli_num_rows($user_query_run);

while($user_query_result= mysqli_fetch_array($user_query_run))
{
    ?>

    <?php $user_username = $user_query_result['username']; ?>
    <?php $user_firstname = $user_query_result['first_name']; ?>
    <?php $user_lastname = $user_query_result['last_name']; ?>
    <?php $user_email = $user_query_result['email']; ?>
    <?php $user_mobile = $user_query_result['mobile']; ?>
    <?php $user_address = $user_query_result['address']; ?>
    <?php $user_city = $user_query_result['city']; ?>
    <?php $user_division = $user_query_result['division']; ?>
    <?php $user_postal_code = $user_query_result['postal_code']; ?>
    <?php $user_joined_date = $user_query_result['date']; ?>
    <?php $user_joined_time = $user_query_result['created_time']; ?>

    <?php
}


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
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
 
   <style>
  
  .rating-box {
  position: relative;
  background: #fff;
  padding: 25px 50px 35px;
  
}
.rating-box header {
  font-size: 18px;
  color: #dadada;
  font-weight: 500;
  margin-bottom: 20px;
  text-align: center;
}
.rating-box .stars {
  display: flex;
  align-items: center;
  gap: 25px;
}
.stars i {
  color: #e6e6e6;
  font-size: 25px;
  cursor: pointer;
  transition: color 0.2s ease;
}
.stars i.active {
  color: #ff9c1a;
}
   </style>

<style>

/* Google font import link */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

.input-box{
  position: relative;
  height: 200px;
  width: 100%;
  background: #fff;
  padding: 0 30px 30px 0;

}
.input-box textarea{
  height: 100%;
  width: 100%;
  outline: none;
  border: 2px solid rgba(0,0,0,0.2);
  border-radius: 6px;
  resize: none;
  padding: 25px 15px;
  font-size: 15px;
  font-weight: 500;
  caret-color: #007bff;
}
.input-box textarea:focus,
.input-box textarea:valid{
  border-color: #007bff;
}
.input-box.error textarea{
  border-color: red;
}
.input-box textarea::placeholder{
  font-size: 15px;
  font-weight: 500;
}
.input-box .title{
  position: absolute;
  top: 38px;
  left: 45px;
  color: #007bff;
}
.input-box.error .title{
  color: red;
}
.input-box .characters{
  position: absolute;
  bottom: 35px;
  right: 45px;
  display: flex;
  align-items: center;
  color: #007bff;
  display: none;
}
.input-box.active .characters{
  display: block;
}
.input-box.error .characters{
  color: red;
}

</style>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
</head>

<body>
  


<?php include 'includes/nav.php'; ?>



     

<!-------Body------------->
 <!-- Product Section Begin -->
 <section class="product spad d-flex ">
        <div class="container">
            <div class="row">
                <?php include 'includes/manage_nav.php'; ?>

                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <strong style="font-size:25px; border-bottom: 4px solid #7fad39">Manage Address</strong>
                        </div>


                        <div>
                        
                        </div>


    
    <article class="card" style="width:100%;">
            

                        <div style="margin:10px;">
      <form style="padding:30px;" action="includes/code.php" method="post"  enctype="multipart/form-data">

      
          <label for="recipient-name" class="col-form-label">Select District:</label>
          <div class="form-group">
          
          <select  name="division" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                             
                                 <option selected value="<?php echo $user_city ?>"><?php echo $user_city ?></option>
                                 <option value="Bagerhat">Bagerhat</option>
<option value="Bandarban">Bandarban</option>
<option value="Barguna">Barguna</option>
<option value="Barishal">Barishal</option>
<option value="Bhola">Bhola</option>
<option value="Bogura">Bogura</option>
<option value="Brahmanbaria">Brahmanbaria</option>
<option value="Chandpur">Chandpur</option>
<option value="Chattogram">Chattogram</option>
<option value="Chuadanga">Chuadanga</option>
<option value="Comilla">Comilla</option>
<option value="Cox's Bazar">Cox's Bazar</option>
<option value="Dhaka">Dhaka</option>
<option value="Dinajpur">Dinajpur</option>
<option value="Faridpur">Faridpur</option>
<option value="Feni">Feni</option>
<option value="Gaibandha">Gaibandha</option>
<option value="Gazipur">Gazipur</option>
<option value="Gopalganj">Gopalganj</option>
<option value="Habiganj">Habiganj</option>
<option value="Jamalpur">Jamalpur</option>
<option value="Jashore">Jashore (Jessore)</option>
<option value="Jhalokathi">Jhalokathi</option>
<option value="Jhenaidah">Jhenaidah</option>
<option value="Joypurhat">Joypurhat</option>
<option value="Khagrachari">Khagrachari</option>
<option value="Khulna">Khulna</option>
<option value="Kishoreganj">Kishoreganj</option>
<option value="Kushtia">Kushtia</option>
<option value="Lakshmipur">Lakshmipur</option>
<option value="Lalmonirhat">Lalmonirhat</option>
<option value="Madaripur">Madaripur</option>
<option value="Magura">Magura</option>
<option value="Manikganj">Manikganj</option>
<option value="Meherpur">Meherpur</option>
<option value="Moulvibazar">Moulvibazar</option>
<option value="Munshiganj">Munshiganj</option>
<option value="Mymensingh">Mymensingh</option>
<option value="Naogaon">Naogaon</option>
<option value="Narail">Narail</option>
<option value="Narayanganj">Narayanganj</option>
<option value="Narsingdi">Narsingdi</option>
<option value="Natore">Natore</option>
<option value="Netrokona">Netrokona</option>
<option value="Nilphamari">Nilphamari</option>
<option value="Noakhali">Noakhali</option>
<option value="Pabna">Pabna</option>
<option value="Panchagarh">Panchagarh</option>
<option value="Patuakhali">Patuakhali</option>
<option value="Pirojpur">Pirojpur</option>
<option value="Rajbari">Rajbari</option>
<option value="Rajshahi">Rajshahi</option>
<option value="Rangamati">Rangamati</option>
<option value="Rangpur">Rangpur</option>
<option value="Satkhira">Satkhira</option>
<option value="Shariatpur">Shariatpur</option>
<option value="Sherpur">Sherpur</option>
<option value="Sirajganj">Sirajganj</option>
<option value="Sunamganj">Sunamganj</option>
<option value="Sylhet">Sylhet</option>
<option value="Tangail">Tangail</option>
<option value="Thakurgaon">Thakurgaon</option>
</select>

                           
                                </select>

        </div>

        <br><br>

        <label for="recipient-name" class="col-form-label">Select District:</label>
  <div class="form-group">
          
          <select name="division"  class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                             
                                 <option selected value="<?php echo $user_division ?>"><?php echo $user_division ?> Division</option>
                                  <option value='Dhaka'>Dhaka Division</option>
                                  <option value='Rajshahi'>Rajshahi Division</option>
                                  <option value='Rangpur'>Rangpur Division</option>
                                  <option value='Chittagong'>Chittagong Division</option>
                                  <option value='Barisal'>Barisal Division</option>
                                  <option value='Khulna'>Khulna Division</option>
                                  <option value='Sylhet'>Sylhet Division</option>
                           
                                </select>

        </div> <br> <br>
        
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Address:</label>
            <input type="text" name="address" value="<?php echo $user_address ?>" class="form-control" id="recipient-name">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Postal Code:</label>
            <input type="text" name="postal_code" value="<?php echo $user_postal_code ?>" class="form-control" id="recipient-name">
          </div>



  <button type="submit" name="add_review" class="btn" style="color:#fff;background-color: #f85606;">Submit Review</button>

</form> 
                        </div>
            </article> 




              
           




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
$(document).ready(function(){
  $('#cartBtn').click(function(e){
    e.preventDefault();
   $('#cartmodel').modal('show');
  });
});


$(document).ready(function(){
  $('#wishBtn').click(function(e){
    e.preventDefault();
   $('#wishlistmodel').modal('show');
  });
});
</script>


<!--------Change Password PopUp------->

<script>
$(document).ready(function(){
  $('.changeBtn').click(function(e){
    e.preventDefault();


   $('#PassChangeModel').modal('show');
  });
});
</script>

<!--------Username Checkbox------->

<script>

//Username Checkbox

$('#checkUsername').change(function () {
  var username = $(this).val();
    if ($(this).is(':checked')) {
        $('#usernameOutput').val(username);
    };
    if ($(this).is(':checked') == false) {
        $('#usernameOutput').val('');
    };
});

$('.selectpicker').selectpicker({
   size: '10'
});
</script>






</body>

</html> 