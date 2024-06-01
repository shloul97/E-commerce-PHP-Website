$(document).ready(function(){


    $('.trash-icon').click(function(){
        var product_id = $(this).attr('data-id');
        var popupHTML = '';
        action ="get_product";
        $.ajax({
            type: "POST",
            url: "../addToCart.php",
            data: {action : action, id : product_id}, 
            cache: false,
            async : false,
            success: function(d){
                data = jQuery.parseJSON(d);
                popupHTML += `<div class="item-popup">
                <div class="row">
                    <div class="col-md-3">
                        <div class="item-img">
                            <img src="../${data.productImage}" alt="" class="" style="height: 150px; width: 150px;">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="name-product-popup">
                                    ${data.productName}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="item-img">
                            <h3>Are you sure you want to remove this item from shopping cart ? </h3>
                        </div>
                    </div>
                    <div class="col-md-4" style="display: flex">
                        <div class="confirm-btn mr-2">
                            <button class="btn btn-danger" name="popup-btn" id="remove-from-cart" data-id="${data.productId}">Remove</button>
                        </div>
                        <div class="cancel-btn">
                            <button class="btn btn-primary" name="popup-btn" id="cancel-remove">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>`;

            $('#overlay').html(popupHTML);
            $('#overlay').fadeIn(100);
            }
        });

    });

    $(document).on('click','#remove-from-cart',function(){
        var product_id = $(this).attr('data-id');
        
        var action = 'removeCart';
        
        $.ajax({
            type: "POST",
            url: "../addToCart.php",
            data: {action : action, id : product_id}, 
            cache: false,
            async : false,
            success: function(d){
                $('#item-'+product_id).fadeOut(100);
            }
        });
    });

    $(document).on('click','button[name=popup-btn]',function(){
        $('#overlay').fadeOut(100);
    });


    /*$('input[name=update_cart]').click(function(){
		var items = $('input[name=quantity]');
		var values = [];
		var productIds = [];
		
		for(var i = 0;i<items.length ; i++){
			values.push(items[i].value);
			productIds.push(items[i].getAttribute('data-id'));

		}
		//console.log(values);
		console.log(productIds);
		var  jsonValues = JSON.stringify(values);
		var  jsonProducts = JSON.stringify(productIds);
		var action = 'updateCart';
		
		$.ajax({
            type: "POST",
            url: "../addToCart.php",
            data: {action : action, values : jsonValues, productsId : jsonProducts}, 
            cache: false,
            async : false,
            success: function(d){
            	
            	//alert('success');
            }
        });

	});*/

    $('button[data-type=btn-qty]').click(function(){
        var quant = 0;
        if($(this).attr('data-value') == 'minus'){
            quant = parseInt($(this).next().val()) - 1;
        }
        else if($(this).attr('data-value') == 'plus'){
            quant = parseInt($(this).prev().val()) + 1;
        }
        
        var product_id = $(this).attr('data-id');
        var action = "updateCart1";

        $.ajax({
            type: "POST",
            url: "../addToCart.php",
            data: {action : action, values : quant, id : product_id}, 
            cache: false,
            async : false,
            success: function(d){

            }
        });
    });

});


