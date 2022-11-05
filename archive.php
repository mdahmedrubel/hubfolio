<?php
/**
 * The archive template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hubfolio
 */

get_header();
?>
<section class="hub-blog">
	<div class="container">
		<div class="row">

			<div class="col-lg-12 col-12 pl-lg-20">
				<div class="blogbg">
				<?php
				if ( have_posts() ) :

					if ( is_home() && ! is_front_page() ) :
						?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
						<?php
					endif;

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'archive');

					endwhile;
					?>
					<div class="paginationsbg">
						<div class="row g-0">
							<div class="col-lg-6">
								<div class="nav-previous"><?php previous_posts_link( 'Older' ); ?></div>
							</div>
							<div class="col-lg-6">
								<div class="nav-next "><?php next_posts_link( 'Newer' ); ?></div>
							</div>
						</div>
					</div>
				<?php
				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();
