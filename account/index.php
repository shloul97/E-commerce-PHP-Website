<?php
include '../userdata.php';
include '../header.php';

if(isset($_SESSION['login'])){
    header('Location: ../index.php');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content=" Online Store, Buy, E-Commerce" name="keywords">
    <meta content=" Online Store, Buy, E-Commerce" name="description">

    <title>Account | Store Name</title>

    <!-- Favicon -->
    <link href="../Images/favicon.ico" rel="icon">


    <!-- Main Assets -->

    <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <link href="../css/style.css" rel="stylesheet" />

    <script src="../js/product.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/navMenu.js"></script>
    <script src="../js/backToTop.js"></script>
	<script src="../js/account.js"></script>

    <!-- End-Main Assets -->

</head>

<body>


    <!-- Header Template !! -->

    <div class="navigation-wrap bg-light start-header start-style">

        <!-- Top Header -->
        <?php echo $top_header; ?>
        <!-- End-Top Header -->

        <!-- Nav Menu -->
        <div class="container main-menu">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-md navbar-light">
                     <?php echo $header; ?>
                       

                    </nav>
                </div>
            </div>
        </div>
        <!-- End-Nav Menu -->


    </div>

    <!-- Back 2 Top -->
    <a class="back2top" href="#"><i class="fa-regular fa-angles-up"></i></a>


    <!-- End Header Template !! -->

<!-- Header Template !! -->

<style>
.panel-login {
	border-color: #ccc;
	-webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	-moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
}
.panel-login>.panel-heading {
	color: var(--red);
	background-color: #fff;
	border-color: #fff;
	text-align:center;
}
.panel-login>.panel-heading a{
	text-decoration: none;
	color: var(--gray);
	font-weight: bold;
	font-size: 15px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login>.panel-heading a.active{
	color: var(--red);
	font-size: 18px;
}
.panel-login>.panel-heading hr{
	margin-top: 10px;
	margin-bottom: 0px;
	clear: both;
	border: 0;
	height: 1px;
	background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
	background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}
.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
	height: 45px;
	border: 1px solid #ddd;
	font-size: 16px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login input:hover,
.panel-login input:focus {
	outline:none;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	border-color: #ccc;
}

.forgot-password {
	text-decoration: underline;
	color: #888;
}
.forgot-password:hover,
.forgot-password:focus {
	text-decoration: underline;
	color: #666;
}

.btn-register,
.btn-login {
	background-color: var(--red);
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: var(--red);
}
.btn-register:hover,
.btn-register:focus,
.btn-login:hover,
.btn-login:focus {
	color: #fff;
	background-color: var(--gray);
	border-color: var(--gray);
}
</style>
<script>
    $(function() {

$('#login-form-link').click(function(e) {
    $("#login-form").delay(100).fadeIn(100);
     $("#register-form").fadeOut(100);
    $('#register-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
});
$('#register-form-link').click(function(e) {
    $("#register-form").delay(100).fadeIn(100);
     $("#login-form").fadeOut(100);
    $('#login-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
});

});
</script>


<br />
<br />
<br />
<br />
<div class="container body-content">

<div class="container">
	<div class="row d-flex justify-content-center"> 	
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row d-flex justify-content-center">
							<div class="col-xs-6">
								<a href="#" class="active" style="margin-right: 20px;" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" style="margin-right: 20px;" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
						<div class="message-div-class" id="message-div">
							<p id="message-text"></p>
						</div>
							<div class="col-lg-12 d-flex justify-content-center">
							
							
							<!-- Login FORM -->
								<form id="login-form" action="#" method="post" class="col-lg-6 col-lg-offset-6" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="E-mail" value="" required>
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col text-center">
												<input type="submit" style="width: 50%;" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12 d-flex justify-content-center">
												<div class="text-center">
													<a href="" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
								
								<!-- Register FORM -->
								<form id="register-form" action="#" method="post" class="col-lg-6 col-lg-offset-6" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="username" id="r-username" tabindex="1" class="form-control" placeholder="Full Name" value="" required>
									</div>
									<div class="form-group">
										<input type="email" name="email" id="r-email" tabindex="1" class="form-control" placeholder="Email Address" value="" required>
									</div>
									<div class="form-group">
										<input type="text" name="phone" id="r-phone" tabindex="1" class="form-control" placeholder="1 888 888 108" value="" required>
									</div>
									<div class="form-group">
										<input type="password" name="password" id="r-password" tabindex="2" class="form-control" placeholder="Password" required>
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" required>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col text-center">
												<input type="submit" style="width: 50%;" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>






    <!-- Footer Template !! -->
    

    <!-- End Footer Template !! -->

    <footer>
		<?php echo $footer; ?>

    </footer>
</body>


</html>