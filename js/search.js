

	
$(document).ready(function(){

	var brandsCat = $('input[name=brands_box]');
	var genCatogry = $('input[name=gen-category]');
	var genRadio = '';
	var categoryFilter = $('input[name=category-3]');
	var checkboxarr = [];
	var categoryArr = [];
	/////////
	var latestOffers = $('#storeProducts');
	var searchBol = false;

	var products;
	var $loading = $('#overlay').hide();

	var page = 0;

	var genVal = '';


	if(localStorage.getItem("genVal") != null){
		genVal = localStorage.getItem("genVal");
		$('#exampleRadios'+(parseInt(genVal)-1)).prop('checked', true);
	}

	



	
	//$('#category-primary').multiselect();
	

	if (localStorage.getItem("pageNo") != null) {
		page = localStorage.getItem('pageNo');
	}



	if(searchBol == false){
		 products = getSearchItem();
		 displayItem();
		 
	}

	function trueSearch(){
		 products = getSearchItem();
		 displayItem();
		 
	}

	
	
    
    ////////

	


	genCatogry.change(function(){
		genRadio = $(this).val()
		if($(this).is(':checked')){
			genVal = $(this).val()
			localStorage.setItem('genVal',genVal);
		} 
		else{
			genVal = '';
			localStorage.setItem('genVal',genVal);
		}
		//console.log(genVal);

	});

	$('#clear').click(function(){
		genCatogry.prop('checked',false);
		genVal = '';
		localStorage.setItem("genVal", '');
	});

	brandsCat.change(function(){

		var data_id = $(this).val();
		if ($(this).is(':checked')) {
			checkboxarr.push(data_id);
			//console.log(checkboxarr);
		}
		else{
			checkboxarr.splice( $.inArray(data_id, checkboxarr), 1 );
			//console.log(checkboxarr);
		}
	
	});

	categoryFilter.change(function(){
		var data_id = $(this).val();
		if ($(this).is(':checked')) {
			categoryArr.push(data_id);
			//console.log(checkboxarr);
		}
		else{
			categoryArr.splice( $.inArray(data_id, categoryArr), 1 );
			//console.log(checkboxarr);
		}
		
	});

	

	function getSearchItem(){
		var brands_id = JSON.stringify(checkboxarr);
		var category = JSON.stringify(categoryArr);
		var gen_id = genVal;
		//console.log(gen_id);
		//console.log(brands_id);
		var action = 'searchFilter';
		var products_test = '';
		$.ajax({
			type: "POST",
	        url: "../php/productsFilter.php",
	        data: {action : action, brands : brands_id, gen_cat : gen_id, category : category}, 
	        cache: false,
	        async : false,
			beforeSend: function() {
				$loading.show();
			},
	        success: function(d){
	           products_test = jQuery.parseJSON(d);
	           //console.log(products_test);
			   $loading.hide();
			   
	            
	        },
			complete: function() {
	                    
	        }
		});
		return products_test;
	}



	$('#filter-btn').click(function(){
		page = 0;
		localStorage.setItem('pageNo', page);
		trueSearch();
		setPages();
	});







	///////////////////////////////////////////////////////////////////////////////////


	/*function getStoreItem(type1){
            
			
            $.ajax({
            type: "POST",
            url: "../php/productsFilter.php",
            data: {action : type1}, 
            cache: false,
            async : false,
				beforeSend: function() {
					$loading.show();
				},
                success: function(d){
                    products_test = jQuery.parseJSON(d);
					$loading.hide();
                    //console.log(products_test); 
                },complete: function() {
                    //return products_test;
                }
            }).done(function(data, textStatus, jqXHR){                        
        }); 
        //console.log(products_test);         
        return products_test;         
    }*/




    

    function displayItem(){
    	var htmlContent = '';
		var i = page *12;
		var j = 0;
    	for (i; i < products.length; i++) {
			

			if(products[i].newPrice != 0 ){
				ifsale = `<p class="old-price">${products[i].oldPrice} $</p>
				<p class="new-price">${products[i].newPrice}  $</p>`;
			}
			else {
				ifsale = `<p class="new-price">${products[i].oldPrice}  $</p>`;
			}

	    	htmlContent += (`
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
			
			if(++j == 12){
				break;
			}
	    }
		var pages = products[0];

		localStorage.setItem('pages',pages);
		

	    latestOffers.html(htmlContent);
	}




	// ---------------- Pagination V2 --------------------//
	setPages();
	function setPages(){
		var pages = Math.ceil(products.length / 12);

		localStorage.setItem('pages',pages);

		var page_list = '<li class="page-item disabled" id="first-page" name="pages" data-id="0">\
			<a class="page-link" tabindex="-1">&laquo;</a>\
			</li>';
		var page_num = 0;
		var j = page;

		var loop = parseInt(j) + 6;
		
		if(j - pages > 0){
			loop = j - pages;
		}
		if(page > 0 && page < 2){
			loop = parseInt(j) + 5;
			page_list += '<li class="page-item" name="pages" data-id="'+(parseInt(j)-1)+'">\
			<a class="page-link">'+(parseInt(j))+'</a>\
			</li>';
		}
		if(page > 1){
			loop = parseInt(j) + 4;
			page_list += '<li class="page-item" name="pages" data-id="'+(parseInt(j)-2)+'">\
			<a class="page-link">'+(parseInt(j)-1)+'</a>\
			</li>';
			page_list += '<li class="page-item" name="pages" data-id="'+(parseInt(j)-1)+'">\
			<a class="page-link">'+(parseInt(j))+'</a>\
			</li>';
		}
		for(j; j < loop; j++){

			
			if(page > (pages-6)){
				loop = pages;
			}
			
			if(page == j){
				page_list += '<li class="page-item active" name="pages" data-id="'+j+'">\
				<a class="page-link">'+(parseInt(j)+1)+'</a>\
				</li>';
			}
			else{
				page_list += '<li class="page-item" name="pages" data-id="'+j+'">\
				<a class="page-link">'+(parseInt(j)+1)+'</a>\
				</li>';
			}
			page_num++;
		}
		page_list += '<li class="page-item" name="pages" data-id="'+(parseInt(pages)-1)+'">\
		<a class="page-link">&raquo;</a>\
		</li>';
		$('#page-list').html(page_list);
	}
	


	$(document).on('click', 'li[name=pages]', function(){
		//Your code
		$('li[name=pages]').removeClass('active');
		$(this).addClass('active');
		page = $(this).attr('data-id');
		//console.log(page);
		//products = getStoreItem('noFilter');
		
		localStorage.setItem('pageNo', page);
		
		displayItem();
		setPages();
		
	});

	/*$('li[name=pages]').click(function(){
		
	});*/


	// -------------- END pagination V2 ------------------//

});

