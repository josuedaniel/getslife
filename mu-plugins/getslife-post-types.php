<?php

// function to create custom post types
function getslife_post_types() {
    // Register new post type Event with WP function. Google the function
    register_post_type('event', array(
        
        // enable supports for excerpts, title and editor must be placed in by default
        'supports' => array('title', 'editor', 'excerpt'),
        
        // Rewrite the slug for the website
        'rewrite' => array('slug' => 'events'),

        //makes the archive page for events available
        'has_archive' => true,
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



    // Register new post type Role with WP function. Google the function
    register_post_type('role', array(
        
        // enable supports for title and editor must be placed in by default
        'supports' => array('title', 'editor'),
        
        // Rewrite the slug for the website
        'rewrite' => array('slug' => 'roles'),

        //makes the archive page for roles available
        'has_archive' => true,
        //Make the Role CPT visible to public users
        'public' => true,

        //Make the Role CPT show up in the modern block editor
        'show_in_rest' => true,
        
        //Add an array to control display of Role CPT labels in wp admin
        'labels' => array(
            'name' => 'Roles',

            // Change default WP admin menu to show Add New Roles instead of Add New Post
            'add_new_item' => 'Add New Role',
            'edit_item' => 'Edit Role',
            'all_items' => 'All Roles',
            'singular_name' => 'Role'
        ),

        //  Google wordpress dashicons 
        'menu_icon' => 'dashicons-awards'
    ));


    // Register new post type Farmer with WP function register_post_type. Google the function
    register_post_type('farmer', array(
        
        // enable supports for title and editor must be placed in by default
        'supports' => array('title', 'editor'),
        
        //Make the Farmer CPT visible to public users
        'public' => true,

        //Make the Farmer CPT show up in the modern block editor
        'show_in_rest' => true,
        
        //Add an array to control display of Farmer CPT labels in wp admin
        'labels' => array(
            'name' => 'Farmers',

            // Change default WP admin menu to show Add New Farmers instead of Add New Post
            'add_new_item' => 'Add New Farmer',
            'edit_item' => 'Edit Farmer',
            'all_items' => 'All Farmers',
            'singular_name' => 'Farmer'
        ),

        //  Google wordpress dashicons 
        'menu_icon' => 'dashicons-carrot'
    ));
}

// action hook 
add_action('init', 'getslife_post_types');