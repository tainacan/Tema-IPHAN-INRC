<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package IPHAN_INRC
 */

get_header();
get_template_part('template-parts/site-banner');
custom_breadcrumbs();
?>

<main id="primary" class="site-main ">

	<?php
	while (have_posts()) :
		the_post();

		get_template_part('template-parts/content', 'singular');

		the_post_navigation(
			array(
				'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'iphan_inrc') . '</span> <span class="nav-title">%title</span>',
				'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'iphan_inrc') . '</span> <span class="nav-title">%title</span>',
			)
		);
		// If comments are open or we have at least one comment, load up the comment template.
		if (comments_open() || get_comments_number()) :
			comments_template();
		endif;
	endwhile; // End of the loop.
	?>
</main><!-- #main -->
<?php get_footer(); ?>