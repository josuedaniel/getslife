<?php

get_header(); 
    while(have_posts()) {
        the_post(); ?>
        <div class="page-banner">
            <div class="page-banner__bg-image" style="background-image: url(<?php $pageBannerImage = get_field('page_banner_background_image'); echo $pageBannerImage['sizes']['pageBanner'] ?>)"></div>
            <div class="page-banner__content container container--narrow">
                <h1 class="page-banner__title"><?php the_title(); ?></h1>
                <div class="page-banner__intro">
                <p><?php the_field('page_banner_subtitle') ?></p>
                </div>
            </div>
        </div>

        <div class="container container--narrow page-section">
            

            <div class="generic-content">
                <div class="row-group">
                    <div class="one-third">
                        <?php the_post_thumbnail('farmerPortrait'); ?>
                    </div>
                    <div class="two-thirds">
                        <?php the_content(); ?>
                    </div>
                </div>

            </div>

            <?php 

                // grab the value from related_roles and assign it to the variable $relatedRoles
                $relatedRoles = get_field('related_roles');
                //print_r($relatedRoles);

                // if $relatedRoles exist
                if ($relatedRoles) {

                    // output an hr 
                    echo '<hr class="section-break">';

                    //output a header
                    echo '<h2 class="headline headline--medium">Specialties</h2>';

                    // Create an ul
                    echo '<ul class="link-list min-list">';

                    // Display the title in a li as a link to its own page for each $relatedRole that exists
                    foreach ($relatedRoles as $role) { ?>
                        <li><a href="<?php echo get_the_permalink($role); ?>"><?php echo get_the_title($role); ?></a></li>
                    <?php }

                    echo '</ul>';
                }
                
            ?>
        </div>
        
    <?php }

    get_footer(); 
?>