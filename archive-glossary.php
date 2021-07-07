<?php

/**
 * The template for displaying archive pages
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
		<header class="site-container">
			<div class="entry-content alinhamento-titulos-post">
				<?php
				echo '<h1 class="archive-title-glossary is-style-title-iphan-underscore">' . get_theme_mod('iphan_inrc_glossary_archive_title', 'Glossário INRC') . '</h1>';
				echo '<div class="archive-description archive-description-glossary">' . get_theme_mod('iphan_inrc_glossary_archive_description', 'Conheça aqui os termos do Glossário desenvolvido pelo IPHAN INRC.') . '</div>';
				?>
			</div>
        </header><!-- .site-container -->
		<div class="entry-content">
			<ul class="glossary-list <?php echo (get_theme_mod('iphan_inrc_glossary_archive_alignwide', false) ? 'alignfull' : 'alignwide') . ' has-column-count-' . get_theme_mod( 'iphan_inrc_glossary_archive_columns_count', 2 ) ?>">
			<?php
			/* Start the Loop */
			while (have_posts()) :
				the_post();
				/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/
				get_template_part('template-parts/content', 'list-glossary');
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