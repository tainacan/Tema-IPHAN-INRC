<?php

/**
 * IPHAN INRC functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package IPHAN_INRC
 */

if (!defined('IPHAN_INRC_VERSION')) {
	// Replace the version number of the theme on each release.
	define('IPHAN_INRC_VERSION', '0.1.6');
}

if (!function_exists('iphan_inrc_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function iphan_inrc_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on IPHAN INRC, use a find and replace
		 * to change 'iphan_inrc' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('iphan_inrc', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Principal', 'iphan_inrc'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for custom header
		$header_args = array(
			'width'              => 1920,
			'height'             => 672,
			'header-text'		 => false,
			'flex-width'         => false,
			'flex-height'        => false,
		);
		add_theme_support('custom-header', $header_args);

		$header_images = array(
			'praia' => array(
				'url'           => get_template_directory_uri() . '/assets/images/banner.png',
				'thumbnail_url' => get_template_directory_uri() . '/assets/images/banner.png',
				'description'   => 'Um cenário de uma pria brasileira.',
			),
		);
		register_default_headers($header_images);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		/* Align wide and full */
		add_theme_support('custom-spacing');
		$is_post_type_inventarios = $_GET && isset($_GET['post']) && get_post_type($_GET['post']) == 'inventarios';
		if (!$is_post_type_inventarios)
			add_theme_support('align-wide');

		/* Editor (Gutenberg side) Styles */
		add_theme_support('editor-styles');
		add_editor_style([get_template_directory_uri() . '/editor-style.css']);

		/**
		 * Removes support for Gutenberg widgets editor, by now...
		 */
		remove_theme_support( 'widgets-block-editor' );
	}
endif;
add_action('after_setup_theme', 'iphan_inrc_setup');

function my_block_plugin_editor_scripts()
{
	wp_register_style('TainacanIconsFont', get_template_directory_uri() . '/assets/fonts/tainacan-icons/css/tainacanicons.min.css', '', '1.0.3', '');
	wp_enqueue_style('TainacanIconsFont');
}
add_action('enqueue_block_editor_assets', 'my_block_plugin_editor_scripts');
/**
 * Enqueueing Google Font wasn't working on wp_enqueue_scripts so we handle here
 */
function iphan_inrc_head_extra_enqueues()
{
?>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,400;0,500;0,700;0,800;1,300;1,400;1,500;1,700;1,800&family=Rubik:ital,wght@0,300;0,400;0,500;0,700;0,800;1,300;1,400;1,500;1,700;1,800&display=swap" rel="stylesheet">
<?php
}
add_action('wp_head', 'iphan_inrc_head_extra_enqueues');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function iphan_inrc_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Footer', 'iphan_inrc'),
			'id'            => 'footer-1',
			'description'   => esc_html__('Add widgets here.', 'iphan_inrc'),
			'before_widget' => '<section class="widget %2$s col-sm-6 col-md-3" >',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h2 class="widget-title collapsible">',
			'after_title'   => '<a type="button" class="plus-minus"></a></h2><div class="content" >',
		)
	);
}
add_action('widgets_init', 'iphan_inrc_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function iphan_inrc_scripts()
{

	// Our main style
	wp_enqueue_style('iphan_inrc-style', get_stylesheet_uri(), array(), IPHAN_INRC_VERSION);
	wp_style_add_data('iphan_inrc-style', 'rtl', 'replace');

	// Tainacan Icons
	wp_register_style('TainacanIconsFont', get_template_directory_uri() . '/assets/fonts/tainacan-icons/css/tainacanicons.min.css', '', '1.0.3', '');
	wp_enqueue_style('TainacanIconsFont');

	// Enqueues our custom js for navigation
	wp_enqueue_script('iphan_inrc-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), IPHAN_INRC_VERSION, true);

	//Equeue our custom comments
	wp_enqueue_script('iphan_inrc', get_template_directory_uri() . '/js/comments.js', array('jquery'), IPHAN_INRC_VERSION, true);

	wp_enqueue_script('iphan_inrc-carousels', get_template_directory_uri() . '/js/carousel.js', array('jquery'), IPHAN_INRC_VERSION, true);


	//register e enqueue swiper
	wp_register_script('iphan-swiper',  get_template_directory_uri() . '/assets/swiper-bundle.js', array('jquery'), IPHAN_INRC_VERSION, true);
	wp_enqueue_script('iphan-swiper');
	wp_register_style('iphan-swiper',  get_template_directory_uri() . '/assets/swiper-bundle.css', '', IPHAN_INRC_VERSION);
	wp_enqueue_style('iphan-swiper');

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	//Bootstrap Javascript
	// <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	//wp_register_script('bootstrap4JS', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', array('jquery'), IPHAN_INRC_VERSION, true);
	wp_register_script('bootstrap4JS', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js', array('jquery'), IPHAN_INRC_VERSION, true);

	wp_enqueue_script('bootstrap4JS');
}
add_action('wp_enqueue_scripts', 'iphan_inrc_scripts');

function iphan_inrc_admin_scripts()
{
	if ( is_user_logged_in() ) {
		$user = wp_get_current_user();
		$roles = ( array ) $user->roles;

		if ( in_array('tainacan-usuario_logado', $roles) ) {
			wp_enqueue_script('iphan_redirects', get_template_directory_uri() . '/js/redirect.js', array(), IPHAN_INRC_VERSION, true);
		}
	}
}
add_action('admin_enqueue_scripts', 'iphan_inrc_admin_scripts');

function iphan_inrc_enqueue_editor_scripts()
{
	// Logic for changing core/button via wp.hooks
	wp_enqueue_script('iphan_inrc-blocks', get_template_directory_uri() . '/js/blocks.js', array(), IPHAN_INRC_VERSION, true);
}
add_action('enqueue_block_editor_assets', 'iphan_inrc_enqueue_editor_scripts');

add_action('pre_get_posts', function($query) {
    if ( !is_admin() && $query->is_archive() && is_post_type_archive( 'tainacan-collection' ) ) {
        $tax_query = array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => 'control',
            'operator'=> 'NOT IN' 
        );
        $query->tax_query->queries[] = $tax_query; 
   		$query->query_vars['tax_query'] = $query->tax_query->queries;
    }
});

function iphan_inrc_customize_control_collection_css()
{
	$control_collection_ids = [];
	$control_collections = \IPHAN_INRC\IPHANCategoryCollection::get_instance()->get_iphan_control_collections();

	if ( empty($control_collections) )
		return;

	$control_collection_ids = array_map(function($collection) {
		return $collection->get_ID();
	}, $control_collections);
	
	$css = '';

	foreach( $control_collection_ids as $control_collection_id ) {

		$control_collection_metadatum_ids = [];
		$control_collection_metadatas = \Tainacan\Repositories\Metadata::get_instance()->fetch([
			'meta_query' => [
				[
					'key'   => 'metadata_type',
					'value' => 'Tainacan\Metadata_Types\Relationship'
				],
				[
					'key' => '_option_collection_id',
					'value' => $control_collection_id
				]
			],
			'perpage' => -1
		], 'OBJECT');

		if ( empty($control_collection_metadatas) )
			continue;
		
		$control_collection_metadatum_ids = array_map(function($metadatum) {
			return $metadatum->get_ID();
		}, $control_collection_metadatas);

		foreach( $control_collection_metadatum_ids as $control_collection_metadatum_id ) {
			$css .= '
				/* Tweaks the relationship input on the collection that has relation to the control collection, so that it only allows creation or edition of existing items */
				.columns.is-fullheight:not(.tainacan-admin-collection-item-edition-mode)>.column>#collection-page-container .tainacan-metadatum-component--tainacan-relationship.tainacan-metadatum-id--' . $control_collection_metadatum_id . ' .tabs,
				.columns.is-fullheight:not(.tainacan-admin-collection-item-edition-mode)>.column>#collection-page-container .tainacan-metadatum-component--tainacan-relationship.tainacan-metadatum-id--' . $control_collection_metadatum_id . ' .tab-content>.tab-item:first-of-type {
					display: none;
					visibility: hidden;
				}
				.columns.is-fullheight:not(.tainacan-admin-collection-item-edition-mode)>.column>#collection-page-container .tainacan-metadatum-component--tainacan-relationship.tainacan-metadatum-id--' . $control_collection_metadatum_id . ' .tab-content>.tab-item:last-of-type {
					display: block !important;
					visibility: visible;
				}
				.columns.is-fullheight:not(.tainacan-admin-collection-item-edition-mode)>.column>#collection-page-container .tainacan-metadatum-component--tainacan-relationship.tainacan-metadatum-id--' . $control_collection_metadatum_id . ' .tainacan-modal .modal-content {
					max-width: 640px !important;
					max-height: 60vh !important;
				}
				.columns.is-fullheight:not(.tainacan-admin-collection-item-edition-mode)>.column>#collection-page-container .tainacan-metadatum-component--tainacan-relationship.tainacan-metadatum-id--' . $control_collection_metadatum_id . ' .tainacan-modal .modal-content iframe {
					height: 59vh !important;
				}
				.columns.is-fullheight:not(.tainacan-admin-collection-item-edition-mode)>.column>#collection-page-container .tainacan-metadatum-component--tainacan-relationship.tainacan-metadatum-id--' . $control_collection_metadatum_id . ' .tainacan-relationship-results-container {
					border: none;
					padding-left: 0;
				}
				.columns.is-fullheight:not(.tainacan-admin-collection-item-edition-mode)>.column>#collection-page-container .tainacan-metadatum-component--tainacan-relationship.tainacan-metadatum-id--' . $control_collection_metadatum_id . ' .tainacan-relationship-results-container  .tainacan-relationship-group > div > .multivalue-separator {
					margin-left: 0;
				}
				.columns.is-fullheight:not(.tainacan-admin-collection-item-edition-mode)>.column>#collection-page-container .tainacan-metadatum-component--tainacan-relationship.tainacan-metadatum-id--' . $control_collection_metadatum_id . ' .tainacan-relationship-results-container .tainacan-metadatum {
					margin-left: 0px;
				}
				.columns.is-fullheight:not(.tainacan-admin-collection-item-edition-mode)>.column>#collection-page-container .tainacan-metadatum-component--tainacan-relationship.tainacan-metadatum-id--' . $control_collection_metadatum_id . ' .add-link {
					content: "";
					color: transparent !important;
					font-size: 0 !important;
				}
				.columns.is-fullheight:not(.tainacan-admin-collection-item-edition-mode)>.column>#collection-page-container .tainacan-metadatum-component--tainacan-relationship.tainacan-metadatum-id--' . $control_collection_metadatum_id . ' .add-link>.icon {
					font-size: 0.875rem;
				}
				.columns.is-fullheight:not(.tainacan-admin-collection-item-edition-mode)>.column>#collection-page-container .tainacan-metadatum-component--tainacan-relationship.tainacan-metadatum-id--' . $control_collection_metadatum_id . ' .add-link::after {
					content: "Adicionar valor";
					color: var(--tainacan-secondary);
					font-size: 0.75rem;
					margin-top: 6px;
				}
			
				/* Hides elements not necessary for control collections inside the item edition modal */
				.columns.is-fullheight.tainacan-admin-collection-item-edition-mode>.column>#collection-page-container[collection-id="' . $control_collection_id . '"]>.tainacan-form>.columns>.column:first-of-type {
					width: 100%%;
					padding: 0 1rem;
				}
				.columns.is-fullheight.tainacan-admin-collection-item-edition-mode>.column>#collection-page-container[collection-id="' . $control_collection_id . '"]>.tainacan-form>.columns>.column:last-of-type,
				.columns.is-fullheight.tainacan-admin-collection-item-edition-mode>.column>#collection-page-container[collection-id="' . $control_collection_id . '"]>.tainacan-form>.columns>.column:first-of-type>.columns,
				.columns.is-fullheight.tainacan-admin-collection-item-edition-mode>.column>#collection-page-container[collection-id="' . $control_collection_id . '"]>.tainacan-form>.columns>.column:first-of-type>.b-tabs>.tabs,
				.columns.is-fullheight.tainacan-admin-collection-item-edition-mode>.column>#collection-page-container[collection-id="' . $control_collection_id . '"]>.tainacan-form>.columns>.column:first-of-type>.b-tabs .sub-header {
					display: none;
					visibility: hidden;
				}
				.columns.is-fullheight.tainacan-admin-collection-item-edition-mode>.column>#collection-page-container[collection-id="' . $control_collection_id . '"]>.tainacan-form>.columns>.column:first-of-type>.b-tabs>.tab-content {
					border-top: none;
				}
				.columns.is-fullheight.tainacan-admin-collection-item-edition-mode>.column>#collection-page-container[collection-id="' . $control_collection_id . '"].page-container .tainacan-page-title {
					margin-bottom: 12px;
					padding: 0 1.5rem;
				}
				.columns.is-fullheight.tainacan-admin-collection-item-edition-mode>.column>#collection-page-container[collection-id="' . $control_collection_id . '"].page-container .tainacan-page-title h1 {
					content: "";
					color: transparent !important;
					font-size: 0 !important;
				}
				.columns.is-fullheight.tainacan-admin-collection-item-edition-mode>.column>#collection-page-container[collection-id="' . $control_collection_id . '"].page-container.item-creation-container .tainacan-page-title h1::after {
					content: "Adicionar valor";
					color: var(--tainacan-gray5);
					font-size: 1.25rem;
				}
				.columns.is-fullheight.tainacan-admin-collection-item-edition-mode>.column>#collection-page-container[collection-id="' . $control_collection_id . '"].page-container.item-edition-container .tainacan-page-title h1::after {
					content: "Editar valor";
					color: var(--tainacan-gray5);
					font-size: 1.25rem;
				}
				.columns.is-fullheight.tainacan-admin-collection-item-edition-mode>.column>#collection-page-container[collection-id="' . $control_collection_id . '"].page-container .column.is-7 .tab-item > .field:last-child {
					margin-bottom: 0 !important;
				}
				.columns.is-fullheight.tainacan-admin-collection-item-edition-mode>.column>#collection-page-container[collection-id="' . $control_collection_id . '"].page-container .column.is-7 .tainacan-finder-columns-container {
					max-height: 50vh
				}
				.columns.is-fullheight.tainacan-admin-collection-item-edition-mode>.column>#collection-page-container[collection-id="' . $control_collection_id . '"].page-container .form-submission-footer .button.is-secondary {
					display: none !important;
					visibility: hidden;
				}
				.columns.is-fullheight.tainacan-admin-collection-item-edition-mode>.column>#collection-page-container[collection-id="' . $control_collection_id . '"].page-container .footer {
					position: fixed;
					padding: 16px 1em;
				}
				.columns.is-fullheight.tainacan-admin-collection-item-edition-mode>.column>#collection-page-container[collection-id="' . $control_collection_id . '"].page-container .update-info-section {
					margin-bottom: -2.5rem;
					margin-left: 0;
				}
				.columns.is-fullheight.tainacan-admin-collection-item-edition-mode>.column>#collection-page-container[collection-id="' . $control_collection_id . '"].page-container .form-submission-footer .button.is-success {
					content: "";
					color: transparent !important;
					font-size: 0 !important;
					margin-left: auto;
				}
				.columns.is-fullheight.tainacan-admin-collection-item-edition-mode>.column>#collection-page-container[collection-id="' . $control_collection_id . '"].page-container .form-submission-footer .button.is-outlined {
					display: none;
					visibility: hidden;
				}
				.columns.is-fullheight.tainacan-admin-collection-item-edition-mode>.column>#collection-page-container[collection-id="' . $control_collection_id . '"].page-container.item-creation-container .form-submission-footer .button.is-success::after {
					content: "Adicionar";
					color: white;
					font-size: 0.875rem;
				}
				.columns.is-fullheight.tainacan-admin-collection-item-edition-mode>.column>#collection-page-container[collection-id="' . $control_collection_id . '"].page-container.item-edition-container .form-submission-footer .button.is-success::after {
					content: "Concluir";
					color: white;
					font-size: 0.875rem;
				}
				.columns.is-fullheight.tainacan-admin-collection-item-edition-mode>.column>#collection-page-container[collection-id="' . $control_collection_id . '"] .status-tag {
					display: none;
					visibility: hidden;
				}
				.columns.is-fullheight.tainacan-admin-collection-item-edition-mode>.column>#collection-page-container[collection-id="' . $control_collection_id . '"] .field {
					padding-left: 0;
				}
				.columns.is-fullheight.tainacan-admin-collection-item-edition-mode>.column>#collection-page-container[collection-id="' . $control_collection_id . '"] .field .collapse-handle,
				.columns.is-fullheight.tainacan-admin-collection-item-edition-mode>.column>#collection-page-container[collection-id="' . $control_collection_id . '"] .field .collapse-handle .label {
					margin-left: 0;
				}
				.columns.is-fullheight.tainacan-admin-collection-item-edition-mode>.column>#collection-page-container[collection-id="' . $control_collection_id . '"] .field .collapse-handle .icon {
					display: none;
					visibility: hidden;
				}
			';
		}
	}
	
	echo '<style type="text/css" id="tainacan-control-collections-style">' . sprintf( $css ) . '</style>';
}
add_action('admin_head', 'iphan_inrc_customize_control_collection_css');

function iphan_inrc_customize_form_hooks_css() {

	$css = '
		/* IPHAN-INRC Form Hooks */
		.tainacan-category-taxonomy-collection .control {
			column-count: 2;
		}

		.tainacan-category-taxonomy-collection .control .checkbox {
			break-inside: avoid;
		}

		.tainacan-metadatum-edition-form--type-tainacan-relationship .form-hook-region,
		#collection-page-container .form-hook-region {
			display: block;
			visibility: visible;
		}

		/* Hides disabled inputs on the media frame when user does not have permission to edit them. Avoid frustration...*/
		.tainacan-document-modal input:disabled,
		.tainacan-document-modal input[readonly],
		.tainacan-document-modal textarea:disabled,
		.tainacan-document-modal textarea[readonly],
		.tainacan-item-attachments-modal input:disabled,
		.tainacan-item-attachments-modal input[readonly],
		.tainacan-item-attachments-modal textarea:disabled,
		.tainacan-item-attachments-modal textarea[readonly] {
			display: none !important;
		}
	';
	
	echo '<style type="text/css" id="tainacan-iphan-form-hooks-style">' . sprintf( $css ) . '</style>';
}
add_action('admin_head', 'iphan_inrc_customize_form_hooks_css');

/*
 * Sends params to the Tainacan Admin Options to hide certain elements according to user caps
 */
function iphan_set_tainacan_admin_options($options) {
	
	if ( is_user_logged_in() ) {
		$user = wp_get_current_user();
		$roles = ( array ) $user->roles;
		$iphan_tainacan_admin_options = [];
		$admin_options_collections = get_option('IPHAN_tainacan_admin_options_by_role', []);
		$admin_options_collections = is_array($admin_options_collections) ? $admin_options_collections : [];

		foreach($roles as $role) {
			if ( isset($admin_options_collections[$role])) {
				foreach($admin_options_collections[$role] as $option) {
					
					$iphan_tainacan_admin_options[$option] = true;

					if ($option == 'hideHomeCollectionsButton') {
						$iphan_tainacan_admin_options['homeCollectionsPerPage'] = 18;
					}
				}
				$iphan_tainacan_admin_options['homeCollectionsOrderBy'] = 'title';
				$iphan_tainacan_admin_options['homeCollectionsOrder'] = 'asc';
			}
		}
		$options = array_merge($options, $iphan_tainacan_admin_options);
	}
	return $options;
};
add_filter('set_tainacan_admin_options', 'iphan_set_tainacan_admin_options');

require get_template_directory() . '/inc/user_has_cap_filter.php';
require get_template_directory() . '/inc/imports.php';
require get_template_directory() . '/inc/inventarios-post-type.php';

?>