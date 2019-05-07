<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, konado already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
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
$konado_blogstyle = Konado_Class::konado_show_style_blog();

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
				<header class="entry-header title-blog">
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
				<div class="page-content blog-page <?php echo esc_attr($konado_blogclass.' '.$konado_blogstyle); if($konado_blogsidebar=='left') {echo ' left-sidebar'; } if($konado_blogsidebar=='right') {echo ' right-sidebar'; } ?>">
					<?php if ( have_posts() ) : ?>
						<header class="archive-header">
							<?php
								the_archive_title( '<h1 class="archive-title">', '</h1>' );
								the_archive_description( '<div class="archive-description">', '</div>' );
							?>
						</header>

						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/* Include the post format-specific template for the content. If you want to
							 * this in a child theme then include a file called called content-___.php
							 * (where ___ is the post format) and that will be used instead.
							 */
							get_template_part( 'content', get_post_format() );

						endwhile;
						?> 
					<div class="pagination">
						<?php Konado_Class::konado_pagination(); ?>
					</div>	
					<?php else : ?>
						<?php get_template_part( 'content', 'none' ); ?>
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