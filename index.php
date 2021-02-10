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
		echo '<div class="cabecalho-ultimas-noticias">';
		echo '<h1 class="is-style-title-iphan-underscore col-md-5 ultimas-noticias" >últimas notícias</h1>';
		echo '<form role="search" method="get" class="search-form col-md-4" action="' . esc_url(home_url('/')) . '">';
		echo '<input class="has-icon-right search-bar-home col-md-12" name="s" placeholder="Busque por notícias" value=' . get_search_query() . '><i size="50px" class="tainacan-icon tainacan-icon-search"></i>';
		echo '</form>';
		echo '</div>';

		echo '<div class="entry-content"><ul class="alignwide">';

		// Função para limitar a quantidade de posts por pesquisa
		$args = array('post_type' => 'post', 'posts_per_page' => 1, 'paged' => $paged);
		$wp_query = new WP_Query($args);
		
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
		the_posts_navigation();

		echo '</ul></div>';

	else :
		get_template_part('template-parts/content', 'none');

	endif;
	?>
</main><!-- #main -->
<div class="banner-or">
	<div class="banner-footer col-md-7" style="background-image: url('<?php echo get_template_directory_uri() ?>/assets/images/fundoOr1.png')">
	</div>
	<div class="banner-footer-or"><span class="text-banner-footer">ou</span></div>

	<div class="buttons-banner-footer">
		<a class="button-white-footer-banner">Explore o repositório</a>
		<div class="separator-banner-footer-horizontal">
		</div>
		<a class="button-white-footer-banner">Acesse o repositório completo</a>
	</div>
	<div class="banner-footer col-md-7" style="background-image: url('<?php echo get_template_directory_uri() ?>/assets/images/fundoOr2.png')">
	</div>

</div>
<?php
get_footer();
?>