$(document).ready(function () {
    

    function getStoreItem(type1){
            var products_test = 'hello';
            $.ajax({
            type: "POST",
            url: "../php/productsFilter.php",
            data: {action : type1}, 
            cache: false,
            async : false,
                success: function(d){
                    products_test = jQuery.parseJSON(d);
                    //console.log(products_test); 
                },complete: function() {
                    //return products_test;
                }
            }).done(function(data, textStatus, jqXHR){                        
        }); 
        //console.log(products_test);         
        return products_test;         
    }






    var latestOffers = $('#latestOffers');
    var products = getStoreItem('latestOffer');
    

            for (var i = 0; i < products.length; i++) {

                var ifsale = ``;
                
                if(products[i].newPrice != 0){
                    ifsale = `<p class="old-price">${products[i].oldPrice} $</p>
                    <p class="new-price">${products[i].newPrice}  $</p>`;
                }
                else {
                    ifsale = `<p class="new-price">${products[i].oldPrice}  $</p>`;
                }

                latestOffers.append(`
                <div class="col-md-3 product-col">

			<div class="product-card">

			<div class="product-img-container" style="text-align: center;">


			<img src="${products[i].image}" height="160" width="150">
			<div class="details-bg">
			<div class="details-text"><a class="product-link" href="../product/index.php?prodId=${products[i].product_id}">More Details</a></div>
			</div>
			</div>
			
			<!--Product Title-->
			<div class="product-title-div">
			<h2 class="product-title">${products[i].title}</h2>
			</div>
			<!--Product Price-->
			<div class="product-Price">
                ${ifsale}
            </div>

			<a class="btn btn-outline-success addToCart" data-id="${products[i].product_id}">
			<i class="fa-regular fa-cart-plus"></i>
			&nbsp;Add to cart
			</a>
			</div>
			</div>`);
            }

});