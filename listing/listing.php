<?php
global $wp_query, $grund_theme;
?>
<div class="listing">
    <?php
    while ( $wp_query->have_posts() )
    {
        $wp_query->the_post();

        $grund_theme->listed();
    }
    ?>
</div>