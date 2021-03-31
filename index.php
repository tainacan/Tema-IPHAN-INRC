<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package IPHAN_INRC
 */

get_header();
get_template_part('template-parts/site-banner');
custom_breadcrumbs();
?>
<main id="primary" class="site-main site-container">

	<?php if (have_posts()) : ?>

		<div class="entry-content">
			<ul class="alignwide">
			<?php
			/* Start the Loop */
			while (have_posts()) :
				the_post();
				/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
				get_template_part('template-parts/content');
			endwhile;
			the_posts_pagination(array(
				'mid_size' => 2,
				'prev_text' => __('<i class="tainacan-icon tainacan-icon-1-125em tainacan-icon-previous"></i>'),
				'next_text' => __('<i class="tainacan-icon tainacan-icon-1-125em tainacan-icon-next"></i>'),
			));
		else :
			get_template_part('template-parts/content', 'none');
		endif;
			?>
			</ul>
		</div>
</main><!-- #main -->
<?php get_footer(); ?>