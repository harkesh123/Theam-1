<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Konado_Theme
 * @since Konado 1.0
 */

$konado_opt = get_option( 'konado_opt' );
 
$konado_blogsidebar = 'right';
if(isset($konado_opt['sidebarblog_pos']) && $konado_opt['sidebarblog_pos']!=''){
	$konado_blogsidebar = $konado_opt['sidebarblog_pos'];
}
if(isset($_GET['sidebar']) && $_GET['sidebar']!=''){
	$konado_blogsidebar = $_GET['sidebar'];
}
?>
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="secondary" class="col-12 col-lg-3">
		<div class="sidebar-inner sidebar-border <?php echo esc_attr($konado_blogsidebar);?>">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div>
	</div><!-- #secondary -->
<?php endif; ?>