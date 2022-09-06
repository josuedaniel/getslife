<?php

// function to create custom post types
function getslife_post_types() {
    // Register new post type Event with WP function. Google the function
    register_post_type('event', array(
        
        //Make the Event CPT visible to public users
        'public' => true,

        //Make the event CPT show up in the modern block editor
        'show_in_rest' => true,
        
        //Add an array to control display of Event CPT labels in wp admin
        'labels' => array(
            'name' => 'Events',

            // Change default WP admin menu to show Add New Event instead of Add New Post
            'add_new_item' => 'Add New Event',
            'edit_item' => 'Edit Event',
            'all_items' => 'All Events',
            'singular_name' => 'Event'
        ),

        //  Google wordpress dashicons 
        'menu_icon' => 'dashicons-calendar'
    ));
}

// action hook 
add_action('init', 'getslife_post_types');