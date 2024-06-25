<?php
/**
 * Plugin Name: Metabox Plugin
 * Description: This is a custom plugin for metabox
 * Author: Hawana Tamang
 * Version: 1.0.0
 */

function add_movies_metabox(){
    add_meta_box(
        'movies_meta_box',
        'Movies',
        'movies_meta_box_html',
        'movie',
        'side',
        'default'
    );
}
add_action('add_meta_boxes','add_movies_metabox');

function movies_meta_box_html($post){
    $terms = get_terms(array('taxonomy' => 'movie_category', 'hide_empty' => false));
    $post_terms = get_the_terms($post->ID,'movie');
    $post_term_ids = $post_terms ? wp_list_pluck($post_terms,'term_id') : array();

    //Display checkboxes for each terms
    foreach($terms as $term){
        echo '<label>';
        echo '<input type="checkbox" name="movie[]" value="' . esc_attr($term->term_id) . '" ' . checked(in_array($term->term_id, $post_term_ids), true, false) . '>';
        echo esc_html($term->name);
        echo '</label><br>';
    }
}

function save_movies_meta_box($post_id){
    if(isset($_POST['movie'])){
        $movie_terms = array_map('intval', $_POST['movie']); // sanitize as integers
        wp_set_post_terms($post_id,$movie_terms,'movie');
    }else{
        wp_set_post_terms($post_id,[],'movie');
    }
}
add_action('save_post','save_movies_meta_box');