<?php
/*
	Template Name: Título largo 
	Template Post Type: post 
	*/
?>

<?php get_header(); ?>
<?php get_template_part('template-parts/site-banner'); ?>
<?php custom_breadcrumbs(); ?>

<main id="primary" class="site-main ">

<?php
    while ( have_posts() ) :
        the_post();

        get_template_part( 'template-parts/content', 'singular' );

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

    endwhile; // End of the loop.
?>

</main><!-- #main -->

<?php get_footer(); ?>