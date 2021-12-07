<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->

	<?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">

    <?php
    if (is_front_page()){
    $test_args = array( 
        'post_type' => 'post',         
        'post_status'=> 'publish',         
        'posts_per_page' => 2 );
        
    $test_query = new WP_Query($test_args); 
    
    if($test_query->have_posts()){         
        while ($test_query->have_posts()){             
            $test_query->the_post();                  
            the_post_thumbnail( $size = ["300px","300px"], $attr = '');
            ?> 
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php
            the_excerpt();
        }               
    } 
}


if (is_page_template('about-custom.php')){
    $test_args = array( 
        'post_type' => 'post',         
        'post_status'=> 'publish',         
        'posts_per_page' => 3 );
        
    $test_query = new WP_Query($test_args); 
    
    if($test_query->have_posts()){         
        while ($test_query->have_posts()){             
            $test_query->the_post();                  
            the_post_thumbnail( $size = ["300px","300px"], $attr = '' );  
            ?> 
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php
            the_excerpt();
        }               
    } 
}
    ?> 

		<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<nav aria-label="<?php esc_attr_e( 'Secondary menu', 'twentytwentyone' ); ?>" class="footer-navigation">
				<ul class="footer-navigation-wrapper">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'items_wrap'     => '%3$s',
							'container'      => false,
							'depth'          => 1,
							'link_before'    => '<span>',
							'link_after'     => '</span>',
							'fallback_cb'    => false,
						)
					);
					?>
				</ul><!-- .footer-navigation-wrapper -->
			</nav><!-- .footer-navigation -->
		<?php endif; ?>
		<div class="site-info">
			<div class="site-name">
				<?php if ( has_custom_logo() ) : ?>
					<div class="site-logo"><?php the_custom_logo(); ?></div>
				<?php else : ?>
					<?php if ( get_bloginfo( 'name' ) && get_theme_mod( 'display_title_and_tagline', true ) ) : ?>
						<?php if ( is_front_page() && ! is_paged() ) : ?>
							<?php bloginfo( 'name' ); ?>
						<?php else : ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
			</div><!-- .site-name -->
			<div class="powered-by">
				<?php
				printf(
					/* translators: %s: WordPress. */
					esc_html__( 'Proudly powered by %s.', 'twentytwentyone' ),
					'<a href="' . esc_url( __( 'https://wordpress.org/', 'twentytwentyone' ) ) . '">WordPress</a>'
				);
				?>
			</div><!-- .powered-by -->

		</div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
