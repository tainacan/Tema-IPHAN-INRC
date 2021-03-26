<?php

/* ----------------------------- INC IMPORTS  ----------------------------- */

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


//excerpts
require get_template_directory() . '/inc/excerpts.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/* ----------------------------- BLOCK STYLE IMPORTS  ----------------------------- */

//blocks styles
require get_template_directory() . '/template-parts/block-styles.php';

//blocks pattern
require get_template_directory() . '/template-parts/block-patterns.php';

//color palette
require get_template_directory() . '/template-parts/color-palette.php';

//breadcrumb
require get_template_directory() . '/template-parts/breadcrumb.php';

//comments
require get_template_directory() . '/template-parts/filter-comments.php';



/* ----------------------------- CUSTOM BLOCKS IMPORTS  ----------------------------- */

//accordion blocks
require get_template_directory() . '/custom-blocks/accordion-block/accordion-block.php';

//custom blocks
require get_template_directory() . '/custom-blocks/inner-accordion-block/inner-accordion-block.php';
