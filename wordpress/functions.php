<?php
// Plugins: Simple Fields, Better Font Awesome, Regenerate Thumbnails, Custom Post Type UI
define("URL_IMG_NO_IMAGE", get_bloginfo('template_url') . "/img/no_image.jpg");

add_theme_support( 'post-thumbnails' );
add_image_size( 'ijus-home-galeria-thumb', 650, 350, true );

add_filter( 'wp_image_editors', 'change_graphic_lib' );
function change_graphic_lib($array)
{
    return array('WP_Image_Editor_GD', 'WP_Image_Editor_Imagick');
}

function get_image_id($image_url)
{
    global $wpdb;
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url));
    return $attachment[0];
}
