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
      
        <?php
        // get the child ID if a post parent id exists, otherwise its 0 which is false
            $theParent = wp_get_post_parent_id(get_the_ID());
        //conditional to only show the meta box if the current page is a child page
        //a parent page won't have anything for $theParent 
            if ($theParent) { ?>
                <div class="metabox metabox--position-up metabox--with-home-link">
                    <p>
                        <a class="metabox__blog-home-link" href="<?php echo 
                            // Using $theParent below allows us to get the permalink for the parent page
                        get_permalink($theParent); ?>"><i class="fa fa-home" aria-hidden="true"></i> 
                            <!-- Using $theParent below allows us to get the name of the parent page dynamically -->
                            <?php echo get_the_title($theParent); ?>
                        </a> 
                        <span class="metabox__main">
                            <!-- Outputs the title of the current page -->
                            <?php the_title(); ?>
                        </span>
                    </p>
                </div>
                
        <?php   }
        ?>
        

        <?php
        
        //get_pages will return pages in memorydefined by the array we use as a parameter. In this case it will return the current page's children 
        $testArray = get_pages(array(
            // Get the current page's children
            'childof' => get_the_ID(),

            //allows admin to sort child pages in the wordpress admin
            'sort_column' => 'menu_order'
        ));

        // conditional to display the side menu pages if the current page is a parent or child
        if ($theParent or $testArray) { ?>

            <!-- Side menu for pages with parent / child relationships  -->
            <div class="page-links">
                <h2 class="page-links__title"><a href="<?php echo get_the_permalink($theParent); ?>"><?php echo get_the_title($theParent); ?></a></h2>
                <ul class="min-list">
                    <?php
                        
                        // If $theParent exists set $findChildrenOf to $theParent
                        if ($theParent) {
                            $findChildrenOf = $theParent;
                        
                        // If $theParent doesn't exist set $findChildrenOf to get_the_ID() of the current page
                        } else {
                            $findChildrenOf = get_the_ID();
                        }
                    //call the wp_list_pages method and add an associative array listing out child pages if they exist
                        wp_list_pages(array(
                            
                            //set the title to null so that we dont get the parent page title
                            'title_li' => NULL,
                            
                            //child_of finds children pages. List child pages if $findChildrenOf is a parent, otherwise dont. 
                            'child_of'=> $findChildrenOf
                        ));
                    ?>
                </ul>
            </div> 
        <?php } ?>
        <div class="generic-content">
            <?php the_content(); ?>
        </div>
    </div>
        
        
    <?php }

get_footer();
?>