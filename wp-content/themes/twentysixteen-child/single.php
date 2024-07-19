<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h1><?php the_title(); ?></h1>
    <div class="post-content">
        <?php the_content(); ?>

        <?php
        // Display the image gallery
        if (function_exists('display_test_image_gallery')) {
            display_test_image_gallery(get_the_ID());
        }
        ?>
    </div>
<?php endwhile; endif; ?>
<?php get_sidebar();?>

<?php get_footer(); ?>
