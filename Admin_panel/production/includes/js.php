 <!--======================== Delete Coupon Modal===============================-->
 
 <div class="modal fade" id="deleteCouponModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="" method="POST"> 
        <div class="modal-body">
          <input type="hidden" name="delete_id" class="delete_coupon_id">
          <b>Select "Confirm" below if you are ready to Delete.</b>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

        
          
            <button type="submit" name="coupon_delete_btn" class="btn btn-primary">Confirm</button>

          </form>


        </div>
      </div>
    </div>
  </div>
   <!--======================== End Delete Modal===============================-->

   
 <!--======================== Delete Products Modal===============================-->
 <div class="modal fade" id="ProductDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="" method="POST"> 
        <div class="modal-body">
          <input type="hidden" name="delete_id" class="delete_product_id">
          <input type="hidden" name="image" class="dltImage">
          <input type="hidden" name="image_1" class="dltImage_1">
          <input type="hidden" name="image_2" class="dltImage_2">
          <input type="hidden" name="image_3" class="dltImage_3">
          <input type="hidden" name="image_4" class="dltImage_4">
          <b>Select "Confirm" below if you are ready to Delete this Product.</b>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

        
          
            <button type="submit" name="product_delete_btn" class="btn btn-primary">Confirm</button>

          </form>


        </div>
      </div>
    </div>
  </div>
   <!--======================== End Products Delete Modal===============================-->

 <!--======================== Delete Category Modal===============================-->
 <div class="modal fade" id="CategoryDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="" method="POST"> 
        <div class="modal-body">
          <input type="hidden" name="delete_id" class="delete_category_id">
          
          <b>Select "Confirm" below if you are ready to Delete this Category.</b>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

        
          
            <button type="submit" name="category_delete_btn" class="btn btn-primary">Confirm</button>

          </form>


        </div>
      </div>
    </div>
  </div>
   <!--======================== End category Delete Modal===============================-->

    <!--======================== Delete sub category Modal===============================-->
 <div class="modal fade" id="SubCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="" method="POST"> 
        <div class="modal-body">
          <input type="hidden" name="delete_id" class="delete_subcategory_id">
          <b>Select "Confirm" below if you are ready to Delete this Subcategory.</b>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

        
          
            <button type="submit" name="subcategory_delete_btn" class="btn btn-primary">Confirm</button>

          </form>


        </div>
      </div>
    </div>
  </div>
   <!--======================== End Products Delete Modal===============================-->

<!-- ==================Banner Delete Modal ========================-->
<div class="modal fade" id="BannerDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready For Delete?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <form action="" method="POST">
     <input type="hidden" name="banner_id" class="banner_id">
     <b>Select "Confirm" below if you are ready to Delete this Home slider image.</b>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="deleteBanner" class="btn btn-danger">Confirm</button>
      </div>
     </form>
    </div>
  </div>
</div>
<!-- ====================Banner Delete Modal ========================================-->








<script>
$(document).ready(function(){
  $('#logoutBtn').click(function(e){
    e.preventDefault();
   $('#logoutModal').modal('show');
  });
});
</script>

<script>
$(document).ready(function(){
  $('#logoutBtn2').click(function(e){
    e.preventDefault();
   $('#logoutModal').modal('show');
  });
});
</script>

<!--------Delete PopUp------->
<!-- Delete coupon -->
<script>
$(document).ready(function(){
  $('#deleteCoupon').click(function(e){
    e.preventDefault();

    var coupon_id = $(this).val();
   $('.delete_coupon_id').val(coupon_id);
   $('#deleteCouponModal').modal('show');
  });
});
</script>
<!-- Delete product -->
<script>
$(document).ready(function(){
  $('#ProductDeleteBtn').click(function(e){
    e.preventDefault();

    var product_id = $(this).val();
    var image = $('.DeleteImage').val();
    var image_1 = $('.DeleteImage_1').val();
    var image_2 = $('.DeleteImage_2').val();
    var image_3 = $('.DeleteImage_3').val();
    var image_4 = $('.DeleteImage_4').val();
   
   $('.dltImage').val(image);
   $('.dltImage_1').val(image_1);
   $('.dltImage_2').val(image_2);
   $('.dltImage_3').val(image_3);
   $('.dltImage_4').val(image_4);
   $('.delete_product_id').val(product_id);
   $('#ProductDeleteModal').modal('show');
  });
});
</script>
<!-- category delete -->
<script>
$(document).ready(function(){
  $('.CategoryDeleteBtn').on('click', function () {
    var category_id = $(this).val();
    $('.delete_category_id').val(category_id);
  });
  });

</script>

<!-- Subcategory Delete -->
<script>
  $(document).ready(function () {
    $('.deleteSubCategoryBtn').on('click', function () {

      var subcategory_id = $(this).val();
      $('.delete_subcategory_id').val(subcategory_id);
      $('#SubCategoryModal').modal('show');      
    });
  });
</script>

<!-- Delete Banner Image -->
<script>

$(document).ready(function () {
  $('.bannerDeleteBtn').on('click', function () {
    var bannerID = $(this).val();

    $('.banner_id').val(bannerID);
  });
});

</script>


<script>
  function updateUserStatus(){
    jQuery.ajax({
      url:'php/update_user_status.php',
      success:function(){

      }
    });
  }

    setInterval(function(){
      updateUserStatus();
    },1000);

    
   
</script>

