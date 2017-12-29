<?php

class theme
{
    function __construct()
    {
    }

    function the_layout()
    {
        get_template_part( 'layout/layout' );
    }

    function the_view()
    {
        global $wp_query;

        if ( $wp_query->is_archive() )
            $this->listing();
        else
            $this->detail();
    }

    function listing()
    {
        get_template_part( 'listing/listing' );
    }

    function listed()
    {
        get_template_part( 'listed/listed' );
    }

    function detail()
    {
        get_template_part( 'detail/detail' );
    }
}

$wp_theme = new theme();
