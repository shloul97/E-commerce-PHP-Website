<?php
include '../userdata.php';
include '../header.php';

if(!isset($_SESSION['user_id'])){
    header('Location: ../home');
}

?>
<!DOCTYPE html>
<html>
<head>

    
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Store Name, Online Store, Buy, E-Commerce" name="keywords">
    <meta content="Store Name, Online Store, Buy, E-Commerce" name="description">

    <title>Store Name</title>

    <!-- Favicon -->
    <link href="../images/favicon.ico" rel="icon">


    <!-- Main Assets -->
    
    <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js" integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>-->
    
    <link href="../css/style.css" rel="stylesheet" />
    <link href="../css/checkout.css" rel="stylesheet" />
    <link href="../css/payment.css" rel="stylesheet" />

    <script src="../js/product.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/navMenu.js"></script>
    <script src="../js/backToTop.js"></script>
	<script src="../js/jquery.js"></script>
    <script src="../js/checkout.js"></script>
    

    <!-- End-Main Assets -->


    <!-- PHONE ASSEST-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"  />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>


    <!-- Card Validation -->
    <script src="../js/valid/jquery.creditCardValidator.js"></script>





    <!-- Offers Sliders Assets -->

    <!--owl css-->
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <!-- Animate CSS -->
    <link href="../css/animate.css" rel="stylesheet" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- OWL Style CSS -->
    <link rel="stylesheet" href="../css/owl-slider.css">

    <!-- End-Offers Sliders Assets -->




    <!-- Brands Sliders Assets -->

    <link href="../css/slick-theme.css" rel="stylesheet" />
    <link href="../css/slick.css" rel="stylesheet" />
    
    <!-- End-Brands Sliders Assets -->





    <!-- Home Assets -->

        

    <!-- Home Assets -->


</head>
<body>
    <div class="navigation-wrap bg-light start-header start-style">

    <!-- PAYMENT -->
        <div class="section-div  first-div payment-row" id="payment-popup-secure" style="display:none;">
            
        </div>

        <!-- Top Header -->
        <?php echo $top_header; ?>
        <!-- End-Top Header -->

        <!-- Nav Menu -->
        <div class="container main-menu">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-md navbar-light" id="header">

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

    <div class="container body-content" style="margin-top: 100px;">
        <div class="section-div  first-div" >
          
            <div class="row mb-3">
                <div class="col-12">
                    <div class="row mb-3">
                        <div class="col-12" style="text-align: center;">
                            <h1>About us</h1>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8" style="text-align: center;">
                            <p>Welcome to Store Name, your destination for premium body care products that nourish both body and soul. At Store Name, we believe in the power of self-care and the importance of feeling confident in your own skin. Our carefully curated selection of body care essentials is designed to elevate your daily routine and inspire a sense of well-being. </p>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    
                    <hr>
                </div>
            </div>
            

            <div class="row mb-3">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12" style="text-align: center;">
                            <h1>Contact Us</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8" style="text-align: center;">
                            <p>If you have any questions or concerns about our refund policy, please don't hesitate to contact us at <b>support@Store Name.store</b> Our customer service team is here to assist you and ensure your experience with Store Name is exceptional.</p>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <hr>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12" style="text-align: center;">
                            <h1>Fast Delivery</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8" style="text-align: center;">
                            <p>At Store Name, we understand that receiving your body care products promptly is important to you. That's why we're committed to ensuring fast and reliable delivery every time you shop with us.</p>
                        </div>
                        <div class="col-2"></div>
                    </div>

                <hr>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="row mb-3">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="row">
                                <div class="col-12" style="text-align: center;">
                                    <h1>Our Promise</h1>
                                </div>
                            </div>
                            <ul>
                                <li><b>Speedy Shipping:</b> We work with trusted shipping partners to deliver your order to your doorstep as quickly as possible.</li>
                                <li><b>Tracking Information:</b> Once your order has been shipped, you'll receive a tracking number via email, allowing you to monitor its progress every step of the way.</li>
                                <li><b>Secure Packaging:</b> We take great care to package your products securely to ensure they arrive in perfect condition.</li>
                            </ul>
                        </div>
                        <div class="col-2"></div>
                    </div>
                <hr>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <div class="row mb-3">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="row">
                                <div class="col-12" style="text-align: center;">
                                    <h1>Delivery Options</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" style="text-align: center;">
                                    <p>Choose from a range of delivery options to suit your needs:</p>
                                </div>
                            </div>
                            <ul>
                                <li><b>Free Delivery:</b> 4 to 8 business days.</li>
                                <li><b>Standard Delivery:</b> 3 to 6 business days.</li>
                                <li><b>Express Delivery:</b>  2 to 4 business days.</li>
                                <li><b>International Shipping:</b> We also offer international shipping options for our customers around the globe. Delivery times may vary depending on your location.</li>
                            </ul>
                        </div>
                        <div class="col-2"></div>
                    </div>
                <hr>
                </div>
            </div>
            
            
        </div>
    </div>


    <div class="overlay" id="overlay">
    <div class="lds-dual-ring" id="spinner"></div>
    </div>
    


    <footer>
        <?php echo $footer; ?>

    </footer>

</body>


    <script>
        
    </script>
</html>