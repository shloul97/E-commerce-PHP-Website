$(document).ready(function(){


$('a[name=order-det]').click(function(){
    var orderId = $(this).attr('data-id');
    var orderDiv = $('#div-'+orderId);
    if($(this).hasClass('down')){
        orderDiv.slideUp(500);
        $(this).removeClass('down');
        
        $(this).html("Show Details");
    }else{
        orderDiv.slideDown(500);
        $(this).addClass('down');
        $(this).html("Show Less");
    }
    
})

});