<?php
/**
 * Template Name: Front Page
 *
 * @package YourTheme
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

    <?php
    // Your front page content goes here
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content', 'page' );
        endwhile;
    endif;
    ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
