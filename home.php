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
	<?php get_template_part('template-parts/destaques-noticias');
	if (have_posts()) : ?>
		<header class="page-header">
			<div class="cabecalho-ultimas-noticias">
				<h1 class="is-style-title-iphan-underscore col-md-5 ultimas-noticias"><?php _e('Últimas Notícias', 'iphan_inrc') ?></h1>
				<form role="search" method="get" class="search-form col-md-4" action="<?php echo esc_url(home_url('/')) ?>">
					<input class="has-icon-right search-bar search-bar__home col-md-12" name="s" type="search" placeholder="<?php echo _e('Busque por notícias', 'iphan_inrc') ?>" value="<?php echo get_search_query() ?> ">
					<i class="tainacan-icon tainacan-icon-1-25em tainacan-icon-search"></i>
				</form>
			</div>
		</header><!-- .page-header -->

		<div class="entry-content">
			<ul class="alignwide">
			<?php
			/* Start the Loop */
			while (have_posts()) :
				the_post();
				get_template_part('template-parts/content', 'list');
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