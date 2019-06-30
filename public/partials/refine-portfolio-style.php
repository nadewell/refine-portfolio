<?php 

$filter_text_color = get_theme_mod('filter_text_color');
$filter_text_background = get_theme_mod('filter_text_background');
$image_overlay_color = get_theme_mod('image_overlay_color');

?>
<style id="refine-portfolio-style">
    .archive ul.port-filter > li{
        color: <?php echo $filter_text_color; ?>;
    }
    .archive ul.port-filter > li:hover{
        box-shadow: inset 0 -3px 0 <?php echo $filter_text_color; ?>;
    }
    .archive ul.port-filter > li.active{
        background-color: <?php echo $filter_text_background; ?>;
    }
    .archive .port-item:hover .overlay {
        background-color: <?php echo $image_overlay_color; ?>;
    }
</style>