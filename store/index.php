<?php 
include '../php/getSearchFilter.php';
include '../header.php';

if(isset($_GET['action'])){
    if($_GET['action'] == 'clear'){
        unset($_SESSION['search_filter']);
    }
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_GET['search'])){
        $search = $_POST['search-ele'];
        $_SESSION['search_filter'] = $search;
    }
}
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
    
    <!--<script src="../js/latestOffers.js"></script>-->

    <script src="../js/product.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/navMenu.js"></script>
    <script src="../js/backToTop.js"></script>
    <script src="../js/store.js"></script>
	<script src="../js/jquery.js"></script>
	<script src="../js/search.js"></script>
    <script src="../js/pagination.js"></script>
    


    
    


    
    

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

        <!--First Section        -----------     using (first-div) css class !! -->
        <div class="section-div first-div">
            <div class="section-div row">
                <div class="col-md-3 filter-com-container">
                    <div class="filter-btn">
                        <i class="fa-regular fa-filter-list"></i>
                        <i style="display: none;" class="fa-regular fa-chevrons-left"></i>
                    </div>
                    <div class="filter-com">
                        <div class="header-div">
                    
                        <h2 class="section-header" style="font-size: 12px;">Filter Results</h2>
                        <div class="hr-header"></div>
                        
                        <hr />
                        
                        
                        <!------------ search brands -->
                        <label class="form-label select-label">Brands</label>
                        <div class="category-list mb-3">
                            <div class="checkbox-list">
                        <?php 
                            for($i = 0; $i < count($brands);$i++){
                                echo '<div class="form-check">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox'.$i.'" name="brands_box" value="'.$brands[$i]['id'].'">
                                <label class="form-check-label" for="inlineCheckbox'.$i.'">'.$brands[$i]['name'].'</label>
                                </div>';
                            }
                        ?>
                            </div>
                        </div>
                        <hr />
                        <label class="form-label select-label">Gender</label>
                        <?php
                            for($i = 0; $i < count($genCategory);$i++){
                                echo '<div class="form-check">
                                <input class="form-check-input" type="radio" name="gen-category" id="exampleRadios'.$i.'" value="'.$genCategory[$i]['id'].'">
                                <label class="form-check-label" for="exampleRadios'.$i.'">
                                    '.$genCategory[$i]['name'].'
                                </label>
                                </div>';
                            }
                        ?>
                        <a href="#" id="clear">Clear choice </a>
                    

                        <hr />
                        <label class="form-label select-label">Category</label>
                        
                           
                        <div class="category-list mb-3">
                            <div class="checkbox-list">
                                <?php
                                for($i = 0; $i< count($category) ; $i++){
                                    echo '<div class="form-check">
                                    <input class="form-check-input" name="category-3" value="'.$category[$i]['id'].'" id="category-'.$i.'" type="checkbox" />
                                    <label class="form-check-label" for="category-'.$i.'">'.$category[$i]['name'].'</label>
                                </div>';
                                }
                                ?>
                            </div>
                        </div>

                        <a class="search-btn" id="filter-btn" style="color: white;">Apply Filter</a>
                        <!---->
                    
                </div>
            </div>
        </div>



                <div class="col-md-9 search-result-com-container">
                    <div class="search-result-com">
                        
                        <div class="section-div">
                            <div class="row">
                                <?php
                                if(isset($_SESSION['search_filter']) && $_SESSION['search_filter'] != ''){
                                    echo '<p>Your Search About "<b>'.$_SESSION['search_filter'].'</b>" ... <a href="index.php?action=clear" >Clear search</a></p>';
                                }
                                ?>
                                
                            </div>
                    
                            <div id="storeProducts" class="row">
                    
                                <!-- Append Latest Offers -->
                    
                            </div>

                            <div style="text-align: center;">
                                        
                                <ul class="pagination" id="page-list">
                                    
                                    <li class="page-item disabled" id="first-page" name="pages" data-id="1">
                                        <a class="page-link" tabindex="-1">&laquo;</a>
                                    </li>
                                                                      
                                    <li class="page-item" name="pages" data-id="1">
                                        <a class="page-link">&raquo;</a>
                                    </li>
                                </ul>
                            </div>
                        </div>


                    </div>
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
    <div class="container body-content">

        <hr />
        

    </div>

    <!-- End Footer Template !! -->
    
    <script type="text/javascript">
        
    </script>
    <footer>
            <?php echo $footer; ?>

    </footer>
</body>

</html>