<?php
/**
 * The template for displaying Author Archive pages
 *
 * Used to display archive-type pages for posts by an author.
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

						<?php
							/* Queue the first post, that way we know
							 * what author we're dealing with (if that is the case).
							 *
							 * We reset this later so we can run the loop
							 * properly with a call to rewind_posts().
							 */
							the_post();
						?>

						<header class="archive-header">
							<h1 class="archive-title"><?php printf( __( 'Author Archives: %s', 'konado' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
						</header><!-- .archive-header -->

						<?php
							/* Since we called the_post() above, we need to
							 * rewind the loop back to the beginning that way
							 * we can run the loop properly, in full.
							 */
							rewind_posts();
						?>

						<?php
						// If a user has filled out their description, show a bio on their entries.
						if ( get_the_author_meta( 'description' ) ) : ?>
						<div class="author-info archives">
							<div class="author-avatar">
								<?php
								/**
								 * Filter the author bio avatar size.
								 *
								 * @since Konado 1.0
								 *
								 * @param int $size The height and width of the avatar in pixels.
								 */
								$author_bio_avatar_size = apply_filters( 'konado_author_bio_avatar_size', 68 );
								echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
								?>
							</div><!-- .author-avatar -->
							<div class="author-description">
								<h2><?php printf( __( 'About %s', 'konado' ), get_the_author() ); ?></h2>
								<p><?php the_author_meta( 'description' ); ?></p>
							</div><!-- .author-description	-->
						</div><!-- .author-info -->
						
						<?php endif; ?>

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content', get_post_format() ); ?>
						<?php endwhile; ?> 
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