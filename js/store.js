$(document).ready(function(){
    var windowWidth = $(window).width();

    if(windowWidth < 767){
        $(".filter-com-container").addClass('filter-Closed');
    }else{
        $(".filter-com-container").removeClass('filter-Closed');
    }
    
    $(window).resize(function() {
        windowWidth = $(window).width();

        if(windowWidth < 767){
        $(".filter-com-container").addClass('filter-Closed');
    }else{
        $(".filter-com-container").removeClass('filter-Closed');
    }
    });

    $(".filter-btn").click(function(){

        if(windowWidth < 767){
            
            $(".filter-com-container").toggleClass('filter-Closed');

            if($(".filter-com-container").hasClass('filter-Closed')){
                $(".fa-regular.fa-chevrons-left").hide();
                $(".fa-regular.fa-filter-list").show();
            }else{
                $(".fa-regular.fa-chevrons-left").show();
                $(".fa-regular.fa-filter-list").hide();
            }
        }
    });
});