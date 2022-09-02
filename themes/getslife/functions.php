<?php

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
}
//action hook for wordpress to load features from getslife_features after setting up the theme
add_action('after_setup_theme', 'getslife_features');

?>