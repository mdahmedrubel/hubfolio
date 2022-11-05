<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Hubfolio
 */

get_header();
?>
<div class="container">
	<div class="row">
		<section class="no-thingfound">
			<h6 class="none-title"><?php esc_html_e( 'Oops! (404) That page can&rsquo;t be found.', 'hubfolio' ); ?></h6>
			<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'hubfolio' ); ?></p>
			<p class="searchf">
				<?php
					get_search_form();
				?>
			</p>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back To Home', 'hubfolio' ); ?></a>
		</section><!-- .no-results -->
	</div>
</div>
<?php
get_footer();


