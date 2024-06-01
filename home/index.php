<?php
include '../userdata.php';
include '../header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Faffy,faffy,Store Name,Store Name, Online Store, Buy, E-Commerce" name="keywords">
    <meta content="Faffy,faffy,Store Name,Store Name, Online Store, Buy, E-Commerce" name="description">

    <title>Store Name</title>

    <!-- Favicon -->
    <link href="../Images/favicon.ico" rel="icon">


    <!-- Main Assets -->
    
    <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">

    <link href="../css/style.css" rel="stylesheet" />

    <script src="../js/product.js"></script>

    <script src="../js/bootstrap.js"></script>
    <script src="../js/navMenu.js"></script>
    <script src="../js/backToTop.js"></script>
	<script src="../js/jquery.js"></script>

    

    <!-- End-Main Assets -->




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



    <!-- Body Template !! ------------------------------------------------------- -->
    <div class="container body-content">



        <!-- Header Slider -->
        <div class="section-div  first-div">

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="slider-area">
                        <div class="slider-active owl-carousel">
                            <!-- Begin Single Slide Area -->
                            
                            <!-- Single Slide Area End Here -->
                            <!-- Begin Single Slide Area -->
                            <div class="single-slide align-center-left animation-style-02 bg-1">
                                <div class="slider-progress"></div>

                                <div class="slider-contents-container">

                                    <div class="slider-content">
                                        <h5>Best Offers <span>For You</span> This Month</h5>
                                        <h2>Now You Look more Gorgeous</h2>
                                        <h3>Starting at <span>$20.00</span></h3>
                                        <div class="default-btn slide-btn">
                                            <a class="links" href="../store">Shopping Now</a>
                                        </div>
                                    </div>

                                    <div class="slider-img">
                                        <img src="../Images/slider/makeup.png">
                                    </div>

                                </div>


                            </div>
                            <!-- Single Slide Area End Here -->
                            <!-- Begin Single Slide Area -->
                            <div class="single-slide align-center-left animation-style-01 bg-2">
                                <div class="slider-progress"></div>

                                <div class="slider-contents-container">

                                    <div class="slider-content">
                                        <h5>Sale Offer <span>Up To -50% Off</span> This Month</h5>
                                        <h2>Your Best Beach Day</h2>
                                        <h3>Starting at <span>$2.00</span></h3>
                                        <div class="default-btn slide-btn">
                                            <a class="links" href="../store">Shopping Now</a>
                                        </div>
                                    </div>

                                    <div class="slider-img">
                                        <img
                                            src="https://www.pngall.com/wp-content/uploads/5/Fashion-Accessories-PNG-HD-Image.png">
                                    </div>

                                </div>


                            </div>
                            <!-- Single Slide Area End Here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End-Header Slider -->

            <br />
            <br />
            <br />
            <br />


        <!-- Slider With Tabs -->
        <div class="section-div">
            <div id="slider-tabs">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="li-product-tab">
                            <ul class="nav li-product-menu">
                                <li><a class="active" data-toggle="tab" href="#li-new-product"><span>New
                                            Arrival</span></a></li>
                                <li><a data-toggle="tab" href="#li-bestseller-product"><span>Best Sale</span></a></li>
                                <li><a data-toggle="tab" href="#li-featured-product"><span>Featured Products</span></a>
                                </li>
                            </ul>
                        </div>
                        <!-- Begin Li's Tab Menu Content Area -->
                    </div>
                </div>
                <div class="tab-content">
                    <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                        <div class="row">
                            <div class="product-active owl-carousel" id="newArrival">

                                <!-- Product items will be dynamically added here using JavaScript -->


                            </div>
                        </div>
                    </div>
                    <div id="li-bestseller-product" class="tab-pane" role="tabpanel">
                        <div class="row">
                            <div class="product-active owl-carousel" id="bestSale">

                                <!-- Product items will be dynamically added here using JavaScript -->


                            </div>
                        </div>
                    </div>



                    <div id="li-featured-product" class="tab-pane" role="tabpanel">
                        <div class="row">
                            <div class="product-active owl-carousel" id="featuredProducts">

                                <!-- Product items will be dynamically added here using JavaScript -->


                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
        <!-- END-Slider With Tabs -->

        <br />


        <!--Color Blocks-->
        <div class="section-div">
            <div class="section-div row">

                <div class="col-md-6 offer-block-container">

                    <div class="offer-block green">
                        <div class="offer-section-left">
                            <h2 style="font-size: 50px;">Up To 70%</h2>
                            <h2 style="font-weight: normal; font-size: 15px;">Discount</h2>
                            <h2 style="font-size: 20px;">Just for you !!</h2>
                        </div>
                        <div class="offer-section-right">
                            <img
                                src="../Images/slider/discount.png">
                        </div>

                    </div>

                    <div class="offer-block red">
                        <h2 style="font-weight: bold; font-size: 20px;">Ends 29/5/2024</h2>
                    </div>
                </div>

                <div class="col-md-6 offer-block-container">
                    <div class="offer-block purple">
                        <div class="offer-section-left">
                            <img src="https://pngimg.com/d/gift_PNG100219.png">

                        </div>
                        <div class="offer-section-right">
                            <h2 style="font-size: 20px;">STAY TUNED<h2>
                                    <h2 style="font-size: 40px;">AND GET YOUR GIFT</h2>
                                    <a class="white-btn" href="../store">Start Shopping</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--end-Color Blocks-->
        
        
        <br />

        <!--Brand Slider-->
        
        <!--end-Brand Slider-->





        <!--Latest Offers-->
        <div class="section-div">
            <div class="header-div">

                <h2 class="section-header">Latest Offers</h2>
                <div class="hr-header"></div>
    
            </div>
    
            <div id="latestOffers" class="row">
    
                <!-- Append Latest Offers -->
    
            </div>
        </div>
        <!--end-Latest Offers-->




        <br />
        <hr />





        <!--Why Store Name-->
        <div class="section-div">
            <div class="header-div">

                <h2 class="section-header">Why Store Name ?!</h2>
                <div class="hr-header"></div>
    
            </div>
    
            <div class="section-div row">
    
                <div class="col-md-6">
                    <div class="info-card">
                        <div class="info-card-icon">
                            <i class="fa-solid fa-truck"></i>
                        </div>
                        <div class="info-card-desc">
                            <h2>Fast Delivery</h2>
                            <p>
                            At Store Name, we pride ourselves on lightning-fast delivery.
                            With our streamlined logistics and dedicated team, your orders
                            are processed swiftly and efficiently. Whether it's same-day
                            delivery or express shipping, we ensure your package reaches
                            its destination promptly, so you can enjoy your purchases without delay.
                            Experience the convenience and reliability of our fast delivery service today!
                            </p>
                        </div>
                    </div>
                </div>
    
    
    
                <div class="col-md-6">
                    <div class="info-card">
                        <div class="info-card-icon">
                            <i class="fa-solid fa-hand-holding-dollar"></i>
                        </div>
                        <div class="info-card-desc">
                            <h2>Refund Policy</h2>
                            <p>
                            At Store Name, we strive to provide the highest quality body care products and ensure
                            your satisfaction with every purchase. However, we understand that sometimes
                            circumstances may arise where you need to return a product.
                            We want to make the process as smooth and convenient as possible for you.
                            </p>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
        <!--end-Why Store Name-->



        


        
    </div>
    <!-- End Body Template !! ------------------------------------------------------- -->



    <!-- Footer Template !! -->
    <div class="container body-content">

        <hr />
        
    </div>

    <!-- End Footer Template !! -->




    <!-- Offers Sliders Assets -->

    
    <script src="../js/sliderTabsAppend.js"></script>

    <!--owl js-->
        <!-- jQuery-V1.12.4 -->
        <script src="../js/carousel/jquery-1.12.4.min.js"></script>
        <!-- Bootstrap V4.1.3 Fremwork js -->
        <script src="../js/carousel/bootstrap.min.js"></script>
        <!-- Meanmenu js -->
        <script src="../js/carousel/jquery.meanmenu.min.js"></script>
        <!-- Wow.min js -->
        <script src="../js/carousel/wow.min.js"></script>
        <!-- Slick Carousel js -->
        <script src="../js/carousel/slick.min.js"></script>
        <!-- Owl Carousel-2 js -->
        <script src="../js/carousel/owl.carousel.min.js"></script>
        <!-- Countdown -->
        <script src="../js/carousel/jquery.countdown.min.js"></script>
        <!-- Counterup -->
        <script src="../js/carousel/jquery.counterup.min.js"></script>
        <!-- Barrating -->
        <script src="../js/carousel/jquery.barrating.min.js"></script>
        <!-- Jquery-ui -->
        <script src="../js/carousel/jquery-ui.min.js"></script>
        <!-- Venobox -->
        <script src="../js/carousel/venobox.min.js"></script>
        <!-- Nice Select js -->
        <script src="../js/carousel/jquery.nice-select.min.js"></script>
        <!-- ScrollUp js -->
        <script src="../js/carousel/scrollUp.min.js"></script>
        <!-- Main/Activator js -->
        <script src="../js/carousel/main.js"></script>

    <!-- End-Offers Sliders Assets -->

    
    <!-- Brands Sliders Assets -->
    
    <script src="../js/carousel/slick.min.js"></script>
    <script src="../js/carousel/brand-slider.js"></script>
    
    <!-- End-Brands Sliders Assets -->


    <!-- Home Assets -->

        <!-- Script For Latest Offers -->
    <script src="../js/latestOffers.js"></script>
        <!-- END-Script For Latest Offers -->

    <!-- Home Assets -->
    <footer>
            
        <?php echo $footer; ?>
    </footer>
</body>




</html>