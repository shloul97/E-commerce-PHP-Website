<?php 
include '../userdata.php';
include '../header.php';


$products = getCart();

//var_dump($products[0]['product_id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Online Store, Buy, E-Commerce" name="keywords">
    <meta content=" Online Store, Buy, E-Commerce" name="description">

    <title>Store Name</title>

    <!-- Favicon -->
    <link href="Images/favicon.ico" rel="icon">


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
	<script src="../js/jquery.js"></script>
    <script src="../js/cart.js"></script>
    

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

        <!-- End-Nav Menu -->


    </div>

    <!-- Back 2 Top -->
    <a class="back2top" href="#"><i class="fa-regular fa-angles-up"></i></a>


    <!-- End Header Template !! -->



    <!-- Body Template !! ------------------------------------------------------- -->
    <div class="container body-content">

        <!--Cart Section-->
        <div class="section-div first-div">
            <div class="header-div">

                <h2 class="section-header">My Cart</h2>
                <div class="hr-header"></div>

            </div>

            <div class="section-div row">

                <div class="col-md-12">
                    <div class="cart-wrap">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-wishlist">
   
	   <!-- table cart start -->
        <?php 
       
		$total_product_price = 0;
        if(!empty($products)){
            echo '<table cellpadding="0" cellspacing="0" border="0" width="100%">
                <thead>
                    <tr>
                        <th width="30%">Product Name</th>
                        <th width="10%" class="col-price">price</th>
                        <th width="20%">Quantity</th>
                        <th>Total price</th>
                    </tr>
                </thead>
                <tbody>';
            for($i = 0;$i < count($products) ; $i++){
			
                $product_idcart = $products[$i]['product_id'];
                $sql_getProduct = "select * from products where product_id = '$product_idcart'";
                $result_PCart = mysqli_query($db,$sql_getProduct);
                
                while($row_PCart = mysqli_fetch_assoc($result_PCart)){
                    if($row_PCart['price_sale'] == 0){
                        $price = $row_PCart['price'];
                    }
                    else{
                        $price = $row_PCart['price_sale'];
                    }

                    $total_price = $price * $products[$i]['quant'];
                    $total_product_price+= $total_price;
                    $folder = '../products/'.$product_idcart.'/';
                    $images = glob($folder . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
                    echo '
                    
                    


                    <tr id="item-'.$product_idcart.'">
                    <td width="30%">
                          <div class="display-flex align-center">
                           <div class="img-product">
                               <img src="'.$images[0].'" alt="" class="mCS_img_loaded">
                           </div>
                           
                           <div class="name-product ">
                               '.$row_PCart['product_name'].'
                           </div>
                           <div class="price-product div-price">
                               '.$row_PCart['price'].'
                           </div>
                    
                           
                       </div>
                    </td>
                   <td width="10%" class="price col-price" value="'.$price.'" id="price-'.$product_idcart.'">$'.$price.'</td>
                   <td width="20%" class="quantity">
                       <div class="input-group" style="width: 60%;">
                           
                           
                               <button type="button" class="quantity-left-minus btn btn-number" data-type="btn-qty"  data-value="minus" name="qty'.$i.'" data-id="'.$product_idcart.'">
                                 <span class="fa fa-minus"></span>
                               </button>
                           
                                <input type="text" id="qty'.$i.'" name="quantity" class="form-control input-number" data-id="'.$product_idcart.'" value="'.$products[$i]['quant'].'" min="1" max="100" readonly>
                           
                           
                               <button type="button" class="quantity-right-plus btn btn-number"  data-type="btn-qty" data-value="plus" name="qty'.$i.'" data-id="'.$product_idcart.'">
                                   <span class="fa fa-plus"></span>
                               </button>
                           
                       </div>
                   </td>
                   <td width="15%" class="price" id="totalPrice-'.$product_idcart.'" >$'.$total_price.'</td>
                   <td width="10%" class="text-center"><a href="#" data-id="'.$product_idcart.'" class="trash-icon"><i class="far fa-trash-alt"></i></a></td>
               </tr>
               
               
               ';
                
                    
                    
                }
            }
            echo '</tbody>
            </table>';
        }
        else{
            echo '
                <h1>Your Cart is Empty!</h1>
            ';
        }
		
		
		
		?>
       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
					
					<!-- update cart button -->
                    
					
					
                    </div>
                    <br/>
                    <br/>
                    <br/>
                    <?php 
                    if(!empty($products)){
                        echo '
                        <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                        <th scope="row">Subtotal</th>
                                        <td id="sutotal-cart"> $'.$total_product_price.'</td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Shipping</th>
                                        <td>FREE</td>
                                        </tr>
                                        <tr>
                                        
                                        <tr>
                                        <th scope="row">Total</th>
                                        <td id="total-cart"> $'.$total_product_price.'</td>
                                        </tr>
                                    </tbody>
                                  </table>
                                <a class="btn btn-danger" href="../checkout">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                        
                    ';

                    }
                    ?>
                    

                </div>

            </div>
        </div>
        <!--end-Cart Section-->

        <script>
            $(document).ready(function () {
                //quantity
                var quantitiy=0;
           $('.quantity-right-plus').click(function(e){
                
                // Get the field name
                var txtID = $(this).attr('name');
                
                var currentVal = parseInt($('#'+txtID).val());
        
                $('#'+txtID).val(++currentVal);
                
            });
        
            $('.quantity-left-minus').click(function(e){
                // Get the field name
                var txtID = $(this).attr('name');
                
                var currentVal = parseInt($('#'+txtID).val());
        
                if(currentVal > 0)
                $('#'+txtID).val(--currentVal);
            });
        
            });
        </script>

    </div>
    <!-- End Body Template !! ------------------------------------------------------- -->

    <div class="overlay" id="overlay">
        <div class="item-popup">
            <div class="row">
                <div class="col-md-3">
                    <div class="item-img">
                        <img src="../products/AAA001/AA1.jpg" alt="" class="" style="height: 150px; width: 150px;">
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="name-product-popup">
                                Filorga | Time-Filler 5xp Correction Cream All Types of Wrinkles
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="item-img">
                        <h3>Are you sure you want to remove this item from shopping cart ? </h3>
                    </div>
                </div>
                <div class="col-md-4" style="display: flex">
                    <div class="confirm-btn mr-2">
                        <button class="btn btn-danger" name="popup-btn" id="remove-from-cart" data-id="AAA001">Remove</button>
                    </div>
                    <div class="cancel-btn">
                        <button class="btn btn-primary" name="popup-btn" id="cancel-remove">Cancel</button>
                    </div>
                </div>
                
            </div>
        </div>
        <!--<div class="lds-dual-ring"></div>-->
    </div>
        </div>

    
        
    <!-- Footer Template !! -->
    <div class="container body-content">

        <hr />
        

    </div>

    <footer>
        <?php echo $footer; ?>

    </footer>

    <!-- End Footer Template !! -->

</body>

</html>