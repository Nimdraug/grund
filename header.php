<!DOCTYPE html>
<html>
<head>
    <title><?=$wp_query->get_the_title()?></title>
    <?php wp_head() ?>
</head>
<body>
<header id="header">
    <a href="<?=home_url()?>"><?bloginfo( 'name' )?></a>
</header>
