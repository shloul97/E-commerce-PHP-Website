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
    <meta content=" Online Store, Buy, E-Commerce" name="keywords">
    <meta content=" Online Store, Buy, E-Commerce" name="description">

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
                            <h1>Refund Policy</h1>
                        </div>
                    </div>
                    
                    
                    <div class="row mb-3">
                        <div class="col-2"></div>
                        <div class="col-8" style="text-align: center;">
                            <p>At Store Name, we strive to provide the highest quality body care products and ensure your satisfaction with every purchase. However, we understand that sometimes circumstances may arise where you need to return a product. We want to make the process as smooth and convenient as possible for you.</p>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <p style="font-size: 14pt;"><b>Eligibility for Refunds</b></p>
                            <ul>
                                <li><b>Product Condition:</b> The product must be unused, unopened, and in its original packaging.</li>
                                <li><b>Timeframe: :</b> You must initiate the return process within 30 days of receiving the product.</li>
                                <li><b>Proof of Purchase:</b> A proof of purchase, such as a receipt or order confirmation, is required.</li>
                            </ul>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="row">
                                <div class="col-12">
                                    <p style="font-size: 14pt;"><b>How to Initiate a Refund?</b></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <p>If you believe you are eligible for a refund, please follow these steps:</p>
                                </div>
                            </div>
                            <ul>
                                <li><b>Contact Us:</b> Reach out to our customer service team at <b>enquiries@Store Name.store</b> to inform us of your intent to return the product.</li>
                                <li><b>Return Authorization:</b> Our team will provide you with further instructions, including a return authorization number if necessary.</li>
                                <li><b>Return Shipping:</b> You are responsible for shipping the product back to us. Please ensure the item is securely packaged to prevent damage during transit.</li>
                                <li><b>Refund Processing:</b> Once we receive the returned product and verify its condition, we will initiate the refund process. Please allow 7 business days for the refund to be processed and reflected in your account.</li>
                            </ul>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="row">
                                <div class="col-12">
                                    <p style="font-size: 14pt;"><b>Non-Refundable Items</b></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <p>Please note that certain items are not eligible for refunds, including:</p>
                                </div>
                            </div>
                            <ul>
                                <li><b>Opened or Used Products:</b> Products that have been opened or used are not eligible for refunds unless they are defective or damaged upon arrival</li>
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
                        <div class="col-12" style="text-align: center;">
                            <h1>Terms of Service</h1>
                        </div>
                    </div>
                    
                    
                    <div class="row mb-3">
                        <div class="col-2"></div>
                        <div class="col-8" style="text-align: center;">
                            <p>These Terms of Service govern your use of the Store Name website and the products and services offered by Store Name. By accessing or using the Site, you agree to be bound by these Terms. Please read them carefully before using the Site.</p>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <p style="font-size: 14pt;"><b>Use of the Site</b></p>
                            <ol>
                                <li><b>Access:</b> You must be at least 18 years old to access and use the Site. By accessing or using the Site, you represent and warrant that you are at least 18 years old.</li>
                                <li><b>Account:</b> In order to access certain features of the Site, you may be required to create an account. You are responsible for maintaining the confidentiality of your account and password and for restricting access to your account. You agree to accept responsibility for all activities that occur under your account.</li>
                                <li><b>Prohibited Activities:</b> You agree not to engage in any of the following prohibited activities:
                                    <ul>
                                        <li>Use the Site for any unlawful purpose.</li>
                                        <li>Attempt to gain unauthorized access to any part of the Site or any other systems or networks connected to the Site.</li>
                                        <li>Interfere with or disrupt the operation of the Site or any servers or networks connected to the Site.</li>
                                        <li>Violate any applicable laws or regulations.</li>
                                    </ul>
                                </li>
                            </ol>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="row">
                                <div class="col-12">
                                    <p style="font-size: 14pt;"><b>Products and Services</b></p>
                                </div>
                            </div>
                            <ol>
                                <li><b>Product Descriptions:</b> We strive to provide accurate and up-to-date descriptions of our products. However, we do not warrant that product descriptions or other content on the Site are accurate, complete, reliable, current, or error-free.</li>
                                <li><b>Pricing:</b> Prices for our products are subject to change without notice. We reserve the right to modify or discontinue any product or service without prior notice.</li>
                                <li><b>Availability:</b> All products and services are subject to availability. We cannot guarantee the availability of any product or service displayed on the Site.</li>
                            </ol>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="row">
                                <div class="col-12">
                                    <p style="font-size: 14pt;"><b>Ordering and Payment</b></p>
                                </div>
                            </div>
                            <ol>
                                <li><b>Order Acceptance:</b> Your placement of an order on the Site does not constitute acceptance of that order. We reserve the right to accept or decline your order for any reason.</li>
                                <li><b>Payment:</b> Payment for orders placed on the Site must be made through the available payment methods. You agree to provide accurate and complete payment information.</li>
                            </ol>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="row">
                                <div class="col-12">
                                    <p style="font-size: 14pt;"><b>Intellectual Property</b></p>
                                </div>
                            </div>
                            <ol>
                                <li><b>Ownership:</b> All content on the Site, including text, graphics, logos, images, audio clips, and software, is the property of Store Name or its licensors and is protected by copyright and other intellectual property laws.</li>
                                <li><b>Use Restrictions:</b> You may not reproduce, distribute, modify, create derivative works of, publicly display, publicly perform, republish, download, store, or transmit any of the material on the Site, except as expressly permitted by these Terms or with prior written consent from Store Name.</li>
                            </ol>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="row">
                                <div class="col-12">
                                    <p style="font-size: 14pt;"><b>Limitation of Liability</b></p>
                                </div>
                            </div>
                            <ol>
                                <li><b>Disclaimer:</b> The Site and all products and services provided through the Site are provided on an "as is" and "as available" basis, without any warranties of any kind, either express or implied.</li>
                                <li><b>Limitation of Liability:</b> To the fullest extent permitted by law, Store Name shall not be liable for any indirect, incidental, special, consequential, or punitive damages, or any loss of profits or revenues, whether incurred directly or indirectly, or any loss of data, use, goodwill, or other intangible losses, resulting from your access to or use of or inability to access or use the Site or any products or services provided through the Site.</li>
                            </ol>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="row">
                                <div class="col-12">
                                    <p style="font-size: 14pt;"><b>Governing Law</b></p>
                                </div>
                            </div>
                            <div class="row">
                                <p>These Terms shall be governed by and construed in accordance with the law, without regard to its conflict of law principles.</p>
                            </div>
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