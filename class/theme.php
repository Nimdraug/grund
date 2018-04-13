<?php

class grund_theme
{
    var $default_query_vars = [
        'layout' => null,
        'view' => null,
        'listing' => null,
        'listed' => null,
        'detail' => null,
        'sidebar' => null,
    ];

    function __construct()
    {
        global $wp_query;

        $this->query_stack = [];
        $this->the_query = $wp_query;

        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue' ] );
    }

    function enqueue()
    {
        // Styles
        wp_enqueue_style( 'grund-styles', get_stylesheet_uri() );
    }

    function push_query( $new_query )
    {
        global $wp_query;

        $this->query_stack[] = $this->the_query;
        $this->the_query = $wp_query = $new_query;
    }

    function pop_query()
    {
        global $wp_query;

        $this->the_query = $wp_query = array_pop( $this->query_stack );
        $this->the_query->reset_postdata();

        return $this->the_query;
    }

    function the_layout( $layout = null )
    {
        if ( ! $layout )
            $layout = $this->the_query->get( 'layout' );

        get_template_part( 'layout/layout', $layout );
    }

    function the_view( $view = null )
    {
        if ( ! $view )
            $view = $this->the_query->get( 'view' );

        if ( $view == 'listing' || $this->the_query->is_archive() || $this->the_query->is_home() )
            $this->listing();
        else
            $this->detail();
    }

    function listing( $listing = null )
    {
        if ( ! $listing )
            $listing = $this->the_query->get( 'listing' );

        get_template_part( 'listing/listing', $listing );
    }

    function listed( $listed = null )
    {
        if ( ! $listed )
            $listed = $this->the_query->get( 'listed', $post->post_type );

        get_template_part( 'listed/listed', $listed );
    }

    function detail( $detail = null )
    {
        if ( ! $detail )
            $detail = $this->the_query->get( 'detail', $post->post_type );

        if ( $this->the_query->have_posts() )
        {
            $this->the_query->the_post();

            get_template_part( 'detail/detail', $detail );
        }
    }

    function get_the_page_title()
    {
        global $s;

        if ( function_exists( 'is_tag' ) && is_tag() )
            return 'Tag Archive for &quot;' . $tag . '&quot;';
        elseif ( is_archive() )
            return wp_title( '', false ) . ' Archive';
        elseif ( is_search() )
            return 'Search for &quot;' . wp_specialchars( $s ) . '&quot;';
        elseif ( ! ( is_404() ) && ( is_single() ) || ( is_page() ) )
            return wp_title( '', false );
        elseif ( is_404() )
            return '404 Not Found';
    }

    /*
    Return an html attribute if the value is set, otherwise return nothing.
    */
    function maybe_attr( $attr, $val, $space = true )
    {
        if ( $val )
        {
            return ( $space ? ' ' : '' ) . $attr . '="' . $val . '"';
        }

        return '';
    }
}

$grund_theme = new grund_theme();
