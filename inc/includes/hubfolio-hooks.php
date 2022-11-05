<?php 
if( ! function_exists('Portfolio_Rpost_Functions')){
    function Portfolio_Rpost_Functions() {
        $post_id = get_the_ID();
        $cat_ids = array();
        $categories = get_the_category( $post_id );

        if(!empty($categories) && is_wp_error($categories)):
            foreach ($categories as $category):
                array_push($cat_ids, $category->term_id);
            endforeach;
        endif;

        $current_post_type = get_post_type($post_id);
        $query_args = array( 
            'category__in'   => $cat_ids,
            'post_type'      => $current_post_type,
            'post_not_in'    => array($post_id),
            'ignore_sticky_posts' => 1,
            'posts_per_page'  => '4'

         );
        $same_cats_post = new WP_Query( $query_args );

        if($same_cats_post->have_posts()):
             while($same_cats_post->have_posts()): $same_cats_post->the_post(); ?>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="product-item">
                        <?php if ( has_post_thumbnail()):  ?>
                        <div class="product-thumb">
                        	<a href="<?php the_permalink(); ?>">
                            	<?php the_post_thumbnail(); ?>
                            </a>
                        </div>
                        <?php endif; ?>
                        <div class="product-content">
                            <a href="<?php the_permalink(); ?>">
                                <h6>
                                    <?php
                                    $title = get_the_title();
                                    $short_title = wp_trim_words( $title, 5, ' ' );
                                    echo esc_html($short_title);
                                ?>
                                </h6>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile;
         wp_reset_postdata();
        endif;
    }
}

if( ! function_exists('wpb_posts_nav')){
    function wpb_posts_nav(){
        $next_post = get_next_post();
        $prev_post = get_previous_post();
        if ( $next_post || $prev_post ) : ?>
         
    <div class="container">
        <div class="row">             
            <div class="wpb-posts-nav">
                <div>
                    <?php if ( ! empty( $prev_post ) ) : ?>
                        <a href="<?php echo get_permalink( $prev_post ); ?>">
                            <div>
                                <div class="wpb-posts-nav__thumbnail wpb-posts-nav__prev">
                                    <?php echo get_the_post_thumbnail( $prev_post, [ 70, 70 ] ); ?>
                                </div>
                            </div>
                            <div>
                                <strong>
                                    <i class="fa-solid fa-chevron-left"></i>
                                    <?php _e( 'Previous Post', 'hubfolio' ) ?>
                                </strong>
                                <h4><?php echo get_the_title( $prev_post ); ?></h4>
                            </div>
                        </a>
                    <?php endif; ?>
                </div>

                <div>
                    <?php if ( ! empty( $next_post ) ) : ?>
                        <a href="<?php echo get_permalink( $next_post ); ?>">
                            <div>
                                <strong>
                                    <?php _e( 'Next Post', 'hubfolio' ) ?>
                                    <i class="fa-solid fa-angle-right"></i>
                                </strong>
                                <h4><?php echo get_the_title( $next_post ); ?></h4>
                            </div>
                            <div>
                                <div class="wpb-posts-nav__thumbnail wpb-posts-nav__next">
                                    <?php echo get_the_post_thumbnail( $next_post, [ 70, 70 ] ); ?>
                                </div>
                            </div>
                        </a>
                    <?php endif; ?>
                </div>
            </div> <!-- .wpb-posts-nav -->
        </div>
    </div>    
    <?php
    endif;
    }
}

if( ! function_exists('hub_social_share')){
    function hub_social_share(){     
    ?>
        <a class="facebook" onClick="window.open('http://www.facebook.com/sharer.php?u=<?php echo site_url();?>','Facebook','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://www.facebook.com/sharer.php?u=<?php echo site_url();?>">
            <i class="fa-brands fa-facebook-f"></i>
        </a>
        <a class="twitter" onClick="window.open('http://twitter.com/share?url=<?php echo site_url();?>&amp;text=<?php bloginfo('title'); ?>','Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;" href="http://twitter.com/share?url=<?php echo site_url();?>&amp;text=<?php echo str_replace(" ", "%20", bloginfo('title')); ?>">
            <i class="fa-brands fa-twitter"></i>
        </a>                     
        <a class="linkedin" href="https://www.linkedin.com/share?url=<?php echo site_url(); ?>" onclick="window.open( 'https://www.linkedin.com/share?url=<?php echo site_url(); ?>', 'sharer', 'toolbar=0, status=0, width=600, height=300'); return false;">
            <i class="fa-brands fa-linkedin-in"></i>
        </a>
        <a class="vimeo" href="http://vimeo.com/share?url=<?php echo site_url(); ?>" onclick="window.open( 'http://vimeo.com/share?url=<?php echo site_url(); ?>', 'sharer', 'toolbar=0, status=0, width=600, height=300'); return false;">
            <i class="fa-brands fa-vimeo-v"></i>
        </a>
    <?php
     }
}



//Theme file importer function for hubfolio theme
if ( ! function_exists( 'theme_import_files' ) ) :
function theme_import_files() {
    return array(
        array(
            'import_file_name'             => esc_html__( 'Hubfolio Demo', 'hubfolio' ),
            'import_file_url'              => 'https://xploretheme.com/demos/demodata/hubfolio/content.xml',
            'import_widget_file_url'       => 'https://xploretheme.com/demos/demodata/hubfolio/widgets.wie',
            'import_customizer_file_url'   => 'https://xploretheme.com/demos/demodata/hubfolio/customizer.dat',
            'import_preview_image_url'     => 'https://xploretheme.com/demos/demodata/hubfolio/screenshot.png',
            'preview_url'                  => 'https://xploretheme.com/demos/wp/hubfolio',
            'import_notice'                => esc_html__( 'After you import the demo data, just set menu from Appearance > Menu home page & blog page will 
            automatically set. Also import themeoption.json file which has included with main package. You are all set to go :)', 'hubfolio' ),
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'theme_import_files' );
endif;



function ocdi_plugin_intro_text( $default_text ) {
    $default_text .= '<div class="ocdi__intro-text" style="width:400px"><p>Please click on the <strong>Import Demo Data</strong> button and wait
    for importing demo data. It may take a few minutes.</p>
</div>';
    return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'ocdi_plugin_intro_text' );



function ocdi_after_import_setup() {
    $primary_menu       = get_term_by( 'name', 'Primary Menu', 'nav_menu' );


    set_theme_mod( 'nav_menu_locations', array(
            'main-menu'   => $primary_menu->term_id,  
        )
    );

  
   $home_page_id = get_page_by_title( 'Home');
   $blog_page_id  = get_page_by_title( 'Blog' );
   
    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $home_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );
    
}
add_action( 'pt-ocdi/after_import', 'ocdi_after_import_setup' );






