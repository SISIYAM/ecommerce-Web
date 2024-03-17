<?php
include '../Admin_panel/production/dbcon.php';

session_start();


// Set the new timezone
date_default_timezone_set('Asia/Kolkata');
$current_date = date('d-m-Y');

 date_default_timezone_set('Asia/dhaka');
$current_time = date('h:i A');

$yearData= strtotime($current_date);
$date= date('d M Y', $yearData);






// Apply Coupon code

if(isset($_POST['reviewBtn'])){
    
   

    $coupon_code = $_POST['coupon_code'];
    $user_id = $_SESSION['id'];
     
    $jsonArr = array();

    $coupon_code_search = "SELECT * FROM cupon WHERE cupon_code='$coupon_code' AND cupon_status=1";
    $coupon_code_search_query = mysqli_query($con,$coupon_code_search);

    $coupon_code_count = mysqli_num_rows($coupon_code_search_query);


   if(isset($_SESSION['coupon_id'])){
        unset($_SESSION['coupon_id']);
        unset($_SESSION['final_price']);
        unset($_SESSION['discount']);
        unset($_SESSION['coupon_code']);
    }

    if($coupon_code_count){
        $coupon_code_pass = mysqli_fetch_assoc($coupon_code_search_query);

        $coupon_id = $coupon_code_pass['cupon_id'];
        $coupon_value = $coupon_code_pass['cupon_value'];
        $coupon_type = $coupon_code_pass['cupon_type'];
        $coupon_min_value = $coupon_code_pass['cupon_min_value'];
        $coupon_expired = $coupon_code_pass['expired'];
        $coupon_created_at = $coupon_code_pass['cupon_created_at'];
        $repeat_use = $coupon_code_pass['repeat_use'];
        $max_ammount = $coupon_code_pass['max_ammount'];
        $max_users = $coupon_code_pass['max_users'];
       

        
        //Sum Cart Price
        $sum=0;
        $s_charge =0;
        $sum_query = "SELECT * FROM  `cart` WHERE user_id=$user_id";  
        $sum_query_run = mysqli_query($con, $sum_query);
        $sum_row = mysqli_num_rows($sum_query_run);

        while($sum_result= mysqli_fetch_array($sum_query_run))
        {
            ?>
<?php 
           $s_charge = $s_charge + $sum_result['shipping_charge'];
           $sum = $sum + ($sum_result['quantity']*$sum_result['product_price']);
           ?>

<?php
        }
        

        //Check Expired

        if(time() - $coupon_created_at < $coupon_expired){

            //Check Is coupon code use before
            
            
            $coupon_use_search = "SELECT * FROM coupon_used_user WHERE coupon_code='$coupon_code' AND user_id='$user_id'";
            $coupon_use_search_query = mysqli_query($con,$coupon_use_search);
            $coupon_use_search_count = mysqli_num_rows($coupon_use_search_query);
            if($coupon_use_search_count >= $repeat_use){

                $jsonArr = array('is_error'=>'yes','result'=>'Coupon code already redeemed');

            }else{
                


                       /// Check Minimum value
            if($coupon_min_value <= $sum){
                

                //Check Maximum Users

                if($max_users > 0){
                   
                    $users_count_use = mysqli_num_rows(mysqli_query($con,"SELECT * FROM coupon_used_user WHERE coupon_code='$coupon_code'"));

                    if($users_count_use <= $max_users ){
                        if($coupon_type == 'Percent'){
                                if($max_ammount > 0){
                                    $percent_discount = (($coupon_value*$sum)/100);
            
                                    // Check Coupon Maximum Value
                                    if($percent_discount > $max_ammount){
                                        $percent_discount = $max_ammount;
                                        $final_price = ($sum - $percent_discount)+$s_charge;
                                        $after_final_price = $sum - ($percent_discount);
                                    }else{
                                    $percent_discount = (($coupon_value*$sum)/100);
                                    $final_price = ($sum - $percent_discount)+$s_charge;
                                    $after_final_price = $sum - ($percent_discount);
                                    }
                                }else{
                                    $percent_discount = (($coupon_value*$sum)/100);
                                    $final_price = ($sum - $percent_discount)+$s_charge;
                                    $after_final_price = $sum - ($percent_discount);
                                }

                         
                            
                            
                            
                        
                        }else{
                            $final_price = ($sum - $coupon_value)+$s_charge;
                            $after_final_price = ($sum - $coupon_value);
                        
                        }
                        $discount = $sum-$after_final_price;
        
                        $_SESSION['coupon_id'] = $coupon_id;
                        $_SESSION['final_price'] = $final_price;
                        $_SESSION['discount'] = $discount;
                        $_SESSION['coupon_code'] = $coupon_code;
                      
        
        
                        $jsonArr = array('is_error'=>'no','result'=> $final_price,'discount'=>$discount);

                    }else{

                        $jsonArr = array('is_error'=>'yes','result'=>'Maximum users exceeded!');

                    }

                }else{
     
                    if($coupon_type == 'Percent'){

                        if($max_ammount > 0){
                            $percent_discount = (($coupon_value*$sum)/100);
    
                            // Check Coupon Maximum Value
                            if($percent_discount > $max_ammount){
                                $percent_discount = $max_ammount;
                                $final_price = ($sum - $percent_discount)+$s_charge;
                                $after_final_price = $sum - ($percent_discount);
                            }else{
                            $percent_discount = (($coupon_value*$sum)/100);
                            $final_price = ($sum - $percent_discount)+$s_charge;
                            $after_final_price = $sum - ($percent_discount);
                            }
                        }else{
                            $percent_discount = (($coupon_value*$sum)/100);
                            $final_price = ($sum - $percent_discount)+$s_charge;
                            $after_final_price = $sum - ($percent_discount);
                        }
                        
                        
                        
                    
                    }else{
                        $final_price = ($sum - $coupon_value)+$s_charge;
                        $after_final_price = ($sum - $coupon_value);
                    
                    }
                    $discount = $sum-$after_final_price;
    
                    $_SESSION['coupon_id'] = $coupon_id;
                    $_SESSION['final_price'] = $final_price;
                    $_SESSION['discount'] = $discount;
                    $_SESSION['coupon_code'] = $coupon_code;
                  
    
    
                    $jsonArr = array('is_error'=>'no','result'=> $final_price,'discount'=>$discount);
                }                
           
            }else{

                $jsonArr = array('is_error'=>'yes','result'=>'Minimum Shopping '.$coupon_min_value.' ৳ Required');

                
            }
            }

                        
            
        }else{
            $jsonArr = array('is_error'=>'yes','result'=>'Coupon Code Expired');
        }






        
       
    }else{
        $jsonArr = array('is_error'=>'yes','result'=>'Coupon Code Not Found!');
    }
    echo json_encode($jsonArr);
}







?>