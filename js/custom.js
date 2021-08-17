(function($){
	"use strict";

	/**
     * ----------------------------------------------
     * Name of section
     * ----------------------------------------------
     */
   
    // $('a.button.product_type_simple').text('view');
    $("body").on('click', 'a.button.product_type_simple.add_to_cart_button.ajax_add_to_cart', function(event) {
        event.preventDefault();
        
        var theme_directory = wnm_custom.theme_url+'/minicart/minidata.php';
        var mini = "cartdata";
        var content = '';
        $.ajax({
         url:theme_directory,
         data: {mini:mini},
         type: 'POST',
         cache: false,
         success: function(data){
           $("#mini_cart_content").html(data);
         }
        });
        setTimeout(function() {
         $('a.added_to_cart.wc-forward').fadeOut('fast');}, 5000); // <-- time in mseconds
    });

    $("body").on("change","#cust_type",function(){
        var custType=$(this).val();
        if(custType=="whole-sale"){
            $(".company-name-p").removeClass('hidden');
        }else{
            $(".company-name-p").addClass('hidden');
        }
    });
    $("body").on("click",".close-nav",function(){
        $(".navbar-toggle").trigger("click");
        

    });

    $('body').on('click', '.minus', function (e) {
        var $this=$(this);
        var $quantityDiv=$this.closest(".quantity");
        var $inputBox=$quantityDiv.find("input.qty");
        var val = parseInt($inputBox.val());
        var step = $inputBox.attr('step');
        step = 'undefined' !== typeof(step) ? parseInt(step) : 1;

        if (val > 0) {
            $inputBox.val(val - step).change();
        }
        $("[name='update_cart']").prop("disabled", false); 
        $("[name='update_cart']").trigger("click");
    });
    $('body').on('click', '.plus', function (e) {
        var $this=$(this);
        var $quantityDiv=$this.closest(".quantity");
        var $inputBox=$quantityDiv.find("input.qty");
        var val = parseInt($inputBox.val());
        var step = $inputBox.attr('step');
        step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
        $inputBox.val(val + step).change();
        $("[name='update_cart']").prop("disabled", false); 
        $("[name='update_cart']").trigger("click");
    });


    $('#accordion').on('shown.bs.collapse', function (e) {
      // do something…
      var $id = "#"+$(e.target).attr('id');
      $('html, body').animate({
              scrollTop: $($id).offset().top-80
          }, 1000);
    });
    $(".btn-next-shipping").on("click",function(e){
        $("#headingTwo h4 a").trigger('click');
    });

    
    

})(jQuery); 

