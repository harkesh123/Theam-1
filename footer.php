<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Konado_Theme
 * @since Konado 1.0
 */
 
$konado_opt = get_option( 'konado_opt' );
?>
			<?php if(isset($konado_opt['footer_layout']) && $konado_opt['footer_layout']!=''){
				$footer_class = str_replace(' ', '-', strtolower($konado_opt['footer_layout']));
			} else {
				$footer_class = '';
			} ?>

			<div class="footer <?php echo esc_attr($footer_class);?>">
				<?php
				if ( isset($konado_opt['footer_layout']) && $konado_opt['footer_layout']!="" ) {

					$jscomposer_templates_args = array(
						'orderby'          => 'title',
						'order'            => 'ASC',
						'post_type'        => 'templatera',
						'post_status'      => 'publish',
						'posts_per_page'   => 30,
					);
					$jscomposer_templates = get_posts( $jscomposer_templates_args );

					if(count($jscomposer_templates) > 0) {
						foreach($jscomposer_templates as $jscomposer_template){
							if($jscomposer_template->post_title == $konado_opt['footer_layout']){
								echo do_shortcode($jscomposer_template->post_content);
							}
						}
					}
				} else { ?>
					<div class="widget-copyright default-copyright">
						<?php esc_html_e( "Copyright", 'konado' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ) ?>"> <?php echo get_bloginfo('name') ?></a> <?php echo date('Y') ?>. <?php esc_html_e( "All Rights Reserved", 'konado' ); ?>
					</div>
				<?php
				}
				?>
			</div>
		</div><!-- .page -->
	</div><!-- .wrapper -->
	<!--<div class="konado_loading"></div>-->
	<?php if ( isset($konado_opt['back_to_top']) && $konado_opt['back_to_top'] ) { ?>
	<div id="back-top" class="hidden-xs hidden-sm hidden-md"></div>
	<?php } ?>
	<?php wp_footer(); ?> 
</body>
</html>