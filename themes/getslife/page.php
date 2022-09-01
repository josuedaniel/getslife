<?php
    while(have_posts()) {
        the_post(); ?>
        <h2><?php the_title(); ?></h2>
        <h1> this is a page </h1>
        <?php the_content(); ?>
        <hr>
    <?php }
?>