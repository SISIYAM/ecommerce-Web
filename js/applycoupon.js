$(document).ready(function () {
  $("#applyCoupon").on("click", function () {
    var coupon_code = $(".inputCoupon").val();
    jQuery("#order_total_price").hide();
    $.ajax({
      type: "POST",
      url: "includes/coupon.php",
      data: {
        coupon_code: coupon_code,

        reviewBtn: "apply_coupon_code",
      },

      success: function (result) {
        var data = jQuery.parseJSON(result);
        if (data.is_error == "yes") {
          jQuery("#coupon_box").hide();
          jQuery("#original_total_price").show();
          jQuery("#total_box").hide();
          jQuery("#order_total_price").show();
          jQuery("#order_total_price").html(data.result);
        }
        if (data.is_error == "no") {
          jQuery("#coupon_box").show();
          jQuery("#total_box").show();
          jQuery("#original_total_price").hide();
          jQuery("#discount_price").html(data.discount);
          jQuery("#after_total_price").html(data.result);
        }
      },
    });
  });
});
