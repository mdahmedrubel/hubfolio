<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hubfolio
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ==============<< preloader start here >>================ -->
<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- =============<< preloader ending here >>=============== -->


<!-- =============<< scrollToTop start here >>============== -->
<a href="#" class="scrollToTop"><i class="fas fa-long-arrow-alt-up"></i><span class="pluse_1"></span><span
        class="pluse_2"></span></a>
<!-- =============<< scrollToTop ending here >>============= -->

<?php 

 $get_siturl = get_site_url();
 ?>

<!-- =============<< Header start here >>=============== -->
<header id="hubfolio" class="site-header">
	<div class="header-bottom">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                   <?php
						$logo_img_id = get_theme_mod( 'custom_logo' );
						if(!empty($logo_img_id)): 
						?>
						<div class="logo">
							<?php the_custom_logo(); ?>	
						</div>
						<?php else: ?>
							<a href="<?php $get_siturl; ?>"><h4 class="logo-heading"><?php esc_html(bloginfo( 'name' )); ?></h4></a>
						<?php
						endif; 
					?>
                </div>
                <div class="menu-area">

                    <?php                             
                    if ( has_nav_menu('main-menu')):
                        wp_nav_menu( array(
                            'theme_location' => 'main-menu', 
                            'menu_class' => 'menu',
                            'container' => '',
                            'walker' => new Portfolio_Bootstrap_Navwalker(),
                            'fallback_cb'=> false,
                            'menu_id'    => '',
                            'depth'     => 4
                        ) );
                    endif;                             
                    ?>
                    <div class="header-bar d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="search-cart">
                        <div class="search-button">
                            <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
                        </div>
                    </div>
                    <!-- search area -->
                    <div class="popup">
                        <span class="hide-search"><i class="fa-solid fa-xmark"></i></span>
                        <div class="popups">
                        <form role="search" method="get" id="search" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <input type="search" class="search-field" name="s" placeholder="<?php echo esc_attr_e('Search & hit enter', 'hubfolio'); ?>" value="<?php echo get_search_query(); ?>">
                        </form>
                        </div>
                    </div>
                    <!-- search area -->
                </div>
            </div>
        </div>
    </div>
</header>
<!-- =============<< Header end here >>=============== -->
<aside id="bar-left" class="bar-side ">
    <div class="abs"><?php _e('© 2022  Xploretheme Themes', 'hubfolio'); ?></div>
</aside>

<aside id="bar-right" class="bar-side">
    <div class="right-side"><?php _e('PORTFOLIO THEME -', 'hubfolio'); ?> <a href="https://www.templatemonster.com/authors/xploretheme"><?php _e('Purchase Now', 'hubfolio'); ?></a></div>
</aside>

          
               
     










