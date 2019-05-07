<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Konado_Theme
 * @since Konado 1.0
 */

$konado_opt = get_option( 'konado_opt' );

get_header();

$konado_blogstyle = Konado_Class::konado_show_style_blog();

$konado_bloglayout = 'nosidebar';
if(isset($konado_opt['blog_layout']) && $konado_opt['blog_layout']!=''){
	$konado_bloglayout = $konado_opt['blog_layout'];
}
if(isset($_GET['layout']) && $_GET['layout']!=''){
	$konado_bloglayout = $_GET['layout'];
}
$konado_blogsidebar = 'right';
if(isset($konado_opt['sidebarblog_pos']) && $konado_opt['sidebarblog_pos']!=''){
	$konado_blogsidebar = $konado_opt['sidebarblog_pos'];
}
if(isset($_GET['sidebar']) && $_GET['sidebar']!=''){
	$konado_blogsidebar = $_GET['sidebar'];
}
switch($konado_bloglayout) {
	case 'sidebar':
		$konado_blogclass = 'blog-sidebar';
		$konado_blogcolclass = 9;
		break;
	default:
		$konado_blogclass = 'blog-nosidebar'; //for both fullwidth and no sidebar
		$konado_blogcolclass = 12;
		$konado_blogsidebar = 'none';
}
 
?>
<div class="main-container page-wrapper">
	<div class="title-breadcrumb">
		<div class="container">
			<div class="title-breadcrumb-inner"> 
				<header class="entry-header title-blog">
					<h1 class="entry-title"><?php if(isset($konado_opt['blog_header_text']) && ($konado_opt['blog_header_text'] !='')) { echo esc_html($konado_opt['blog_header_text']); } else{ esc_html_e('Blog', 'konado');}  ?></h1>
				</header> 
				<?php Konado_Class::konado_breadcrumb(); ?>
			</div>
		</div>
		
	</div>
	<div class="container">
		<div class="row">

			<?php
			$customsidebar = get_post_meta( $post->ID, '_konado_custom_sidebar', true );
			$customsidebar_pos = get_post_meta( $post->ID, '_konado_custom_sidebar_pos', true );

			if($customsidebar != ''){
				if($customsidebar_pos == 'left' && is_active_sidebar( $customsidebar ) ) {
					echo '<div id="secondary" class="col col-lg-3"><div class="sidebar-inner">';
						dynamic_sidebar( $customsidebar );
					echo '</div></div>';
				} 
			} else {
				if($konado_blogsidebar=='left') {
					get_sidebar();
				}
			} ?>
			
			<div class="col-12 <?php echo 'col-lg-'.esc_attr($konado_blogcolclass); ?>">
				<div class="page-content blog-page single <?php echo esc_attr($konado_blogclass.' '.$konado_blogstyle); if($konado_blogsidebar=='left') {echo ' left-sidebar'; } if($konado_blogsidebar=='right') {echo ' right-sidebar'; } ?>">
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content', get_post_format() ); ?>

						<?php comments_template( '', true ); ?>
						
						<!--<nav class="nav-single">
							<h3 class="assistive-text"><?php esc_html_e( 'Post navigation', 'konado' ); ?></h3>
							<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'konado' ) . '</span> %title' ); ?></span>
							<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'konado' ) . '</span>' ); ?></span>
						</nav><!-- .nav-single -->
						
					<?php endwhile; // end of the loop. ?>
				</div>
			</div>
			<?php
			if($customsidebar != ''){
				if($customsidebar_pos == 'right' && is_active_sidebar( $customsidebar ) ) {
					echo '<div id="secondary" class="col-12 col-md-3">';
						dynamic_sidebar( $customsidebar );
					echo '</div>';
				} 
			} else {
				if($konado_blogsidebar=='right') {
					get_sidebar();
				}
			} ?>
		</div>
	</div> 
</div>

<?php get_footer(); ?>