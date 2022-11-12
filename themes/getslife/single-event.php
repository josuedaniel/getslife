<?php

get_header(); 
    while(have_posts()) {
        the_post(); 
        pageBanner();
        ?>
        

        <div class="container container--narrow page-section">
            <div class="metabox metabox--position-up metabox--with-home-link">
                <p>
                    <a class="metabox__blog-home-link" href="<?php echo 
                        // link to the blog home
                    get_post_type_archive_link('event'); ?>"><i class="fa fa-home" aria-hidden="true"></i> 
                      Events Home  
                    </a> 
                    <span class="metabox__main">
                        <?php the_title(); ?>
                    </span>
                </p>
            </div>

            <div class="generic-content"><?php the_content(); ?></div>

            <?php 

                // grab the value from related_roles and assign it to the variable $relatedRoles
                $relatedRoles = get_field('related_roles');
                //print_r($relatedRoles);

                // if $relatedRoles exist
                if ($relatedRoles) {

                    // output an hr 
                    echo '<hr class="section-break">';

                    //output a header
                    echo '<h2 class="headline headline--medium">Related Role(s)</h2>';

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