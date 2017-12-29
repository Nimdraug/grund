<?php
add_shortcode( 'listing', function ( $atts, $content ) {
    global $wp_theme;

    $wp_theme->listing();
} );
