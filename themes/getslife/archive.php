<?php
get_header(); 
pageBanner(array(

                // use the get_the_archive WordPress functions to let WP handle output to the page
    'title' => get_the_archive_title(),
    'subtitlte' => get_the_archive_description()
));
?>

    
            <div class="page-banner__intro">
                <!-- gets the description set in the wordpress admin --> 
            <p><?php the_archive_description(); ?></p>
            </div>
        </div>
    </div>

    <div class="container container--narrow page-section">
    
    <?php
        while (have_posts()) {
            the_post(); ?>
            <div class="post-item">
                <h2 class="headline headline--medium headline--post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                <div class="metabox">
                    <!-- link to Author's archive page, show a formatted published date, and show the categories the psot belongs to seperated by the parameter given  -->
                    <p>Posted by <?php the_author_posts_link(); ?> on <?php the_time('n.j.y'); ?> in <?php echo get_the_category_list(', '); ?></p>
                </div>

                <div class="generic-content">
                    <?php the_excerpt(); ?>
                    <p><a  class="btn btn--blue" href="<?php the_permalink(); ?>">Continue reading &raquo;</a></p>
                </div>
            </div>
    <?php   } 
    echo paginate_links(); ?>
    
    </div>






<?php get_footer();
?>