<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Konado_Theme
 * @since Konado 1.0
 */

$konado_opt = get_option( 'konado_opt' );

get_header();

?>
	<div class="main-container error404">
		<div class="container">
			<div class="search-form-wrapper">
				<h1><?php esc_html_e( '404', 'konado' ); ?></h1>
				<h2><?php esc_html_e( "PAGE NOT BE FOUND", 'konado' ); ?></h2>
				<p class="home-link"><?php esc_html_e( "Sorry but the page you are looking for does not exist, have been removed, name changed or is temporarity unavailable.", 'konado' ); ?></p>
				<?php get_search_form(); ?>
				<a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr__( 'Back to home', 'konado' ); ?>"><?php esc_html_e( 'Back to home page', 'konado' ); ?></a>
			</div>
		</div> 
	</div>
</div>
<?php get_footer(); ?>