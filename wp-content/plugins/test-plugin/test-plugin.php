<?php
/**
 * Plugin Name: test plugin
 * Description: This plugin is for image metabox testing
 * Author: Hawana Tamang
 * Version: 1.0.0
 */

function add_image_metabox(){
    add_meta_box('image_metabox', 'Image', 'image_metabox_callback', 'post');
}
add_action('add_meta_boxes','add_image_metabox');

function image_metabox_callback($post){
    $image_ids = get_post_meta($post->ID, 'my_field', true);

    // the explode function is for splitting the string into array
    $image_ids = !empty($image_ids) ? explode(',', $image_ids) : array();

    ?>
        <ul class="hawana-gallery">
            <?php
                foreach($image_ids as $id){
                    //wp_get_attachment_url($id) gets the URL of the attachment with the given ID.
                    $url = wp_get_attachment_url($id);
                    if($url){
                        ?>
                            <li data-id="<?php echo esc_attr($id)?>">
                            <span style="background-image: url('<?php echo esc_url($url); ?>')"></span>
                            <a href="#" class="hawana-gallery-remove">&times;</a>
                            </li>
                        <?php
                    }
                }
            ?>
        </ul>
        <input type="hidden" name="my_field" value="<?php echo esc_attr(join(',', $image_ids)); ?>" />
        <input  type="button" class="button hawana-upload-button" value="Add Images"></input>
    <?php
}

function hawana_save_postdata($post_id) {
    if (array_key_exists('my_field', $_POST)) {
        update_post_meta(
            $post_id,
            'my_field',
            sanitize_text_field($_POST['my_field'])
        );
    }
}
add_action('save_post', 'hawana_save_postdata');

function display_test_image_gallery($post_id) {
    $image_ids = get_post_meta($post_id, 'my_field', true);
    $image_ids = !empty($image_ids) ? explode(',', $image_ids) : array();

    if ($image_ids) {
        echo '<ul class="hawana-gallery">';
        foreach ($image_ids as $id) {
            $url = wp_get_attachment_url($id);
            if ($url) {
                echo '<li data-id="' . esc_attr($id) . '">';
                echo '<span style="background-image: url(' . esc_url($url) . ');"></span>';
                echo '</li>';
            }
        }
        echo '</ul>';
    }
}


function hawana_enqueue_scripts($hook) {
    if ('post.php' != $hook && 'post-new.php' != $hook) {
        return;
    }

    wp_enqueue_media();
    wp_enqueue_script('hawana-gallery-js', plugin_dir_url(__FILE__) . 'hawana-gallery.js', array('jquery'), '1.0', true);
    wp_enqueue_style('hawana-gallery-css', plugin_dir_url(__FILE__) . 'hawana-gallery.css');
}
add_action('admin_enqueue_scripts', 'hawana_enqueue_scripts');


function hawana_enqueue_frontend_styles() {
    wp_enqueue_style('hawana-gallery-css', plugin_dir_url(__FILE__) . 'hawana-gallery.css');
}
add_action('wp_enqueue_scripts', 'hawana_enqueue_frontend_styles');
?>