<?php
/**
 * Give 2015 Functions
 */

add_image_size( 'donate-header', 615, 230, true );

/*
 * Enqueue the parent style.css
 *
 *
 */
add_action( 'wp_enqueue_scripts', 'give_2015_enqueue_styles' );
function give_2015_enqueue_styles() {

    // Parent style variable
    $parent_style = 'twentyfifteen-style';

    // Enqueue Parent theme's style
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );

    // Enqueue Child theme's style and ensure it is
    // Setting 'parent-style' as a dependency will ensure that the child theme stylesheet loads after it.
    wp_enqueue_style( 'give2015-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ) );
}

//Load all Give functions only if Give is active
if (class_exists('Give') ) {
	require_once( get_stylesheet_directory() . '/inc/give-functions.php' );
}
