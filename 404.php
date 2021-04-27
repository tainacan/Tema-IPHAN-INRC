<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package IPHAN_INRC
 */

get_header();
get_template_part('template-parts/site-banner');
custom_breadcrumbs();
?>
<main id="primary" class="site-main col-md-12">
	<article id="page-404?>" <?php post_class(); ?>>
		<header class="entry-header">
			<h1 class="entry-title is-style-title-iphan-underscore"><?php esc_html_e('página não encontrada', 'iphan_inrc'); ?></h1>
		</header><!-- .page-header -->
		<div class="entry-content">
			<p><?php esc_html_e('Gostaria de pesquisar outro conteúdo?', 'iphan_inrc'); ?></p>
			<?php
			get_search_form();
			the_widget('WP_Widget_Recent_Posts');
			?>
			<div class="widget widget_categories">
				<h2 class="widget-title"><?php esc_html_e('Listagem de Categorias', 'iphan_inrc'); ?></h2>
				<ul>
					<?php
					wp_list_categories(
						array(
							'orderby'    => 'count',
							'order'      => 'DESC',
							'show_count' => 1,
							'title_li'   => '',
							'number'     => 10,
						)
					);
					?>
				</ul>
			</div><!-- .widget -->
			<?php
			/* translators: %1$s: smiley */
			$iphan_inrc_archive_content = '<p>' . sprintf(esc_html__('Try looking in the monthly archives. %1$s', 'iphan_inrc'), convert_smilies(':)')) . '</p>';
			the_widget('WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$iphan_inrc_archive_content");
			the_widget('WP_Widget_Tag_Cloud');
			?>
		</div><!-- .page-content -->
	</article>
</main><!-- #main -->
<?php get_footer(); ?>