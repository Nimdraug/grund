<article <?php post_class() ?>>
    <header>
        <h2><a href="<?=get_the_permalink()?>"><?php the_title() ?></a></h2>
    </header>
    <div>
        <?php the_excerpt() ?>
    </div>
</article>