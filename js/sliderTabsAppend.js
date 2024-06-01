        function getproduct(type1){
            var products_test = 'hello';
            $.ajax({
            type: "POST",
            url: "../php/getItem.php",
            data: {action : type1}, 
            cache: false,
            async : false,
                success: function(d){
                    products_test = jQuery.parseJSON(d);
                },complete: function() {
                    return products_test;
                }
            }).done(function(data, textStatus, jqXHR){
                      //  console.log(data);
                       // console.log(jqXHR.responseText);
                        
            });
            

           return products_test;
            
        }

        

            var newArrival = $('#newArrival');
            var bestSale = $('#bestSale');
            var featuredProducts = $('#featuredProducts');

            var products_arrive = getproduct('newArrive');
            var products_sale = getproduct('bestSale');
           // console.log(products);

            const products1 = [
                {
                    image: 'https://images.pexels.com/photos/90946/pexels-photo-90946.jpeg',
                    title: 'IWC Watch',
                    oldPrice: '18.99 $',
                    newPrice: '12.99 $'
                },
                {
                    image: 'https://apollo-singapore.akamaized.net/v1/files/wczxzsbshcta3-IN/image',
                    title: 'IWC Watch',
                    oldPrice: '19.99 $',
                    newPrice: '12.99 $'
                },
                {
                    image: 'https://cdn.ttgtmedia.com/rms/onlineimages/hp_elitebook_mobile.jpg',
                    title: 'IWC Watch',
                    oldPrice: '11.99 $',
                    newPrice: '12.99 $'
                },
                {
                    image: 'https://cdn.anscommerce.com/catalog/brandstore/johnson/17_7_20/Sale.jpg',
                    title: 'IWC Watch',
                    oldPrice: '19.99 $',
                    newPrice: '15.99 $'
                }
            ];

            for (var i = 0; i < products_arrive.length; i++) {
                var ifsale = ``;
                
                if(products_arrive[i].newPrice != 0){
                    ifsale_arrive = `<p class="old-price">${products_arrive[i].oldPrice} $</p>
                    <p class="new-price">${products_arrive[i].newPrice}  $</p>`;
                }
                else {
                    ifsale_arrive = `<p class="new-price">${products_arrive[i].oldPrice}  $</p>`;
                }

                

                newArrival.append(`<div class="col-lg-12">
                     <div class="product-card">

                            <div class="product-img-container">



                                <img src="${products_arrive[i].image}" alt="Avatar" class="product-image">
                                <div class="details-bg">
                                    <div class="details-text"><a class="product-link" href="../product/index.php?prodId=${products_arrive[i].product_id}">More Details</a></div>
                                </div>
                            </div>
                            <!--Product Title-->
                            <div class="product-title-div">
                            <h2 class="product-title">${products_arrive[i].title}</h2>
                            </div>

                            <!--Product Rate-->
                            

                            <!--Product Price-->
                            <div class="product-Price">
                                ${ifsale_arrive}
                            </div>

                            <a class="btn btn-outline-success addToCart" data-id="${products_arrive[i].product_id}">
                                <i class="fa-regular fa-cart-plus"></i>
                                &nbsp;Add to cart
                            </a>
            </div></div>
            `);

            }

            for (var i = 0; i < products_sale.length; i++) {

                if(products_sale[i].newPrice != 0){
                    ifsale_sale = `<p class="old-price">${products_sale[i].oldPrice} $</p>
                    <p class="new-price">${products_sale[i].newPrice}  $</p>`;
                }
                else {
                    ifsale_sale = `<p class="new-price">${products_sale[i].oldPrice}  $</p>`;
                }

                bestSale.append(`<div class="col-lg-12">
                <div class="product-card">

                            <div class="product-img-container">


                                

                                <img src="${products_sale[i].image}" alt="Avatar" class="product-image">
                                <div class="details-bg">
                                    <div class="details-text"><a class="product-link" href="../product/index.php?prodId=${products_sale[i].product_id}">More Details</a></div>
                                </div>
                            </div>
                            <!--Product Title-->
                            <h2 class="product-title">${products_sale[i].title}</h2>


                            <!--Product Rate-->
                            

                            <!--Product Price-->
                            <div class="product-Price">
                                ${ifsale_sale}
                            </div>

                            <a class="btn btn-outline-success addToCart" data-id="${products_sale[i].product_id}">
                                <i class="fa-regular fa-cart-plus"></i>
                                &nbsp;Add to cart
                            </a>
                </div></div>
                `);
            }

            for (var i = 0; i < products_sale.length; i++) {

                
                if(products_sale[i].newPrice != 0){
                    ifsale_sale = `<p class="old-price">${products_sale[i].oldPrice} $</p>
                    <p class="new-price">${products_sale[i].newPrice}  $</p>`;
                }
                else {
                    ifsale_sale = `<p class="new-price">${products_sale[i].oldPrice}  $</p>`;
                }

                featuredProducts.append(`<div class="col-lg-12">
                <div class="product-card">

                            <div class="product-img-container">


                                

                                <img src="${products_sale[i].image}" alt="Avatar" class="product-image">
                                <div class="details-bg">
                                    <div class="details-text"><a class="product-link" href="../product/index.php?prodId=${products_sale[i].product_id}">More Details</a></div>
                                </div>
                            </div>
                            <!--Product Title-->
                            <h2 class="product-title">${products_sale[i].title}</h2>


                            <!--Product Rate-->
                            

                            <!--Product Price-->
                            <div class="product-Price">
                               ${ifsale_sale}
                            </div>

                            <a class="btn btn-outline-success addToCart" data-id="${products_sale[i].product_id}">
                                <i class="fa-regular fa-cart-plus"></i>
                                &nbsp;Add to cart
                            </a>
                </div></div>
                `);

            }


            // Initialize the Owl Carousel
            $(document).ready(function () {

                showArrow();

                $("#slider-tabs").mouseover(function () {
                    showArrow();
                });

                $(".owl-nav").click(function () {
                    showArrow();
                });

                function showArrow() {
                    $('.owl-nav.disabled').each(function () {
                        $(this).removeClass('disabled');
                    });
                }


            });