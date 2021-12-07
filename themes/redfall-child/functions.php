<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

add_action( 'wp_enqueue_scripts', 'my_plugin_add_stylesheet' );
function my_plugin_add_stylesheet() {
    wp_enqueue_style( 'my-style', get_stylesheet_directory_uri() . '/style.css', false, '1.0', 'all' );
}

function redfall_wp_enqueue_scripts() {
    $parenthandle = 'twentytwentyone-style';  
    $theme        = wp_get_theme();
    wp_enqueue_style( 
        $parenthandle, 
        get_template_directory_uri() . '/style.css', 
        array(),  
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 
        'redfall-style', 
    get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') 
    );
    add_action( 'wp_enqueue_scripts', 'redfall_wp_enqueue_scripts' );
}