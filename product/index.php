<?php
include '../userdata.php';
include '../header.php';


$product_id = $_GET['prodId'];

$sql_getproduct = "SELECT * FROM products where product_id = '$product_id'";
$result = mysqli_query($db,$sql_getproduct);
$row = mysqli_fetch_assoc($result);

$product_id = $row['product_id'];
$folder = '../products/'.$product_id.'/';
$images = glob($folder . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);






?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Online Store, Buy, E-Commerce" name="keywords">
    <meta content="Online Store, Buy, E-Commerce" name="description">

    <title>FlyCart</title>

    <!-- Favicon -->
    <link href="../Images/favicon.ico" rel="icon">


    <!-- Main Assets -->
    <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
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

        <style>
          * {
  box-sizing: border-box;
}

img {
  vertical-align: middle;
  max-height: 450px;
}

/* Position the image container (needed to position the left and right arrows) */
.container {
  position: relative;
}

/* Hide the images by default */
.mySlides {
  
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
  margin-right: 15px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background: var(--red);
  padding: 2px 16px;
  color: white;
}
/* Container for image text */
#caption {
  text-align: center;
  padding: 2px 16px;
  color: white;
  margin-top: 4px;
  margin-bottom: 4px;
  font-size: 22px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.productSlider {
  opacity: 0.6;
  max-height: 85px;
}

.active,
.productSlider:hover {
  opacity: 1;
}
        </style>

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

      
    </div>
     <!--End Body Template !! ------------------------------------------------------- -->

 <!-- Footer Template !! -->
 <div class="container body-content">

    <div class="row mb-3">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-12">
                    <h2 class="section-header">Product Details</h2>
                    <div class="hr-header"></div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <!-- PRODUCT IMAGES COL-->
                    <div class="row mb-3">
                        <div class="col-12">
                            <?php
                            foreach ($images as $image) {
                                echo '<div class="mySlides">
                                    <div class="numbertext">1 / 6</div>
                                    <img src="'.$image.'" style="width:100%">
                                  </div>';
                              }
                            ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="caption-container">
                                <p id="caption"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <?php
                            $slide = 0;
                            foreach ($images as $image) {
                            $slide++;
                            echo '<div class="column">
                                <img class="productSlider cursor" src="'.$image.'" style="width:100%" onclick="currentSlide('.$slide.')" alt="">
                                </div>';
                            }
                            ?>
                        </div>
                    </div>                    
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="title text-dark">
                                <?php
                                echo $row['product_name'];
                                ?>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex flex-row my-3">
                                <span class="text-success ms-2">In stock</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <span class="h5">
                                <?php 
                                  if($row['price_sale'] != 0){
                                      echo '<div style="display:inline-block;">';
                                      echo '<small class="old-price ms-2 mr-2">'.$row['price'].'$</small>'; 
                                      echo '<span class="new-price">'.$row['price_sale'].'$</span>';
                                      echo '</div>';
                                  }else{
                                      echo '<span class="new-price">'.$row['price'].'$</span>';
                                  }
                                  
                                  
                                ?>
                                </span>
                                <span class="text-muted">/per box</span>
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="specify">
                               <?php echo '<p>'.$row['specify'].'</p>'; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div style="display: flex;">
                                <button type="button" class="quantity-left-minus btn btn-number"  data-type="minus" name="qty1">
                                <span class="fa fa-minus"></span>
                                </button>
                        
                                <input type="text" id="qty1" name="quantity" class="form-control input-number col-md-1" value="1" min="1" max="100" readonly>
                            
                                <button type="button" class="quantity-right-plus btn btn-number" data-type="plus" name="qty1">
                                    <span class="fa fa-plus"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div style="display: flex;">
                                <a href="#" class="btn btn-warning shadow-0 mr-2" id="buy-product" data-id="<?php echo $product_id; ?>"> Buy now </a>
                                <a class="btn btn-primary shadow-0 addToCart" data-id="<?php echo $product_id; ?>"> <i class="me-1 fa fa-shopping-basket"></i> Add to cart </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h2 class="section-header">Similar Products</h2>
                    <div class="hr-header"></div>
                </div>
                
            </div>
            <div class="row ">
                <div class="col-md-12">
                    <div class="tab-content col-md-12">
                        <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                          <div class="row">
                              <div class="product-active owl-carousel" id="newArrival">
              
                                  <!-- Product items will be dynamically added here using JavaScript -->
              
              
                              </div>
                          </div>
                        </div>
                      </div>
                </div>
                
            </div>
        </div>
    </div>

  <hr />
  
<!--End Footer-->
</div>

<!-- Offers Sliders Assets -->

<script>
            $(document).ready(function () {
                //quantity
                var quant=0;

                $('.quantity-right-plus').click(function(e){
                
                // Get the field name
                var txtID = $(this).attr('name');
                
                var currentVal = parseInt($('#'+txtID).val());
        
                $('#'+txtID).val(currentVal+1);
                
                });
            
                $('.quantity-left-minus').click(function(e){
                    // Get the field name
                    var txtID = $(this).attr('name');
                    
                    var currentVal = parseInt($('#'+txtID).val());
            
                    if(currentVal > 0)
                    $('#'+txtID).val(currentVal-1);
                });
        
            });

                  let slideIndex = 1;
                  showSlides(slideIndex);
                  
                  function plusSlides(n) {
                    showSlides(slideIndex += n);
                  }
                  
                  function currentSlide(n) {
                    showSlides(slideIndex = n);
                  }
                  
                  function showSlides(n) {
                    let i;
                    let slides = document.getElementsByClassName("mySlides");
                    let dots = document.getElementsByClassName("productSlider");
                    let captionText = document.getElementById("caption");
                    if (n > slides.length) {slideIndex = 1}
                    if (n < 1) {slideIndex = slides.length}
                    for (i = 0; i < slides.length; i++) {
                      slides[i].style.display = "none";
                    }
                    for (i = 0; i < dots.length; i++) {
                      dots[i].className = dots[i].className.replace(" active", "");
                    }
                    slides[slideIndex-1].style.display = "block";
                    dots[slideIndex-1].className += " active";
                    captionText.innerHTML = dots[slideIndex-1].alt;
                  }
                  </script>

    
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

    

    <!-- Home Assets -->
    <footer>
   <?php echo $footer; ?>
    </footer>
</body>



</html>