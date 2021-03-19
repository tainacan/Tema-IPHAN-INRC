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
	define('IPHAN_INRC_VERSION', '0.0.4');
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
		add_theme_support('align-wide');

		/* Editor (Gutenberg side) Styles */
		add_theme_support('editor-styles');
		add_editor_style([get_template_directory_uri() . '/editor-style.css']);
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

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	//Bootstrap Javascript
	// <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	//wp_register_script('bootstrap4JS', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', array('jquery'), IPHAN_INRC_VERSION, true);
	wp_register_script('bootstrap4JS', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js', array('jquery'), IPHAN_INRC_VERSION, true);

	wp_enqueue_script('bootstrap4JS');

	// Scripts necessary for using the gallery modal
	wp_enqueue_style('swiper', 'https://unpkg.com/swiper/swiper-bundle.min.css', array(), IPHAN_INRC_VERSION);
	wp_enqueue_script('swiper', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), IPHAN_INRC_VERSION, true);
	wp_enqueue_style('photoswipe', 'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.css', array(), IPHAN_INRC_VERSION);
	wp_enqueue_style('photoswipe-skin', 'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/default-skin/default-skin.min.css', array(), IPHAN_INRC_VERSION);
	wp_enqueue_script('photoswipe', 'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.js', array(), IPHAN_INRC_VERSION, true);
	wp_enqueue_script('photoswipe-skin', 'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe-ui-default.min.js', array(), IPHAN_INRC_VERSION, true);
	wp_enqueue_script('blocksy-tainacan-scripts__swiper', get_stylesheet_directory_uri() . '/js/media-carousel.js', ['swiper', 'photoswipe', 'photoswipe-skin'], IPHAN_INRC_VERSION, true);
}
add_action('wp_enqueue_scripts', 'iphan_inrc_scripts');

function iphan_inrc_enqueue_editor_scripts()
{
	// Logic for changing core/button via wp.hooks
	wp_enqueue_script('iphan_inrc-blocks', get_template_directory_uri() . '/js/blocks.js', array(), IPHAN_INRC_VERSION, true);
}
add_action('enqueue_block_editor_assets', 'iphan_inrc_enqueue_editor_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

//blocks styles
require get_template_directory() . '/template-parts/block-styles.php';

//blocks pattern
require get_template_directory() . '/template-parts/block-patterns.php';

//color palette
require get_template_directory() . '/template-parts/color-palette.php';

//breadcrumb
require get_template_directory() . '/template-parts/breadcrumb.php';

//excerpts
require get_template_directory() . '/template-parts/excerpts.php';

//comments
require get_template_directory() . '/template-parts/filter-comments.php';


//custom blocks

//accordion blocks
require get_template_directory() . '/custom-blocks/accordion-block/accordion-block.php';

//custom blocks
require get_template_directory() . '/custom-blocks/inner-accordion-block/inner-accordion-block.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

?>