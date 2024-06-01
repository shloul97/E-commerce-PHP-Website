
function modifydata(ele){
    if (ele.value.length === 2)  
    ele.value = ele.value + '/'
  else    
    if (ele.value.length === 3 && ele.value.charAt(2) === '/')
      ele.value = ele.value.replace('/', '');
}

function makeid(length) {
    let result = '';
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    const charactersLength = characters.length;
    let counter = 0;
    while (counter < length) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
      counter += 1;
    }
    return result;
}



var interval = null;

var totalVal = 0;

$(document).ready(function(){

    var paymentBtn = $('#payment-btn');

    var i = 0;

    /* ---------- TOTAL CART --------*/
    var totalCart = $('#data-val').val();
    localStorage.setItem('totalVolume', totalCart);

    /* --------- END TOTAL ----------*/
    

    $(document).on(':visible','#overlay',function(){
        $('body').css('overflow', 'hidden');
    })
    
    /*if($('#overlay:visible').length == 1){
       
    }*/

    $('#expirey').keyup(function(){
        var attr = $(this);
        if (attr.val().length === 2){
            attr.val(attr.val() + '/');
            //alert('hello');
        }
            
        
    });
    $('#expirey').keypress(function(event){
        if(event.charCode > 31 && (event.charCode < 48 || event.charCode > 57)){
            event.preventDefault();
        }
    });

    $('#exp-month').keypress(function(event){
        if(event.charCode > 31 && (event.charCode < 48 || event.charCode > 57)){
            event.preventDefault();
        }
    });

    $('#exp-month').keyup(function(event){
        if(event.charCode > 31 && (event.charCode < 48 || event.charCode > 57)){
            event.preventDefault();
        }
        if($(this).val() > 1 && $(this).val().length == 1){
            $(this).val('0' + $(this).val());
        }
        if($(this).val() > 12 && $(this).val().length == 2){
            $(this).val(12);
        }
        if($(this).val().length == 2){
            $('#exp-year').val('');
            $('#exp-year').focus();
        }

    });

    $('#exp-year').keypress(function(event){
        if(event.charCode > 31 && (event.charCode < 48 || event.charCode > 57)){
            event.preventDefault();
        }
    });
    $('#exp-year').keyup(function(event){
        
        if(($(this).val() < 24 || $(this).val() > 34)  && $(this).val().length == 2){
            $(this).val(24);
        }
    });


    $('#ccnum-input').blur( function(){
        //$('.text-muted').css({'border-right' : '1px solid rgb(130, 194, 244)', 'border-top' : '1px solid rgb(130, 194, 244)', 'border-bottom': '1px solid rgb(130, 194, 244)'});
    });

    
    $('#ccnum-input').keypress(function(event){
        
        var input = $(this);

        if(event.charCode > 31 && (event.charCode < 48 || event.charCode > 57)){
            event.preventDefault();
        }
        input.validateCreditCard(function(result) {
            if(input.val().length >= 3){
                if(result.card_type != null){
                    //$('#input-img').src('<img src="../Images/flat/'+result.card_type.name+'.svg" class="card-brand" />');
                    $('#input-img').attr('src' , '../Images/flat/'+result.card_type.name+'.svg');
                    localStorage.setItem('secureLogo', result.card_type.name);
                    $('#input-img').show();
                    //console.log(result.card_type);
                }
                
                if(result.valid == true){
                    if(input.hasClass('cc-valid')){
                        input.removeClass('cc-valid');
                        $('.card-validation').hide();

                        
                    }
                    $('#payment-btn').removeClass('disabled');
                }
                if(input.val().length < 16){
                    if(!$('#payment-btn').hasClass('disabled')){
                        $('#payment-btn').addClass('disabled');
                    }
                }
                if(input.val().length == 16 && result.valid == false){
                    if(!$('#payment-btn').hasClass('disabled')){
                        $('#payment-btn').addClass('disabled');
                    }
                    input.addClass('cc-valid');
                    $('.card-validation').html('<i class="fa-solid fa-xmark"></i> Invalid Card Information');
                    $('.card-validation').css('color', 'red');
                    $('.card-validation').show();
                }
            }
            else if(input.val().length < 3){
                $('#input-img').hide();
            }
            
            /*$('.card-validation').html('Card type: ' + (result.card_type == null ? '-' : result.card_type.name)
                     + '<br>Valid: ' + result.valid
                     + '<br>Length valid: ' + result.length_valid
                     + '<br>Luhn valid: ' + result.luhn_valid);*/
        });

        if(input.val().length >= 4){
            i++;
        }
        

    });

    /*$('#ccnum-input').keyup(function(){
        
        var input = $(this);
        var joy = input.val().replace(/\d{4}(?=.)/g, '$& ');
        input.val(joy);

    });*/
   
   
   //---------------- phone input
    ips = '212.34.13.179';
   //alert(ips);
    const phoneInputField = document.querySelector("#phoneSelector");
    const phoneInput = window.intlTelInput(phoneInputField, {
    initialCountry: "US",
    geoIpLookup: ips,
    separateDialCode: true,
    hiddenInput: "full",
    utilsScript:
        "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });

    var phoneInfo = phoneInput.getSelectedCountryData();
    console.log(phoneInfo.dialCode);

    $('#phoneSelector').keypress(function (event) {
        var input = $(this);
        if(event.charCode > 31 && (event.charCode < 48 || event.charCode > 57)){
            event.preventDefault();
        }
     });

     $('#phoneSelector').keyup(function (event) {
        var input = $(this);
        if(input.val().length < 9 || input.val().length > 11){
            input.addClass("not-valid");
            $('#number-check-span').show(1);
        }
        else{
            input.removeClass("not-valid");
            $('#number-check-span').hide(1);
        }
     });


    

    $('#address-form').submit(function(event){
        event.preventDefault();

    

        var data = $(this).serializeArray();
        var dataPhp = $(this).serialize();

        var addressId = data[0]['value'] + makeid(6);
        localStorage.setItem('addressId', addressId);

        var action = 'addressSave';

        var fullname = $('#fullname');
        var address = $('#address');
        var city = $('#city-state');
        var email = $('#email-show');
        var phone = $('#phone-show');

        const phoneNumber = phoneInput.getNumber();

        localStorage.setItem('phone',phoneNumber);

        console.log(phoneNumber);
        

        //console.log(dataPhp);
        $('#save-btn-text').fadeOut(10,function(){
            $('#spinner').fadeIn(100);
        });
        

        $.ajax({
            type: "POST",
            url: "../checkout/address.php",
            data: {data1: dataPhp, address_id : addressId, action : action},
            success: function(obj)
            {
                //console.log(obj);
                fullname.html('<b>'+data[0]['value'] + ' ' + data[1]['value']+'</b>');
                address.html('<i>'+data[5]['value']+'</i>');
                city.html('<i>'+data[7]['value'] + ' '+ data[8]['value'] +' '+data[9]['value']+'</i>');
                email.html('<i>'+data[2]['value']+'</i>');
                phone.html('<i>'+data[3]['value'])+'</i>';
                interval = setInterval(function(){
                    $('#address-div').slideUp(300, function(){
                        $('#edit-address-btn').show(1);
                        $('#shipping-mthd-div').slideDown(300);
                        $('#payment-div').slideDown(300);
                        clearInterval(interval); 
                    });
                },2500);
            }
        });        
    });

    
    console.log($('#data-val').val());

    $('#edit-address-btn').click(function(event){
            
        /*$('#address-form').submit(function(e){
            e.preventDefault();
        });*/
        
        clearInterval(interval); 
        $('#spinner').fadeOut(10);
        $('#save-btn-text').fadeIn(10);
        $('#address-div').fadeIn(200);


        
       
        return false; 

    });

    

    $("input[name='shipping-mthd']").change(function(){
        totalVal = parseFloat($(this).val()) + parseFloat($('#data-val').val());
        var shippingVal = $(this).val();
        $('#total-cart').html('$' + totalVal);
        $('#shipping-val').html('$'+shippingVal);
        $('#spinner-summary').css("display", "none");
        clearInterval(interval)

        localStorage.setItem('totalVolume', totalVal);

    });

    

    //------------------PAYMENT ------------------------


    $('#payment-form').submit(function(e){
        e.preventDefault();


        var addressId = localStorage.getItem('addressId');
        var action = 'cardSave';
        var formData = $(this).serializeArray();
        var dataPhp = $(this).serialize();
        console.log(formData);

        var crdNum = formData[0].value;
        console.log(crdNum);

        localStorage.setItem('ccNum',crdNum);

        var phoneNum = localStorage.getItem('phone');
        var amount = localStorage.getItem('totalVolume');
        var card = localStorage.getItem('ccNum');
        const d = new Date();
        var month = d.getMonth();
        var day = d.getDate();

        var cardDigit = card.substr(0,2)+'xx xxxx xxxx ' + card.substr(-4);
        var phoneDigit = phoneInfo.dialCode + ') '+ phoneNum.substr(2,2) + 'xxx' + ' xx'+ phoneNum.substr(-2);

        const monthArr = ['JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEP','OCT','NOV','DEC'];
        
        var date = d.getFullYear() + '-'
            + monthArr[month] + '-' +
            (day<10 ? '0' : '') + day + '  ' + d.getUTCHours() + ':'
            + d.getUTCMinutes() + ':' + d.getUTCSeconds();

        console.log(date);
        

        
    });

    


});








