<?php

function getslife_files() {
    // Add the main stylesheet for wordpress to use
    wp_enqueue_style('getslife_main_styles', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'getslife_files');

?>