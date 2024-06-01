$(document).ready(function(){

    var timer = setInterval(function() {

        var count = parseInt($('#theTarget').html());
        if (count !== 0) {
          $('#theTarget').html(count - 1);
        } else {
            $('#theTarget').html('')
            $('#dotted-target').html('');
            $('#resend-code').removeClass('disabled')
            clearInterval(timer);
        }
      }, 1000);
});