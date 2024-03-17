$(document).ready(function () {

  //increment button
  
$('.increment-btn').click(function (e) { 
  e.preventDefault();
  
  var qty = $(this).closest('.product_data').find('.input-qty').val();
  
  var value = parseInt(qty,10);
  value = isNaN(value) ? 0 : value;
  if(value < 10) 
  {
    value++;
    
    $(this).closest('.product_data').find('.input-qty').val(value);
  }

});

//decrement button
$('.decrement-btn').click(function (e) { 
  e.preventDefault();
  
  var qty = $(this).closest('.product_data').find('.input-qty').val();
  
  var value = parseInt(qty,10);
  value = isNaN(value) ? 0 : value;
  if(value > 1) 
  {
    value--;
    
    $(this).closest('.product_data').find('.input-qty').val(value);
  }

});

//add to cart

$(document).on('click','.addToCartBtn', function () {
  var qty = $(this).closest('.product_data').find('.input-qty').val();
  var prod_id = $(this).closest('.product_data').find('.prodId').val();
  var prod_name = $(this).closest('.product_data').find('.prodName').val();
  var prod_image = $(this).closest('.product_data').find('.prodImage').val();
  var prod_price = $(this).closest('.product_data').find('.prodPrice').val();
  var prod_charge = $(this).closest('.product_data').find('.prodCharge').val();
  
  

  $.ajax({
    type: "POST",
    url: "includes/code.php",
    data: 
         {
          "prod_id":prod_id,
          "prod_name":prod_name,
          "prod_image":prod_image,
          "prod_price":prod_price,
          "prod_charge":prod_charge,
          "prod_qty":qty,
          "scope": "add"
         },

    
    success: function (response) {
      if(response == 0){
       
        $('#popupResponseModel').modal('show');
        jQuery('#addToCartMsg').show();
        

        
      }
      if(response == 1){
        
        
        $('#popupResponseMode2').modal('show');
        jQuery('#failedToCartMsg').show();
        
        
      }

      if(response == 2){

       
        $('#popupResponseMode3').modal('show');
        jQuery('#existCartMsg').show();
        
      }
    }
  });

});

// Update Quantity

$(document).on('click','.updateQty', function () {
  var qty = $(this).closest('.product_data').find('.input-qty').val();
  var prod_id = $(this).closest('.product_data').find('.prodId').val();
  
  

  $.ajax({
    type: "POST",
    url: "includes/code.php",
    data: 
         {
          "prod_id":prod_id,
          "prod_qty":qty,
          "scope": "update"
         },

    
    success: function (response) {
      if(response == 0){
        location.reload();
      }else{
        alert("Failed");
      }
    }
  });

});








});







