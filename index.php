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
	<?php
	if (have_posts()) :
		if (is_home() && !is_front_page()) :
	?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>
	<?php
		endif;
		if (is_search()) {
			echo '<div class="cabecalho-ultimas-noticias">';
			echo '<h1 class="is-style-title-iphan-underscore col-md-5 ultimas-noticias" >Resultado de busca por: ' . get_search_query() . '</h1>';
		} else {
			echo '<div class="cabecalho-ultimas-noticias">';
			echo '<h1 class="is-style-title-iphan-underscore col-md-5 ultimas-noticias" >últimas notícias</h1>';
		}
		echo '<form role="search" method="get" class="search-form col-md-4" action="' . esc_url(home_url('/')) . '">';
		echo '<input class="has-icon-right search-bar search-bar__home col-md-12" name="s" type="search" placeholder="Busque por notícias" value=' . get_search_query() . '><i class="tainacan-icon tainacan-icon-1-25em tainacan-icon-search"></i>';
		echo '</form>';
		echo '</div>';
		echo '<div class="entry-content"><ul class="alignwide">';
		/* Start the Loop */
		while (have_posts()) :
			the_post();
			/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
			get_template_part('template-parts/list-post');
		endwhile;
		the_posts_pagination(array(
			'mid_size' => 2,
			'prev_text'          => __('<i class="tainacan-icon tainacan-icon-1-125em tainacan-icon-previous"></i>'),
			'next_text'          => __('<i class="tainacan-icon tainacan-icon-1-125em tainacan-icon-next"></i>'),
		));
		echo '</ul></div>';
	else :
		get_template_part('template-parts/content', 'none');

	endif;
	?>
</main><!-- #main -->
<?php
get_footer();
?>