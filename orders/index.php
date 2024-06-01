<?php 
include '../php/getSearchFilter.php';
include '../header.php';

$sql_get_orders = "SELECT * FROM orders WHERE user_id = $user_id";
$result_get_orders = mysqli_query($db,$sql_get_orders);

$product_id = array();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content=" Online Store, Buy, E-Commerce" name="keywords">
    <meta content=" Online Store, Buy, E-Commerce" name="description">

    <title>Store Name</title>

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
    <link href="../css/store.css" rel="stylesheet" />
    <link href="../css/orders.css" rel="stylesheet" />
    
    <!--<script src="../js/latestOffers.js"></script>-->

    <script src="../js/product.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/navMenu.js"></script>
    <script src="../js/backToTop.js"></script>
    
    <script src="../js/store.js"></script>
	<script src="../js/jquery.js"></script>
	<script src="../js/search.js"></script>
    <script src="../js/pagination.js"></script>
    <script src="../js/orders.js"></script>
    

    <!-- End-Main Assets -->

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

    <script>
    $( function() {
      $( "#slider-range" ).slider({
        range: true,
        min: 0,
        max: 5000,
        values: [ 0, 5000 ],
        slide: function( event, ui ) {
          $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        }
      });
      $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
        " - $" + $( "#slider-range" ).slider( "values", 1 ) );
    } );
    </script>
    <style>
        .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .ui-button, html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:active {
    border: 1px solid #c5c5c5;
    background: var(--gray);
    font-weight: normal;
    color: var(--gray);
}
    </style>

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



    <!-- Body Template !! ------------------------------------------------------- -->
    <div class="container body-content store-container">

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <?php
                    while($row_order = mysqli_fetch_assoc($result_get_orders)){

                        $order_id = $row_order['order_num'];
                        echo '
                        <div class="col-md-12" style="align-content: center;">
                            <div class="order-div mb-3">
                                <div class="row">
                                    <div class="col-md-4" style="text-align: center;">
                                        <p>
                                            Order No. : #'.$row_order['order_num'].'
                                        </p>
                                        
                                    </div>
                                    <div class="col-md-4" style="text-align: center;">
                                        <p>
                                            Created Date : '.$row_order['order_created'].'
                                        </p>
                                        
                                    </div>
                                    <div class="col-md-4" style="text-align: center;">
                                        <p>
                                            Total : $'.$row_order['volume'].'
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4" style="text-align: center;">
                                        <p>Order Status : PROCESSING</p>
                                    </div>
                                    <div class="col-md-4">
                                        
                                    </div>
                                    <div class="col-md-4" style="text-align: center;">
                                        <a href="#" class="Links" name="order-det" data-id="'.$row_order['order_num'].'">See Details</a>
                                    </div>
                                    
                                </div>';

                                echo '<div class="hidden-order" id="div-'.$row_order['order_num'].'">
                                <hr />
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Product Name</th>
                                                        <th>Quantity</th>
                                                        <th>Price/piece</th>
                                                        <th>Total Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>';

                            $sql_deta = "SELECT * FROM orders_det det 
                            INNER JOIN products prd 
                            ON det.product_id = prd.product_id 
                            AND det.order_num = $order_id; ";
                            $result_deta = mysqli_query($db,$sql_deta);
                            while($row_deta = mysqli_fetch_assoc($result_deta)){
                                $total_price = $row_deta['price'] * $row_deta['quantity'];
                                echo '
                                <tr>
                                <td>
                                    <div class="order-img">
                                        <img class="product-order" src="../products/'.$row_deta['product_id'].'/'.$row_deta['product_id'].'.jpg" />
                                    </div>
                                </td>
                                <td>
                                    <p>
                                        '.$row_deta['product_name'].'
                                    </p>
                                </td>
                                <td>
                                    <p>
                                        '.$row_deta['quantity'].'
                                    </p>
                                </td>
                                <td>
                                    <p>
                                        $'.$row_deta['price'].'
                                    </p>
                                </td>
                                <td>
                                    $'.$total_price.'
                                </td>
                            </tr>
                                ';
                            }


                         echo '         
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        ';


                    }
                    
                    ?>
                    
                </div>
            </div>
        </div>

      
        <!--end-First Section-->

    </div>
    <!-- End Body Template !! ------------------------------------------------------- -->
    
    
    

    <div class="overlay" id="overlay">
    <div class="lds-dual-ring"></div>
    </div>


   



    


    <!-- Footer Template !! -->
   

    

    <hr />

    <footer>
    <?php echo $footer; ?>

        </footer>

        <!-- End Footer Template !! -->
    
    <script type="text/javascript">
        
    </script>
</body>

</html>