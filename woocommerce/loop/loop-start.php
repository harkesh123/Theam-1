<?php
/**
 * Product Loop Start
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

global $wp_query, $woocommerce_loop;

$konado_opt = get_option( 'konado_opt' );

$shoplayout = 'sidebar';
if(isset($konado_opt['shop_layout']) && $konado_opt['shop_layout']!=''){
	$shoplayout = $konado_opt['shop_layout'];
}
if(isset($_GET['layout']) && $_GET['layout']!=''){
	$shoplayout = $_GET['layout'];
}
$shopsidebar = 'left';
if(isset($konado_opt['sidebarshop_pos']) && $konado_opt['sidebarshop_pos']!=''){
	$shopsidebar = $konado_opt['sidebarshop_pos'];
}
if(isset($_GET['sidebar']) && $_GET['sidebar']!=''){
	$shopsidebar = $_GET['sidebar'];
}
switch($shoplayout) {
	case 'fullwidth':
		Konado_Class::konado_shop_class('shop-fullwidth');
		$shopcolclass = 12;
		$shopsidebar = 'none';
		$productcols = 4;
		break;
	default:
		Konado_Class::konado_shop_class('shop-sidebar');
		$shopcolclass = 9;
		$productcols = 3;
}

$konado_viewmode = Konado_Class::konado_show_view_mode();
?>
<div class="shop-products products row <?php if(is_shop()) { echo esc_attr($konado_viewmode).' '.esc_attr($shoplayout); } else {  echo esc_attr($konado_viewmode); }?>">