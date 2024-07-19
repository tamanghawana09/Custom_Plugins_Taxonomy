<?php
/**
 * Plugin Name: Metabox Plugin
 * Description: This is a custom plugin for metabox
 * Author: Hawana Tamang
 * Version: 1.0.0
 */

 

// function add_movies_metabox(){
//     add_meta_box(
//         'movies_meta_box',
//         'Movies',
//         'movies_meta_box_html',
//         'movie',
//         'side',
//         'default'
//     );
// }
// add_action('add_meta_boxes','add_movies_metabox');

// function movies_meta_box_html($post){
//     $terms = get_terms(array('taxonomy' => 'movie_category', 'hide_empty' => false));
//     $post_terms = get_the_terms($post->ID,'movie');
//     $post_term_ids = $post_terms ? wp_list_pluck($post_terms,'term_id') : array();

//     //Display checkboxes for each terms
//     foreach($terms as $term){
//         echo '<label>';
//         echo '<input type="checkbox" name="movie[]" value="' . esc_attr($term->term_id) . '" ' . checked(in_array($term->term_id, $post_term_ids), true, false) . '>';
//         echo esc_html($term->name);
//         echo '</label><br>';
//     }
// }

// function save_movies_meta_box($post_id){
//     if(isset($_POST['movie'])){
//         $movie_terms = array_map('intval', $_POST['movie']); // sanitize as integers
//         wp_set_post_terms($post_id,$movie_terms,'movie');
//     }else{
//         wp_set_post_terms($post_id,[],'movie');
//     }
// }
// add_action('save_post','save_movies_meta_box');

function add_form_metabox(){
    add_meta_box(
        'form_meta_box',
        'Form',
        'form_meta_box_html',
        'post',
        'side',
        'default'
    );
}
add_action('add_meta_boxes','add_form_metabox');

function form_meta_box_html($post){
    $date_value = get_post_meta($post->ID,'_meta_box_date',true);
    $text_value = get_post_meta($post->ID,'_meta_box_text',true);
    $textarea_value = get_post_meta($post->ID,'_meta_box_textarea',true);

    ?>
        <label for="meta_box_date">Date:</label>
        <input type="date" id="meta_box_date" name="meta_box_date" value=" <?php echo esc_attr($date_value);?>"><br>
        <label for="meta_box_text">Text:</label>
        <input type="text" id="meta_box_text" name="meta_box_text" value="<?php echo esc_attr( $text_value);?>"><br>
        <label for="meta_box_textarea">Textarea:</label>
        <textarea id="meta_box_textarea" name="meta_box_textarea"><?php echo esc_attr($textarea_value);?></textarea><br>
    <?php
}

function save_form_data($post_id){
    if(array_key_exists('meta_box_date',$_POST)){
        update_post_meta($post_id,'_meta_box_date',sanitize_text_field($_POST['meta_box_date']));
    }
    if(array_key_exists('meta_box_text',$_POST)){
        update_post_meta($post_id,'_meta_box_text',sanitize_text_field($_POST['meta_box_text']));
    }
    if(array_key_exists('meta_box_textarea',$_POST)){
        update_post_meta($post_id,'_meta_box_textarea',sanitize_text_field($_POST['meta_box_textarea']));
    }
}

add_action('save_post','save_form_data');

//retrieve form input data or display data

function display_data(){
    global $post;
    $date_value = get_post_meta($post->ID,'_meta_box_date',true);
    $text_value = get_post_meta($post->ID,'_meta_box_text',true);
    $textarea_value = get_post_meta($post->ID,'_meta_box_textarea',true);

    ob_start();
    ?>
        <div class="meta-box-values">
            <p><strong>Date:</strong><?php echo esc_html($date_value);?></p>
            <p><strong>Text:</strong><?php echo esc_html($text_value);?></p>
            <p><strong>Text Area:</strong><?php echo esc_html($textarea_value);?></p>
        </div>
    <?php

    return ob_get_clean();
}

add_shortcode('data','display_data');

//color picker metabox
function add_color_picker_metabox() {
    add_meta_box(
        'color-picker',
        'Color Picker',
        'color_picker_html',
        'post',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'add_color_picker_metabox');

function color_picker_html($post) {
    wp_nonce_field('save_meta_color', 'meta_color_nonce');
    $value = get_post_meta($post->ID, 'meta-color', true);
    ?>
    <p>
        <label for="meta-color" class="prfx-row-title"><?php _e('Color Picker', 'prfx-textdomain'); ?></label>
        <input name="meta-color" type="text" value="<?php echo esc_attr($value); ?>" class="meta-color" />
    </p>
    <?php
}

function save_meta_color($post_id) {
    if (!isset($_POST['meta_color_nonce']) || !wp_verify_nonce($_POST['meta_color_nonce'], 'save_meta_color')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['meta-color'])) {
        update_post_meta($post_id, 'meta-color', sanitize_text_field($_POST['meta-color']));
    }
}
add_action('save_post', 'save_meta_color');

function prfx_color_enqueue($hook_suffix) {
    global $typenow;
    if ($typenow == 'post') {
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('meta-box-color-js', plugin_dir_url(__FILE__) . 'meta-box-color.js', array('wp-color-picker'), false, true);
    }
}
add_action('admin_enqueue_scripts', 'prfx_color_enqueue');
