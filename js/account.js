$(document).ready(function(){

	var loginForm = $('#login-form');
	var regFrorm = $('#register-form');

	loginForm.submit(function(event){
		event.preventDefault();

		var formData = loginForm.serialize();
		//console.log(formData);
		var action = 'login';
		var  jsonValues = JSON.stringify(formData);
		console.log(jsonValues);
		$.ajax({

			type: "POST",
            url: "../account/accountCheck.php",
            data: {action : action, values : jsonValues}, 
            cache: false,
            async : false,
            success : function(d){
            	var obj = jQuery.parseJSON(d);
            	if(obj.status == 0){
            		$("#message-text").css("color","red");
            		$("#message-div").fadeIn(500);
            		$("#message-text").html('E-mail or Password Incorrect pleas try again');
            		setInterval(function () {$("#message-div").fadeOut(500);}, 5000); 
            	}
            	if(obj.status == 1){
            		window.location.href = "../index.php";
            	}
            }

		});
	});

	regFrorm.submit(function(event){
		event.preventDefault();

		var formData = regFrorm.serializeArray();
		var name = formData[0].value;
		var phone = formData[2].value;
		var password = formData[3].value;
		var confirm = formData[4].value;
		var email = formData[1].value;

		//2 phone 3 password

		console.log(formData[0]);
		console.log(formData[1]);
		console.log(formData[2]);
		console.log(formData[3]);
		console.log(formData[4]);
		
		console.log(name+'   '+phone+'   '+password+'   '+confirm+'   '+email+'   ');

		if(password != confirm){
			$("#message-text").css("color","red");
            $("#message-div").fadeIn(600);
            $("#message-text").html("password doesnt\' match");
            setInterval(function () {$("#message-div").fadeOut(500);}, 5000); 
		}
		else{
			var action = 'register';
			var  jsonValues = JSON.stringify(formData);


			$.ajax({

				type: "POST",
	            url: "../account/accountCheck.php",
	            data: {action : action, name : name, password : password, email : email }, 
	            cache: false,
	            success : function(d){
	            	var obj = jQuery.parseJSON(d)
	            	if(obj.status == 0){
	            		$("#message-text").css("color","red");
	            		$("#message-div").fadeIn(500);
	            		$("#message-text").html('This E-mail already exist');
	            		setInterval(function () {$("#message-div").fadeOut(500);}, 5000); 
	            	}
	            	if(obj.status == 1){
	            		$("#message-text").css("color","green");
	            		$("#message-div").fadeIn(500);
	            		$("#message-text").html('Successgfly Register');
	            		setInterval(function () {$("#message-div").fadeOut(5000);}, 5000); 
	            	}
	            }

			});
		}
	});
})