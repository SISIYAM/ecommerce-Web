<?php
session_start();
include 'Admin_panel/production/dbcon.php';


// Set the new timezone
date_default_timezone_set('Asia/Kolkata');
$current_date = date('d-m-Y');

 date_default_timezone_set('Asia/dhaka');
$current_time = date('h:i A');

$yearData= strtotime($current_date);
$date= date('d M Y', $yearData);



//Registration Code
$msg="";
$msg2="";

if(isset($_POST['signup'])){
    $username = mysqli_real_escape_string($con, $_POST['username']) ;
    $email = mysqli_real_escape_string($con, $_POST['email']) ;
    $password = mysqli_real_escape_string($con, $_POST['password']) ;
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']) ;


    $pass = password_hash($password,  PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    //username check
    $username_query = " select * from user where username= '$username'";
    $u_query = mysqli_query($con,$username_query);

    $username_count = mysqli_num_rows($u_query);

    if($username_count > 0){
        $msg="This Username Already Exists, Please Try Another Username";
    }else{

    // email check
    $emailquery = " select * from user where email= '$email'";
    $query = mysqli_query($con,$emailquery);

    $emailcount = mysqli_num_rows($query);

    if($emailcount > 0){
    $msg="This Email Already Exists, Please Try Another Email";
    
    }else{
    if($password == $cpassword){

    $insertquery = "insert into user (username, email,password, cpassword,date,created_time)
    values('$username', '$email','$pass','$cpass','$date','$current_time')";

        $iquery = mysqli_query($con, $insertquery);

    if($iquery){

        
        $msg2= "Congratulations $username! Your Account Created Successfully. Please Log in.";






    }else{

    $msg="Registration failed ";
                
    }

    }else{
    $msg="Password are not matching ";
                        
        }
    }



    }
}

//Registration End


//Log In Code

if(isset($_POST['login'])){
    $email_or_username = $_POST['email_or_username'];
    $password = $_POST['password'];

    $email_or_username_search = " select * from user where email='$email_or_username' or username='$email_or_username'";
    $query = mysqli_query($con,$email_or_username_search);

    $email_or_username_count = mysqli_num_rows($query);

    if($email_or_username_count){
         $email_or_username_pass = mysqli_fetch_assoc($query);

        $db_pass = $email_or_username_pass['password'];

       
        $_SESSION['id'] = $email_or_username_pass['id']; 
        $_SESSION['username'] = $email_or_username_pass['username']; 
        $_SESSION['city'] = $email_or_username_pass['city']; 
        $_SESSION['email'] = $email_or_username_pass['email'];
        $_SESSION['mobile'] = $email_or_username_pass['mobile'];
        $_SESSION['date'] = $email_or_username_pass['date'];
       
        $_SESSION['current_time'] = time();

        $pass_decode = password_verify($password, $db_pass);

        if($pass_decode){

            date_default_timezone_set('Asia/dhaka');
            $last_logout = date('Y-m-d H:i:s');
            $time=time()+10;
            $res=mysqli_query($con,"update user set last_login='$time', last_logout='$last_logout' where id=".$_SESSION['id']);   
              
    
        ?>
<script>
location.replace("home.php");
</script>
<?php
       

         }else{
               $msg="password Incorrect";
         }

     }else{
              $msg= "Invalid Email or Username";
                     
     }

}

//Log In End

?>






<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- ===== Iconscout CSS ===== -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- ===== CSS ===== -->
  <link rel="stylesheet" href="css/reg.css">

  <title>Login & Registration Form</title>
</head>

<body>

  <div class="container">
    <div class="forms">
      <div class="form login">
        <span class="title">Login</span>

        <form action="" method="post">
          <br>
          <?php 
            if($msg > 0){
                ?>
          <div class="alert alert-danger text-center">
            <?php 
                                            echo $msg;
                                            ?>
          </div>
          <?php
                }
                else{
                    if($msg2 > 0){
                        ?>
          <div class="alert alert-success text-center">
            <?php 
                        echo $msg2;
                        ?>
          </div>
          <?php
                    }
                }
             ?>
          <div class="input-field">
            <input type="text" name="email_or_username" placeholder="Enter your email or username" required>
            <i class="uil uil-envelope icon"></i>
          </div>
          <div class="input-field">
            <input type="password" name="password" class="password" placeholder="Enter your password" required>
            <i class="uil uil-lock icon"></i>
            <i class="uil uil-eye-slash showHidePw"></i>
          </div>

          <div class="checkbox-text">
            <div class="checkbox-content">
              <input type="checkbox" id="logCheck">
              <label for="logCheck" class="text">Remember me</label>
            </div>

            <a href="#" class="text">Forgot password?</a>
          </div>

          <div class="input-field button">
            <input type="submit" name="login" value="Login">
          </div>
        </form>

        <div class="login-signup">
          <span class="text">Not a member?
            <a href="#" class="text signup-link">Signup Now</a>
          </span>
        </div>
      </div>


      <!-- Registration Form -->
      <div class="form signup">
        <span class="title">Registration</span>

        <form action="" method="post">

          <br>
          <?php 
            if($msg > 0){
                ?>
          <div class="alert alert-danger text-center">
            <?php 
                                            echo $msg;
                                            ?>
          </div>
          <?php
                }
                else{
                    if($msg2 > 0){
                        ?>
          <div class="alert alert-success text-center">
            <?php 
                        echo $msg2;
                        ?>
          </div>
          <?php
                    }
                }
             ?>





          <div class="input-field">
            <input type="text" name="username" placeholder="Enter your username" required>
            <i class="uil uil-user"></i>
          </div>
          <div class="input-field">
            <input type="text" name="email" placeholder="Enter your email" required>
            <i class="uil uil-envelope icon"></i>
          </div>
          <div class="input-field">
            <input type="password" name="password" class="password" placeholder="Create a password" required>
            <i class="uil uil-lock icon"></i>
          </div>
          <div class="input-field">
            <input type="password" name="cpassword" class="password" placeholder="Confirm a password" required>
            <i class="uil uil-lock icon"></i>
            <i class="uil uil-eye-slash showHidePw"></i>
          </div>

          <div class="checkbox-text">
            <div class="checkbox-content">
              <input type="checkbox" id="termCon">
              <label for="termCon" class="text">I accepted all terms and conditions</label>
            </div>
          </div>

          <div class="input-field button">
            <input type="submit" name="signup" value="Signup">
          </div>
        </form>

        <div class="login-signup">
          <span class="text">Already a member?
            <a href="#" class="text login-link">Login Now</a>
          </span>
        </div>
      </div>
    </div>
  </div>

  <script src="js/script.js"></script>
</body>

</html>