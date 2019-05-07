<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

$konado_opt = get_option( 'konado_opt' );

$konado_viewmode = Konado_Class::konado_show_view_mode();
$konado_products_count = Konado_Class::konado_products_count();

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;
 

// Extra post classes
$classes = array();

$count   = $product->get_rating_count();

$konado_shopclass = Konado_Class::konado_shop_class('');

$colwidth = 3;

if($konado_shopclass=='shop-fullwidth') {
	if(isset($konado_opt)){
		$woocommerce_loop['columns'] = $konado_opt['product_per_row_fw'];
		if($woocommerce_loop['columns'] > 0){
			$colwidth = round(12/$woocommerce_loop['columns']);
		}
	}
	$classes[] = ' item-col col-12 col-sm-6 col-md-4 col-lg-3 col-xl-'.$colwidth ;
} else {
	if(isset($konado_opt)){
		$woocommerce_loop['columns'] = $konado_opt['product_per_row'];
		if($woocommerce_loop['columns'] > 0){
			$colwidth = round(12/$woocommerce_loop['columns']);
		}
	}
	$classes[] = ' item-col col-12 col-sm-6 col-md-4 col-xl-'.$colwidth ;
}
?>

 

<div <?php post_class( $classes ); ?>>
	<div class="product-wrapper">
		
		<div class="list-col4 <?php if($konado_viewmode=='list-view'){ echo ' col-12 col-md-4';} ?>">
			<div class="product-image">
				<?php if ( $product->get_type() !="grouped" ) : ?>
					<?php if ( $product->is_on_sale() ) : ?> 
						<?php if($product->get_type()=="variable") {
							$salep = $product->get_variation_regular_price() - $product->get_variation_sale_price();
							$salepercent = round(($salep*100)/($product->get_variation_regular_price()));
							echo '<span class="onsale"><span class="sale-percent">-'.$salepercent.'%</span></span>';
						}
						elseif ( $product->get_price() > 0 ) {
							$salep = $product->get_regular_price() - $product->get_price();
							$salepercent = round(($salep*100)/($product->get_regular_price()));
							echo '<span class="onsale"> <span class="sale-percent">-'.$salepercent.'%</span></span>';
						} ?>
					<?php endif; ?> 
				<?php endif; ?> 
				<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
					<?php 
					echo wp_kses($product->get_image('shop_catalog', array('class'=>'primary_image')), array(
						'a'=>array(
							'href'=>array(),
							'title'=>array(),
							'class'=>array(),
						),
						'img'=>array(
							'src'=>array(),
							'height'=>array(),
							'width'=>array(),
							'class'=>array(),
							'alt'=>array(),
						)
					));
					
					if(isset($konado_opt['second_image'])){
						if($konado_opt['second_image']){
							$attachment_ids = $product->get_gallery_image_ids();
							if ( $attachment_ids ) {
								echo wp_get_attachment_image( $attachment_ids[0], apply_filters( 'single_product_small_thumbnail_size', 'shop_catalog' ), false, array('class'=>'secondary_image') );
							}
						}
					}
					?> 
					<span class="shadow"></span> 
				<?php do_action( 'woocommerce_after_shop_loop_item' ); ?> 
				<div class="wishlist-inner"> 
					<?php if ( class_exists( 'YITH_WCWL' ) ) {
						echo preg_replace("/<img[^>]+\>/i", " ", do_shortcode('[yith_wcwl_add_to_wishlist]'));
					} ?>
				</div>   
			</div>
		</div>
		<div class="list-col8 <?php if($konado_viewmode=='list-view'){ echo ' col-12 col-md-8';} ?>">
			<div class="gridview">
				<h2 class="product-name">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h2>  
				<?php if (wc_get_rating_html( $product->get_average_rating() )) { ?>
					<div class="ratings"><?php echo ''.wc_get_rating_html( $product->get_average_rating() ); ?></div>
				<?php } ?> 
				<div class="price-box"><?php echo ''.$product->get_price_html(); ?></div>  
				 
				<div class="box-hover">   
					<ul class="add-to-links">
						<li class="add-to-cart">
							<?php echo do_shortcode('[add_to_cart id="'.$product->get_id().'"]') ?>
						</li>  
						<li class="compare-inner">
							<?php if( class_exists( 'YITH_Woocompare' ) ) {
								echo do_shortcode('[yith_compare_button]');
							} ?>
						</li>
						<?php if ( isset($konado_opt['quickview']) && $konado_opt['quickview'] ) { ?>
							<li class="quickview-inner">
								<div class="quickviewbtn">
									<a class="detail-link quickview" data-quick-id="<?php the_ID();?>" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo esc_html($konado_opt['detail_link_text']);?></a>
								</div>
							</li>
						<?php } ?>     
					</ul> 
				</div>
			</div>
			<div class="listview"> 
				<div class="row">
					<div class="col-sm-9">
						<h2 class="product-name">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h2>  
						<?php if (wc_get_rating_html( $product->get_average_rating() )) { ?>
							<div class="ratings"><?php echo ''.wc_get_rating_html( $product->get_average_rating() ); ?></div>
						<?php } ?>
						<div class="price-box"><?php echo ''.$product->get_price_html(); ?></div>
						<?php if($product->get_sku()!= '') {echo '<div class="sku"><label>'.esc_html__( 'Sku: ', 'konado' ) .'</label>'.$product->get_sku().'</div>';}  ?>
						<div class="product-desc"><?php the_excerpt(); ?></div> 
					</div>
					<div class="col-sm-3">
						<div class="actions"> 
							<?php if(wc_get_stock_html( $product )) { ?>
								<div class="stock-container"> <?php echo wc_get_stock_html( $product );?></div>
							<?php } ?> 
							<div class="add-to-cart">
								<?php echo do_shortcode('[add_to_cart id="'.$product->get_id().'"]') ?>
							</div>
							<div class="compare-inner">
								<?php if( class_exists( 'YITH_Woocompare' ) ) {
									echo do_shortcode('[yith_compare_button]');
								} ?>
							</div> 
						</div> 
					</div>
				</div>  
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
 