<div class="shadow-sm p-3 mb-5 bg-white rounded">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <strong style="font-size:20px;">Manage My Account</strong>
                            
                            <ul style="padding-top:20px;">
                                <li><a href="profile.php"><button class="btn btn-light btn-sm">My Profile</button></a></li>
                                
                               
                                <li><a ><button  type="submit" class="changeBtn btn btn-light btn-sm">Change Password</button></a></li>
                           
                               
                            </ul>

                            <strong style="font-size:20px;">Manage My Orders</strong>
                            <ul style="padding-top:20px;">
                            <li><a href="orders.php?my-orders"><button class="btn btn-light btn-sm">My Orders</button></a></li>
                            <li><a href=""><button class="btn btn-light btn-sm">My Returns</button></a></li>
                            <li><a href="orders.php?my-cancellation"><button class="btn btn-light btn-sm">My Cancellations</button></a></li>
                            <li><a href="orders.php?my-reviews"><button class="btn btn-light btn-sm">My Reviews</button></a></li>
                          
                            
                            </ul>

                           
                           
                        </div>
                        
                      
                        
                    </div>
                    
                </div>




                

<!--======================== Password Change Modal===============================-->
<div class="modal fade" id="PassChangeModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Change Password?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="includes/code.php" method="POST"> 
        <div class="modal-body">
          
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Old Password:</label>
            <input type="text" name="old_password" class="form-control" placeholder="Enter Old Password" id="recipient-name" required>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">New Password:</label>
            <input type="text" name="new_password" class="form-control" placeholder="Enter New Password" id="recipient-name" required>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Confirm Password:</label>
            <input type="text" name="c_password" class="form-control" placeholder="Confirm Password" id="recipient-name" required>
          </div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

        
          
            <button type="submit" name="passChangeBtn" class="btn btn-primary">Change</button>

          </form>


        </div>
      </div>
    </div>
  </div>
   <!--======================== Password Change Modal===============================-->