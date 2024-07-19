<?php
/**
 * Plugin Name: Taxonomy Plugin
 * Description: This is a custom plugin for taxonomies
 * Author: Hawana Tamang
 * Version: 1.0.0
 */

//creating custom taxonomy
//using pluggable function
if(!function_exists('create_movie_category_taxonomy')){
    function create_movie_category_taxonomy(){
        $labels = array(
            'name' => _x('Movie Categories','Taxonomy General Name','textdomain'),
            'singular_name' => _x('Movie Category','Taxonomy Singular Name','textdomain'),
            'menu_name' => __('Movie Categories','textdomain'),
            'all_items' => __('All Categories','textdomain'),
            'parent_items' => __('Parent Category','textdomain'),
            'parent_item_colon' => __('Parent Category:','textdomain'),
            'new_item_name' => __('New Category Name','textdomain'),
            'add_new_item' => __('Add New Category','textdomain'),
            'edit_item' => __('Edit Category','textdomain'),
            'update_item' => __('Update Category','textdomain'),
            'view_item' => __('View Category','textdomain'),
            'separate_items_with_commas' => __('Separate categories with commas','textdomain'),
            'add_or_remove_items' => __('Add or remove categories','textdomain'),
            'choose_from_most_used' => __('Choose from the most used','textdomain'),
            'popular_items' => __('Popular Catgories','textdomain'),
            'search_items' => __('Search Categories','textdomain'),
            'not_found' => __('Not Found','textdomain'),
            'no_terms' => __('No categories','textdomain'),
            'items_list' => __('Categories List','textdomain'),
            'items_list_navigation' => __('Categories list navigation','textdomain'),
        );
        $args = array(
            'labels'            => $labels,
            'hierarchical'      => true,
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => false,
            'show_tagcloud'     => false,
        );    
        register_taxonomy('movie_category',array('movie'),$args);
    }

    //priority given 0
    add_action('init','create_movie_category_taxonomy',0);
}
