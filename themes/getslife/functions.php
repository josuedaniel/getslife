<?php

function pageBanner($args = NULL) {
    if (!isset($args['title'])) {
        $args['title'] = get_the_title();
    }

    if (!isset($args['subtitle'])) {
        $args['subtitle'] = get_field('page_banner_subtitle');
    }

    if (!isset($args['photo'])) {
        if (get_field('page_banner_background_image') AND !is_archive() AND !is_home() ) {
            $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
        } else {
            $args['photo'] = get_theme_file_uri('/images/ocean.jpg');
        }
    }
    
    ?>
    <div class="page-banner">
            <div class="page-banner__bg-image" style="background-image: url(<?php $pageBannerImage = get_field('page_banner_background_image'); echo $pageBannerImage['sizes']['pageBanner'] ?>);"></div>
            <div class="page-banner__content container container--narrow">
                <h1 class="page-banner__title"><?php echo $args['title'] ?></h1>
                <div class="page-banner__intro">
                    <p><?php echo $args['subtitle']; ?></p>
                </div>
            </div>
        </div>

<?php }

function getslife_files() {
    
    wp_enqueue_script('main-getslife-javascript', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
    // Add the main stylesheet for wordpress to use
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('getslife_main_styles', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('getslife_extra_styles', get_theme_file_uri('/build/index.css'));
}

//hook to load scripts found in the function getslife_files
add_action('wp_enqueue_scripts', 'getslife_files');


// function to 
function getslife_features() {

    //adds the theme support to display titles dynamically in the tab on the browser
    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');
    
    // create a custom image name, set its size, and set crop to true
    add_image_size('farmerLandscape', 400, 260, true);
    add_image_size('farmerPortrait', 480, 650, true);
    add_image_size('pageBanner', 1500, 350, true);
    
/*
    // adds support so the wordpress will show the menu option under appearance in the admin screen, and with the header file puts the menu in the header location
    register_nav_menu('headerMenuLocation', 'Header Menu Location');

    // adds support so the wordpress will show the menu option under appearance in the admin screen, and with the footer file puts the menu in the footer location one
    register_nav_menu('footerLocationOne', 'Footer Location One');

    // adds support so the wordpress will show the menu option under appearance in the admin screen, and with the footer file puts the menu in the footer location two
    register_nav_menu('footerLocationTwo', 'Footer Location Two');
*/

}
//action hook for wordpress to load features from getslife_features after setting up the theme
add_action('after_setup_theme', 'getslife_features');


// Adjust the the way queries work when needed
function getslife_adjust_queries($query) {

    // If user is not on an admin screen, the page is the role archive post type, and the query is the main query for that page
    if (!is_admin() AND is_post_type_archive('role') AND is_main_query()) {
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
        $query->set('post_per_page', -1);
    }
    
    // If user is not on an admin screen, the page is the event archive post type, and the query is the main query for that page
    if (!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {
        // only show 1 post per page
        $today = date('Ymd');
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set('meta_query', array(
            array(
              'key' => 'event_date',
              'compare' => '>=',
              'value' => $today,
              'type' => 'numeric'
            )
           ));
    }
}

add_action('pre_get_posts', 'getslife_adjust_queries');
?>