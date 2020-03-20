<script type="text/javascript">
    jQuery(function(){
        var div = jQuery("#burger-menu-click"), div = jQuery("#nav-mobile-container"), div = jQuery(".close-menu-mobile");
        jQuery("#burger-menu-click").click(function(){
            jQuery("#burger-menu-click").toggleClass ("no-content");
            jQuery("#nav-mobile-container").toggleClass ("no-content");
            jQuery(".close-menu-mobile").toggleClass ("no-content");
        });
        jQuery(".close-menu-mobile").click(function(){
            jQuery("#burger-menu-click").toggleClass ("no-content");
            jQuery("#nav-mobile-container").toggleClass ("no-content");
            jQuery(".close-menu-mobile").toggleClass ("no-content");
        });
    });
</script>
