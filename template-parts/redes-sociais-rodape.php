<?php

function diwp_theme_customizer_options($wp_customize)
{

    $wp_customize->add_setting('diwp_logo', array(
        'default' => get_theme_file_uri('assets/image/logo.jpg'), // Add Default Image URL 
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'diwp_logo_control', array(
        'label' => 'Upload Logo',
        'priority' => 20,
        'section' => 'title_tagline',
        'settings' => 'diwp_logo',
        'button_labels' => array( // All These labels are optional
            'select' => 'Select Logo',
            'remove' => 'Remove Logo',
            'change' => 'Change Logo',
        )
    )));
}

add_action('customize_register', 'diwp_theme_customizer_options');
