<?php

function iphan_theme_customizer_options($wp_customize)
{
    $template_directory = get_template_directory_uri();

    $wp_customize->add_section('social_section', array(
        'title'       => __('Redes Sociais', 'Tema_IPHAN_INRC'),
    ));


    $wp_customize->add_setting('setting_link_1', array(
        'default' => ''
    ));
    $wp_customize->add_control('link_1', array(
        'label' => 'Link do Twitter',
        'type' => 'text',
        'section' => 'social_section',
        'settings' => 'setting_link_1',
        'priority' => 1,
    ));
    $wp_customize->add_setting('iphan_logo_1', array(
        /*  'default' => get_theme_file_uri("' . $template_directory . '/assets/images/iphan_logo.png"), // Add Default Image URL  */
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_setting('setting_link_2', array(
        'default' => ''
    ));
    $wp_customize->add_control('link_2', array(
        'label' => 'Link do Facebook',
        'type' => 'text',
        'section' => 'social_section',
        'settings' => 'setting_link_2',
        'priority' => 2,
    ));
    $wp_customize->add_setting('iphan_logo_2', array(
        /*  'default' => get_theme_file_uri("' . $template_directory . '/assets/images/iphan_logo.png"), // Add Default Image URL  */
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_setting('setting_link_3', array(
        'default' => ''
    ));
    $wp_customize->add_control('link_3', array(
        'label' => 'Link do Instagram',
        'type' => 'text',
        'section' => 'social_section',
        'settings' => 'setting_link_3',
        'priority' => 3,
    ));
    $wp_customize->add_setting('iphan_logo_3', array(
        /*  'default' => get_theme_file_uri("' . $template_directory . '/assets/images/iphan_logo.png"), // Add Default Image URL  */
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_setting('setting_link_4', array(
        'default' => ''
    ));
    $wp_customize->add_control('alt_4', array(
        'label' => 'Nome da nova rede social',
        'type' => 'text',
        'section' => 'social_section',
        'settings' => 'setting_alt_4',
        'priority' => 4,
    ));
    $wp_customize->add_control('link_4', array(
        'label' => 'Link da nova rede social',
        'type' => 'text',
        'section' => 'social_section',
        'settings' => 'setting_link_4',
        'priority' => 5,
    ));
    $wp_customize->add_setting('setting_alt_4', array(
        'default' => ''
    ));

    $wp_customize->add_setting('iphan_logo_4', array(
        /*  'default' => get_theme_file_uri("' . $template_directory . '/assets/images/iphan_logo.png"), // Add Default Image URL  */
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'iphan_logo_control_4', array(
        'label' => 'Upload de imagem da nova rede social 1',
        'priority' => 1,
        'section' => 'social_section',
        'settings' => 'iphan_logo_4',
        'priority' => 6,
        'button_labels' => array( // All These labels are optional
            'select' => 'Selecione a imagem',
            'remove' => 'Remover Imagem',
            'change' => 'Alterar Imagem',
        )
    )));
    $wp_customize->add_setting('setting_link_5', array(
        'default' => ''
    ));
    $wp_customize->add_control('alt_5', array(
        'label' => 'Nome da nova rede social',
        'type' => 'text',
        'section' => 'social_section',
        'settings' => 'setting_alt_5',
        'priority' => 7,
    ));
    $wp_customize->add_control('link_5', array(
        'label' => 'Link da nova rede social',
        'type' => 'text',
        'section' => 'social_section',
        'settings' => 'setting_link_5',
        'priority' => 8,
    ));
    $wp_customize->add_setting('setting_alt_5', array(
        'default' => ''
    ));
    $wp_customize->add_setting('iphan_logo_5', array(
        /*  'default' => get_theme_file_uri("' . $template_directory . '/assets/images/iphan_logo.png"), // Add Default Image URL  */
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'iphan_logo_control_5', array(
        'label' => 'Upload de imagem da nova rede social 2',
        'priority' => 9,
        'section' => 'social_section',
        'settings' => 'iphan_logo_5',
        'button_labels' => array( // All These labels are optional
            'select' => 'Selecione a imagem',
            'remove' => 'Remover Imagem',
            'change' => 'Alterar Imagem',
        )
    )));
    $wp_customize->add_setting('setting_link_6', array(
        'default' => ''
    ));
    $wp_customize->add_control('alt_6', array(
        'label' => 'Nome da nova rede social',
        'type' => 'text',
        'section' => 'social_section',
        'settings' => 'setting_alt_6',
        'priority' => 10,
    ));
    $wp_customize->add_control('link_6', array(
        'label' => 'Link da nova rede social',
        'type' => 'text',
        'section' => 'social_section',
        'settings' => 'setting_link_6',
        'priority' => 11,
    ));
    $wp_customize->add_setting('setting_alt_6', array(
        'default' => ''
    ));
    $wp_customize->add_setting('iphan_logo_6', array(
        /*  'default' => get_theme_file_uri("' . $template_directory . '/assets/images/iphan_logo.png"), // Add Default Image URL  */
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'iphan_logo_control_6', array(
        'label' => 'Upload de imagem da nova rede social 3',
        'priority' => 12,
        'section' => 'social_section',
        'settings' => 'iphan_logo_6',
        'button_labels' => array( // All These labels are optional
            'select' => 'Selecione a imagem',
            'remove' => 'Remover Imagem',
            'change' => 'Alterar Imagem',
        )
    )));
}
/*  */
add_action('customize_register', 'iphan_theme_customizer_options');
