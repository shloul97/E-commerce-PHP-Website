<?php
include '../userdata.php';
include '../header.php';
if(!isset($_SESSION['login'])){
    header('Location: ../home');
}else{
    if(isset($_SESSION['user_id'])){
        $userData = getUserData();
        $addressData = getUserAddress();
    }
}

?>
<!DOCTYPE html>
<html>
<head>

    
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Online Store, Buy, E-Commerce" name="keywords">
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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>-->
    
    <link href="../css/style.css" rel="stylesheet" />
    <link href="../css/payment.css" rel="stylesheet" />
    <link href="../css/profile.css" rel="stylesheet" />
    <link href="../css/checkout.css" rel="stylesheet" />

    <script src="../js/product.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/navMenu.js"></script>
    <script src="../js/backToTop.js"></script>
	<script src="../js/jquery.js"></script>
    <script src="../js/profile.js"></script>
    
    

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
        <div class="section-div  first-div address-row" style="display: none;">
            <div class="row">
                <div class="col-12">
                    <div class="address-div">
                        <form action="#" method="post" id="edit-address-form">
                            <div class="row">
                                <div class="col-12">
                                    <label for="address1">Address 1</label>
                                    <input type="text" class="form-control" name="address1" id="address1" required/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="address2">Address 2 <span style="color: #828282; font-size:8pt;">(Optional)</span></label>
                                    <input type="text" class="form-control" name="address2" id="address2" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="country">Country</label>
                                    <select type="text" class="form-control" name="country" id="country" required>
                                        <option value=""> Select Country</option>
                                        <option value="US"> United States</option>
                                        <option value="UK"> United Kingdom</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" name="city" id="city" required/>
                                </div>
                                <div class="col-4">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control" name="state" id="state" required/>
                                </div>
                                <div class="col-4">
                                    <label for="zip">Zip</label>
                                    <input type="text" class="form-control" name="zip" id="zip" required/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12" style="text-align: center;">
                                    <button type="submit" class="btn btn-danger" id="save-address">
                                        <div class="cv-spinner" style="display: none;" id="spinner">
                                            <span class="spinner" ></span>
                                        </div>
                                        <span id="save-btn-text">Save Address</span></button>
                                    <button type="submit" class="btn btn-secondary" id="cancel-change">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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

    <div class="container body-content" style="margin-bottom: 10%;">
        <div class="section-div  first-div" >
            <div class="row" >
                <div class="col-md-2 mt-3">
                    <div class="row">
                        <div class="col-md-12" style="text-align: center;">
                            <p class="p-header"> My Account </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 profile-header" name="profile-selector" data-id="details-div" >
                            <h1> Details</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 profile-header" name="profile-selector" data-id="address-div">
                            <h1> Address Book</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 profile-header" name="profile-selector" data-id="payment-div">
                            <h1> Payment</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 profile-header" name="profile-selector" data-id="account-div">
                            <h1> Account Setting</h1>
                        </div>
                    </div>
                    <div class="row">
                        <a href="../orders" class="profile-header" style="width:100%;">
                            <div class="col-md-12 " name="profile-selector">
                                <h1>Orders</h1>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-1"></div>
                <div class="col-md-9">
                    <!-- details Info-->
                    <div class="row" id="details-div" style="display: none;" name="data-div">
                        <div class="col-md-12 mt-3">
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1>Personal Information</h1>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-6">
                                        
                                        <label for="fname">First Name</label>
                                        <input type="text" class="form-control" id="fname" value="<?php echo $userData[0]['fname']; ?>" placeholder="" name="fname">
                                    </div>
                                    <div class="col-6">
                                        <label for="lname">Last Name</label>
                                        <input type="text" class="form-control" id="lname" value="<?php echo $userData[0]['lname']; ?>" placeholder="" name="lname">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="dob">Date Of Birth</label>
                                        <input type="date" class="form-control" id="dob" value="<?php echo $userData[0]['dob']; ?>" placeholder="" name="dob">
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1>Contact</h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="email">E-mail</label>
                                        <input type="text" class="form-control" id="email" value="<?php echo $userData[0]['email']; ?>" placeholder="" name="email" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" value="<?php echo $userData[0]['phone']; ?>" placeholder="" name="phone" readonly>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12 ">
                                        <button type="submit" class="btn btn-danger " id="apply-btn-det">Apply Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END details Info-->

                    <!-- Address Info-->
                    <div class="row" id="address-div" style="display: none;" name="data-div">
                        <div class="col-12 mt-3">
                            <?php
                            if(count($addressData) == 0){
                                echo '
                                <div class="row">
                                    <div class="col-12">
                                        <h1>You didn\'t have any saved address book</h1>
                                    </div>
                                </div>';
                            }
                            
                            ?>
                            
                            
                            <div class="row">
                                <div class="col-12">
                                    <?php
                                    if(count($addressData)> 0){
                                        for($i = 0; $i < count($addressData); $i++){
                                            echo '
                                            <div class="address-box mb-3">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="p-header">'.$addressData[$i]['country'].'</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <h1>Address 1:</h1>
                                                    </div>
                                                    <div class="col-9">
                                                        <p>'.$addressData[$i]['address1'].'</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <h1>Address 2:</h1>
                                                    </div>
                                                    <div class="col-9">
                                                        <p>'.$addressData[$i]['address2'].'</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <h1>City:</h1>
                                                    </div>
                                                    <div class="col-9">
                                                        <p>'.$addressData[$i]['city'].'</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <h1>State:</h1>
                                                    </div>
                                                    <div class="col-9">
                                                        <p>'.$addressData[$i]['state'].'</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <h1>ZIP:</h1>
                                                    </div>
                                                    <div class="col-9">
                                                        <p>'.$addressData[$i]['zip'].'</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12" style="display: flex;">
                                                        
                                                        <button type="submit" class="btn btn-secondary" name="remove-address" data-id="'.$addressData[$i]['infoId'].'">Remove</button>
                                                    </div>
                                                    
                                                </div>
                                            </div>';
                                        }
                                    }
                                    ?>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-warning mt-3" id="add-address">Add New</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Address Info-->

                    <!--Payment Div-->
                    <div class="row mt-3" id="payment-div" style=" display: none;" name="data-div">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <h1> You didn't have any payment method</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="address-box">
                                        <div class="row">
                                            <div class="col-12">
                                                <img src="../Images/flat/visa.svg" class="payment-img" />
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-6">
                                                <p class="p-payment">21** **** **** 9317 </p>
                                            </div>
                                            <div class="col-3">
                                                <p class="p-payment">Expire :</p>
                                            </div>
                                            <div class="col-3">
                                                <p class="p-payment">06/24</p>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-12">
                                                <p class="">John Doe</p>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-12" style="text-align: right;">
                                                <button class="btn btn-secondary" id="remove-card">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Payment Div-->

                    <!-- Account Setting -->
                    <div class="row mt-3" id="account-div" style="display: none;" name="data-div">
                        <div class="col-12">
                            <form action="#" method="post" id="change-pass">
                                <div class="row">
                                    <div class="col-12" style="text-align: center;">
                                        <span id="password-alert-text" style="font-size:12pt; display:none"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label class="paragraph" for="old-pass">Old Password</p>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="old-pass" name="old-pass"  required/>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-3">
                                        <label class="paragraph" for="new-pass">New Password</p>
                                    </div>
                                    <div class="col-9">
                                        
                                        <input type="text" class="form-control" id="new-pass" name="new-pass"  required/>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-3">
                                        <label for="conf-pass" class="paragraph">Confirm Password</label>
                                    </div>
                                    <div class="col-9">
                                        
                                        <input type="text" class="form-control" id="conf-pass" name="conf-pass"  required/>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12" style="text-align: center;">
                                        <button class="btn btn-warning " type="submit" id="change-pass-btn">Change Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END Account Setting -->
                </div>
            </div>
        </div>
    </div>


    <footer>
    <?php echo $footer; ?>

    </footer>

    <div class="overlay" id="overlay">
    <div class="lds-dual-ring" id="spinner"></div>
    </div>
    


</body>


</html>