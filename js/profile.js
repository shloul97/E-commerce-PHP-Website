$(document).ready(function(){


    
    var infoDiv = localStorage.getItem('infoDiv');
    var editAddrBtn = null;
    if(infoDiv == null || infoDiv == ''){
        
        localStorage.setItem('infoDiv','details-div');
        infoDiv = 'details-div';
    }
    console.log(infoDiv);
    $('#'+infoDiv).show(100);

    $('div[name=profile-selector]').each(function(){
        if($(this).attr('data-id') == infoDiv){
            $(this).addClass('active-1');
        }
        else{
            $(this).removeClass('active-1');
        }
    });

    $('div[name=profile-selector]').click(function(){

        
        
        
        $('div[name=profile-selector]').each(function(){
            $(this).removeClass('active-1');
            $('div[name=data-div]').hide();


        });
        $(this).addClass('active-1');
        var divId = $(this).attr('data-id');
        localStorage.setItem('infoDiv',divId);
        $('#'+divId).show(100);
        
    });

    $('#add-address').click(function(){
        $('#spinner').show();
        $('#overlay').fadeIn(200);
        
        var timer = setInterval(function(){
            $('#spinner').hide();
            $('.address-row').fadeIn(100);
            clearInterval(timer);
        },300);
        
    });

    $(document).on('click',
    '#edit-address-form button[type=submit]',
    function(e){
        editAddrBtn = $(this).attr('id');
        if(editAddrBtn == 'cancel-change'){
            $('.address-row').fadeOut(200);
            $('#overlay').fadeOut(200);
        }

    });


    //ADD NEW ADDRESS 
    $(document).on('submit','#edit-address-form',function(event){
        event.preventDefault();


        var action = 'addNew';
        console.log(subId);
        if(editAddrBtn  == 'cancel-change'){
            
        }
        else{
            var dataPhp = $(this).serialize();
            $('#save-btn-text').fadeOut(10,function(){
                $('#spinner').fadeIn(100);
            });

            $.ajax({
                type: "POST",
                url: "../profile/address.php",
                data: {data1: dataPhp, action : action},
                success: function(obj)
                {
                    //console.log(obj);
                   
                    var timer = setInterval(function(){
                        
                        $('.address-row').fadeOut(200);
                        $('#overlay').fadeOut(200);
                        window.location.reload(1);
                        clearInterval(timer);
                        
                    },2500);
                }
            });        
        }
    });

    $('button[name=remove-address]').click(function(){
        var item_id = $(this).attr('data-id');
        var action = 'removeAddr';

        var removeItem = confirm('Did you want to remove this address ?');
        if(removeItem){
            $.ajax({
                type: "POST",
                url: "../profile/address.php",
                data: {item_id: item_id, action : action},
                success: function(obj)
                {
                    window.location.reload(1);
                }
            }); 
        }
    });


    //---------- change password

    $('#old-pass').keyup(function(){
        $(this).css({'outline': 'none'});
    });

    $(document).on('submit','#change-pass',function(event){
        event.preventDefault();

        $('#change-pass-btn').prop('disabled', true);

        var passAlert = $('#password-alert-text');
        var data = $(this).serializeArray();
        


        var dataPhp = $(this).serialize();
        
        var old_pass = data[0]['value'];
        var new_pass = data[1]['value'];

        if(data[1]['value'] == data[2]['value']){
           

            $.ajax({
                type: "POST",
                url: "../profile/changePass.php",
                data: {old_pass: old_pass, new_pass : new_pass},
                success: function(obj){
                    $('#change-pass-btn').prop('disabled', false);
                    var responseData = jQuery.parseJSON(obj);
                    if(responseData.response == 0){  
                        passAlert.html(' Password is inccorect')
                        passAlert.css({'color' : 'red'});
                        passAlert.fadeIn(100);
                        $('#old-pass').css({'outline': '1px solid red'});
                    }
                    else{
                        $('#change-pass')[0].reset();
                        var timer = setInterval(function(){
                            clearInterval(timer);
                        },1000);
                        passAlert.html('Password Successfuly Changed')
                        passAlert.css({'color' : 'Green'});
                        passAlert.fadeIn(100);
                        $('#old-pass').css({'outline': 'none'});
                    }
                }
            });



        }
        else{
            $('#change-pass-btn').prop('disabled', false);
            passAlert.html('Password doesn\'t match')
            passAlert.css({'color' : 'red'});
            passAlert.fadeIn(100);
        }
        

        /*  */     
        
    });





    

});