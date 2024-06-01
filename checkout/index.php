<?php
include '../userdata.php';
include '../header.php';
include 'countryArray.php';

$ip = $_SERVER['REMOTE_ADDR'];
if(isset($_SESSION['user_id'])){

    if($_SESSION['cart_item'] == 0){
        header('Location: ../cart');
    }
    
    $total_cart = 0;


    $sql = "SELECT cart.*, products.price,products.price_sale FROM cart 
    INNER JOIN products 
    ON cart.product_id = products.product_id AND cart.user_id = $user_id";
    $result = mysqli_query($db,$sql);
    while($row_cart = mysqli_fetch_assoc($result)){
        if($row_cart['price_sale'] == 0){
            $price = $row_cart['price'];
        }
        else{
            $price = $row_cart['price_sale'];
        }
        $total_cart += ($price * $row_cart['quant']);
    }
    //echo $total_cart;
    $tax = $total_cart * 0.05;
    //echo '<br>' . $tax;

  

    $tax = round($tax, 2);
    
    $totalVal = $total_cart + $tax;

    $addressArr = getUserAddress();
}




?>
<!DOCTYPE html>
<html>
<head>

    
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Fly Cart, Online Store, Buy, E-Commerce" name="keywords">
    <meta content="Fly Cart, Online Store, Buy, E-Commerce" name="description">

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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    
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
            <div class="row" >
                <div class="col-md-6">
                    <div class="form-group">
                        <!------------------------------------------------------ Address Div ------------------------------------------------>
                        <div class="row mb-3" id="">
                            
                            <div class="col-md-12">

                                <div class="row mb-3">
                                    <div class="col-md-6 " >
                                        <p class="header-text">Billing Address</p>
                                        <p id="gfg"></p>
                                    </div>
                                    <div class="col-md-6" style="text-align: right;">
                                        <a href="#" class="link-opacity-75" id="edit-address-btn" style="display: none;">Edit</a>
                                    </div>
                                </div>

                                

                                
                                <form action="#" method="post" id="address-form">
                                    <div id="address-div">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <input class="form-control " type="text" name="firstName" placeholder="First Name" required />
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-control " type="text" name="lastName" placeholder="Last Name" required />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6 " >
                                                <input class="form-control " style="width: 100%;" id="email" type="email" name="email" placeholder="E-mail" required />
                                            </div>
                                            <div class="col-md-6 " >
                                                <input class="form-control" style="width: 100%;" id="phoneSelector" type="text" name="phone"  maxlength="11" minlength="9" placeholder="123-1234-1234"  required  /><br>
                                                <span style="font-size: 8pt; color: red; display: none;" id="number-check-span">*The number you entered is invalid</span>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <select class="form-control" style="width: 100%;" name="country" required>
                                                    <option value="">Select Country</option>
                                                    <?php
                                                        for($i =0 ; $i < count($countries);$i++){
                                                            echo '<option value="'.$shortcut[$i].'">'.$countries[$i].'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <input class="form-control " type="text" name="address1" placeholder="Address 1" required />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <input class="form-control " type="text" name="address2" placeholder="Address 2 (Optional)" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <input class="form-control " type="text" name="city" placeholder="City" required />
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-control " type="text" name="state" placeholder="State" required />
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-control " type="text" name="zip" placeholder="Zip Code" required />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <button class="btn btn-danger" style="width: 100%;" type="submit">
                                                    <div class="cv-spinner" style="display: none;" id="spinner">
                                                        <span class="spinner" ></span>
                                                    </div>
                                                    <span id="save-btn-text">Save Address & Continue</span>
                                                </button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <hr>
                        <!------------------------------------------------ Delivery Method -------------------------------------------->
                        <div class="row mb-3" >
                            <div class="col-md-12">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="row mb-3">
                                            <div class="col-md-6 " >
                                                <p class="header-text">Shipping Method</p>
                                            </div>
                                            <div class="col-md-6" style=" text-align: right;">
                                                <a href="#" class="link">Edit</a>
                                            </div>
                                        </div>
                                        <div id="shipping-mthd-div" >
                                            <div class="row mb-3">
                                                <label class="form-check-label" for="free-ship" style="width:100%;">
                                                    <div class="col-md-12 content-addr">
                                                        <div class="form-check" style="width: 100%;">
                                                            <input class="form-check-input" type="radio" name="shipping-mthd" id="free-ship" value="0" checked />
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h2>Free Shipping</h2>
                                                                    </div>
                                                                </div>                                                          
                                                            <div class="row">
                                                                <div class="col-md-6" name="shipping-addr"  >
                                                                    <p class="text-start">4 - 8 business days</p>
                                                                </div>
                                                                <div class="col-md-6" name="shipping-addr"  >
                                                                    <p class="text-right font-weight-bold">FREE</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="row mb-3" >
                                                <label class="form-check-label" for="premium-ship" style="width:100%;">
                                                    <div class="col-md-12 content-addr">
                                                        <div class="form-check" style="width: 100%;">
                                                            <input class="form-check-input" type="radio" name="shipping-mthd" id="premium-ship" value="18">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h2>Premium</h2>
                                                                    </div>
                                                                </div>
                                                            <div class="row" >
                                                                <div class="col-md-6" name="shipping-addr" >
                                                                    <p class="text-start">3 - 6 business days</p>
                                                                </div>
                                                                <div class="col-md-6" name="shipping-addr"  >
                                                                    <p class="text-right font-weight-bold">$<span id="premium-ship-price">18.00</span></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="form-check-label" for="express-ship" style="width:100%;">
                                                    <div class="col-md-12 content-addr">
                                                        <div class="form-check" style="width: 100%;">
                                                            <input class="form-check-input" type="radio" name="shipping-mthd" id="express-ship" value="22" >
                                                            
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h2>Express</h2>
                                                                    </div>
                                                                </div>
                                                        
                                                            <div class="row">
                                                                <div class="col-md-6" name="shipping-addr"  >
                                                                    <p class="text-start">2 - 4 business days</p>
                                                                </div>
                                                                <div class="col-md-6" name="shipping-addr" >
                                                                    <p class="text-right font-weight-bold">$<span id="express-ship-price">22.00</span></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        
                        <!------------------------------------------------------ Payment Div ------------------------------------------------>
                        <div class="row" id="">             
                            <div class="col-md-12">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <p class="header-text">Payment</p>
                                    </div>
                                </div>
                                <form method="post" action="#" id="payment-form">  
                                    <div id="payment-div">
                                        <div class="content-addr mb-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h2>Shipping Address</h2>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3" name="shipping-addr"  id="fullname">
                                                    <b>John Doe</b>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3" name="shipping-addr"  id="address">
                                                    <i>253 Address</i>
                                                </div>
                                            </div>
                                            <div class="row" name="shipping-addr">
                                                <div class="col-md-3" id="city-state">
                                                    <i>City, State</i>
                                                </div>
                                            </div>
                                            <div class="row" name="shipping-addr">
                                                <div class="col-md-3" id="email-show">
                                                    <i>johndoe99@gmail.com</i>
                                                </div>
                                            </div>
                                            <div class="row" name="shipping-addr">
                                                <div class="col-md-6" id="phone-show">
                                                    <i>+1 88 558 4856</i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12" >
                                                <div class="input-container">
                                                    <input type="text" class="form-control" id="ccnum-input" maxlength="16" name="cc-number" placeholder="Card Number" pattern="[0-9\s]{13,19}" required/>
                                                    <img src="../Images/flat/visa.svg" class="card-brand" id="input-img">
                                                </div>
                                                
                                                <span class="card-validation"></span>
                                                
                                            </div>
                                            <!--<div class="col-sm-2" style="padding-left: 0 !important;">
                                                <span class="form-control text-muted" id=""> 
                                                    
                                                </span>
                                            </div> -->
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="card-holder" placeholder="Card Holder" required>
                                                
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row">
                                                    <div class="expiry">
                                                        <div class="col-md-5" style="padding: 0; margin: 0;">
                                                            <input type="text" class="form-control borderless-right radius-right" maxlength="2" name="exp-month" id="exp-month" placeholder="MM"/>
                                                        
                                                        </div>
                                                        <div class="col-md-1" style="padding: 0; margin: 0;">
                                                            <input type="text" class="form-control borderless-left borderless-right " value="/" id="exp-month" style="padding: 0; text-align: center; border-radius: 0;"  readonly />
                                                        </div>
                                                        <div class="col-md-5" style="padding: 0; margin: 0;">
                                                            <input type="text" class="form-control borderless-left radius-left" maxlength="2" name="exp-year" id="exp-year" placeholder="YY"/>
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="cvv" placeholder="CVV" maxlength="4" pattern="[0-9\s]{3,4}" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-12" style="text-align: center;">
                                                <button type="submit" class="btn btn-warning disabled" style="width: 100%;" id="payment-btn">Complete Purchase</button>
                                            </div>
                                        </div>
                                    </div>
                                </form> 
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-3">
                        <div class="col-md-6" >
                            <p class="header-text">Summary</p>
                        </div>
                        <div class="col-md-6" >
                            <div class="cv-spinner" id="spinner-summary" style="display: none;">
                                <span class="spinner" ></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 ml-auto">
                            <div class="cart-page-total">
                                
                                <table class="table">
                                    <tbody>
                                        <tr style="border-top: 6px solid red;">
                                            <th><h1>Cart</h1></th>
                                            <td><a href="../cart" class="link">Edit Cart</a> </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Merchandise</th>
                                            <td id="sutotal-cart"> $<?php echo $total_cart; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Shipping & Handiling</th>
                                            <td id="shipping-val">$0.0</td>
                                        </tr>
                                        
                                        <tr>
                                            <th scope="row">Tax</th>
                                            <td id=""> $<?php echo $tax; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Order Total</th>
                                            <input type="text" value="<?php echo $totalVal; ?>" style="display: none;" id="data-val"/>
                                            <td id="total-cart" data-val="84.1">$<?php echo $totalVal; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="overlay" id="overlay">
    <div class="lds-dual-ring" id="spinner"></div>
    </div>
    


</body>

<?php //echo '<script>var ips = ' . $ip .';'; ?>
    <script>
        
    </script>
</html>