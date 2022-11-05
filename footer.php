<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hubfolio
 */

?>
<footer>
	<div class="site-footer">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="social-share">
						<ul>
						 	<li><a href="<?php esc_url(the_field('socialone', 'option')); ?>"><i class="fa-brands fa-facebook-f"></i></a></li>
						 	<li><a href="<?php esc_url(the_field('socialtwo', 'option')); ?>"><i class="fa-brands fa-twitter"></i></a></li>
						 	<li><a href="<?php esc_url(the_field('socialthree', 'option')); ?>"><i class="fa-brands fa-instagram-square"></i></a></li>
						 	<li><a href="<?php esc_url(the_field('socialfour', 'option')); ?>"><i class="fa-brands fa-linkedin-in"></i></a></li>
						 	<li><a href="<?php esc_url(the_field('socialfive', 'option')); ?>"><i class="fa-brands fa-dribbble"></i></a></li>
					
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php
 wp_footer(); 
?>
</body>
</html>
