<?php
get_header(); 
pageBanner(array(
    'title' => 'Past Events',
    'subtitle' => 'A recap of our past events.'
));
?>

    

    <div class="container container--narrow page-section">
    
    <?php
        
        // assign today's date to the variable $today
        $today = date('Ymd');

            // query past events
            $pastEvents = new WP_Query(array(
              //will give us pagination after 10 
              'paged' => get_query_var('paged', 1),
              
              //Only query the Event CPT
              'post_type' => 'event',
              
              //order by the meta key event_date in ascending meta_value_num
              'meta_key' => 'event_date',
              'orderby' => 'meta_value_num',
              'order' => 'ASC',
              
              //if the date of the query is less than (older than) todays date then list it here
              'meta_query' => array(
                array(
                  'key' => 'event_date',
                  'compare' => '<',
                  'value' => $today,
                  'type' => 'numeric'
                )
              )
            ));

        
        while ($pastEvents->have_posts()) {
            $pastEvents->the_post();
            get_template_part('template-parts/content-event');
        } 
    echo paginate_links(array(
        'total' => $pastEvents->max_num_pages
    )); ?>
    
    </div>






<?php get_footer();
?>