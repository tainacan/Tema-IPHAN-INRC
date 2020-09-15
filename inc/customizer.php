<?php
/**
 * IPHAN INRC Theme Customizer
 *
 * @package IPHAN_INRC
 */

/**
 * Add postMessage support for site title for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function iphan_inrc_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'iphan_inrc_customize_partial_blogname',
			)
		);
	}
}
add_action( 'customize_register', 'iphan_inrc_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function iphan_inrc_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function iphan_inrc_customize_preview_js() {
	wp_enqueue_script( 'iphan_inrc-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), IPHAN_INRC_VERSION, true );
}
add_action( 'customize_preview_init', 'iphan_inrc_customize_preview_js' );
