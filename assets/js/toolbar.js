jQuery("document").ready(function(jQuery){
    
    var nav = jQuery('.toolbar-container');
    
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 136) {
            nav.addClass("f-toolbar");
        } else {
            nav.removeClass("f-toolbar");
        }
    });
 
});
