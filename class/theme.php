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

    }

    function listing()
    {

    }

    function listed()
    {
    }

    function detail()
    {

    }
}

$wp_theme = new theme();
