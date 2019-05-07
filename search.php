<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Konado_Theme
 * @since Konado 1.0
 */

$konado_opt = get_option( 'konado_opt' );

get_header();

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
		Konado_Class::konado_post_thumbnail_size('konado-category-thumb');
		break;
	case 'largeimage':
		$konado_blogclass = 'blog-large';
		$konado_blogcolclass = 9;
		$konado_postthumb = '';
		break;
	default:
		$konado_blogclass = 'blog-nosidebar';
		$konado_blogcolclass = 12;
		$konado_blogsidebar = 'none';
		Konado_Class::konado_post_thumbnail_size('konado-post-thumb');
}
?>
<div class="main-container">
	<div class="title-breadcrumb">
		<div class="container">
			<div class="title-breadcrumb-inner"> 
				<header class="entry-header">
					<h1 class="entry-title"><?php if(isset($konado_opt['blog_header_text']) && ($konado_opt['blog_header_text'] !='')) { echo esc_html($konado_opt['blog_header_text']); } else{ esc_html_e('Blog', 'konado');}  ?></h1>
				</header> 
				<?php Konado_Class::konado_breadcrumb(); ?>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<?php if($konado_blogsidebar=='left') : ?>
				<?php get_sidebar(); ?>
			<?php endif; ?>
			
			<div class="col-12 <?php if ( is_active_sidebar( 'sidebar-1' ) ) { echo 'col-lg-'.esc_attr($konado_blogcolclass);} ?>">
			
				<div class="page-content blog-page <?php echo esc_attr($konado_blogclass); if($konado_blogsidebar=='left') {echo ' left-sidebar'; } if($konado_blogsidebar=='right') {echo ' right-sidebar'; } ?>">
					<?php if ( have_posts() ) : ?>
						
						<header class="archive-header">
							<h1 class="archive-title"><?php printf( wp_kses(__( 'Search Results for: %s', 'konado' ), array('span'=>array())), '<span>' . get_search_query() . '</span>' ); ?></h1>
						</header><!-- .archive-header -->

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content', get_post_format() ); ?>
						<?php endwhile; ?> 
						<div class="pagination">
							<?php Konado_Class::konado_pagination(); ?>
						</div>
					<?php else : ?>

						<article id="post-0" class="post no-results not-found">
							<header class="entry-header">
								<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'konado' ); ?></h1>
							</header>

							<div class="entry-content">
								<p><?php esc_html_e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'konado' ); ?></p>
								<?php get_search_form(); ?>
							</div><!-- .entry-content -->
						</article><!-- #post-0 -->

					<?php endif; ?>
				</div>
				
			</div>
			<?php if( $konado_blogsidebar=='right') : ?>
				<?php get_sidebar(); ?>
			<?php endif; ?>
		</div>
		
	</div>
</div>
<?php get_footer(); ?>