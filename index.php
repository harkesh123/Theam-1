<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Konado_Theme
 * @since Konado 1.0
 */

$konado_opt = get_option( 'konado_opt' );

get_header();

$konado_blogstyle = Konado_Class::konado_show_style_blog();


$konado_bloglayout = 'sidebar';

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
		Konado_Class::konado_post_thumbnail_size('konado-category-thumb');
		break;
	case 'grid':
		$konado_blogclass = 'grid';
		$konado_blogcolclass = 9;
		Konado_Class::konado_post_thumbnail_size('konado-category-thumb');
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

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
							
							<?php get_template_part( 'content', get_post_format() ); ?>
							
						<?php endwhile; ?> 
						<div class="pagination">
							<?php Konado_Class::konado_pagination(); ?>
						</div>
					<?php else : ?>

						<article id="post-0" class="post no-results not-found">

						<?php if ( current_user_can( 'edit_posts' ) ) :
							// Show a different message to a logged-in user who can add posts.
						?>
							<header class="entry-header">
								<h1 class="entry-title"><?php esc_html_e( 'No posts to display', 'konado' ); ?></h1>
							</header>

							<div class="entry-content">
								<p><?php printf( wp_kses(__( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'konado' ), array('a'=>array('href'=>array()))), admin_url( 'post-new.php' ) ); ?></p>
							</div><!-- .entry-content -->

						<?php else :
							// Show the default message to everyone else.
						?>
							<header class="entry-header">
								<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'konado' ); ?></h1>
							</header>

							<div class="entry-content">
								<p><?php esc_html_e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'konado' ); ?></p>
								<?php get_search_form(); ?>
							</div><!-- .entry-content -->
						<?php endif; // end current_user_can() check ?>

						</article><!-- #post-0 -->

					<?php endif; // end have_posts() check ?>
				</div> 
			</div>
			<?php if( $konado_blogsidebar=='right') : ?>
				<?php get_sidebar(); ?>
			<?php endif; ?>
		</div>
	</div> 
</div>
<?php get_footer(); ?>