<?php 
	get_header(); 
	get_template_part('template-parts/site-banner');
	custom_breadcrumbs(); 	
?>

<main id="primary" class="site-main site-container">
	<div class="entry-content">

		<div class="row alignfull">
			<div class="">
				<h2 class="is-style-title-iphan-underscore">Todos os Itens do Repositório</h2>
			</div>
		</div>

		<?php tainacan_the_faceted_search([
			'default_view_mode' => get_theme_mod('tainacan_items_repository_list_default_view_mode', 'masonry'),
			'default_items_per_page' => get_theme_mod('tainacan_items_page_default_items_per_page', 12),
			'hide_filters' => get_theme_mod('tainacan_items_page_hide_filters', false),
			'hide_hide_filters_button' => get_theme_mod('tainacan_items_page_hide_hide_filters_button', false),
			'hide_search' => get_theme_mod('tainacan_items_page_hide_search', false),
			'hide_advanced_search' => get_theme_mod('tainacan_items_page_hide_advanced_search', false),
			'hide_sort_by_button' => get_theme_mod('tainacan_items_page_hide_sort_by_button', false),
			'hide_exposers_button' => get_theme_mod('tainacan_items_page_hide_exposers_button', false),
			'hide_items_per_page_button' => get_theme_mod('tainacan_items_page_hide_items_per_page_button', false),
			'hide_go_to_page_button' => get_theme_mod('tainacan_items_page_hide_go_to_page_button', false),
			'show_filters_button_inside_search_control' => get_theme_mod('tainacan_items_page_show_filters_button_inside_search_control', false),
			'start_with_filters_hidden' => get_theme_mod('tainacan_items_page_start_with_filters_hidden', false),
			'filters_as_modal' => get_theme_mod('tainacan_items_page_filters_as_modal', false),
			'show_inline_view_mode_options' => get_theme_mod('tainacan_items_page_show_inline_view_mode_options', false),
			'show_fullscreen_with_view_modes' => get_theme_mod('tainacan_items_page_show_fullscreen_with_view_modes', false)
		]); ?>
	</div>
</main>

<?php get_footer(); ?>
