<?php
add_shortcode( 'listing', function ( $atts, $content ) {
    global $grund_theme, $wp_query;

    $atts = shortcode_atts( WP_Query::fill_query_vars( [
        'post_type' => 'post',
        'listing' => null
    ] ), $atts );

    $grund_theme->push_query();

    $grund_theme->the_query = $wp_query = new WP_Query( $atts );

    ob_start();

    $grund_theme->listing();

    $grund_theme->pop_query();

    return ob_get_clean();
} );
