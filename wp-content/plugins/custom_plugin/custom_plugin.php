<?php
/**
 * Plugin Name: Movie Custom Post Plugin
 * Description: This is a custom plugin for CPT of movies
 * Author: Hawana Tamang
 * Version: 1.0.0
 */


//Creating a Custom Post type
//pluggable function created
if(!function_exists('create_movie_cpt')){
    function create_movie_cpt(){
        $labels = array(
            'name' => _x('Movies','Post Type General Name','textdomain'),
            'singular_name' => _x('Movies', 'Post Type Singular Name','textdomain'),
            'menu_name' => __('Movies','textdomain'),
            'name_admin_bar' =>__('Movie','textdomain'),
            'archives' => __('Movie Archives','textdomain'),
            'attributes' => __('Movie Attributes','textdomain'),
            'parent_item_colon' => __('Parent Movie:','textdomain'),
            'all_items' => __('All Movies','textdomain'),
            'add_new_item' => __('Add New Movie','textdomain'),
            'add_new' => __('Add New Movie','textdomain'),
            'new_item' => __('New Movie','textdomain'),
            'edit_item' => __('Edit Movie','textdomain'),
            'update_item' => __('Update Movie','textdomain'),
            'view_item' => __('View Movie','textdomain'),
            'view_items' => __('View Movies','textdomain'),
            'search_items' => __('Search Movies','textdomain'),
            'not_found' => __('Not found','textdomain'),
            'not_found_in_trash' => __('Not found in Trash','textdomain'),
            'featured_image' => __('Featured Image', 'textdomain'),
            'set_featured_image' => __('Set featured image', 'textdomain'),
            'remove_featured_image' => __('Remove featured image', 'textdomain'),
            'use_featured_image' => __('Use as featured image', 'textdomain'),
            'insert_into_item' => __('Insert into Movie', 'textdomain'),
            'uploaded_to_this_item' => __('Uploaded to this portfolio','textdomain'),
            'items_list' => __('Movies list', 'textdomain'),
            'items_list_navigation' => __('Movies list navigation', 'textdomain'),
            'filter_items_list' => __('Filter movies list', 'textdomain'),
        );
        $args = array(
            'label' => __('Movie','textdomain'),
            'description' => __('Movie Custom Post Type','textdomain'),
            'labels' => $labels,
            'supports' => array('title','editor','thumbnail','revisions'),
            'taxonomies' => array('movie_category'),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'post',
        );
        register_post_type('movie',$args);
    }
    add_action('init','create_movie_cpt');
}