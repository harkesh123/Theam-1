<?php
/**
 * Template Name: Contact Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in konado consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Konado_Theme
 * @since Konado 1.0
 */

$konado_opt = get_option( 'konado_opt' );

get_header();
?>
<div class="main-container contact-page">
	<div class="title-breadcrumb">
		<div class="container">
			<div class="title-breadcrumb-inner"> 
				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header> 
				<?php Konado_Class::konado_breadcrumb(); ?>
			</div>
		</div>
	</div>
	<div class="page-content">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
				
				</article><!-- #post -->
			<?php endwhile; // end of the loop. ?>
	</div>
</div> 
<?php get_footer('contact'); ?>