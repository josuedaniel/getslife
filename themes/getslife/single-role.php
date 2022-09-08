<?php

get_header(); 
    while(have_posts()) {
        the_post(); ?>
        <div class="page-banner">
            <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg'); ?>)"></div>
            <div class="page-banner__content container container--narrow">
                <h1 class="page-banner__title"><?php the_title(); ?></h1>
                <div class="page-banner__intro">
                <p>DON'T FORGET TO REPLACE ME LATER.</p>
                </div>
            </div>
        </div>

        <div class="container container--narrow page-section">
            <div class="metabox metabox--position-up metabox--with-home-link">
                <p>
                    <a class="metabox__blog-home-link" href="<?php echo 
                        // link to the blog home
                    get_post_type_archive_link('role'); ?>"><i class="fa fa-home" aria-hidden="true"></i> 
                      All Roles  
                    </a> 
                    <span class="metabox__main">
                        <?php the_title(); ?>
                    </span>
                </p>
            </div>

            <div class="generic-content"><?php the_content(); ?></div>

            <?php 
                $today = date('Ymd');
                $homePageEvents = new WP_Query(array(
                'posts_per_page' => 2,
                'post_type' => 'event',
                'meta_key' => 'event_date',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
                'meta_query' => array(
                    array(
                    'key' => 'event_date',
                    'compare' => '>=',
                    'value' => $today,
                    'type' => 'numeric'
                    ), array(
                        'key' => 'related_roles',
                        'compare' => 'like',
                        'value' => '"'. get_the_ID().'"'
                    )
                )
                ));
                
                if ($homePageEvents->have_posts()) {
                    echo '<hr class="section-break">';
                    echo '<h2 class="headline headline--medium">Upcoming ' .get_the_title() . ' Events</h2>';

                    while ($homePageEvents->have_posts()) {
                    $homePageEvents->the_post(); ?>

                    <div class="event-summary">
                        <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
                        <span class="event-summary__month"><?php 
                            // create a new DateTime class filled with the event_date from Advanced Custom Fields and assign it to the #eventDate variable
                            $eventDate = new DateTime(get_field('event_date'));

                            // output the Month part of the event_date variable 
                            echo $eventDate->format('M');
                        ?></span>                                  <!-- Output the day part of the $eventDate variable -->
                        <span class="event-summary__day"><?php echo $eventDate->format('d'); ?></span>
                        </a>
                        <div class="event-summary__content">
                        <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <p><?php if (has_excerpt()) {
                                        echo get_the_excerpt();
                                        } else {
                                        echo wp_trim_words(get_the_content(), 18);
                                        } ?><a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>
                        </div>
                    </div>
                    <?php  }
                    }

                   
            ?>
        </div>
        
    <?php }

    get_footer(); 
?>