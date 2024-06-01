$(document).ready(function(){




	$(document).on('click','a[name=gen-cat]',function(){
		var genId = $(this).attr('data-id');
		localStorage.setItem('genVal',genId);
		
	});

	$(document).on('click','.addToCart',function(){
	    
	    var attr = $(this).attr('href');
        if(typeof attr == 'undefined' || attr == false){
            var quantElemnt = $('#qty1');
    		console.log(quantElemnt.val());
    		var product_id = $(this).attr('data-id');
    		var quant = 1;
    		var action = 'addCart';
    
    		if(quantElemnt.length > 0){
    			quant = quantElemnt.val();
    		}
    
    		$.ajax({
                type: "POST",
                url: "../addToCart.php",
                data: {action : action, id : product_id, quant: quant}, 
                cache: false,
                async : false,
                success: function(d){
                        
                }
            });
        }
		
	});

	$(document).on('click','#buy-product',function(){
		var quantElemnt = $('#qty1');
		console.log(quantElemnt.val());
		var product_id = $(this).attr('data-id');
		var quant = 1;
		var action = 'addCart';

		if(quantElemnt.length > 0){
			quant = quantElemnt.val();
		}

		$.ajax({
            type: "POST",
            url: "../addToCart.php",
            data: {action : action, id : product_id, quant: quant}, 
            cache: false,
            async : false,
            success: function(d){
                window.location.href = "../cart";
            }
        });
	});

	$(document).on('click','#username-dropdown',function(){
		$('#user-menu').fadeToggle('hidden');
	});




});