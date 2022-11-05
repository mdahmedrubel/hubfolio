<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hubfolio
 */

?>
	<div <?php post_class("blog-post"); ?>>
	<?php
	 	$blog_bg = get_the_post_thumbnail_url(get_the_ID(), "full"); 
	 	if(!empty($blog_bg)):
	?>
	<div class="blog-thumb" style="background-image: url(<?php echo esc_url($blog_bg); ?>);">,</div>
<?php endif; ?>
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="blog-text">
				<ul class="post-date">
					<li><span><?php echo get_the_date('F j, Y') ?> /</span></li>
					<li><span><?php the_category( ', ' ); ?></span></li>
				</ul>
				<a href="<?php the_permalink(); ?>">
					<h3>
                    <?php
                    $title = get_the_title();
                    $short_title = wp_trim_words( $title, 6, ' ' );
                    echo esc_html($short_title);
                    ?>
                    </h3>
                </a>
				<p>
				<?php 
                    $hu_xcerpt = get_the_excerpt();
                    $shortexcerpt = wp_trim_words($hu_xcerpt, $num_words = 45, ' ');
                    echo esc_html($shortexcerpt);
                ?> 
				</p>
				<ul class="more-btn">
					<li><a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','hubfolio'); ?><i class="fa-solid fa-arrow-right"></i></a></li>
				</ul>
				
			</div>
		</div>
	</div>
</div>