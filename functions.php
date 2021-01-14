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
	define('IPHAN_INRC_VERSION', '1.0.0');
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
				'menu-1' => esc_html__('Primary', 'iphan_inrc'),
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

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'iphan_inrc_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

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
	}
endif;
add_action('after_setup_theme', 'iphan_inrc_setup');

/* function iphan_inrc_init(){

	register_block_style(            
		'core/heading',            
	 	array(                
	   	'name'  => 'title-iphan',                
	   	'label' =>  'Título IPHAN ',            
		)        
	);
}
add_action('init', 'iphan_inrc_init'); */
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function iphan_inrc_content_width()
{
	$GLOBALS['content_width'] = apply_filters('iphan_inrc_content_width', 640);
	//block styles


}
add_action('after_setup_theme', 'iphan_inrc_content_width', 0);

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
	wp_enqueue_style('iphan_inrc-style', get_stylesheet_uri(), array(), IPHAN_INRC_VERSION);
	wp_style_add_data('iphan_inrc-style', 'rtl', 'replace');
	//instalação do bootstrap
	wp_enqueue_style('boostrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css', array(), '', 'all');
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.3.1.slim.min.js', array(), null, true);
	wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array(), null, true);
	wp_enqueue_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js', array('jquery'), null, true);

	// Tainacan Icons
	wp_register_style('TainacanIconsFont', get_template_directory_uri() . '/assets/fonts/tainacan-icons/css/tainacanicons.min.css', '', '1.0.3', '');
	wp_enqueue_style('TainacanIconsFont');


	wp_enqueue_script('iphan_inrc-navigation', get_template_directory_uri() . '/js/navigation.js', array(), IPHAN_INRC_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}

function admin_style() {
	wp_enqueue_style('admin-styles', get_template_directory_uri().'/style.css');
  }
  add_action('admin_enqueue_scripts', 'admin_style');
// Desativar cores personalizadas de Gutenberg
add_theme_support('disable-custom-colors');
// Desativar gradientes personalizados de Gutenberg
add_theme_support('disable-custom-gradients');




//Begin Widget pras redes sociais


/* class RedesSociaisWidget extends WP_Widget {

public function __construct() {
	$options = array(
	‘classname’ => ‘custom_livescore_widget’,
	‘description’ => ‘Redes Sociais’,
);
}

parent::__construct(
‘live_score_widget’, ‘Live Score Widget’, $options
);
}

public function widget( $args, $instance ) {
$args[‘after_title’];
echo ‘Hello, World!’;

// Keep this line
echo $args[‘after_widget’];
}
}
// Register the widget
function my_register_custom_widget() {
register_widget( Redes_Sociais_Widget );
}
add_action( ‘widgets_init’, ‘Redes Sociais’ ); */

//End Widget pras redes sociais

add_action('wp_enqueue_scripts', 'iphan_inrc_scripts');

function iphan_inrc_add_google_fonts()
{
	wp_enqueue_style('iphan_inrc-google-fonts', 'https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&family=Rubik:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap', array(), IPHAN_INRC_VERSION);
}
add_action('wp_enqueue_scripts', 'iphan_inrc_add_google_fonts');



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

//color palette
require get_template_directory() . '/template-parts/color-palette.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}
