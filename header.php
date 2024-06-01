<?php





if(isset($_SESSION['cart_item'])){
    $cartItem = $_SESSION['cart_item'];
}
$username = 0;
if(isset($_SESSION['username_uss'])){
    $username = $_SESSION['username_uss'];
}




$top_header = '<div class="top-head-red">
                <div class="container">
                    <div class="row">
                        <!-- Social Links -->
                        <div class="col-6 social-container">

                        </div>
                        <!-- User Profile -->
                        <div class="col-6 user-container">';

                            
                            if($username){

                                $top_header .='
                                <div class="dropdown">
                                <a class="user-btn dropdown-toggle" id="username-dropdown" data-id="user-menu"  href="#">'.$username.'<i class="fa-regular fa-user"></i></a>
                                <div class=" hidden"  id="user-menu">
                                    <a class="dropdown-item" href="../profile">Profile</a>
                                    <a class="dropdown-item" href="../orders">Orders</a>
                                    <a class="dropdown-item" href="../logout.php">Logout</a>
                                </div>
                                
                                </div>
                                    ';

                               /* $top_header.= ' <a class="user-btn" title="facebook" href="#">
                                <span>'.$username.' </span>
                                <i class="fa-regular fa-user"></i>
                                    </a>';*/
                            }
                            else{
                                $top_header.= '<a class="user-btn" title="facebook" href="../account">
                                <span>Login / Register </span>
                                <i class="fa-regular fa-user"></i>
                                    </a>';
                            }
                            
                            $top_header.= '
                        </div>

                    </div>
                </div>
                </div>';

$header = '<!-- Logo -->
<a class="navbar-brand" href="../home"><img src="../Images/logo.png" alt=""></a>

<!-- Toggle-Btn -->
<button class="navbar-toggler" type="button" data-toggle="collapse"
    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<!-- End-Toggle-Btn -->


<!-- Search -->
<form action="../store/index.php?search=true" method="post">
    <div class="row justify-content-center">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-sm search-container">
                <div class="card-body row no-gutters align-items-center search-body">
                    <div class="col-auto">
                        <i class="fas fa-search h4 text-body search-ico"> </i>
                    </div>
                    <div class="col">
                        <input
                            class="form-control form-control-lg form-control-borderless search-input"
                            type="search" name="search-ele" placeholder="Search product">
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-lg search-btn" type="submit"> Search </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>
<!-- END-Search -->

<!-- Main Menu -->
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto py-4 py-md-0">
        <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 active">
            <a class="nav-link" href="../home">Home</a>
        </li>
        <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button"
                aria-haspopup="true" aria-expanded="false">Store <i
                    class="fa-solid fa-chevron-down"></i></a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="../store">All Categories</a>
                <a class="dropdown-item" href="../store" name="gen-cat" data-id="1">Men</a>
                <a class="dropdown-item" href="../store" name="gen-cat" data-id="2">Women</a>
                <a class="dropdown-item" href="../store" name="gen-cat" data-id="3">Kids</a>
                
            </div>
        </li>
        <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
            <a class="nav-link" href="../about">About Us</a>
        </li>
        <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="true" aria-expanded="false">Policies <i
                    class="fa-solid fa-chevron-down"></i></a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="../terms">Refund policy</a>
                <a class="dropdown-item" href="../terms">Terms of Service</a>
            </div>
        </li>



        
        <li id="cart-btn" class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
            <a title="Cart" class="nav-link" href="../cart">
                <i class="fa-solid fa-bag-shopping"></i>
                <span id="cartCount">( '.$_SESSION['cart_item'].' )</span>
            </a>
        </li>
    </ul>
</div>';


$footer = '<div class="row black-footer full-width">
<div class="col-md-3">
    <a href="index.html"><img src="../Images/logo-white.png"></a>
    <p>
    Your destination for premium body care products that nourish both body and soul. At Store Name, we believe in the power of self-care and the importance of feeling confident in your own skin. Our carefully curated selection of body care essentials is designed to elevate your daily routine and inspire a sense of well-being.
    </p>
</div>
<div class="col-md-3">
    
</div>
<div class="col-md-3">
<h2>Important Links</h2>
    <br>

    <a href="../store">Store</a>
    <a href="../about" data-id="about">About Us</a>
    <a href="../about" data-id="contact">Contact Us</a>
    <a href="../terms" data-id="terms">Privacy Policy</a>
</div>

<hr style="border-color: silver; width: 100%;" />


<div class="col-md-12">
    <div style="float: left; display: block;">
        <p>&copy; 2023 - Store Name</p>
    </div>
    <div style="float: right; display: block; font-size: 18px;">
        <i class="fa-brands fa-cc-visa"></i>
        <i class="fa-brands fa-cc-mastercard"></i>
        <i class="fa-brands fa-cc-amex"></i>
        <i class="fa-brands fa-cc-discover"></i>
        <i class="fa-brands fa-cc-jcb"></i>
    </div>
</div>
</div>';

?>