<?php
add_shortcode( 'listing', function ( $atts, $content ) {
    global $grund_theme, $wp_query;

    // grund default query vars + wp default query vars + shortcode defaults + given shortcode atts
    $atts = shortcode_atts( wp_parse_args( [
        'post_type' => 'post',
    ], WP_Query::fill_query_vars( $grund_theme->default_query_vars ) ), $atts, 'listing' );

    $grund_theme->push_query( new WP_Query( $atts ) );

    ob_start();

    $grund_theme->listing();

    $grund_theme->pop_query();

    return ob_get_clean();
} );
