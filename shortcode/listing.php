<?php
add_shortcode( 'listing', function ( $atts, $content ) {
    global $wp_theme, $wp_query;

    $old_wp_query = $wp_query;

    $wp_query = new WP_Query( [
        'post_type' => 'post'
    ] );

    $wp_theme->listing();

    wp_reset_postdata();

    $wp_query = $old_wp_query;
} );
