$(document).ready(function () {
    

    var quantPrime = $('input[name=quantity]');

    quantPrime.each(function(index){
        if($(this).val() == 1){
            $(this).prev().prop('disabled', true);
        }
    });

    
    
    $(document).on('click','.addToCart',function(){
        
        $(this).empty();
        $(this).append('<i class="fa-regular fa-cart-circle-check"></i>&nbsp;Check cart');

        $(this).delay(500).queue(function () {
            $(this).attr("href", "../cart").dequeue();
        });
        
        
    });



    $('.quantity-left-minus').click(function(){
        
        var quant = $(this).next();
        console.log(quant.val());
       
        //quant.val(parseInt(--currentVal))
       
        //console.log(quant.attr('id'));
        if(parseInt(quant.val() -1) == 1){
            $(this).prop('disabled', true);

        }
    });

    $('.quantity-right-plus').click(function(){
        
        var quant = $(this).prev();
        console.log(quant.val());
        
        
        //console.log(quant);
        var minus = $(this).prev().prev();
        if(parseInt(quant.val() +1) > 1){
            minus.prop('disabled', false);
        }
    });

    $('.quantity-left-minus').click(function(){

        var price_id = $(this).attr('data-id');
        var quant= $(this).next();
        //console.log(quant.attr('id'));
        
        if(quant.length > 0 && parseInt(quant.val()) != 0){
            var fPrice = $('#price-'+price_id);
            if(fPrice.length > 0){
                var tPrice = $('#totalPrice-'+price_id);
                var sutotalTd = $('#sutotal-cart');
                var totalTd = $('#total-cart');

                var price = parseFloat(fPrice.html().replace(/\$/,''),10);
                var total = parseFloat(tPrice.html().replace(/\$/,''),10);
                var totalCart = parseFloat(sutotalTd.html().replace(/\$/,''),10);

                var htmlTotalCart = totalCart - price;
            
                var htmlTotal = total - price;
                tPrice.html('$'+parseFloat(htmlTotal).toFixed(2));

                sutotalTd.html('$'+parseFloat(htmlTotalCart).toFixed(2));
                totalTd.html('$'+parseFloat(htmlTotalCart).toFixed(2));

            }
            
        }
    });

    $('.quantity-right-plus').click(function(){
        var price_id = $(this).attr('data-id');

        var quant= $(this).prev();
        if(quant.length > 0){

            var fPrice = $('#price-'+price_id);

            if(fPrice.length > 0){
                var tPrice = $('#totalPrice-'+price_id);
                var sutotalTd = $('#sutotal-cart');
                var totalTd = $('#total-cart');
                



                var price = parseFloat(fPrice.html().replace(/\$/,''),10);
                var total = parseFloat(tPrice.html().replace(/\$/,''),10);
                var totalCart = parseFloat(sutotalTd.html().replace(/\$/,''),10);

                var htmlTotalCart = totalCart + price;
                
                var htmlTotal = total + price;
                tPrice.html('$'+parseFloat(htmlTotal).toFixed(2));

                sutotalTd.html('$'+parseFloat(htmlTotalCart).toFixed(2));
                totalTd.html('$'+parseFloat(htmlTotalCart).toFixed(2));

            }
            

        }
        //console.log(price_id);
        
        
    });
});