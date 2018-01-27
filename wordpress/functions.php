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

function send_email($vTo, $vSubject, $vBody)
{
    $to      = $vTo;
    $subject = $vSubject;
    $body    = $vBody;
    $headers = array('Content-Type: text/html; charset=UTF-8');

    $ret = wp_mail( $to, $subject, $body, $headers );
    return $ret;
}

function mesToStr($mes){
	$vMes = (int) $mes;
	
	switch($vMes){
		case 1:
			return 'Janeiro';
			break;
		case 2:
			return 'Fevereiro';
			break;
		case 3:
			return 'Março';
			break;
		case 4:
			return 'Abril';
			break;
		case 5:
			return 'Maio';
			break;
		case 6:
			return 'Junho';
			break;
		case 7:
			return 'Julho';
			break;
		case 8:
			return 'Agosto';
			break;
		case 9:
			return 'Setembro';
			break;
		case 10:
			return 'Outubro';
			break;
		case 11:
			return 'Novembro';
			break;
		case 12:
			return 'Dezembro';
			break;
		default:
			return false;
			break;
	}
}