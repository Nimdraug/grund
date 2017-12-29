<?php
global $wp_query, $wp_theme;
?>
<div class="listing">
    <?php
    while ( $wp_query->have_posts() )
    {
        $wp_query->the_post();

        $wp_theme->listed();
    }
    ?>
</div>