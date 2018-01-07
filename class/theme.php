<?php

class grund_theme
{
    function __construct()
    {
    }

    function the_layout( $layout = null )
    {
        global $wp_query;

        if ( ! $layout )
            $layout = $wp_query->get( 'layout' );

        get_template_part( 'layout/layout', $layout );
    }

    function the_view( $view = null )
    {
        global $wp_query, $post;

        if ( ! $view )
            $view = $wp_query->get( 'view' );

        if ( $view == 'listing' || $wp_query->is_archive() || $wp_query->is_home() )
            $this->listing();
        else
            $this->detail();
    }

    function listing( $listing = null )
    {
        global $wp_query, $post;

        if ( ! $listing )
            $listing = $wp_query->get( 'listing' );

        get_template_part( 'listing/listing', $listing );
    }

    function listed( $listed = null )
    {
        global $wp_query, $post;

        if ( ! $listed )
            $listed = $wp_query->get( 'listed', $post->post_type );

        get_template_part( 'listed/listed', $listed );
    }

    function detail( $detail = null )
    {
        global $wp_query, $post;

        if ( ! $detail )
            $detail = $wp_query->get( 'detail', $post->post_type );

        if ( $wp_query->have_posts() )
        {
            $wp_query->the_post();

            get_template_part( 'detail/detail', $detail );
        }
    }
}

$grund_theme = new grund_theme();
