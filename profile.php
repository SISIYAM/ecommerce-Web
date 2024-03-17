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
  <?php include 'includes/head.php'; ?>


</head>

<body>



  <?php include 'includes/nav.php'; ?>

  <!------------- Pop Up model ------------>






  <!--======================== Edit Modal===============================-->
  <!-- Large modal -->

  <div class="modal fade bd-example-modal-lg" id="EditModel" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to edit your personal information?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="includes/code.php" method="post">

            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Username:</label>
              <input type="text" name="username" value="<?php echo $user_username ?>" class="form-control"
                id="recipient-name">
            </div>

            <div class="form-group">
              <label for="recipient-name" class="col-form-label">First Name:</label>
              <input type="text" name="first_name" value="<?php echo $user_firstname ?>" class="form-control"
                id="recipient-name">
            </div>

            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Last Name:</label>
              <input type="text" name="last_name" value="<?php echo $user_lastname ?>" class="form-control"
                id="recipient-name">
            </div>


            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Mobile:</label>
              <input type="number" name="mobile" value="<?php echo $user_mobile ?>" class="form-control"
                id="recipient-name">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Email:</label>
              <input type="text" name="email" value="<?php echo $user_email ?>" class="form-control"
                id="recipient-name">
            </div>

            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Address:</label>
              <input type="text" name="address" value="<?php echo $user_address ?>" class="form-control"
                id="recipient-name">
            </div>

            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Postal Code:</label>
              <input type="text" name="postal_code" value="<?php echo $user_postal_code ?>" class="form-control"
                id="recipient-name">
            </div>

            <label for="recipient-name" class="col-form-label">Select District:</label>
            <div class="form-group" style="padding-bottom:40px;">

              <select name="city" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">

                <?php 
if($user_city > 0){
?>
                <option selected value="<?php echo $user_city ?>"><?php echo $user_city ?></option>
                <?php
}else{
  ?>
                <option selected>Select District</option>
                <?php
}
?>


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

            <br>
            <label for="recipient-name" class="col-form-label">Select District:</label>
            <div class="form-group" style="padding-bottom:40px;">

              <select name="division" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">

                <option selected value="<?php echo $user_division ?>"><?php echo $user_division ?> Division</option>
                <option value='Dhaka'>Dhaka Division</option>
                <option value='Rajshahi'>Rajshahi Division</option>
                <option value='Rangpur'>Rangpur Division</option>
                <option value='Chittagong'>Chittagong Division</option>
                <option value='Barisal'>Barisal Division</option>
                <option value='Khulna'>Khulna Division</option>
                <option value='Sylhet'>Sylhet Division</option>

              </select>

            </div>
            <br>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="profile_saveBtn" class="btn btn-primary">Save Changes</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>


  <!--======================== End Edit Modal===============================-->

  <!--------------- End Pop Up Model---------->


  <!-------Body------------->
  <!-- Product Section Begin -->

  <section class="product spad d-flex ">
    <div class="container">

      <div class="row">
        <?php include 'includes/manage_nav.php'; ?>

        <div class="col-lg-9 col-md-7">
          <div class="product__discount">
            <div class="section-title product__discount__title">
              <strong style="font-size:25px; border-bottom: 4px solid #7fad39">My Profile</strong>
            </div>


            <div>

            </div>


            <!-----Table---==-->


            <div class="px-4 px-lg-0">


              <div class="pb-5">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-12 p-4 bg-white rounded shadow-sm mb-5">

                      <!------Add--->

                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">Name: <?php echo $user_firstname." ".$user_lastname ?></li>
                        <li class="list-group-item">Username: <b class="text-primary"><?php echo $user_username; ?></b>
                        </li>
                        <li class="list-group-item">Mobile: <?php echo $user_mobile; ?></li>
                        <li class="list-group-item">Email: <?php echo $user_email; ?></li>
                        <li class="list-group-item">Address: <?php echo $user_address; ?></li>
                        <li class="list-group-item">Postal Code: <?php echo $user_postal_code; ?></li>
                        <li class="list-group-item">District: <?php echo $user_city; ?></li>
                        <li class="list-group-item">Division: <?php echo $user_division; ?></li>
                        <li class="list-group-item">Joined: <?php echo $user_joined_date." at ".$user_joined_time; ?>
                        </li>

                        <?php
                            if($user_username > 0 && $user_firstname > 0 || $user_lastname > 0 && $user_mobile > 0 && $user_email > 0 && $user_address > 0 && $user_postal_code > 0
                            && $user_city > 0 && $user_division > 0 && $user_joined_date > 0 && $user_joined_time  > 0)
                            {
?>
                        <li class="list-group-item">Account Status: <input type="submit" class="btn btn-success btn-sm"
                            value="Verified"></li>
                        <?php
                            }else{
                                ?>
                        <li class="list-group-item">Account Status: <input type="submit" class="btn btn-danger btn-sm"
                            value="Not Verified"></li>
                        <?php
                            }


                            ?>

                        <li class="list-group-item"><input type="submit" class="editBtn btn btn-primary"
                            value="Edit Profile"></li>
                        <li class="list-group-item"><input type="submit" class="changeBtn btn btn-info"
                            value="Change Password"></li>
                      </ul>

                      <!-- End -->
                    </div>
                  </div>



                </div>
              </div>
            </div>

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


  <!--------Change Password PopUp------->

  <script>
  $(document).ready(function() {
    $('.changeBtn').click(function(e) {
      e.preventDefault();


      $('#PassChangeModel').modal('show');
    });
  });
  </script>


  <!--------Edit PopUp------->

  <script>
  $(document).ready(function() {
    $('.editBtn').click(function(e) {
      e.preventDefault();

      $('#EditModel').modal('show');
    });
  });
  </script>

</body>

</html>