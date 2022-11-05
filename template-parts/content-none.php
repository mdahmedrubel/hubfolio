<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hubfolio
 */

?>
<section class="no-results not-found">
	<h6 class="none-title"><?php esc_html_e( 'Sorry, but no posts match your search criteria.', 'hubfolio' ); ?></h6>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back To Home Page', 'hubfolio' ); ?></a>
</section><!-- .no-results -->
